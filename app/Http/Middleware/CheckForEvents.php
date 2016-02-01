<?php

namespace Blooddivision\Http\Middleware;
use Blooddivision\Event;

use Closure;

class CheckForEvents
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
        if(Event::count() >= 1){
            
        }

        return $next($request);
    }
}
