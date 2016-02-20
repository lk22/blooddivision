<?php 
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;


/**
* Users Seeder class
*/

class ContactTableSeeder extends Seeder
{
	
	public function run()
	{
		factory(Blooddivision\Contact::class, 20)->create();
	}
}


?>