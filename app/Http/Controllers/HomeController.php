<?php

namespace Blooddivision\Http\Controllers;

use Blooddivision\Http\Requests;
use Illuminate\Http\Request;
use Blooddivision\MessageOfTheDay;
use Blooddivision\Message;
use Blooddivision\User;
use Blooddivision\ForumThreads;

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
        $messages = MessageOfTheDay::all();
        $latest_users = User::latest()->limit(3)->get();
        $feed = Message::all();
        // $threads = ForumThread::latest()->limit(3)->get();

        return view('home', compact('messages', 'latest_users', 'feed'));
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
