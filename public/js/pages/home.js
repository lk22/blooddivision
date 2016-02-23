

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
