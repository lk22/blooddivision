var authorization;

authorization = {

	/**
	* initialize object
	*/

		init: function(){

			this.login = $('.auth-wrapper');
			this.email = $('.email-input');
			this.password = $('.pass-input'); 
			this.authBtn = $('.auth-btn');
			this.loginHelpBtn = $('.helpBtn');
			this.serialize = $(this).serialize();

		},

	/**
	* append error message
	*/

		showError: function(appendant, error){
			$(appendant).html('<div class="alert alert-danger">' + error +' </div>');
		},

	/**
	* render a tutorial component
	*/

		_renderTutorial: function(appendant, message, elmClass){
			var tutorial = "<div class=" + elmClass + ">" + message + "</div>";
			$(appendant).append(tutorial);
		},

	/**
	* load help modal
	*/

		_openLoginHelpModal: function(callback){
			this.loginHelpBtn.click(function(e){
				e.preventDefault();
				$('#authHelperModal').modal('show.bs.modal', callback);
			});
			// $('#authHelperModal').modal('show.bs.modal', callback);
		}

};

/**
* initialize object
*/

authorization.init();

$(function(){
	var $this = $(this);
	/**
	* if the client is hovering the email field
	*/
	authorization.email.bind('click', function(){
		/**
		* render email tutorial
		*/
		authorization._renderTutorial(
			authorization.login, // the login wrapper
			'Your first step is to fill your valid email address it must contain @ to make it valid', // appending message
			'login-email-tutorial' // the element class
		);
	}).bind('mouseenter', function(){
		$this.focus();
	}).bind('mouseleave', function(){
		if(authorization.email.val() == ''){
			authorization.showError(
				authorization.email,
				"your email is empty please fill the email field to proceed"
			);
		}
	});
});