<?php

namespace Blooddivision;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class User extends Authenticatable implements SluggableInterface
{

    /**
    * using SluggableTrait
    *
    * @return Cviebrock\EloquentSluggable\SluggableTrait
    */

    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'remember_token'
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
        return $this->hasMany('app/Message');
    }

    /**
    *   create one to many relationship between user and comment
    *
    *   @return void
    */

    public function comments(){
        return $this->hasMany('app/Comment');
    }

    /**
    *   create on to many relationship between users and events
    *
    *   @return void
    */
   
    public function events(){
        return $this->hasMany(Event::class);
    }

    public function url() {
        return route('user.profile', $this->slug);
    }
}
