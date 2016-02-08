// global app variable definition
var home;

home = {

	/**
	* initialize
	*/

		init: function(){

			/**
			* landingpage setup
			*/

				/**
				* banner components
				*/

					this.welcomWrapper = $('.blooddivision-welcome-wrapper');
					this.welcomeWrapperHideFade = $('.blooddivision-welcome-wrapper').hide().fadeIn(2000);
					this.bannerWrapper = $('.banner-wrapper');
					this.platformWrapper = $('.platform-wrapper');
					this.xboxPlatformContainer = $('.xbox-platform-container');
					this.windowsPlatformContainer = $('.windows-platform-container');

				/**
				* services components
				*/

					this.serviceWrapper = $('.blooddivision-about-wrapper');
					this.service = $('.service');

				/**
				* init calls
				*/

					this.checkAppPort("3000");
					this.returnAppUrl('localhost:3000', 'blooddivision.app');
					this.ajaxPrefilter();

		},

	/**
	* animate any element
	*
	* @param component => class/id html: type {html}
	* @param animation => {}: type {object}
	* @param duration => type {int}
	* @param callback => type {function}
	*/

		animateComponent: function(component, animation, duration, callback){

			$(component).animate(animation, duration);

			/**
			* check the component is hided
			*/
			if(!$(component).css({display: 'none'})){
				this.showWarning(component + "is not hided use display:none in your css");
			}else {
				this.logging(component, "is animated with succes");
			}
		},

	/**
	* set default ajax token on any ajax requests 
	*/

		ajaxPrefilter: function(){
			$.ajaxPrefilter(function(options){
				if( !options.beforeSend ){
					xhr.setRequestHeader('Accept', 'applicaton/json');
					var token = Blooddivision.token;
					if( token ){
						xhr.setRequestHeader('X-XSRF-TOKEN', token);
					}
				}
			});
		},

	/**
	* checking the running applications port
	*
	* @param port => @type {string}
	*/

		checkAppPort: function(port){
			return !(window.location.href.indexOf(port) > 0);
			this.logging(port);
		},

	/**
	* replace the port to the expecting url
	*
	* @param port => @type {string}
	* @param url => @type {string}
	*/

		returnAppUrl: function(port, url){
			return window.location.href.replace(port, url);
		},

	/**
	* get specific data with a get request (Ajax)
	*/

		getData: function(get, data, success){
			$.get({
				type:get,
				data:data,
				success:success
			});
		},

	/**
	* log a warning to the console
	*/

		showWarning: function(variable, warning){
			console.warn(variable, warning);
		},

	/**
	* log a logging message to the console
	*
	* @param log => @type {string}
	*/

		logging: function(log){
			console.log(log);
		}

};

home.init();

$(function(){

	$('a[href*=#]:not([href=#])').click(function(){
		if(location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname){
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if(target.length){
				$('html, body').delay(200).animate({
					scrollTop: target.offset().top
				}, 800);
				$('.scrollTopContainer').delay(200).animate({
					opacity: "1",
					right: "-1px"
				}, 1500);
			}
		}
		return false;
	});

});

$(function(){
	home.xboxPlatformContainer.fadeIn(2000);
	home.windowsPlatformContainer.fadeIn(2000);
});
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
			this.confirmPassword = $('.confirm-password');
			this.registerSerialize = this.serialize;


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
			// $('#AuthHelperModal').modal('show.bs.modal', callback);
		},

		_validateField: function(field, expression){
			if(!field){
				console.log("currently field for validation: " + field);
			}

			if(!expression){

			}
		},

		addError: function(error){
			this.errors.push(error);
		},

		hasErrors: function(){
			return (this.errors.length);
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

		if(!$(this).val() == valueOf('@')){

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
		if($(this).val().length == 0 || 
		!$(this).val() == valueOf('@') ||
		!$(this).val() == valueOf(availableEmailDomains[0]) ||
		!$(this).
		){
			Auth._renderErrorMsg(
				'body',
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

	 });

});
//# sourceMappingURL=all.js.map
