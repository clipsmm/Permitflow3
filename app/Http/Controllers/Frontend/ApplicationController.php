<?php

namespace App\Http\Controllers\Frontend;

use App\Application;
use App\Http\Controllers\Controller;
use App\Module;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    protected $module;

    public function __construct(Request $request)
    {
        //todo: add middleware to check if module is activated
        $this->module = module_from_slug($request->route('module_slug'));
    }

    public function create()
    {
        $model_class = $this->module->modelClass;
        return view($this->module->view('create'), [
            'module' => $this->module,
            'model' => new $model_class
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

        if(is_int($next_step)){
            return redirect()->route('application.edit', [
                'module_slug' => $this->module->slug,
                'application' => $application->id,
                'step' => $next_step
            ]);
        }

        return redirect()->route('application.review', [
            'module_tag' => $this->module->tag,
            'application' => $application->id
        ]);
    }

    public function edit(Request $request, $module_slug, Application $application)
    {
        $model_class = $application->module->module->fromFormData($application->form_data);
        $model = new $model_class($application->form_data);
        return view($this->module->view('edit'), [
            'application' => $application,
            'module' => $this->module,
            'model' => $model,
            'step' => $request->get('step', 1)
         ]);
    }

    public function review(Application $application){
    }
}
