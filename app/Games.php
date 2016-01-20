<?php

namespace Blooddivision;

use Illuminate\Database\Eloquent\Model;

class Games extends Model
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
    ];

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
