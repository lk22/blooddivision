<?php 

namespace Blooddivision\Helpers;

use \Session;
use Guard;
use Auth;
use Filesystem;

use Illuminate\Database\Eloquent\Model;

/**
 * Global helper class
 */

	/**
	* helpers
	*/
	class Helper
	{
		/**
		 * set session attribute
		 * @var [type]
		 */
		
			protected $session;

		/**
		 * [$auth description]
		 * @var [type]
		 */
		
			protected $auth;

		/**
		 * model instance
		 */

			protected static $model;
		/**
		 * constructor
		 * @param Auth => $auth
		 */
		
			public function __construct(Auth $auth, Model $model){
				$this->session = session();
				$this->auth = $auth;
			}

		/**
		 * create a custom flash
		 * @param  [type] $message [description]
		 * @param  [type] $flash   [description]
		 * @return [type]          [description]
		 */
		
			public static function flash($message, $flash){
				return $this->session->flash($message, $flash);
			}

		/**
		 * make a custom error message
		 * @param  [type] $message [description]
		 * @param  [type] $flash   [description]
		 * @return [type]          [description]
		 */
		
			public static function flashError($message, $flash){
				return '<div class="alert alert-danger">'. Self::flash($message, $flash) . '</div>';
			}	


		/**
		 * make a custom succes message
		 * @param  [type] $message [description]
		 * @param  [type] $flash   [description]
		 * @return [type]          [description]
		 */
		
			public static function flashSuccess($message, $flash){
				return '<div class="alert alert-success">'. Self::flash($message, $flash) . '</div>';
			}

		/**
		 * make a custom warning message
		 * @param  [type] $message [description]
		 * @param  [type] $flash   [description]
		 * @return [type]          [description]
		 */
		
			public static function flashWarning($message, $flash){
				return '<div class="alert alert-warning">'. Self::flash($message, $flash) . '</div>';
			}

		/**
		 * redirect helper
		 * @param  [type] $path [description]
		 * @return [type]       [description]
		 */
		
			public static function redirect($path = null){
				if(is_null($path)){
					return redirect()->back();
				}

				if($path && is_int($path)){
					return abort(403);
				}

				if($path && is_string($path)){
					return redirect(trim('/') . $path);
				}
			}

		/**
		 * returning view helper with or without objects
		 * @param  [type] $path      [description]
		 * @param  [type] $instance  [description]
		 * @param  [type] $_instance [description]
		 * @return [type]            [description]
		 */
		
			public static function getView($path, $instance = null, $_instance = null){
				if(!isset($path) || !is_string($path)){

					$flash = Self::flash('redirect', 'that following route dosent exist or either trustable');

					Self::redirect()->back();
				}

				switch ($instance) {
					case isset($instance) && !is_object($instance):
						throw new Exception("instance is not an object of a eloquent model", 1);
						break;

					case isset($instance):
						return view($path, compact($instance));
					break;
					
					case isset($instance) && is_array($instance):
						return view($path, compact($instance));
						break;

					case isset($instance) && isset($_instance): 
						return view($path)->with($instance, $_instance);
					break;
				}

				return view($path);
			}

		/**
		 * get model
		 * @return [type] object (description)
		 */

			public static function getModel($model){
				return $model;
			}

		/**
		 * get authenticated user
		 * @return void (description)
		 */

			public static function getAuth(){
				return auth()->user();
			}

		/**
		 * return base path
		 * @return void (description)
		 */

			public static function getBaseUrl(){
				return base_path();
			}

		/**
		 * get image file from specified base path
		 * @return $file (description)
		 */

			public static function news_images_path($path = ''){
				return base_path() . '/public/images/pages' . $file;
			}

		/**
		 * get asset file
		 * @return $file (description)
		 */

			public static function news_images_url($file = ''){
				return asset('images/news/' . $file);
			}

		/**
		 * dd() helper
		 */

			public static function dieAndDump($dump){
				return dd($dump);
			}

		/**
		 * get contents of any file 
		 */
		
			public static function getFile($request, $file){
				return $request->file($file);
			}

		/**
		 * create model instance
		 */

			public static function create($model, array $attributes = []){
				$eloquent = Self::$model; // expect to be object class

				if(!is_object($eloquent)){
					throw new InvalidArgumentException();
				}

				foreach ($attributes as $attribute) {
					return $eloquent->create($attribute)->save();
				}
			}

		/**
		 * update eloquent model
		 */

			public static function update($model, array $attributes = []){
				$eloquent = $model;

				if(!is_object($eloquent)){
					throw new InvalidArgumentException();
				}

				foreach ($attributes as $attribute) {
					return $eloquent->update($attribute)->save();
				}
			}

			public static function queryLimiter( int $limit ){
				if(!is_int($limit)){
					throw new InvalidArgumentException();
				}

				return $this->model->take($limit);
			}

			public static function whereFieldAndValue($field, $value){
				if(!$field || !$value){
					throw new InvalidArgumentException();
				}

				return $this->model->where($field, $value);
			}

			public static function getManyToMany($model, $relation = '', $whereField = '', $whereValue = ''){
				$eloquent = $model;

				if(!is_string($relation)){
					throw new InvalidArgumentException();
				}

				return $eloquent->with($relation)->whereFieldAndValue($whereField, $whereValue)->get();
			}
	}

 ?>