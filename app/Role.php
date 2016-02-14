<?php

namespace Blooddivision;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	/**
	 * setup database table for the model to use
	 * @var string
	 */
    protected $table = 'roles';

    /**
     * set the fillable fields to allow massive assignments
     * @var array
     */
    protected $fillable = ['role'];

    /**
     * many to many relationship for the users
     * @return void
     */
    public function users(){
    	return $this->belongsToMany('Blooddivision\User');
    }
}
