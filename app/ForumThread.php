<?php

namespace Blooddivision;

use Illuminate\Database\Eloquent\Model;

class ForumThread extends Model
{
    /**
    * tell the model wich database table to use
    * @var $table
    */

    protected $table = 'forum_threads';

    /**
    * tell wich fields to allow massive assignments
    * @var $fillable
    * @return array
    */

    protected $fillable = [
    	'thread_title',	// String
    	'category_id',	// Int
    	'user_id'		// Int
    ];

    /**
    * threads belongs to user 
    *
    * @return void
    */

    public function threadBelongsToUser(){
    	return $this->belongsTo('app/User');
    }

    /**
    * one to many relationship with the comments
    *
    * @return void
    */

    public function threadHasManyMessages(){
    	return $this->hasMany('app/Message');
    }

    /**
    * set order by ascending scope
    * @var $query
    * @return void
    */

    public function scopeOrderThreadsAscending($query){
    	return $query->orderBy('thread_title', 'ASC');
    }
}
