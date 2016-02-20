<?php

namespace Blooddivision;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    protected $table = 'help_blog';

    protected $fillable = ['title', 'body', 'published_at'];

    protected $dates = ['publised_at'];
}
