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


class ManageController extends Controller
{

    /**
     * object properties
     */
	protected $user,
			  $rank,
			  $event,
			  $game,
              $auth;
    /**
     * construct objects
     *
     * @param      User   $user   (description)
     * @param      Rank   $rank   (description)
     * @param      Event  $event  (description)
     * @param      Game   $game   (description)
     */
    public function __construct(User $user, Rank $rank, Event $event, Game $game){
    	$this->user = $user;
    	$this->rank = $rank;
    	$this->event = $event;
    	$this->game = $game;

        $this->auth = Helper::getAuth();
    }

    /**
     * [get the users infomation]
     * @param  [type] $slug [description]
     * @return [type]       [description]
     */
    public function index($slug){

        $user = $this->user->getUser();

        return view('pages.profile-manage.manage-general', compact('user'));
    }

    /**
     * update det user 
     *
     * @param      ManageUserRequest  $request  (description)
     *
     * @return     <type>
     */
    public function updateUser(ManageUserRequest $request){

        /**
         * get the request array
         */

            $data = $request->all();

        /**
         * store the avatar data
         * @var $avatar <type>
         */

            $avatar = $request->file('avatar');

        /**
         * store the cover data
         * @var $cover <type>
         */

            $cover = $request->file('cover');

        /**
         * move the selected file to the avatars folder
         */

            if(!$avatar == null){
                $avatar->move('images/avatars', $request->file('avatar')->fileClientOriginalName());
            }

        /**
         * move the cover image to covers folder
         */

            if(!$cover == null){
                $cover->move('images/profile_cover', $request->file('avatar')->getClientOriginalName());
            }

        /**
         * update the user information on the authorized user
         */

            $this->user->where('id', auth()->user()->id)->update([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'avatar' => $request->file('avatar')->getClientOriginalName(),
                'cover' => $request->file('cover')->getClientOriginalName(),
                'profile_desc' => $request->get('description')
            ]);

        /**
         * redirect back to the manage page
         */

            return redirect()->back();

    }

    /**
     * get alle events to manage
     *
     * @return     <type>
     */
    public function eventsSettings(){
        
        /**
         * get the autorized user
         */

            $user = $this->user->getUser(); 

        /**
         * get all the events that belongs to the authorized user
         */

            $events = $this->event->with('user')->where('events.user_id', auth()->user()->id)->get();

            // dd($events);

        /**
         * get all games 
         */

            $games = $this->game->all();

        /**
         * store the data to the view
         */
        
        // return view
            return view('pages.profile-manage.manage-events', compact('user', 'events', 'games'));
    }

    /**
     * create event view 
     *
     * @return     <type>
     */
    public function createEventView(){

        /**
         * get the current user
         */

            $user = $this->user->getUser();

        /**
         * store the data to view
         */
        
            return view('pages.profile-manage.manage-create-event', compact('user'));
    }

    /**
     * store the event into database
     *
     * @param      CreateEventRequest  $request  (description)
     */
    public function storeEvent(CreateEventRequest $request){

        /**
         * store alle the data from the request
         */

            $data = $request->all();

        /**
         * set the user id to the authorized user id
         */

            $data['user_id'] = auth()->user()->id;

        /**
         * create the event with the filled data
         */

            $event = $this->event->create($data);

        /**
         * redirect to the manage events page
         */
        
            return redirect('/profile/' . auth()->user()->name . '/manage/events');
    }

    /**
     * the edit view
     * @return [type] [description]
     */
    public function editEventView($slug){

        $this->user->getUser();

        $this->event->where('slug', $slug)->get();

    }

    public function updateEvent(){

    }

    /**
     * manage the games 
     */
    public function manageGamesView(){

    }
}
