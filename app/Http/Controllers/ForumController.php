<?php

namespace Blooddivision\Http\Controllers;

use Illuminate\Http\Request;

use Blooddivision\Http\Requests;
use Blooddivision\Http\Controllers\Controller;

class ForumController extends Controller
{
    /**
     * get all threads at the forum
     * @return Collection [forum threads, tags]
     */
    public function index(){
    	
        return view('pages.forum.forum');

    }
}
