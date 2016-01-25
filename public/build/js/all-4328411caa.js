// global app variable definition
var blooddivision;

blooddivision = {

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
					this.bannerWrapper = $('.banner-wrapper');
					this.platformWrapper = $('.platform-wrapper');
					this.xboxPlatformContainer = $('.xbox-platform-container');
					this.windowsPlatformContainer = $('.windows-platform-container');

				/**
				* services components
				*/

					this.serviceWrapper = $('.blooddivision-about-wrapper');
					this.service = $('.service');



				this.checkAppPort("3000");
				this.returnAppUrl('localhost:3000', 'blooddivision.app');

		},

		animateComponent: function(component, animation, duration, callback){

			return $(component).animate(animation, duration);

			/**
			* check the component is hided
			*/
			if(!$(component).css({display: 'none'})){
				this.warning(component + "is not hided use display:none in your css");
			}else {
				this.logging(component, "is animated with succes");
			}
		},

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

		checkAppPort: function(port){
			return !(window.location.href.indexOf(port) > 0);
		},

		returnAppUrl: function(port, url){
			return window.location.href.replace(port, url);
		},

		getData: function(get, data, success){
			$.get({
				type:get,
				data:date,
				success:success
			});
		},

		warning: function(variable, warning){
			console.warn(variable, warning);
		},

		logging: function(log){
			console.log(log);
		}

};

$(function(){

	$('a[href*=#]:not([href=#])').click(function(){
		if(location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname){
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if(target.length){
				$('html, body').delay(200).animate({
					scrollTop: target.offset().top
				}, 1500);
			}
		}
		return false;
	});

});
//# sourceMappingURL=all.js.map
