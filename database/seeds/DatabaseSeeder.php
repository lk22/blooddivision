<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Helper\ProgressBar;

class DatabaseSeeder extends Seeder
{

	protected $toTruncate = ['users', 'games', 'events'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	//Model::ungard();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

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
            
            $this->call(GameTableSeeder::class);

            // $this->call(EventTableSeeder::class);


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Model::reguard();
    }
}
