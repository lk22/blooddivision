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
			this.authBtn = $('.Auth-btn');
			this.loginHelpBtn = $('.helpBtn');
			this.serialize = this.login.serializeArray();

			this.register = $('.register-user-form');
			this.username = $('.username-field');
			this.regEmail = $('.email-field');
			this.regPass  = $('.password-field');
			this.confirmPassword = $('.confirm-password');
			this.registerSerialize = this.register.serialize();


			this.errors = [];
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

			$(elmClass).bind('click', function(){
				$(this).delay(200).fadeOut(800);
			});
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
				$('#AuthHelperModal').modal('show.bs.modal', callback);
			});
		},

		_validateField: function(field, expression){
			if(!field){
				console.log("currently field for validation: " + field);
			}

			if(!expression){
				console.log("there is no expression for validation on: " + field);
			}
		},

		addError: function(error){
			this.errors.push(error);
		},

		hasErrors: function(){
			return (this.errors.length);
		},

		/**
		 * sweet alerts 
		 * @type {Object}
		 */
		sweetAlert: {
			/**
			 * [error description]
			 * @param  {[string]} title [description]
			 * @param  {[string} text  [description]
			 * @param  {[string]} btn   [description]
			 * @return {[type]} 	  [description]
			 */
			error: function(title, text, btn){
				swal({
					title: title,
					text: text,
					type: 'error',
					confirmButtonText: btn
				});
			},

			/**
			 * [succes description]
			 * @param  {[string]} title [description]
			 * @param  {[string]} text  [description]
			 * @param  {[boolean]} bool   [description]
			 * @return {[object]}       [description]
			 */
			succes: function(title, text, bool){
				swal({
					title: title,
					text: text,
					type: 'succes',
					showConfirmationButton: bool,
					timer: 5000
				});
			},

			/**
			 * [warning description]
			 * @param  {[string]} title [description]
			 * @param  {[string]} text  [description]
			 * @param  {[string/bool]} btn   [description]
			 * @return {[object]}       [description]
			 */
			warning: function(title, text, btn){
				swal({
					title: title,
					text: text,
					type: 'info',
					confirmButtonText: btn
				});
			},


		},

		/**
		 * [ajaxLogin description]
		 * @param  {[string]} url     [description]
		 * @param  {[string]} type    [description]
		 * @param  {[object]} data    [description]
		 * @param  {[callback]} success [description]
		 * @return {[jqXHR]}         [description]
		 */
		ajaxLogin: function(url, type){
			// example for a ajax post request 
			// $.ajax({
			// 	url: '/login',
			// 	type: 'post',
			// 	data: {
			// 		email: this.emai.val(),
			// 		password: this.password.val()
			// 	},
			// 	success: function (data) {

			// 	}
			// });
			
			$.ajax({
				url: '/login',
				type: 'post',
				data: $('.Auth-wrapper').serializeArray(),
				success: function (data) {
					this.sweetAlert.success(
						'Validation complete!',
						'You are fully authorized you will be redirected.',
						false
					);
				}
			});
		}

};

/**
* initialize object
*/

Auth.init();


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
			'body',
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
				'body',
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

	var availableEmailDomains = [
		'hotmail',
		'live',
		'gmail',
		'yahoo',
		'jubii',
	];

	/**
	 * bind events for the email field
	 */
	
	// if client clicks the email field
	Auth.regEmail.bind('click', function(){

		/**
		 * render email hint message
		 */
		Auth._renderHintMsg(
			'body',
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
		// if($(this).val().length == 0 || 
		// !$(this).val() == valueOf('@') ||
		// !$(this).val() == valueOf(availableEmailDomains[0])){
		// 	Auth._renderErrorMsg(
		// 		'body',
		// 		'your email is wrong entered or not valid',
		// 		'warning-hint'
		// 	);
		// }
		// 
		for (var i = availableEmailDomains; i >= random(1,4); i++) {
			console.log(2);
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
			'body',
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

		if($(this).val() == ''){

			Auth._renderErrorMsg(
				'body', 
				'the password field is empty, or not consisting a mix of letters and numbers please fill the field', 
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

/**
 * validate password confirmation field
 */
$(function(){

	/**
	 * if client clicks the field
	 */
	
	 Auth.confirmPassword.bind('click, ', function(){

	 	/**
	 	 * show hint 
	 	 */
	 	Auth._renderHintMsg(Auth.register, 'Confirm your entered password from the above password field', 'register-hint');

	 	/**
	 	 * if client mouseenters the field
	 	 */
	 }).bind('mouseenter', function(){

	 	/**
	 	 * set focus state
	 	 */
	 	$(this).focus();

	 	/**
	 	 * if the client leaves the field
	 	 * @param  {[event, callback]}
	 	 */
	 }).bind('mouseleave', function(){

	 	/**
	 	 * [remove focus state from field and validate the field]
	 	 * @param  {[callback]}
	 	 * @return {[event]} 
	 	 */
	 	$(this).blur(function(){

	 		/**
	 		 * if the password is not equal to the entered password field above
	 		 */
	 		// if($(this).val() = '' || !$(this).val() == $(".password-field")){

	 		// }

	 	});
	 });
});

/**
 * clicking the login auth button send ajax request to the server and authorize the user
 * @return {[void]}
 */
// $(function(){

// 	/**
// 	 * binding click event for the auth button
// 	 * @param  {[type]} e){	} [description]
// 	 * @return {[type]}         [description]
// 	 */
// 	$('.auth-btn').click(function(e){

// 		*
// 		 * preventing the default action to happen
		 
// 		e.preventDefault();

// 		/**
// 		 * sending ajax request to the server for authorization
// 		 */
// 		Auth.ajaxLogin('/login', 'post');

// 	});

// });