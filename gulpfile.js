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
	'faa': bower + 'font-awesome-animation/dist/',
	'sa': bower + 'sweetalert/dist/',
	'alertify': bower + 'alertify.js/lib/',
	'angular': bower + 'angular',
	'vue': bower + 'vue/dist/',
	'select2': bower + 'select2/dist/js/selct2.min.js'
};

elixir(function(mix) {



/*
*	Add Sass support
*/

	mix.sass(["app.scss", "welcome.scss"]).browserSync({proxy: 'blooddivision.app'});

/**
* copy scripts and stylesheets
*/

	/**
	 * jQuery
	 */
	
	    mix.copy(
	    	paths.jquery + 'dist/jquery.js',
	    	'public/js/vendor/jquery.js'
	    );

	/**
	* Bootstrap
	*/

		mix.copy(
			paths.bootstrap + 'dist/js/bootstrap.js',
			'public/js/vendor/bootstrap.js'
		);

	/**
	* React JS
	*/

		// mix.copy(
		// 	paths.react + 'dist/react.js',
		// 	'public/js/vendor/react.js'
		// );

	/**
	 * font awesome animation
	 */

		mix.copy(
			paths.faa + 'font-awesome-animation.min.css',
			'public/css/vendor/font-awesome-animation.min.css'
		);

	/**
	 * sweetalert
	 */
	
		mix.copy(
			paths.sa + 'sweetalert-dev.js',
			'public/js/vendor/sweetalert-dev.js'
		);

		mix.copy(
			paths.sa + 'sweetalert.css',
			'public/css/vendor/sweetalert.css'
		);

	/**
	 * alertify.js
	 */
	
		mix.copy(
			paths.alertify + 'alertify.min.js',
			'public/js/vendor/alertify.min.js'
		);

		mix.copy(
			bower + 'alertify.js/themes/alertify.bootstrap.css',
			'public/css/vendor/alertify.bootstrap.css'
		);

		mix.copy(
			bower + 'alertify.js/themes/alertify.core.css',
			'public/css/vendor/alertify.core.css'
		);

		mix.copy(
			bower + 'alertify.js/themes/alertify.default.css',
			'public/css/vendor/alertify.default.css'
		);

	/**
	 * angular js
	 */
	
		mix.copy(
			paths.angular + 'angular.min.js',
			'public/js/vendor/angular.min.js'
		);

	/**
	 * vue js
	 */
	
		mix.copy(
			paths.vue + 'vue.min.js',
			'public/js/vendor/vue.min.js'
		);

	/**
	 * select2 js
	 */
		
		mix.copy(
			paths.select2,
			'public/js/vendor/select2.min.js'
		);

	/**
	 * mix stylesheets
	 */
	
		mix.styles([
			'vendor/font-awesome-animation.min.css',
			'../../bower_components/bootstrap/dist/css/bootstrap.css',
			'welcome.css',
			'app.css',
			'vendor/animate.css',
			'vendor/sweetalert.css',
			'vendor/alertify.boostrap.css',
			'vendor/alertify.core.css',
			'vendor/alertify.default.css'
		], 'public/css/all.css', 'public/css');
	
/**
* mix scripts
*/

	mix.scripts([
		'public/js/vendor/sweetalert-dev.js',
		'public/js/vendor/alertify.min.js',
		'public/js/vendor/select2.min.js',
		'public/js/pages/Auth.js',
		'public/js/pages/Contact.js',
		'public/js/pages/Event.js',
		'public/js/pages/helpCenter.js',
		'public/js/pages/profile.js',
		'App.js'
	], 'public/js/all.js', 'public/js');


// do a version control of the javascript and css files

	mix.version(['css/welcome.css', 'css/app.css', 'js/all.js']);

	

});

