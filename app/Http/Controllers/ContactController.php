<?php

namespace Blooddivision\Http\Controllers;

use Illuminate\Http\Request;
use Blooddivision\Contact;
use Blooddivision\Http\Requests;
use Blooddivision\Http\Requests\CreateContactRequest;
use Blooddivision\Http\Controllers\Controller;
class ContactController extends Controller
{

    public function __construct(Contact $contact){
        $this->contact = $contact;
    }

	/**
	 * get contact page
	 * @return [type] [description]
	 */
    public function index(){
    	return view('pages.contact');
    }

    /**
     * store new message
     * @param  CreateContactRequest $request
     * @return [type]                        [description]
     */
    public function create(CreateContactRequest $request){
    	$this->contact->create([
    		'name' => $request->get('name'),
    		'email' => $request->get('email'),
    		'message' => $request->get('message')
    	]);

    	\Session::flash('message_success', 'Your Message is sent, we will return to you for the next 24 hours, be patient.');

    	return redirect('/contact-us');

    }
}