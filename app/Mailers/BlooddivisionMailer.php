<?php 

namespace Blooddivision\Mailers;

use Illuminate\Contracts\Mail\Mailer;
use Blooddivision\User;


/**
* main application mailer class
*/
class BlooddivsionMailer
{
	/**
	 * mailer property
	 * @var [type]
	 */
	protected $mailer

	/**
	 * from property
	 */
	protected $from;

	/**
	 * to property
	 * @var [type]
	 */
	protected $to;

	/**
	 * view property
	 * @var [type]
	 */
	protected $view;

	/**
	 * data property
	 * @var [type]
	 */
	protected $data;

	/**
	 * Constructor 
	 */
	public function __construct(Mailer $mailer)
	{
		/**
		 * set data property to array
		 * @var array
		 */
		$this->data = [];

		/**
		 * use Illuminate\Contracts\Mail\Mailer class by default for this class
		 * @var [type]
		 */
		$this->mailer = $mailer;
	}

	public function sendConfirmationEmailTo(User $user){
		$this->to = $user->eamil;
		$this->view 'emails.confirm';
		$this->data = compact('user');

		$this->deliver();
	}

	public function deliver(){
		$this->mailer->send($this->view, $this->data, function($message){
			$message->from($this->from, 'Administrator')->to($this->to);
		});
	}
}



 ?>