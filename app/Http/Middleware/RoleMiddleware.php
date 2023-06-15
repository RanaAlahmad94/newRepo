<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if(Auth::user()->role_id == '1'){
                return $next($request);

            }else{
                return redirect('/home')->with('message', 'Access Denied');
            }
        }else{
           return redirect('/login')->with('message', 'login to access only the info');
        }
        return $next($request);
    }
 }