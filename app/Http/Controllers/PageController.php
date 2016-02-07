<?php

namespace Blooddivision\Http\Controllers;

use Illuminate\Http\Request;

use Blooddivision\Http\Requests;
use Blooddivision\Http\Controllers\Controller;
use Blooddivision\User;

class PageController extends Controller
{
    /**
    *	show the landing page 
    *
    *	@return void
    */
    public function getLandingPage()
    {
    	return view('welcome');
    }

    /**
     * launching the application soon
     * @return [void] [returning the view of the launching soon page]
     */
    public function launchSoon(){
        return view('launch');
    }

    /**
    *	get all the registered crew members
    *
    *	@param Blooddivision\User
    *	@return void
    */
    public function getMembersPage()
    {
    	$all_members = User::all();
    	return view('pages.members')->with('all_members', $all_members);
    }
}
