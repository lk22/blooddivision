<?php

namespace Blooddivision;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Blooddivision\Comment;
use Blooddivision\Game;
use Blooddivision\Event;
use Bloddivision\Message;

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

    public function message(){
        return $this->hasMany('app/Message');
    }

    /**
    *   create one to many relationship between user and comment
    *
    *   @return void
    */

    public function comment(){
        return $this->hasMany('app/Comment');
    }

    /**
    *   create on to many relationship between users and events
    *
    *   @return void
    */
   
    public function userHasManyEvents(){
        return $this->hasMany('app/Event');
    }

    public function eventHasOneEvent(){
        return $this->hasOne('app/Event');
    }

    /**
     * user has many games
     * @return [relation] [join the games table]
     */
    
    public function games(){
        return $this->hasMany(Game::class, 'user_id');
    }

    public function url() {
        return route('user.profile', $this->slug);
    }
}
