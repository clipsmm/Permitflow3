<?php

namespace App\Http\Middleware;

use Closure;

class BackendAccess
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
        if(!$request->user())
            return redirect()->route('login');

        if(!$request->user()->roles()->count())
            abort(403,"ACCESS DENIED! YOU ARE NOT AUTHORISED TO VIEW THIS PAGE");

        return $next($request);
    }
}
