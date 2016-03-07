<?php

namespace Blooddivision\Http\Middleware;

use Closure;
use \Blooddivision\Http\Requests;
use \Blooddivision\Http\Requests\ManageUserRequest;
use File;

class CheckUserImages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ManageUserRequest $user_request)
    {

        

        return $next($request);
    }
}
