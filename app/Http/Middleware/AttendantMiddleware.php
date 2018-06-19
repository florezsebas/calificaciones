<?php

namespace App\Http\Middleware;

use Closure;

class AttendantMiddleware
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
        if(Auth::user()->isAttendant()) {
            return $next($request);
        } else {
            abort(401,"Acceso no autorizado!");
        }
    }
}
