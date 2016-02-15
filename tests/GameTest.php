<?php 

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Blooddivision\Game;

/**
* testing suite for the game model class
*/
class GameTest extends TestCase
{
	/**
	 * setup before class fires
	 */
	public static function setUpBeforeClass(){
		echo "Hello Tester of Blood Division\n";
        echo "You are testing your application model game with following test methods: \n\n";
	}

	/**
	 * check of the game class exists
	 * @test
	 * @return void 
	 */
	public function check_if_game_class_exists(){
		/**
		 * ouput testing method
		 */
		fwrite(STDOUT, __METHOD__ . " - says: ");

		/**
		 * make a check if the game class exists
		 */
		if(class_exists(Game::class)){

			/**
			 * if true
			 */
			echo "class allready exists \n\n";
		}else {

			/**
			 * if false throw new exception
			 */
			throw new Exception("Class dosen't exists create the model class with artisan make:model --name", 1);
		}
	}

	/**
	 * check if the table property exists
	 * @test
	 * @return void
	 */
	public function check_if_table_property_exists(){
		/**
		 * output testing method
		 */
		fwrite(STDOUT, __METHOD__ . " - says: ");

		if(!property_exists(Game::class, "table")){
			throw new Exception("create property and shall be protected \n\n", 1);
		}else{
			echo "Property allready exists \n\n";
		}
	}

	public function check_if_table_property_has_value(){
		
		fwrite(STDOUT, __METHOD__ . " - says: ");
	}

	public function check_if_table_property_is_string(){
		// logic here...
	}

	public function check_if_fillable_property_exists(){
		// logic here...
	}

	public function check_if_fillable_property_is_array(){
		// logic here...
	}

	public function check_if_fillable_property_has_fields(){
		// logic here...
	}

	public function check_if_user_exists(){
		// logic here...
	}

	public function check_if_where_user_scope(){
		// logic here...
	}

	public function check_if_order_by_descending_scope(){
		// logic here...
	}

	public function check_if_order_by_ascending_scope(){
		// logic here...
	}
}

 ?>