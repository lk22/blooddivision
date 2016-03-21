<?php

namespace Blooddivision\Http\Middleware;

use Closure;
use Blooddivision\Event;

class FilterEvents
{

    protected $event;

    function __construct(Event $event)
    {
        $this->event = $event;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


        return $next($request);
    }
}
