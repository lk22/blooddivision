var authorization;

authorization = {

	/**
	 * [initialize object]
	 * @return {[object]} [the authorization object]
	 */
		init: function(){

			this.login = $('.auth-wrapper');
			this.email = $('.email-input');
			this.password = $('.pass-input'); 
			this.authBtn = $('.auth-btn');
			this.loginHelpBtn = $('.helpBtn');
			this.serialize = $(this).serialize();

			this.register = $('.register-user-form');
			this.username = $('.username-field');
			this.regEmail = $('.email-field');
			this.regPass  = $('.password-field');
			this.rememberPassword = $('.remember-password');
			this.registerSerialize = this.serialize;

		},

	/**
	 * [_renderHintMsg function]
	 * @param  {[type]} appendant [the appending element]
	 * @param  {[type]} message   [the error message]
	 * @param  {[type]} elmClass  [the defined css class]
	 * @return {[type]} HTML      [the rendered error]
	 */
		_renderHintMsg: function(appendant, message, elmClass){
			var tutorial = "<div class=" + elmClass + "><h4>" + message + " <span class='icon'><i class='closeHintBtn fa fa-times'></i></span></h4></div>";
			$(appendant).append(tutorial);
		},

	/**
	 * [_renderErrorMsg description]
	 * @param  {[type]} appendant [the appending element]
	 * @param  {[type]} message   [the error message]
	 * @param  {[type]} elmClass  [the defined css class]
	 * @return {[type]} HTML      [the rendered error]
	 */
		_renderErrorMsg: function(appendant, message, elmClass){
			var error = "<div class=" + elmClass + "><h4>" + message + " <span class='icon'><i class='closeErrorBtn fa fa-times'></i></span></h4></div>";
			$(appendant).append(error);		
		},

	/**
	 * [_openLoginHelpModal open an helping modal]
	 * @param  {Function} callback [the callback shall be used when the modal is shown]
	 * @return {[type]}   modal    [the modal]
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
	* if the client is clicking the email field
	*/
	authorization.email.bind('click', function(){
		/**
		* render email tutorial
		*/
		authorization._renderHintMsg(
			authorization.login, // the login wrapper
			'Your first step is to fill your valid email address it must contain @ to make it valid', // appending message
			'login-email-tutorial' // the element class
		);

		/**
		 * close the tutorial
		 */
		
		$('.closeHintBtn').click(function(){
			$('.login-email-tutorial').delay(200).fadeOut(1000).empty();
		});

		/**
		 * if the client enters the email field
		 */

	}).bind('mouseenter', function(){
		/**
		 * set the field on a focus state
		 */
		$(this).focus();

		/**
		 * if the client leaves the field
		 */
		
	}).bind('mouseleave', function(){
		$(this).blur();
		/**
		 * validate the field for empty string
		 */

		if($(this).val() == ''){
			authorization._renderErrorMsg(
				authorization.login,
				"your email is empty please fill the email field to proceed",
				'warning-hint'
			);
		}
		$('.closeErrorBtn').click(function() {
			$('.warning-hint').delay(200).fadeOut(1000).empty();
		});
	});
});

$(function(){
	/**
	 * if the client hovers the password field
	 */
	
	authorization.password.bind('click', function(){
		/**
		 * append the hint
		 */
		authorization._renderHintMsg(
			authorization.login,
			"Enter the password you have registered you with",
			"login-password-tutorial"
		);

		/**
		 * close the tutorial
		 */
		
		$('.closeHintBtn').click(function(){
			$('.login-password-tutorial').delay(200).fadeOut(1000).empty();
		});

	}).bind('mouseenter', function(){
		$(this).focus();
	}).bind('mouseleave', function(){
		$(this).blur();

		if($(this).val() == ''){
			authorization._renderErrorMsg(
				authorization.login,
				"your password is empty please fill the email field to proceed",
				'warning-hint'
			);
		}

		$('.closeErrorBtn').click(function(){
			$('.warning-hint').delay(200).fadeOut(1000).empty();
		});
	});
});

/**
 * validate the name register field
 */
$(function() {
	/**
	 * bind click event on the name register field
	 */

	authorization.username.bind('click', function(){
		/**
		 * render hint for name registration
		 * @type {[function]}
		 * @param {object} [appendant] [the apending element]
		 * @param {message} [message] [the hint message]
		 * @param {elm class} [elmClass] [the css class]
		 */
		authorization._renderHintMsg(
			authorization.register,
			'Enter a name that fits you :) ',
			'register-name-hint'
		);

		$('.closeHintBtn').bind('click', function(){
			$('.register-name-hint').delay(200).fadeOut(1000).empty();
		});

	}).bind('mouseenter', function(){
		/**
		 * set the field on focus state
		 */
		$(this).focus();
	}).bind('mouseleave', function(){
		/**
		 * set the field on blur state => remove the focus state on the field 
		 */
		$(this).blur();

		if($(this).val() = ''){
			authorization._renderErrorMsg(
				authorization.register,
				'The username field is empty, please empty the field to proceed to the next step',
				'register-name-error'
			);
		}
		
	});
});

/**
 * validate the email field
 */

$(function(){
	/**
	 * bind events for the email field
	 */
	
	// if client clicks the email field
	authorization.regEmail.bind('click', function(){

		/**
		 * render email hint message
		 */
		authorization._renderHintMsg(
			authorization.register,
			'Enter an email that is valid and are registered',
			'register-email-hint'
		);

		$('.closeHintBtn').on('click', function(){
			$('.register-email-hint').delay(200).fadeOut(1000).empty();
		});

		/**
		 * if the client enters the field
		 */

	}).bind('mouseenter', function(){
		/**
		 * Set the field on a focus state
		 */
		
		$(this).focus();

		/**
		 * if the client is leaving the field
		 */

	}).bind('mouseleave', function(){

		/**
		 * check if the field is empty 
		 */
		if($(this).val().length == 0 || 
		   !$(this).val() == RegExp('/^["@""]/')
		){
			authorization._renderErrorMsg(
				authorization.register,
				'your email is wrong entered or not valid',
				'error-email-hint'
			);
		}

		/**
		 * closing the hint message
		 */
		$('.closeErrorHint').on('click', function(){
			$('.error-email-hint').delay(200).fadeOut(1000).empty();
		});
	});
});

