var Profile;

var Profile = {

	init: function () {

		/**
		 * elements
		 */
		
			this.wrapper = $('#profile');
			this.avatar = this.wrapper.find('.profile-image');
			this.cover = this.wrapper.find('.profile-banner-wrapper');
			this.aboutForm = this.wrapper.find('.edit_description_form');
			this.aboutArea = this.wrapper.find('.description');
			this.aboutFormBtn = this.aboutForm.find('.edit-about');

		/**
		 * binding events
		 */
		
			this.bindEvents();
	},

	bindEvents: function () {
		var that = this;

		this.aboutArea.bind('change, keyup', function(){
			console.log($(this).val());
		});

		this.aboutForm.submit(function(event) {
			event.preventDefault();
			
			$.ajax({
				url: '/home',
				type: 'post',
				dataType: 'json',
				data: $(this).serializeArray()
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		});

		this.avatar.bind('click', function(){
			this.openModal('#avatarModal');
		});

	},

	openModal: function (modal) {
		this.modal = this.wrapper.find(modal);

		$(this.modal).modal();
	},

	bindModalOption: function (option) {
		return option;
	},

	renderHtml: function (html) {
		var element = html;
		return element;
	}

}

if($('#profile').length > 0){
	Profile.init();
}