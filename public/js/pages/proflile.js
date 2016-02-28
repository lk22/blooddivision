var profile;

$(function(){

	/**
	 * profile object
	 * @type {Object}
	 */
	profile = {

		/**
		 * initialize object and its properties and methods
		 * @return {[type]} [description]
		 */
		init: function(){

			this.userId = Blooddivision.User.id;
			this.userName = Blooddivision.User.name;
			
		},

		showField: function(field, method){
			var $method = method;
			var $default;

			switch(method){
				case !method:
					console.error("method not defined");
				break;

				case method = slideDown():  
					$default = 400;
					return $(field).slideDown($default);
				break;

				case method = slideUp():
					$default = 400;
					return $(field).slideUp($default);
				break;

				case method = fadeOut():
					$default = 800;
					$(field).fadeOut($deafult);
				break
			}

			$(field).method;
		}

	}

	profile.init();

});
 

$(function(){

	var $element = $('.edit_description_btn');
	

	$element.bind('click', function(){
		profile.showField(
			'.none', 
			slideDown()
		);
	});

});