<?php

namespace Modules\Evisa\Http\Middleware;

use Closure;
use Modules\EVisa\Models\Visa;

class ValidatePreviousSteps
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $application = $request->application;
        $module = $application->module;
        $current_step = $request->get('step', 1);

        for($i = 1; $i < $current_step; $i++){
            $validator = $module->makeValidator($application->form_data, $i);
            if($validator->fails()){
                return redirect($module->get_edit_url($application, ['step' => $i]))
                    ->withErrors($validator)
                    ->withInput($application->form_data);
            }
        }

        return $next($request);
    }
}
