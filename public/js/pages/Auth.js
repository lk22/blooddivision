var Auth;

Auth = {

	init: function () {

		/**
		 * login form elements
		 */

			this.loginContainer = $('.auth-wrapper');
			this.authEmail = this.loginContainer.find('.email-input');
			this.authPass = this.loginContainer.find('.pass-input');
			this.authCheck = this.loginContainer.find('.check');
			this.authBtn = this.loginContainer.find('.auth-btn');
			this.loginHelper = this.loginContainer.find('.auth-login-helper');
			this.loginModalClose = $('#authHelperModal').find('.close');

		/**
		 * registration form elements
		 */
		
			this.registerContainer = $('.register-user-form');
			this.regName = this.registerContainer.find('.username-field');
			this.regEmail = this.registerContainer.find('.email-field');
			this.regPass = this.registerContainer.find('.password-field');
			this.confirmPass = this.registerContainer.find('.confirm-password');
			this.regHelp = this.registerContainer.find('.auth-registration-helper');
			this.closeRegHelp = this.regHelp.find('.close');
			this.registerBtn = this.registerContainer.find('.register-btn');

			this._bindEvents();
 
	},

	/**
	 * open the login helper modal
	 *
	 * @method     _openLoginHelperModal
	 */

		_openLoginHelperModal: function () {
			this.loginHelper.modal('show');
		},

	/**
	 * closing the login helper modal
	 *
	 * @method     _closeLoginHelperModal
	 */

		_closeLoginHelperModal: function () {
			this.loginHelper.modal('hide');
		},

	/**
	 * opening the register helper modal
	 *
	 * @method     _openRegisterHelperModal
	 */

		_openRegisterHelperModal: function () {
			this.regHelp.modal('show');
		},

	/**
	 * closing the register helper modal
	 *
	 * @method     _closeRegisterHelperModal
	 */

		_closeRegisterHelperModal: function () {
			this.regHelp.modal('hide');
		},

	/**
	 * binding events for authentication and authorization
	 *
	 * @method     bindEvents
	 * @return     {<type>}  { description_of_the_return_value }
	 */

	_bindEvents: function () {

		this.authEmail.bind('click', function(){
			$(this).focus();
		});

		this.authEmail.bind('mouseenter', function(){
			$(this).focus();
		});

		this.authEmail.bind('mouseleave', function(){
			$(this).blur(function(){
				var data = $(this).val();

				if(data){
					alertify.log("your email cant be empty");
				}

				if(!data.indexOf('@')){
					alertify.log("your email is not valid and needs @ ");
				}

				if(!data.indexOf('hotmail.com') || !data.indexOf('gmail.com') || !data.indexOf('live.dk')){
					alertify.log("your email provider is not a valid provider define your provider : provider.dk/com");
				}

				console.log(data);

			});
		});

		this.authPass.bind('mouseenter', function(){
			$(this).focus();
		});

		this.authPass.bind('mouseleave', function(){
			$(this).blur(function(){
				var password = $(this).val();

				if(password){
					console.log(password);
				}					

				if(!password.indexOf('^/[0-9a-z]^/')){

				}
			});
		});

		this.loginHelper.bind('click', function(){
			this._openLoginHelperModal();
		});

		this.loginModalClose.bind('click', function(){
			this._closeLoginHelperModal();
		});

		this.regHelp.bind('click', function(){
			this._openRegisterHelperModal();
		});

		this.closeRegHelp.bind('click', function(){
			this._closeRegisterHelperModal();
		});
		
	}

	
};

/**
* initialize object
*/

Auth.init();