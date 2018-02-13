<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TenantHaveAccess
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
        if( Auth::user()->tenant->last_date == null || strtotime(Auth::user()->tenant->last_date) >= strtotime(date("d-m-Y")) )
        {
            return $next($request);
        }
        else
        {
            Auth::logout();
            return response()->view("errors.402",[],402);
        }
    }
}
