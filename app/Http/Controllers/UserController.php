<?php

namespace Blooddivision\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Blooddivision\Http\Requests;
use Blooddivision\Http\Requests\CreateEventRequest;
use Blooddivision\Http\Requests\CreateGameRequest;
use Blooddivision\Http\Requests\EditUserDescriptionRequest;
use Blooddivision\Http\Controllers\Controller;
use Auth;
use Blooddivision\User;
use Blooddivision\Event;
use Blooddivision\Game;
use Blooddivision\Rank;
use Carbon\Carbon;

// brug sluggable i stedet for a lede efter User->name. https://github.com/cviebrock/eloquent-sluggable
// aldrig brug DB klassen. Hvis du gør, kan det med 90% sikkerhed gøres på en nemmere måde.
// brug ->first(); fremfor take(1)->get();
// læs hele dokumentationen igennem for Laravel Relations: https://laravel.com/docs/5.2/eloquent-relationships, evt https://laracasts.com/series/laravel-5-fundamentals/episodes/14
// modeller skal ALTID være kaldt i singular form. Dvs User, Post, Message, ikke Users, Posts, Messages

class UserController extends Controller
{
    /**
    * show the user profile layout
    * @return profile
    */
   
   protected $user,
             $event,
             $game,
             $rank;
   
   public function __construct(User $user, Event $event, Game $game, Rank $rank){
        $this->user = $user;
        $this->event = $event;
        $this->game = $game;
        $this->rank = $rank;
   }
   

    public function profile($slug){
    	// step 1 => get the specific user

            $user = $this->user->Where('name', $slug)->get(); 

            $events = $this->event->with('user')->where('events.user_id', auth()->user()->id)->latest()->get();

            $ranks = $this->rank->with('user')->where('ranks.user_id', auth()->user()->id)->take(1)->get();

            $games = $this->game->latest()->take(1);
        // $events = Event::all()->take(10)->get(); // get  
        
    	// step 3 => get the profile view
        // 
        	return view('pages.profile.profile_home', compact('user', 'events', 'ranks'));
            return vide('layouts.profile', compact('user', 'ranks'));
    }

    /**
    * show the profile events
    * @return events
    */

    public function profileEvents($name){
    	// step 1 => get the user
    	$user = $this->user->where('name', $name)->get();

    	// step 2 => get the events belongs to the user
        $events = $this->event->with('user')->getEventsWhereUserIsAuthorized();

        $ranks = $this->rank->with('user')->where('ranks.user_id', auth()->user()->id)->take(1)->get();
        
        // $user->events;
        // 
        // dd($events);

    	// step 4 => load view
    	return view('pages.profile.profile_events', compact('user', 'events', 'ranks'));
    }

    /**
    * show specific event that is pointed to the logged in user
    * @return event
    */

    public function profileEvent($slug){
    	$the_event = $this->event->where('event_title', $slug)->limit(1)->get();
    }


    /**
    * store the created event
    * @param Blooddivision\Http\Requests\CreateEventRequest::class
    * @return void
    */

    public function storeEvent(CreateEventRequest $request){

        $data = $request->all();

        $data['user_id'] = auth()->user()->id;

    	/**
    	* step 1 => create the model row
    	*/
    
    	   $this->event->create($data);

    	/**
    	* step 2 => redirect the user to the your events route
    	*/
        
    	   return redirect('/profile/' . auth()->user()->name . ' /your-events');
    }

    /**
    * thrash the chosen event
    * @param $id = INT
    * @return void
    */
    public function thrashEvent($id){

        if($id == $auth->id){
            $this->event->where('id', auth()->user()->id)->delete();
        }

    	$this->event->where('id', $id)->delete();
    	return redirect('/profile/{{Auth::user()->name}}/your-events');
    }

    /**
     * get the games of the profile
     * 
     * @return [array] [the users favourite games]
     */
    
    public function profileGames(){
        /**
         * fetch the user
         * @var [array]
         */
        $user = $this->user->where('name', auth()->user()->name)->get();
        // $games = Game::find('id')->with('user')->get();
    
        /**
         * fetch the users added games
         */
    
        $games = $this->game->with('user')->where('games.user_id', auth()->user()->id)->get();
        
        $ranks = $this->rank->with('user')->where('ranks.user_id', auth()->user()->id)->take(1)->get();

        // dd($games);

        return view('pages.profile.profile_games', compact('user', 'games', 'ranks'));
    }

    /**
     * store the users game 
     *
     * @return  object [game object model]
     */
    
    public function storeProfileGame(CreateGameRequest $request){

        $data = $request->all();

        $data['user_id'] = $this->helper->getAuth();

        $this->game->create([
            'game' => $data['game_name'],
            'user_id' => auth()->user()->id
            ])->save();

        $authName = auth()->user()->name;

        return redirect('/profile/' . $auth . '/your-games');
    }

    // Event::whereHas(['' => function($query){
    //     $query->where('user_id', '=', 1);
    // }]);
    // 
    
    public function editDescription(EditUserDescriptionRequest $request, $slug){

        $auth = auth()->user();
        $this->user->where('id', $auth->id)->update(['profile_desc' => $request->get('description')]);

        return redirect('/profile/' . $auth->name);

    }

}