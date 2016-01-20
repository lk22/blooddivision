<?php

namespace Blooddivision;

use Illuminate\Database\Eloquent\Model;

class MessageOfTheDay extends Model
{
   	/**
   	*	tell the model wich table to use
   	*
   	*	@var string
   	*/

   	protected $table = 'daymessage';

   	/**
   	*	tell the model wich fields that are allowed to contain data	
   	*
   	*	@var array
   	*/

   	protected $fillable = ['message'];

}
