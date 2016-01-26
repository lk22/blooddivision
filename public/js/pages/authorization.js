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

		showError: function(error){
			if(!$('.auth-error')){
				document.write('<div class="alert alert-danger"></div>');
			}else {
				$('.auth-error').html(error);
			}
		},

	/**
	* render a tutorial component
	*/

		_renderTutorial: function(appendant, message, elmClass){
			var tutorial = "<div class=" + elmClass + ">" + message + "</div>";
			$(appendant).append(tutorial);
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