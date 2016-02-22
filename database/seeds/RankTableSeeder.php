<?php 
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;


/**
* Users Seeder class
*/

class RankTableSeeder extends Seeder
{
	
	public function run()
	{
		factory(Blooddivision\Rank::class, 20)->create();
	}
}
