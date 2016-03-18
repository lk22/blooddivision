<?php

namespace Blooddivision\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Blooddivision\User;
use Blooddivision\Event;
use \Gate;

class EventPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        // policy logic here
    }

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function before($user, $ability){
        if($user->isSuperAdmin() && auth()->user()){
            return true;
        }
    }
    
    public function allowed(User $user, Event $event){
        // allowable logic here...
    }

    public function update(User $user, Event $event){
        return $user->id === auth()->user()->id;
    }

    public function create(User $user, Event $event){
        return $user->id === auth()->user()->id;
    }

    public function delete(User $user, Event $event){
        return $user->id === auth()->user(->id;
    }
}
