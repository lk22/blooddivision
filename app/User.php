<?php

namespace Blooddivision;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    *   create one to many relationship between users and messages
    *
    *   @return void
    */

    public function messages(){
        return $this->hasMany('app/Messages');
    }

    /**
    *   create one to many relationship between user and comment
    *
    *   @return void
    */

    public function comments(){
        return $this->hasMany('app/User');
    }

    /**
    *   create on to many relationship between users and events
    *
    *   @return void
    */

    public function events(){
        return $this->hasMany('app/Events');
    }
}
