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
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index(){
        
        $latest_users = User::latest()->limit(3)->get();
        $feed = Message::all();
        $events = Event::with('user')->latest()->take(5)->get();
        // $games = Game::latest()->take(1)->where('user_id', Auth::user()->id)-get();
        // $games = Game::with('user')->findOrFail('games.id')->whereUser()->take(1)->latest()->get();

        return view('home', compact('latest_users', 'feed', 'events', 'games'));
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
