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
			this.slug = Blooddivision.Auth.slug;
			
		}
	}

});