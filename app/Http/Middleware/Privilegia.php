<?php

namespace App\Http\Middleware;

use App\Library\MyHelper;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Privilegia
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $module, $priv)
    {
        if( MyHelper::has_priv($module, $priv) )
        {
            return $next($request);
        }
        else return response()->view("errors.403",[],403);
    }
}
