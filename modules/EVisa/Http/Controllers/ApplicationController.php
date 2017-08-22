<?php
/**
 * Created by PhpStorm.
 * User: steveops
 * Date: 22/08/2017
 * Time: 10:45
 */

namespace Modules\EVisa\Http\Controllers;

use App\Models\Application;
use App\Models\Module;
use App\Models\User;
use App\Modules\BaseModule;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\EVisa\Models\EVisa;

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

        if($this->current_step < $this->max_temp_steps){
            return redirect($this->module->newUrl(['step' => $this->current_step + 1]));
        }

        //create dummy user account
        $user = User::firstOrCreate(['email' => array_get($form_data, 'email')]);

        //save application and send notification
        $application = Application::insertRecord(Module::whereSlug($this->module->slug)->first(), $data, $user);
        $this->sendEmailToUser($user, $application);

        session()->put($this->guest_app_id, $application->id);
        return redirect()->route('e-visa.guest.complete');
    }

    public function notifyGuest(Request $request, Application $application)
    {
        $app_id = session()->get($this->guest_app_id);
        $application = Application::find($app_id);
        return view('e-visa::guest_complete', compact('application'));
    }

    protected function getOrCreateFromSession()
    {
        return new EVisa(session()->get($this->guest_app_session_key, []));
    }

    protected function saveTemp($data)
    {
        session()->put($this->guest_app_session_key, $data);
    }

    private function sendEmailToUser($user, $application)
    {

    }
}