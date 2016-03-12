var Contact;

Conctact = {

	init: function (){

		this.wrapper = $('.contact-wrapper');
		this.name = this.wrapper.find('.name');
		this.email = this.wrapper.find('.email');
		this.message = this.wrapper.find('#message');
		this.submitBtn = this.wrapper.find('.submit');
		this.errors = [];

		this.bindEvents();

	},

	addError: function(error) {
		this.errors.push(error);
	},

	hasErrors: function () {
		return (this.errors.length);
	}.

	// resetErrors: function() {
	// 	this.errors = [];

	// 	// other logic here
	// },

	// resetForm: function () {

	// },

	bindEvents: function () {
		var that = $(this);
		
		this.name.bind('click', function(){
			that.focus();
		});

		this.name.bind('mouseenter', function(){
			that.focus();
		});

		this.name.bind('mouseleave', function(){
			that.blur(function(){
				var data = that.val();

				if(data = ''){
					console.log('name field is empty');

					alertify.log('your name cant be empty');
				}
			});
		});

		this.email.bind('mouseenter', function(){
			that.focus();
		});

		this.email.bind('keyup', function(){
			var data = that.val();

			if(!data.indexOf('@')){
				alertify.log('Your email is not valid and cant be contacted to ');
			}

			if(data.indexOf('@') && !data.indexOf('hotmail.com') || !data.indexOf('gmail.com') || !data.indexOf('live.dk')){
				alertify.log('specify your email provider after @ => example@hotmail.com or so');
			}
		});

		this.email.bind('mouseleave', function(){

		});


		console.log(Blooddivision.user);

	},

	handleErrors: function () {

		if(this.hasErrors()){
			this.wrapper.append([
				'<div class="alert alert-dismissible alert-danger errors">',
					'<button type="button" class="close" data-dismiss="alert">×</button>',
					'<ul></ul>',
				'</div>'
			].join('\n'));
		}

		$.each(this.errors, function() {
			this.wrapper.find('.errors ul').append('<li>' + this + '</li>');
		});
	}

};
// initialize object
Contact.init();