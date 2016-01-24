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
	'lightbox' : bower + 'lightbox2/'
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
	    	paths.jquery + 'dist/jquery.min.js',
	    	'public/js/vendor/jquery.js'
	    );

	/**
	* Bootstrap
	*/

		mix.copy(
			paths.bootstrap + 'dist/js/bootstrap.min.js',
			'public/js/vendor/bootstrap.js'
		);

	/**
	* React JS
	*/

		mix.copy(
			paths.react + 'dist/react.min.js',
			'public/js/vendor/react.js'
		);

	/**
	* lightbox
	*/

		mix.copy(
			paths.lightbox + 'dist/lightbox.min.js',
			'public/js/vendor/lightbox.min.js'
		);

/**
* add browserify support for js files
*/

	mix.scripts([
		'public/js/vendor/bootstrap.js',
		'public/js/vendor/jquery.js',
		'public/js/vendor/react.js'
	], 'public/js/all.js', 'public/js');

// do a version control of the javascript and css files

	mix.version(['css/welcome.css', 'css/app.css', 'js/all.js']);

});

