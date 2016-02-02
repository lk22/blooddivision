<?php

namespace Blooddivision;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Elouquent\SoftDeletes;

class Tag extends Model
{
    /**
     * set the table the model is using
     * @var $table [the database table]
     */
    protected $table = ['tags'];

    /**
     * set the fields is should use from the table to mass assign
     * @var $fillable [all the table columns]
     */
    protected $fillable = [];

    /**
     * use the soft deletes trait
     * @return Trait [the soft deletes trait class]
     */
    use SoftDeletes;

    /**
     * set forum thread relation 
     * @return void
     */
    public function threads(){
    	return $this->hasMany('Blooddivision\ForumThread');
    }
}
