<?php

namespace Blooddivision;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
   	*	tell the model wich table to use
   	*
   	*	@var string
   	*/

   	protected $table = 'comments';

   	/**
   	*	tell the model wich fields that are allowed to contain data	
   	*
   	*	@var array
   	*/

   	protected $fillable = ['comment'];

      /**
      *  create one to many relationship with the threads
      *
      *  @return void
      */

      public function threads(){
         return $this->belongsTo('app/ForumThread');
      }
}
