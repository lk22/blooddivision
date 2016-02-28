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
$(function(){

	setAffix('#app-nav', {
		top: 0
	});

});

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


$(function(){

	var $button = $('.add-game');

	$button.click(function(e){
		e.preventDefault();
		$.ajax({
			url: '/profile/{slug}/your-games',
			type: 'post',
			dataType: 'json',
			data: $('add-game-form').serialize()
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
	})

});

$(function(){

	$('a[href*=#]:not([href=#])').click(function(){
		if(location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname){
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if(target.length){
				$('html, body').delay(200).animate({
					scrollTop: target.offset().top
				}, 800);
				$('.scrollTopContainer').delay(200).animate({
					opacity: "1",
					right: "-1px"
				}, 1500);
			}
		}
		return false;
	});

});

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

	$('.about-profile').on('mouseleave', function(){

		if(!$('.description').val()){
			$('.user-description').slideUp(400);
			$('.edit_description_btn').html(setValue("Edit description"));
			$('.about-description-row, .buttons').slideDown(400);
		}

	});

	$('.close_edit_description_btn').on('click', function(){

		if(!$('.description').val()){
			$('.user-description').slideUp(400);
			$('.about-description-row, .buttons').slideDown(400);
		}

	});

});
