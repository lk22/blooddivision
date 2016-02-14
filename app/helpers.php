<?php 

namespace Blooddivision;
use Carbon\Carbon;
use Bloddivision\User;
use Bloddivision\Event;
use Bloddivision\Tag;
use Bloddivision\Game;
use Bloddivision\Comment;

/**
* global helper class 
*/
class Helper
{
	/**
	 * user property
	 * @var [type]
	 */
	public $user;

	/**
	 * event property
	 * @var [type]
	 */
	public $event;

	/**
	 * tag property
	 * @var [type]
	 */
	public $tag;

	/**
	 * game property
	 * @var [type]
	 */
	public $game;

	/**
	 * comment property
	 * @var [type]
	 */
	public $comment;

	/**
	 * constructing eloquent models for usage on this class
	 * @param User    $user    [description]
	 * @param Event   $event   [description]
	 * @param Tag     $tag     [description]
	 * @param Game    $game    [description]
	 * @param Comment $comment [description]
	 */
	function __construct(){
		$this->user = new User;
		$this->event = new Event;
		$this->tag = new Tag;
		$this->game = new Game;
		$this->comment = new Comment;
	}

	/**
	 * static flashing message extending session global helper
	 * @param  [type] $message [description]
	 * @return [type]          [description]
	 */
	public static function flash($message){

		/**
		 * flashing message
		 */
		return session()->flash('flash_message', $message);
	}

	/**
	 * flashing message extending session global helper
	 * @param  [type] $message [description]
	 * @return [type]          [description]
	 */
	public function flash($message){

		/**
		 * flashing message
		 */	
		return session()->flash('flash_message', $message);
	}

	/**
	 * render all error messages 
	 * @param  [type] $startpoint [description]
	 * @param  [type] $endpoint   [description]
	 * @return [type]             [description]
	 */
	public function renderErrorsWithHtml($startpoint = null, $endpoint = null){

		/**
		 * looping all errors 
		 */
		foreach ($errors->all() as $error) {

			/**
			 * check if start html tag and end html tag is set
			 */
			if(isset($startpoint) && isset($endpoint)){
				return $startpoint . $error . $endpoint;
			}else{
				return $error;
			}
		}
	}

	public function loopContent($array, $val, array $content){
		foreach($array as $val)(){
			return $content;
		}
	}
}

 ?>