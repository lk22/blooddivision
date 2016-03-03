<?php

namespace Blooddivision\Http\Controllers;

use Illuminate\Http\Request;
use Blooddivision\User;
use Blooddivision\Rank;
use Blooddivision\Event;
use Blooddivision\Game;
use Blooddivision\Helper;
use Blooddivision\Http\Requests;

class UserSettingsController extends Controller
{

	protected $user,
			  $rank,
			  $event,
			  $game;

    public function __construct(User $user, Rank $rank, Event $event, Game $game){
    	$this->user = $user;
    	$this->rank = $rank;
    	$this->event = $event;
    	$this->game = $game;
    }

    public function index($slug){

        $user = Helper::getAuth();

        $events = $this->user->where('id', $user->id)->get();
    	Helper::dieAndDump($events);

    }

    public function eventsSettings(){
        // grab all the users events
        
        // return view
    }

    public function gamesSettings(){
        // logic here
    }
}
