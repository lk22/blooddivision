<?php

namespace Blooddivision;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'thread_posts';

    protected $fillable = array('post_title', 'post', 'user_id', 'thread_id');

    protected $dates = array('created_at', 'updated_at', 'deleted_at');

    public function author(){
    	return $this->hasOne('Blooddivision\User');
    }

    public function authors(){
    	return $this->hasMany('Blooddivision\User');
    }

    public function threads(){
    	return $this->BelongsToMany('Blooddivision\Thread');
    }

    public function thread(){
    	return $this->BelongsTo('Blooddivision\Thread');
    }

    public function getAllPosts(){
    	return $this->all();
    }

    public function getLatest(){
    	return $this->latest()->get();
    }

    public function scopeOrderByDescending($query){
    	return $query->where('id', 'DESC');
    }

    public function scopeOrderByAscending($query){
    	return $query->where('id', 'ASC');
    }

    public function latestRelatedPosts(){
    	return $this->with('authors')->getLatest();
    }

    public function getAllRelatedPosts(){
    	return $this->with('threads')->where('forum_threads.id', 'thread_posts.id')->get();
    }

    public function scopeWhereUser($query){
    	return $query->with('author')->where('users.id', auth()->user()->id)->get();
    }
}
