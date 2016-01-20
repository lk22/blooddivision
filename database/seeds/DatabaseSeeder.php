<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

	protected $toTruncate = ['users'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	// Model::ungard();

       /**
        *   Truncate the data from the database everytime db:seed is triggered
        */

            foreach ($this->toTruncate as $table) {
                DB::table($table)->truncate();
            }

        /**
        *   Seed the test users from the user seeder class
        */

        	$this->call(UserTableSeeder::class);
    }
}
