<?php 


namespace Blooddivision\Helpers\Bootstrap;

/**
* Form Helper Api
*/

	class Form 
	{
		
		public static function openForm($action = null, $method = null, $class = null){
			if(is_null($action))
				$action = '';

			if(is_null($method))
				$method = 'post';

			return "<form action=" . $action . " method=" . $method . " class='form-control " . $class . "'>";
		}

		public static function textField($name = null, $label, array $attributes = []){
			return '<div class="form-group">
						<label for="' . $label . ' ">' . $label .'</label>
						<input type="' . $attributes[0] . '" name="' . $attributes[1] .'" class="' . $attributes[2] .'" placeholder="' . $attributes[3] . '">
					</div>';
		}

		public static function closeForm(){
			return "</form>";
		}

	}

 ?>