<?php

namespace Blooddivision\Http\Controllers;

use Blooddivision\Http\Requests;
use Illuminate\Http\Request;
use Blooddivision\MessageOfTheDay;
use Blooddivision\Message;
use Blooddivision\User;
use Blooddivision\ForumThreads;
use Blooddivision\Event;
use Blooddivision\Game;
use Auth;

class HomeController extends Controller
{

    protected $event;
    protected $user;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Event $event, User $user)
    {
        $this->middleware('auth');

        $this->event = $event;
        $this->user = $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index(){
        
        $events = $this->event->with('user')->latest()->take(5)->get();

        return view('home', compact('events'));
    }

    /**
    *   store a new message
    *
    *   @return Illuminate\Http\Request;
    */
    public function storeMessageOfTheDay(Request $request){
        Message::create(['message' => $request->get('message'),  'user_id' => Auth::user()->id]);
        return redirect('/home');
    }
}
