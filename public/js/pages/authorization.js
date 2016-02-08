var Auth;

Auth = {

	/**
	 * [initialize object]
	 * @return {[object]} [the Auth object]
	 */
		init: function(){

			this.login = $('.Auth-wrapper');
			this.email = $('.email-input');
			this.password = $('.pass-input'); 
			this.AuthBtn = $('.Auth-btn');
			this.loginHelpBtn = $('.helpBtn');
			this.serialize = $(this).serialize();

			this.register = $('.register-user-form');
			this.username = $('.username-field');
			this.regEmail = $('.email-field');
			this.regPass  = $('.password-field');
			this.rememberPassword = $('.remember-password');
			this.registerSerialize = this.serialize;

		},

		closeRegisterHint: $('.register-hint'),

		closeWarningHint: $('.warning-hint'),

	/**
	 * [_renderHintMsg function]
	 * @param  {[type]} appendant [the appending element]
	 * @param  {[type]} message   [the error message]
	 * @param  {[type]} elmClass  [the defined css class]
	 * @return {[type]} HTML      [the rendered error]
	 */
		_renderHintMsg: function(appendant, message, elmClass){
			var tutorial = "<div class=" + elmClass + "><h4>" + message + "</h4></div>";
			$(appendant).append(tutorial);
			$(elmClass).delay(200).fadeOut(1000);
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
			$(elmClass).delay(200).fadeOut(1000);
		},

	/**
	 * [_openLoginHelpModal open an helping modal]
	 * @param  {Function} callback [the callback shall be used when the modal is shown]
	 * @return {[type]}   modal    [the modal]
	 */
		_openLoginHelpModal: function(callback){
			this.loginHelpBtn.click(function(e){
				e.preventDefault();
				$('#AuthHelperModal').modal('show.bs.modal', callback);
			});
			// $('#AuthHelperModal').modal('show.bs.modal', callback);
		}

};

/**
* initialize object
*/

Auth.init();

var $this = $(this);

$(function(){

	/**
	* if the client is clicking the email field
	*/
	Auth.email.bind('click', function(){
		/**
		* render email tutorial
		*/
		Auth._renderHintMsg(
			Auth.login, // the login wrapper
			'Your first step is to fill your valid email address it must contain @ to make it valid', // appending message
			'login-email-tutorial' // the element class
		);

		/**
		 * close the tutorial
		 */
		
		// $('.closeHintBtn').click(function(){
		// 	$('.login-email-tutorial').delay(200).fadeOut(1000).empty();
		// });

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
			Auth._renderErrorMsg(
				Auth.login,
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
	
	Auth.password.bind('click', function(){
		/**
		 * append the hint
		 */
		Auth._renderHintMsg(
			Auth.login,
			"Enter the password you have registered you with",
			"login-password-tutorial"
		);

		/**
		 * close the tutorial
		 */
		
		// $('.closeHintBtn').click(function(){
		// 	$('.login-password-tutorial').delay(200).fadeOut(1000).empty();
		// });

	}).bind('mouseenter', function(){
		$(this).focus();
	}).bind('mouseleave', function(){
		$(this).blur();

		if($(this).val() == ''){
			Auth._renderErrorMsg(
				Auth.login,
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

	Auth.username.bind('click', function(){
		/**
		 * render hint for name registration
		 * @type {[function]}
		 * @param {object} [appendant] [the apending element]
		 * @param {message} [message] [the hint message]
		 * @param {elm class} [elmClass] [the css class]
		 */
		Auth._renderHintMsg(
			Auth.register,
			'Enter a name that fits you recruit ',
			'register-hint'
		);

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

		if($(this).val().length < 1){
			Auth._renderErrorMsg(
				Auth.register,
				'The username field is empty, please empty the field to proceed to the next step',
				'warning-hint'
			);
		}

		$('.closeErrorBtn').on('click', function(){
			$('.warning-hint').delay(200).fadeOut(1000);
		});
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
	Auth.regEmail.bind('click', function(){

		/**
		 * render email hint message
		 */
		Auth._renderHintMsg(
			Auth.register,
			'Enter an email that is valid and are registered',
			'register-hint'
		);

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
			Auth._renderErrorMsg(
				Auth.register,
				'your email is wrong entered or not valid',
				'warning-hint'
			);
		}

		/**
		 * closing the hint message
		 */
		$('.closeErrorBtn').on('click', function(){
			$('.warning-hint').delay(200).fadeOut(1000);
		});

		$(this).blur();
	});
});

/**
 * validate the password field
 */
$(function(){

	/**
	 * bind events on the field
	 */
	Auth.regPass.bind('click', function(){

		/**
		 * render hint for the password field
		 */
		
		Auth._renderHintMsg(
			Auth.register,
		 	'Type in a password that fits you, and make it protective as possible',
		 	'register-hint'
		 );


	}).bind('mouseenter',function(){
		$(this).focus();
	}).bind('mouseleave', function(){
		$(this).blur();

		/**
		 * check if the field is empty
		 */

		if($(this).val().length = 0){

			Auth._renderErrorMsg(
				Auth.register, 
				'the password field is empty, or not consisting a mix of letters and numbers please fill the field' , 
				'warning-hint'
			);

		}

		/**
		 * closing the warning
		 */
		
		$('.closeErrorBtn').on('click', function(){
			$('.warning-hint').delay(200).fadeOut(1000);
		});

	});
});

