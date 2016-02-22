<?php

namespace Blooddivision;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $table = 'ranks';

    protected $fillable = ['rank', 'user_id'];

    protected $guarded = ['user_id'];

    public function user(){
    	return $this->belongsTo('Blooddivision\User');
    }
}
