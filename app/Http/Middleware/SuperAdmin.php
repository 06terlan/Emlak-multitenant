<?php

namespace App\Http\Middleware;

use App\Library\MyClass;
use App\Library\MyHelper;
use Closure;
use Illuminate\Support\Facades\Auth;

class SuperAdmin
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
        if( Auth::check() && MyHelper::has_role(MyClass::SUPER_ADMIN_ROLE) )
        {
            return $next($request);
        }
        else return response()->view("errors.403",[],403);
    }
}
