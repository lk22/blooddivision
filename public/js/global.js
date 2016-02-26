/**
 * ajax globals
 */

/**
 * Append token to all requests
 */
// $(function(){
// 	$.ajaxPrefilter(function( options ) {
// 	    if ( !options.beforeSend) {
// 	        options.beforeSend = function (xhr) {
// 	            xhr.setRequestHeader('Accept', 'application/json');
// 				var token = Blooddivision.token;

// 				if (token) {
// 					xhr.setRequestHeader('X-XSRF-TOKEN', token);
// 				}
// 	        }
// 	    }
// 	});
// });
/**
 * [addNewGame to profile]
 * @param {[string]} url  [description]
 * @param {[request type]} type [description]
 */
$(function(){

	$.ajax({
		url: 'login',
		type: 'post',
		data: $('.add-game-form').serialize(),
		failed: function(data){
			console.log("could not add following game: " + data);
		}
	});


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

	$('#app-nav').affix({
		offset: {
			top: 0
		}
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