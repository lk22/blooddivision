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
