<?php

namespace Blooddivision\Http\Controllers;

use Illuminate\Http\Request;
use Blooddivision\User;
use Blooddivision\Rank;
use Blooddivision\Event;
use Blooddivision\Game;
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

    	if($slug == $this->user->slug){

    		$this->user->where('slug', $slug)->get();

    	}

    }
}
