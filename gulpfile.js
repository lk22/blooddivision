var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var bower = 'bower_components/';
var node = 'node_modules/';

var paths = {
	'bootstrap' : bower + 'bootstrap/',
	'bootstrap_sass' : bower + 'bootstrap/scss',
	'fontawesome' : bower + 'font-awesome/',
	'jquery' : bower + 'jquery/',
	'moment' : bower + 'moment/',
	'react'	 : node  + 'react/',
	'lightbox' : bower + 'lightbox2/',
	'faa': bower + 'font-awesome-animation/dist/'
};

elixir(function(mix) {

/*
*	Add Sass support
*/

	mix.sass(["app.scss", "welcome.scss"]);

/**
* copy scripts
*/

	/**
	 * jQuery
	 */
	
	    mix.copy(
	    	paths.jquery + 'dist/jquery.js',
	    	'public/js/vendor/jquery.min.js'
	    );

	/**
	* Bootstrap
	*/

		mix.copy(
			paths.bootstrap + 'dist/js/bootstrap.js',
			'public/js/vendor/bootstrap.min.js'
		);

	/**
	* React JS
	*/

		mix.copy(
			paths.react + 'dist/react.js',
			'public/js/vendor/react.min.js'
		);

		mix.copy(
			paths.faa + 'font-awesome-animation.min.css',
			'public/css/vendor/font-awesome-animation.min.css'
		);

	/**
	 * mix stylesheets
	 */
	
		mix.styles([
			'welcome.css',
			'app.css',
			'vendor/font-awesome-animation.min.css',
			'vendor/animate.css'
		], 'public/css/all.css', 'public/css');
	

/**
* mix scripts
*/

	mix.scripts([
		// 'public/js/vendor/jquery.min.js',
		// 'public/js/vendor/bootstrap.min.js',
		// 'public/js/vendor/react.min.js',
		'public/js/pages/home.js',
		// 'public/js/pages/events.js',
		// 'public/js/pages/members.js',
		'public/js/pages/authorization.js',
		// 'public/js/pages/helpCenter.js',
		// 'public/js/pages/profile/timeline.js',
		// 'public/js/pages/profile/events.js',
		// 'public/js/pages/profile/createEvent.js',
		// 'public/js/pages/profile/games.js'
	], 'public/js/all.js', 'public/js');


// do a version control of the javascript and css files

	mix.version(['css/welcome.css', 'css/app.css', 'js/all.js']);

});

