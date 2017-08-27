<?php

namespace App\Http\Controllers\Frontend;

use App\Events\ApplicationResubmitted;
use App\Events\ApplicationSubmitted;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationOutput;
use App\Models\Invoice;
use App\Models\Module;
use App\Models\Output;
use App\Modules\BaseModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    protected $module;

    public function __construct(Request $request)
    {
        //todo: add middleware to check if module is activated
        $this->module = BaseModule::instance_from_slug($request->route('module_slug'));;
    }

    public function create()
    {
        $model_class = $this->module->modelClass;
        $model = new $model_class;
        return view($this->module->view('create'), [
            'lookup_data' => $this->module->loadLookupData($model),
            'module' => $this->module,
            'model' => $model
        ]);
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function save(Request $request)
    {
        $current_step = 1;
        $validator = $this->module->getValidator($request, $current_step);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $this->module->toFormData($request->all());
        $module = Module::whereSlug($this->module->slug)->first();
        $application = Application::insertRecord($module, $data, auth()->user());
        $next_step = $this->module->getNextStep($application, $current_step);

        if (is_int($next_step)) {
            return redirect()->route('application.edit', [
                'module_slug' => $this->module->slug,
                'application' => $application->id,
                'step' => $next_step
            ]);
        }

        return redirect()->route('application.review', [
            'module_slug' => $this->module->slug,
            'application' => $application->id
        ]);
    }

    public function edit(Request $request, $module_slug, Application $application)
    {
        $model = $application->module->fromFormData($application->form_data);
        return view($this->module->view('edit'), [
            'application' => $application,
            'lookup_data' => $this->module->loadLookupData($model),
            'module' => $this->module,
            'model' => $model,
            'step' => $request->get('step', 1)
        ]);
    }

    public function review($module, Application $application)
    {
        return view('applications.review', ['application' => $application, 'module' => $this->module]);
    }

    public function submit($module, Application $application)
    {
        $invoice = null;

        DB::transaction(function() use($application, &$invoice){
            $invoice = $this->module->create_invoice($application);
            $in_corrections = $application->in_corrections;

            $application->submit();

            if($in_corrections){
                event(new ApplicationResubmitted($application));
            }else{
                event(new ApplicationSubmitted($application));
            }

        });

        if(is_null($invoice)){
            return redirect()->route('application.submitted', ['module_slug' => $this->module->slug, 'application' => $application->id]);
        }

        return redirect()->route('application.checkout', ['module_slug' => $this->module->slug, 'invoice_id' => $invoice->pk, 'application' => $application->id]);
    }

    public function submitted($module_slug, Application $application)
    {
        return view('applications.submitted', ['application' => $application, 'module' => $this->module]);
    }

    public function checkout(Request $request, $module_slug, Application $application, Invoice $invoice)
    {
        if(!$invoice->bill_ref){
            $invoice->get_pesaflow_bill_ref();
            $invoice->fresh();
        }

        $checkout_data = get_pesaflow_checkout_data_from_invoice($invoice);

        return view('frontend.checkout', [
            'data' => $checkout_data,
            'module' => $this->module,
            'application' => $application
        ]);
    }

    public function show(Request $request, $module, $app_id)
    {
        $application = Application::with(['user','invoices', 'outputs', 'outputs.output'])
            ->forModule($module)
            ->find($app_id);

        return view('applications.show', ['application' => $application, 'module' => $this->module]);
    }

    public function myApplications(Request $request)
    {
        $user  =  user();
        $applications = $user->applications()->with(['current_invoice'])->paginate(20);

        return view('frontend.my_applications',[
            'applications' => $applications
        ]);
    }

    public function downloadOutput(Request $request, $module, Application $application, ApplicationOutput $applicationOutput)
    {
        $applicationOutput->load(['application', 'task', 'task.user']);

        $output  = Output::render_output($applicationOutput->output, [
            'application' => $applicationOutput->application,
            'task' => $applicationOutput->task
        ]);

        return view('blank', [
            'content' => $output
        ]);
    }
}
