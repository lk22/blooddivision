<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Helper\ProgressBar;

class DatabaseSeeder extends Seeder
{

	protected $toTruncate = ['users', 'games', 'events', 'contact_messages', 'ranks'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        if(App::environment() === 'production')
            exit('I just stopped you from being fired. Love Phil');

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

            /**
             * seeding users 
             */
        	$this->call(UserTableSeeder::class);
            
            /**
             * seeding games
             */
            $this->call(GameTableSeeder::class);

            /**
             * seeding events
             */
            $this->call(EventTableSeeder::class);

            /**
             * seeding contact messages
             */
            $this->call(ContactTableSeeder::class);

            /**
             * seeding user ranks
             */
            $this->call(RankTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Model::reguard();
    }
}
