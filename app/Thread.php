<?php

namespace Blooddivision;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Thread extends Model
{
    protected $table = 'forum_threads';

    protected $fillable = ['thread', 'forum_id'];

    protected $dates = ['created_at', 'updated_at'];

    protected $hidden = ['forum_id'];

    public function forum(){
    	return $this->belongsTo('Blooddivision\Forum');
    }

    public function forums(){
    	return $this->belongsToMany('Blooddivision\Forum');
    }

    public function getThread($id){
    	return $this->find($id);
    }

    public function posts(){
    	return $this->hasMany('Blooddivision\Post');
    }

    public function author(){
    	return $this->belongsTo('Blooddivision\User');
    }

    public function authors(){
    	return $this->belongsToMany('Blooddivision\User');
    }

    public function getThreadsWhereAuthorized(){
    	return $this->author()->where('user_id', auth()->user()->id)->get();
    }

    public function getLatest(){
    	return $this->latest()->get();
    }

    public function getAllThreadsWithUsers(){
    	return $this->users;
    }

    public function getThreadAttribute(){
    	return $this->fillable['thread'] = $this->thread();
    }

    public function setCreatedDateFormat(){
    	return $this->dates['created_at'] = (new Carbon())->format('Y-m-d H:m:n');
    }

    public function setUpdatedDateFormat(){
    	return $this->dates['updated_at'] = (new Carbon())->format('Y-m-d H:m:n');
    }

    public function getAllThreads(){
    	return $this->all();
    }

}
