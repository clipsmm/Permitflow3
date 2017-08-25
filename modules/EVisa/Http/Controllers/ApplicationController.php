<?php
/**
 * Created by PhpStorm.
 * User: steveops
 * Date: 22/08/2017
 * Time: 10:45
 */

namespace Modules\EVisa\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\User;
use App\Modules\BaseModule;
use GuzzleHttp\Client;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Modules\EVisa\Models\EVisa;
use Validator;

class ApplicationController extends Controller
{
    protected $module;
    protected $guest_app_session_key = 'mod_e_visa_guest_application';
    protected $guest_app_id = 'mod_e_visa_guest_application_id';
    protected $current_step;
    protected $max_temp_steps = 2;

    public function __construct(Request $request)
    {
        $this->current_step = $request->get('step', 1);
        $this->module = BaseModule::instance_from_slug('e-visa');
    }

    public function create(Request $request)
    {
        return view('e-visa::create', [
            'step' => $this->current_step,
            'model' => $this->getOrCreateFromSession(),
            'country_codes' => \Countries::all()->sortBy('name')->pluck('name.common', 'cca2')
        ]);
    }

    protected function getOrCreateFromSession()
    {
        return new EVisa(session()->get($this->guest_app_session_key, []));
    }

    public function save(Request $request)
    {
        $validator = $this->module->getValidator($request, $this->current_step);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $this->module->toFormData($request->all());
        $form_data = array_merge(session()->get($this->guest_app_session_key, []), $data);
        $this->saveTemp($form_data);

        if ($this->current_step < $this->max_temp_steps) {
            return redirect($this->module->newUrl(['step' => $this->current_step + 1]));
        }

        //create dummy user account
        $user = User::firstOrCreate(['email' => array_get($form_data, 'email')]);
        $data = $this->mergeWithPreviousApplication($form_data, $user);

        //save application and send notification
        $application = Application::insertRecord($this->module, $data, $user);
        $this->sendEmailToUser($user, $application);

        session()->put($this->guest_app_id, $application->id);
        return redirect()->route('e-visa.guest.complete');
    }

    protected function saveTemp($data)
    {
        session()->put($this->guest_app_session_key, $data);
    }

    private function mergeWithPreviousApplication($form_data, $user)
    {
        $application = $user->applications()
            ->submitted()
            ->whereModuleSlug('e-visa')
            ->latest()
            ->first();

        if ($application) {
            $previous_data = array_except($application->form_data, ['travel_reason', 'date_of_entry',
                'date_of_departure', 'arrival_by', 'entry_point', 'places_to_visit', 'passport_bio']);
            $form_data = array_merge($previous_data, $form_data);
        }
        return $this->module->toFormData($form_data);
    }

    private function sendEmailToUser($user, $application)
    {

    }

    public function completeGuestApplication(Request $request, Application $application)
    {
        $app_id = session()->get($this->guest_app_id);
        $application = Application::find($app_id);
        $hash = \Hashids::encode($application->id);

        return view('e-visa::complete_guest', compact('application', 'hash'));
    }

    public function retrieveGuestApplication(Request $request)
    {
        $return_code = $request->route('return_code');
        //todo: check if the application is older than 1hr
        return view('e-visa::retrieve_guest', compact('return_code'));
    }

    public function resumeGuestApplication(Request $request)
    {
        $app_number = trim($request->application_number);
        $recaptcha = $request->get('g-recaptcha-response');

        $app_id = head(\Hashids::decode($request->route('return_code')));
        $application = Application::with('user')->find($app_id);

        $validator = Validator::make($request->all(), [])
            ->after(function ($v) use ($application, $app_number) {
                //validate application number
                if (strtolower($app_number) != strtolower($application->application_number)) {
                    $v->errors()->add('application_number', __('Application Reference Number not matching'));
                }
            })
            ->after(function ($v) use ($recaptcha, $request) {
                $user_pi = $request->ip();
                //validate recaptcha
                $client = new Client();
                $response = json_decode($client->post(config('app.recaptcha_api'), ['response' => $recaptcha,
                    'secret' => env('RECAPTCHA_SECRET'), 'remoteip' => $user_pi])->getBody());
                if (!$response->success) {
                    //$v->errors()->add('recaptcha', 'Recaptcha validation failed');
                }
            });

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //login this user then let him edit the appliction
        auth()->login($application->user);
        return redirect()->route('e-visa.application.edit', ['application_id' => $app_id, 'step' => $this->max_temp_steps + 1]);
    }

    public function edit(Application $application, Request $request)
    {

        $model = $this->module->fromFormData($application->form_data);
        return view($this->module->view('edit'), [
            'application' => $application,
            'step' => $request->get('step', 1),
            'module' => $this->module,
            'model' => $model,
            'country_codes' => \Countries::all()->sortBy('name')->pluck('name.common', 'cca2')

        ]);
    }

    public function update(Application $application, Request $request)
    {
        $validator = $this->module->getValidator($request, $this->current_step);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $this->module->toFormData($request->all());
        $application->updateFormData($data);
        $next_step = $this->module->getNextStep($application, $this->current_step);

        if (is_int($next_step)) {
            return redirect()->route('e-visa.application.edit', [
                'application' => $application->id,
                'step' => $next_step
            ]);
        }

        $this->updateUserDetails($application);

        return redirect()->route('application.review', ['application' => $application, 'module_slug' => $this->module->slug]);
    }

    private function updateUserDetails($application)
    {
        $model = $this->module->fromFormData($application->form_data);
        $user = auth()->user();
        $names = explode(' ', $model->other_names);
        $user->update([
            'surname' => $model->surname,
            'first_name' => array_get($names, 0),
            'last_name' => array_get($names, 1),
            'gender' => $model->gender,
            'dob' => $model->date_of_birth,
            'phone_number' => $model->phone_number
        ]);
    }

    public function getExistingApplication()
    {
        return view('e-visa::retrieve_existing');
    }

    public function retrieveExistingApplication(Request $request)
    {
        $application = null;
        $validator = Validator::make($request->all(),
            [
                'application_number' => 'required',
                'email' => 'required|email'
            ]
        )->after(function ($v) use ($request, &$application) {

            $application = Application::with('user')
                ->forModule('e-visa')
                ->byApplicationNumber($request->application_number)
                ->first();

            if (is_null($application)) {

                $v->errors()->add('application_number', __('e-visa::validation.application_not_found'));

            } else if ($application->user->email != $request->email) {

                $v->errors()->add('email', __('e-visa::validation.email_not_matching'));

            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        session()->put('e-visa-retrieved-application-id', $application->id);

        return redirect()->route('e-visa.retrieve_existing_success');
    }

    public function retrieveExistingApplicationSuccess()
    {
        $application = Application::with('user')
            ->forModule('e-visa')
            ->findOrFail(session('e-visa-retrieved-application-id'));

        return view('e-visa::retrieve_existing_success', ['application' => $application]);
    }




}