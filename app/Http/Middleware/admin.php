<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Library\MyClass;

class admin
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
        
        if( Auth::check() && Auth::user()->role == MyClass::ADMIN_ROLE )
        {
            return $next($request);
        }
        else return redirect('admin/home');
    }
}
