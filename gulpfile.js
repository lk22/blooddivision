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

var bower = './vendor/bower_components/';

var paths = {
	'bootstrap' : bower + 'bootstrap/',
	'bootstrap_sass' : bower + 'bootstrap/scss',
	'fontawesome' : bower + 'font-awesome/',
	'jquery' : bower + 'jquery/',
	'moment' : bower + 'moment/'
};

elixir(function(mix) {

/*
*	Add Sass support
*/

	mix.sass(["app.scss", "welcome.scss"]);

/**
* add browserify support for js files
*/

// do a version control of the javascript and css files

	mix.version(['css/welcome.css', 'css/app.css', 'js/all.js']);

});

