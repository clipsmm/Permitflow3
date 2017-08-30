<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfApplicationNotEditable
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
        $application = $request->route('application');

        if($application->isEditable()){
            return $next($request);
        }
        
        return redirect()->route('application.show', [$application->module->slug, $application])
            ->with('alerts', [
                ['type' => 'warning', 'message' => __('messages.application_not_editable')]
            ]);
    }
}
