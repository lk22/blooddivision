<?php

namespace Blooddivision\Http\Controllers;

use Illuminate\Http\Request;
use Blooddivision\User;
use Blooddivision\Rank;
use Blooddivision\Event;
use Blooddivision\Game;
use Blooddivision\Helper;
use Blooddivision\Http\Requests;
use Blooddivision\Http\Requests\ManageUserRequest;
use File;
use Input;
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

        $auth = Helper::getAuth();

        $user = $this->user->getUser();

        // $rank = $this->rank->with('user')->where('rank.user_id', $auth->id)->get();
    	
        // Helper::getView('layouts.settings', $user);

        return view('pages.profile-settings.manage-general', compact('user'));
    }

    public function updateUser(ManageUserRequest $request){

        $request->file('avatar')->move('images/avatars', $request->file('avatar')->getClientOriginalName());

        $request->file('cover')->move('images/profile_cover', $request->file('avatar')->getClientOriginalName());

        $this->user->where('id', auth()->user()->id)->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'avatar' => $request->file('avatar')->getClientOriginalName(),
            'cover' => $request->file('cover')->getClientOriginalName(),
            'profile_desc' => $request->get('description')
        ]);

        return redirect()->back();

    }

    public function eventsSettings(){
        // grab all the users events
        
        // return view
    }

    public function gamesSettings(){
        // logic here
    }
}
