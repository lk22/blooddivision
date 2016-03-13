<?php

namespace Blooddivision\Http\Controllers;

use Illuminate\Http\Request;
use Blooddivision\User;
use Blooddivision\Rank;
use Blooddivision\Event;
use Blooddivision\Game;
use Blooddivision\Helpers\Helper;
use Blooddivision\Http\Requests;
use Blooddivision\Http\Requests\ManageUserRequest;
use Blooddivision\Http\Requests\CreateEventRequest;
use File;
use Input;
class UserSettingsController extends Controller
{

	protected $user,
			  $rank,
			  $event,
			  $game,
              $auth;

    public function __construct(User $user, Rank $rank, Event $event, Game $game){
    	$this->user = $user;
    	$this->rank = $rank;
    	$this->event = $event;
    	$this->game = $game;

        $this->auth = Helper::getAuth();
    }

    public function index($slug){

        $user = $this->user->getUser();

        // $rank = $this->rank->with('user')->where('rank.user_id', $auth->id)->get();
    	
        // Helper::getView('layouts.settings', $user);

        return view('pages.profile-settings.manage-general', compact('user'));
    }

    public function updateUser(ManageUserRequest $request){

        if(!$request->file('avatar') == null){
            $request->file('avatar')->move('images/avatars', $request->file('avatar')->fileClientOriginalName());
        }

        if(!$request->file('cover') == null){
            $request->file('cover')->move('images/profile_cover', $request->file('avatar')->getClientOriginalName());
        }

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
            $user = $this->user->getUser(); 

            $events = Event::with('user')->where('events.user_id', auth()->user()->id)->get();

            $games = $this->game->all();

        // return view
            return view('pages.profile-settings.manage-events', compact('user', 'events', 'games'));
    }

    public function createEventView(){
        $user = $this->user->getUser();
         return view('pages.profile-settings.manage-create-event', compact('user'));
    }

    public function storeEvent(CreateEventRequest $request){
        $data = $request->all();

        $data['user_id'] = auth()->user()->id;

        $event = $this->event->create($request->all());
    }

    public function gamesSettings(){
        return view('pages.profile-settings.manage-games', compact('user'));
    }
}
