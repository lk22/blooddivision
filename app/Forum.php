<?php

namespace Blooddivision;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forums';

    protected $fillable = ['forum'];

    public function threads(){
    	return $this->hasMany('Blooddivision\Thread');
    }

    public function thread(){
    	return $this->hasOne('Blooddivision\Thread');
    }
}
