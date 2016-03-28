<?php 

	namespace Blooddivision\Transformers;

		class EventTransformer extends Transformer
		{
			
			public function transform($event){

				return [
					'name' => (string) $event['name'],
					'game' => (string) $event['game'],
					'description' => (string) $event['description'],
					'completed' => (boolean) $event['completed']
				];

			}
		}
 ?>