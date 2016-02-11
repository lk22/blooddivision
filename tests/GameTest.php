<?php 


use \Blooddivision\Game;

/**
* 
*/
class GameTest extends TestCase
{

	public $game;
	
	function __construct(Game $game)
	{
		$this->game = $game;
	}

	/**
	 * @test
	 */

	public function hi(){
		echo "hi";
	}
}

 ?>