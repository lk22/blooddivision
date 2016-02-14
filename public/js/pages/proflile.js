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

		addGameCoverModal: function(){
			// open game cover modal for the user to setup the game cover 
		}


	}

	profile.init();

});