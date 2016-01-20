<?php

namespace Blooddivision;

use Illuminate\Database\Eloquent\Model;

class ForumCategories extends Model
{
    /**
    * tell the model wich table to use
    * @var string => $table
    */

    protected $table = 'forum_categories';

    /**
    * tell the model wich fields that are allowable to contain data
    * @var $fillable
    * @return array
    */

    protected $fillable = [
    	'category'
    ];

    /**
    * set a order by scope
    * @param $query 
    */

    public function scopeOrderByCategories($query)
    {
        return $query->orderBy('category', 'ASC');
    }
}
