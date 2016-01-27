<?php 
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;


/**
* Users Seeder class
*/

class EventTableSeeder extends Seeder
{
	
	public function run()
	{
		factory(Blooddivision\Event::class, 20)->create();
	}
}


?>