var Contact; 


Contact = {

	/**
	 * init method
	 */
	
		init: function () {

			/**
			 * contact form elements
			 */
			
			 	this.wrapper = $('.contact-wrapper');
			 	this.name = this.wrapper.find('.name');
			 	this.email = this.wrapper.find('.email');
			 	this.message = this.wrapper.find('.message');
			 	this.submit = this.wrapper.find('.submit');

		 	/**
		 	 * binding events
		 	 */
		 	
		 		this._bindEvents();

		},

		_bindEvents: function() {

			/**
			 * bind event handlers for name input
			 */
			
				/**
				 * mousenter event
				 */
			 	this.name.bind('mouseenter', function () {
			 		/**
			 		 * set focus state 
			 		 */
			 		this.name.focus();
			 	});

			 	/**
			 	 * mouseleave event
			 	 */
			 	this.name.bind('mouseleave', function () {
			 		/**
			 		 * set blur state 
			 		 */
			 		this.name.blur();

			 		var n_val = this.name.val();

			 		if(!n_val)
			 			this.putError(this.name, "Your name cannot be empty please fill out your name");
			 	});

			 /**
			  * bind event handlers on email field
			  */

			 	this.email.bind('mouseenter', function() {
			 		this.email.focus();
			 		this.showHint(this.email, "enter a valid email we can answer you on");
			 	});

			 	this.email.bind('mouseleave', function () {
			 		this.email.blur();

			 		var e_val = this.email.val();

			 		if(!e_val)
			 			this.putError(this.email, "email field cannot be empty please enter a valid email address");


			 		if(!e_val.indexOf('@'))
			 			this.putError(this.email, "your email must contain a @ to make it valid");

			 		if(e_val.indexOf('@') && !e_val.indexOf('.com'))
			 			this.putError(this.email, "you must fill the email domain initials to make the email a valid email");
			 	});

		},

		putError: function (html, error) {
			html.html('<div class="alert alert-danger error">' + error +'</div>');
		}, 

		showHint: function (html, hint) {
			html.html('<div class="alert alert-info hint">' + hint + '</div>')
		}


}