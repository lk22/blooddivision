<?php 

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Blooddivision\User;


/**
* Users Seeder class
*/

class UserTableSeeder extends Seeder
{
	
	public function run()
	{
		factory('Blooddivision\User', 20)->create([
			'name' => $faker->name,
			'email' => $faker->email,
			'password' => "user1234",
			'avatar' => '/images/avatars/005-avatar-large-190x190-93034cb05164464887fa7f3e6fc936d8.jpg',
			'created_at' => Carbon\Carbon::now(),
		]);
	}
}


?>