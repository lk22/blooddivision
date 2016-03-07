<?php

namespace Blooddivision\Http\Middleware;


use Closure;

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
        if(!auth()->user()->isSuperAdmin()){
            return redirect()->route('/');
        }
        
        return $next($request);
    }
}
