<?php

namespace Blooddivision;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = array(
    	'title',
    	'body'
    );

    
}
