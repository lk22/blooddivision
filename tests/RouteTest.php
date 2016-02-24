<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RouteTest extends TestCase
{
    /**
     * setttings before firing the tests
     *
     * @return void
     */
    public static function setUpBeforeClass()
    {
        echo "Hello Tester of Blood Division\n";
        echo "You are testing your application routes with following test methods: \n\n";
    }

   /**
    * test if client visits landing_page route
    * @test
    * @return void
    */
   public function check_if_client_visits_landing_page_route(){
     /**
      * output test method to terminal
      */
     fwrite(STDOUT, __METHOD__. "\n");
   
     /**
      * make http request and assert the response code is 200
      */
     $this->visit('/')->assertResponseOk();
   }


   /**
    * test if client visits login route
    * @test
    * @return void
    */
   public function check_if_client_visits_login_route(){
     /**
      * output test method to terminal
      */
     fwrite(STDOUT, __METHOD__. "\n");
   
     /**
      * make http request and assert the response code is 200
      */
     $this->visit('login')->assertResponseOk();
   }

   /**
    * test if client visits register route
    * @test
    * @return void
    */
   public function check_if_client_visits_register_route(){
     /**
      * output test method to terminal
      */
     fwrite(STDOUT, __METHOD__. "\n");
   
     /**
      * make http request and assert the response code is 200
      */
     $this->visit('register')->assertResponseOk();
   }

   /**
    * test if client visits password_reset route
    * @test
    * @return void
    */
   public function check_if_client_visits_password_reset_route(){
     /**
      * output test method to terminal
      */
     fwrite(STDOUT, __METHOD__. "\n");
   
     /**
      * make http request and assert the response code is 200
      */
     $this->visit('password/reset/{token?}')->assertResponseOk();
   }

   /**
    * test if client visits members route
    * @test
    * @return void
    */
   public function check_if_client_visits_members_route(){
     /**
      * output test method to terminal
      */
     fwrite(STDOUT, __METHOD__. "\n");
   
     /**
      * make http request and assert the response code is 200
      */
     $this->visit('/members')->assertResponseOk();
   }

   /**
    * test if client visits home route
    * @test
    * @return void
    */
   public function check_if_client_visits_home_route(){
     /**
      * output test method to terminal
      */
     fwrite(STDOUT, __METHOD__. "\n");
   
     /**
      * make http request and assert the response code is 200
      */
     $this->visit('/home')->assertResponseOk();
   }

   /**
    * test if client visits about route
    * @test
    * @return void
    */
   public function check_if_client_visits_about_route(){
     /**
      * output test method to terminal
      */
     fwrite(STDOUT, __METHOD__. "\n");
   
     /**
      * make http request and assert the response code is 200
      */
     $this->visit('about')->assertResponseOk();
   }

   /**
    * test if client visits contact_us route
    * @test
    * @return void
    */
   public function check_if_client_visits_contact_us_route(){
     /**
      * output test method to terminal
      */
     fwrite(STDOUT, __METHOD__. "\n");
   
     /**
      * make http request and assert the response code is 200
      */
     $this->visit('contact-us')->assertResponseOk();
   }

   /**
    * test if client visits forum route
    * @test
    * @return void
    */
   public function check_if_client_visits_forum_route(){
     /**
      * output test method to terminal
      */
     fwrite(STDOUT, __METHOD__. "\n");
   
     /**
      * make http request and assert the response code is 200
      */
     $this->visit('/forum')->assertResponseOk();
   }

   /**
    * show a message within end of test runnings
    * @return void
    */
    public static function tearDownAfterClass()
    {
       echo "All tests Passed Good Job!\n\n";
       echo "you are doing great tester, Keep test the system and we all will be happy. :) \n Did i tell you that you are awesome? :)";
    }
}
