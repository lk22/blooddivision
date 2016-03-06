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
			this.authBtn = $('.auth-btn');
			this.loginHelpBtn = $('.helpBtn');
			this.serialize = this.login.serializeArray();

			this.register = $('.register-user-form');
			this.username = $('.username-field');
			this.regEmail = $('.email-field');
			this.regPass  = $('.password-field');
			this.confirmPassword = $('.confirm-password');
			this.registerSerialize = this.register.serialize();
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

	Auth.email.bind('mouseenter', function(){

		$(this).focus();

	}).bind('click', function(){

		alertify.log("Enter your valid email address");

	});

});

$(function(){

	Auth.password.bind('mouseenter', function(){

		$(this).focus();

	}).bind('click', function(){
		alertify.log("Enter your registered password");
	});

});

$(function(){

	// Auth.authBtn.click(function(event){

	// 	event.preventDefault();

	// 	if(!Auth.email.val()){
	// 		alertify.alert(Auth.email.val() + ': is not a valid email address please enter a valid email..');
	// 	}else {

	// 		if(!Auth.password.val()){
	// 			alertify.alert(Auth.password.val() + ': is not correct or the field is empty')
	// 		}else{
	// 			$(this).unbind(event);
	// 		}
	// 	}
	// });

});