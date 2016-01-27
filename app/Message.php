<?php

namespace Blooddivision;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
   	*	tell the model wich table to use
   	*
   	*	@var string
   	*/

   	protected $table = 'messages';

   	/**
   	*	tell the model wich fields that are allowed to contain data	
   	*
   	*	@var array
   	*/

   	protected $fillable = ['message', 'user_id'];

   	/**
   	*	create on to many relationship with the columns table
   	*
   	* 	@return void
   	*/

   	public function Comments(){
   		return $this->hasMany('app/Comment');
   	}
}
