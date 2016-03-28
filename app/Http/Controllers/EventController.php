<?php

namespace Blooddivision\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use Blooddivision\Http\Requests;
use Blooddivision\Http\Requests\CreateEventRequest;
use Blooddivision\Http\Controllers\Controller;

use Blooddivision\Event;
use Blooddivision\User;

use Auth;
use DB;
use Response;

use Blooddivision\Helpers\Helper;
use Blooddivision\Transformers\EventTransformer;


class EventController extends Controller
{

    protected $eventTransformer;

    /**
    *	tell the controller wich middleware to use
    *
    *	@return void
    */
    public function __construct(Event $event, User $user){
    	$this->middleware('auth');

        $this->event = $event;
        $this->user = $user;
        // $this->eventTransformer = $eventTransformer;
    }

    /**
    *	get the events view
    *	@return void
    */
    public function events(){
    
    
        $events = $this->event->with('user')->get();

    	/**
    	* return events view with the all the events
    	*/
    	return view('pages.events')->with('events', $events);
    
        // dd($events);
        // 
        // transform data return $this->eventTransformer->transform($events);
        
        // return $events;
    }

    /**
     * show latest events
     * @return [type] [description]
     */
    public function latest(){

        $events = $this->event->with('user')->latest()->get();

        return view('pages.events', compact('events'));

    }

    /**
     * show all completed events
     * @return [type] [description]
     */
    public function completed(){

        $events = $this->event->with('user')->whereCompleted();

        return view('pages.events', compact('events'));

    }

    /**
    *	store a new event 
    *	@param \Illuminate\Http\Request
    *	@return void
    */

    public function storeEvent(CreateEventRequest $request){

        $data = $request->all();

        $data['user_id'] = auth()->user()->id;

    	/**
    	*	create the new event
    	*	@param event_title 			=> $request->get('event_title'), 
    	*	@param event_game  			=> $request->get('event_game'),
    	*	@param event_description	=> $request('event_description'),
    	*	@param event_date			=> Carbon\Carbon::now()
    	*	@param event_time 			=> Carbon::time()
    	*	@param user_id				=> Auth::user->id
    	*	@return model
    	*/
    	$this->event->create([
    		'name' 		  => $request->get('name'), 
    		'game' 		  => $request->get('game'), 
    		'description' => $request->get('description'),
            'datetime'    => $request->get('datetime'),
    		'user_id'	  => auth()->user()->id
    	])->save();

    	/**
    	*	redirect the user to the events page
    	*	@param $view = /events
    	*/
    	return redirect('/events');
    }

    public function event($slug){

        $event = $this->event->with('user')->where('events.slug', $slug)->get();

        return view('pages.event', compact('event'));

    }

}