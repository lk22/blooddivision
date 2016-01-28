<?php

namespace Blooddivision;

use Illuminate\Database\Eloquent\Model;
use Blooddivision\User;

class Game extends Model
{
    /**
    * tell the model wich table to use
    * @var $table = string
    */
    protected $table = 'games';

    /**
    * tell the model wich field that are allowed to contain data
    * @var $fillable = []
    */
    protected $fillable = [
    	'game',
    	'game_cover',
        'user_id'
    ];

    /**
     * mutate the user relation 
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeWhereUser($query){
        return $query->where('user_id', auth()->user()->id);
    }

    /**
    * order by descending scope
    * @param $query
    */
    public function scopeOrderByDescending($query){
    	return $query->orderBy('game', 'DESC');
    }

    /**
    * order by ascending scope
    * @param $query
    */
    public function scopeOrderByAscending($query){
    	return $query->orderBy('game', 'ASC');
    }
}
