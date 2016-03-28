<?php 

	namespace Blooddivision\Transformers;

		/**
		* 
		*/
		class UserTransformer extends Transformer
		{
			
			public function transform($user){

				return [
					'name' => (string) $user['name'],
					'email' => (string) $user['email'],
					'verified' => (boolean) $user['verified']
				];

			}
		}

 ?>