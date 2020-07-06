<?php

namespace App\Http\Middleware;

use Closure;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard=null)
    {
        if(auth()->check()){
            if(auth()->user()->role !=$guard && auth()->check()){
                return redirect('/login');
            }
            if(auth()->user()->role ==$guard && auth()->check()){
                return $next($request);
            }
           }
           else
           {
             return  redirect('/login');
           }
    }
}
