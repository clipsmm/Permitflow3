<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class ApplicationDeletable
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
        if(!$application->canBeDeleted()){
            abort(Response::HTTP_FORBIDDEN, 'Application cannot be deleted at this time');
        }
        return $next($request);
    }
}
