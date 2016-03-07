/**
 * ajax globals
 */

/**
 * Append token to all requests
 */
function setAffix(element, offset){
	var $element = $(element);

	$element.affix({
		offset:offset
	});
}

/**
 * Setting REQUEST Token function
 * @param {[type]} token [description]
 */
function setToken(token){
	$.ajaxSetup({
		headers: token
	});
}

function do_slide_and_change_on(field, changeable, change){
	var $default = 400;
	var $this = $(field).slideToggle($default);
	var $change = change;

	if($this){
		change_html_on(getChangeable(changeable), $change);
	}

	return $this;
}

function getChangeable(field){
	var $field = $('.' + field);

	return $field;
}

function change_html_on(element, change){
	var $this = element;

	$this.html(change);
}

function setValue(value){
	return value;
}


function prev_avatar(input){
	if(input.files && input.files[0])
	{
		var reader = new FileReader();
		reader.onload = function(file){

			$('.container-fluid.show-avatar').slideDown(400);
			$('#target').fadeIn(800).attr('src', file.target.result);

		}

		reader.readAsDataURL(input.files[0]);
	}
}

function prev_cover(input){
	if(input.files && input.files[0])
	{
		var reader = new FileReader();
		reader.onload = function(file){

			$('.container-fluid.show-cover').slideDown(800);
			$('#target').fadeIn(800).attr('src', file.target.result);

		}

		reader.readAsDataURL(input.files[0]);
	}
}

/**
 * setting CSRF TOKEN to work with every ajax request to pass the CSRF Middleware
 * @param  {String} ){	setToken({		'X-CSRF-Token': $('meta[name  [description]
 * @return {[type]}                                  [description]
 */
$(function(){
	setToken({
		'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
	});
});

/**
 * affixing the header 
 */
// $(function(){

// 	setAffix('#app-nav', {
// 		top: 0
// 	});

// });

$(function(){

	var $element = $('#app-nav');
	var $document = $(document);

	$document.scroll(function(){
		if($document.scrollTop() >= 100){
			$element.stop().css({
				top: '-60px'
			});
		} else {
        	$element.stop().css({
            	top: '0px'
        	});
    	}
	});

});

$(function(){

	var $element = $('#profile-banner-footer-affix');
	var $document = $(document);

	// $element.affix({
	// 	offset:{
	// 		top: 250
	// 	}
	// });
});


// $(function(){

// 	var $button = $('.add-game');

// 	$button.click(function(e){
// 		e.preventDefault();
// 		$.ajax({
// 			url: '/profile/{slug}/your-games',
// 			type: 'post',
// 			dataType: 'json',
// 			data: $('add-game-form').serialize()
// 		})
// 		.done(function() {
// 			console.log("success");
// 		})
// 		.fail(function() {
// 			console.log("error");
// 		})
// 		.always(function() {
// 			console.log("complete");
// 		});
// 	})

// });

// $(function(){

// 	$('a[href*=#], :not([href=#])').click(function(){
// 		if(location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname){
// 			var target = $(this.hash);
// 			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
// 			if(target.length){
// 				$('html, body').delay(200).animate({
// 					scrollTop: target.offset().top
// 				}, 800);
// 			}
// 		}
// 		return false;
// 	});

// });

$(function(){

	var $element = $('.edit_description_btn');
	
	$element.bind('click', function(){

		// do_slide_and_change_on(
		// 	'.none',
		// 	'edit_description_btn',
		// 	'Cancel'
		// );
		// 
		$('.about-description-row, .buttons').slideUp(400);
		$('.user-description').slideDown(400);

	});

	$('.close_edit_description_btn').on('click', function(){

		if(!$('.description').val()){
			$('.user-description').slideUp(400);
			$('.about-description-row, .buttons').slideDown(400);
		}

	});

});

$(function(){

	var settings = {

		openNav: $('.settings-btn'),

		closeNav: $('.close-settings-btn'),

		openSettingsSidebar: function(sidebar, time, delay) {
			$('.' + sidebar).delay(delay).animate({
				"width": "350px"
			},time);
		}, 

		asideBody: function(body, direction, value, duration) {
			$('#' + body).animate({
				direction:value 
			}, duration);
		},

		closeSettingsSidebar: function(sidebar, time, delay) {
			$('.' + sidebar).delay(delay).animate({
				"width": "0px"
			},time);
		}

	};  

	settings.openNav.bind('click', function(){
		settings.openSettingsSidebar('settings-sidebar', 500, 50);
		$('.overlay').delay(200).fadeIn(500);
	});

	settings.closeNav.bind('click', function(){
		settings.closeSettingsSidebar('settings-sidebar', 500, 50);
		$('.overlay').delay(200).fadeOut(500);
		$('body').animate({"background-color": "rgba(0,0,0,0.4)"}, 500);
	});
});


$(function(){

	var url = window.location.href;

	var avatar = $('input[name=avatar]').val();
	var cover = $('input[name=cover]').val();
	var name = $('input[name=name]').val();
	var email = $('input[name=email]').val();
	var description = $('input[name=description]').val();


	$('.avatarInput').change(function(){
		prev_avatar(this);
	});

	$('.coverInput').change(function(){
		prev_cover(this);
	});

	$('#cancel').click(function(){
		$('.show-avatar').delay(200).slideUp(600);
	});

	// $('.edit-user').click(function(e){
	// 	e.preventDefault();

	// 	$.ajax({url:url, method:'post', data: avatar + cover + name + email + description}, function(data, textStatus, xhr) {
	// 		console.log(data, textStatus, xhr);
	// 	});
		
	// });

	$('.search-input').bind('click', function(){
		$('.results').show();
		$('.overlay').fadeIn(400);
	});

	$('.search-input').bind('keyup', function(){
		$('.results').show();
		$('.overlay').fadeIn(400);
	});

	$('.results').on('mouseleave', function(){
		$(this).fadeOut(400);
		$('.overlay').fadeOut(400);
	});

});


