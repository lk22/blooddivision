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
				}, 1500);
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

		},

	/**
	 * [_renderHintMsg function]
	 * @param  {[type]} appendant [the appending element]
	 * @param  {[type]} message   [the error message]
	 * @param  {[type]} elmClass  [the defined css class]
	 * @return {[type]} HTML      [the rendered error]
	 */
		_renderHintMsg: function(appendant, message, elmClass){
			var tutorial = "<div class=" + elmClass + "><h4>" + message + " <span class='icon'><i class='closeTutorialBtn fa fa-times'></i></span></h4></div>";
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
		
		$('.closeTutorialBtn').click(function(){
			$('.login-email-tutorial').delay(200).fadeOut(1500);
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
			$('.warning-hint').delay(200).fadeOut(1500);
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
		
		$('.closeTutorialBtn').click(function(){
			$('.login-password-tutorial').delay(200).fadeOut(1500);
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
			$('.warning-hint').delay(200).fadeOut(1500);
		});
	});
});


//# sourceMappingURL=all.js.map
