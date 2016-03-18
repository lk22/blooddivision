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

    	// Model::ungard();

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        $rustart = getrusage();

        echo "_____________________\n";
        echo "Calling seeders... Hold on \n";
        echo "_____________________\n";

       /**
        *   Truncate the data from the database everytime db:seed is triggered
        */
       
            echo "truncating tables\n";
            echo "--------------\n";

            foreach ($this->toTruncate as $table) {
               echo "truncating " . $table;
               DB::table($table)->truncate();

               echo ". Truncated table " . $table . "\n";
            }

            echo "_____________________\n";
            echo "All database tables is truncated.\n\n";
            echo "We are now seeding the tables\n";
            echo "_____________________\n";

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

            /**
             * seeding
             */

        echo "_____________________\n";
        echo "all database tables are filled up with fresh data!! \n";
        echo "_____________________\n";

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Model::reguard();
    }
}
