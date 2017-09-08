<?php

namespace App\Http\Controllers\Backend;

use App\Models\Application;
use App\Models\Output;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class OutputController extends Controller
{
    public function index(Request $request, $module)
    {
        $outputs  =  Output::query()->module($module->slug)->paginate(20);

        return view('backend.outputs.index',[
            'outputs' => $outputs
        ]);
    }

    public function create(Request $request, $module)
    {
        return view('backend.outputs.new');
    }



    public function store(Request $request, $module)
    {
        $this->validate($request, [
            'template' => "required",
            'name' => "required",
            'code' => [
                "required", Rule::unique('outputs','code')->where('module_slug', $module->slug)
            ]
        ],[
            'code.unique' => __('validation.unique_outputs_code')
        ]);

        $output  =  Output::create_output($module->slug, $request->name, $request->code, $request->template);

        return redirect()->route('backend.outputs.edit', [$module->slug, $output->id])
            ->with('alerts', [
                ['type' => 'success', 'message' => __('messages.output_created')]
            ]);
    }

    public function show($module, Output $output)
    {
        return view('backend.outputs.view', [
            'output' => $output
        ]);
    }

    public function edit($module, Output $output)
    {
        return view('backend.outputs.edit', [
            'output' => $output
        ]);
    }


    public function update(Request $request, $module, Output $output)
    {
        $this->validate($request, [
            'template' => "required",
            'name' => "required",
            'code' => [
                "required", Rule::unique('outputs','code')
                    ->where('module_slug', $module->slug)
                    ->ignore($output->id)
            ]
        ],[
            'code.unique' => __('validation.unique_outputs_code')
        ]);

        $output->fill($request->only(['name', 'template', 'code']));
        $output->save();

        return redirect()->back()
            ->with('alerts', [
                ['type' => 'success', 'message' => __('messages.output_updated')]
            ]);
    }

    public function preview(Request $request, $module, Output $output)
    {
        $sample  = $output->application_outputs()->whereCode($output->code)->first();

        return $module->render_output_preview($sample);
    }
}
