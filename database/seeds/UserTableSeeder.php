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
		$faker = new Faker();
		factory('Blooddivision\User', 20)->create([
			'name' => $faker->name,
			'email' => $faker->email,
			'password' => bcrypt('secret'),
			'avatar' => $faker->randomElements([
				'/images/avatars/005-avatar-large-190x190-93034cb05164464887fa7f3e6fc936d8.jpg',
				'/images/avatars/008-avatar-large-190x190-88284542f8f44f58b7be6281c1347d25.jpg',
				'/images/avatars/1039002_0_2039002_3001_24_1.png',
				'/images/avatars/avatar-302-0e1742296505457fae4db552f5af41c3.png'
			]),
			'profile_cover' => $faker->randomElements([
				'/images/avatars/005-avatar-large-190x190-93034cb05164464887fa7f3e6fc936d8.jpg',
				'/images/avatars/008-avatar-large-190x190-88284542f8f44f58b7be6281c1347d25.jpg',
				'/images/avatars/1039002_0_2039002_3001_24_1.png',
				'/images/avatars/avatar-302-0e1742296505457fae4db552f5af41c3.png'
			]),
			'profile_desc' => $faker->paragraph
		]);
	}
}


?>