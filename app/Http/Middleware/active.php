<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class active
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            // echo Auth::user()->user_type;die();
            if(!Auth::user()->status){
                return redirect()->route('logout_user')->with('massage',"لاتملك صلاحيات الدخول");
            }
        }
        return $next($request);
    }
}
