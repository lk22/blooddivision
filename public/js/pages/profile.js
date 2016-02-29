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