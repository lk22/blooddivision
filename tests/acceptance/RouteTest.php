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
    * show a message within end of test runnings
    * @return void
    */
    public static function tearDownAfterClass()
    {
       echo "All tests Passed Good Job!\n\n";
       echo "you are doing great tester, Keep test the system and we all will be happy. :) \n Did i tell you that you are awesome? :)";
    }
}
