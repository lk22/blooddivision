<?php

namespace Blooddivision;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Blooddivision\Comment;
use Blooddivision\Game;
use Blooddivision\Event;
use Bloddivision\Message;
use Bloddivision\Rank;

class User extends Authenticatable implements SluggableInterface
{

    /**
    * using SluggableTrait
    *
    * @return Cviebrock\EloquentSluggable\SluggableTrait
    */

    use SluggableTrait;

    /**
     * users table
     * @var $table
     */
    protected $table = "users";

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
        'name', 'email', 'password', 'avatar', 'cover', 'remember_token'
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
        return $this->hasMany('Blooddivision\Message');
    }

    /**
    *   create one to many relationship between user and comment
    *
    *   @return void
    */

    public function comment(){
        return $this->hasMany('Blooddivision\Comment');
    }

    /**
    *   create one to many relationship between users and events
    *
    *   @return void
    */
    public function events(){
        return $this->belongsToMany('Blooddivision\Event')->withTimestamps();
    }

    /**
     * user has many games
     * @return [relation] [join the games table]
     */
    public function games(){
        return $this->hasMany('Blooddivision\Game');
    }

    /**
     * User to roles relationship
     * @return [type] [description]
     */
    public function roles(){
        return $this->belongsToMany('Blooddivision\Role');
    }

    /**
     * one to one relation user to rank
     * @return [type] [description]
     */
    public function rank(){
        return $this->hasOne('Blooddivision\Rank');
    }

    /**
     * get users rank
     * @return [type] [description]
     */
    public function getRank(){
        return $this->with('rank')->where('users.id', 'ranks.user_id')->take(1)->get();
    }


    public function url() {
        return route('user.profile', $this->slug);
    }

    /**
     * scope the authorized user id
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    public function scopeWhereUserId($query){
        return $query->where('id', Auth::user()->id);
    }

    /**
     * scope games where that belongs to the authorized user
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    public function scopeJoinGames($query){
        return $query->with('games')->where('id', \Auth::user()->id)->get();
    }
}
