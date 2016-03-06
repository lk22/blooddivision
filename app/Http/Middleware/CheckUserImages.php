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

        if(!$user_request->file('avatar')->isValid() && empty($user_request->file('avatar')) || !$user_request->file('cover')->isValid() && empty($user_request->file('cover'))){
            return redirect()->back();
        }else{
            File::put('avatars', $user_request->file('avatar'));
            File::put('profile_cover', $user_request->file('cover'));
        }

        return $next($request);
    }
}
