<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class CurrentUserOwnsApplication
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
        if($application->user_id != auth()->user()->id){
            abort(Response::HTTP_UNAUTHORIZED, 'You are not authorized to access this page');
        }

        return $next($request);
    }
}
