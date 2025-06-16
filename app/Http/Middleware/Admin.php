<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if(!auth()->check()) {
            return redirect()->route('login');
        }
        
        if(auth()->user()->role == 'admin') {
            return $next($request);
        }
        
        return redirect()->route('home')->with('error','You do not have permission to access this page');
    }
}
