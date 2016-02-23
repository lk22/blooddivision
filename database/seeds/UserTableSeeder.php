<?php 
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;


/**
* Users Seeder class
*/

class UserTableSeeder extends Seeder
{
	
	public function run()
	{
		factory(Blooddivision\User::class, 100)->create();
	}
}


?>