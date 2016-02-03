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
			var tutorial = "<div class=" + elmClass + "><h4>" + message + " <span class='icon'><i class='closeTutorialBtn fa fa-times'></i></span></h4></div>";
			$(appendant).append(tutorial);
		},

	/**
	 * remove tutorial 
	 */
	
		_removeTutorial: function(elmClass, duration){
			$(elmClass).fadeOut(duration);
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

		/**
		 * close the tutorial
		 */
		
		$('.closeTutorialBtn').click(function(){
			$('.login-email-tutorial').delay(200).fadeOut(1500);
		});

	}).bind('mouseenter', function(){
		$(this).focus();
	}).bind('mouseleave', function(){
		if(authorization.email.val() = ''){
			authorization.showError(
				authorization.email,
				"your email is empty please fill the email field to proceed"
			);
		}
	});
});
//# sourceMappingURL=all.js.map
