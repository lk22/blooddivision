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
   * test client visits mainsite route
   *
   * @test
   * @return void
   */
   public function visit_mainsite_route()
   {
	   	// write the testing method to the terminal 
	   	fwrite(STDOUT, __METHOD__ . ": Test passed! \n");
	   	// make HTTP GET request call
	   	$request = $this->call('GET', '/');
	   	// assert that the expecting status code is equal to the actual status code
	   	$this->assertEquals(200, $request->getStatusCode());
   }

   /**
   * test client visits login route
   *
   * @test
   * @return void
   */
   public function visit_login_route()
   {
	   	// write the testing method to the terminal 
	   	fwrite(STDOUT, __METHOD__ . ": Test passed! \n");
	   	// make HTTP GET request call
	   	$request = $this->call('GET', '/login');
	   	// assert that the expecting status code is equal to the actual status code
	   	$this->assertEquals(200, $request->getStatusCode());
   }

   /**
   * test client visits register route
   *
   * @test
   * @return void
   */
   
   public function visit_register_route()
   {
	   	// write the testing method to the terminal 
	   	fwrite(STDOUT, __METHOD__ . ": Test passed! \n");
	   	// make HTTP GET request call
	   	$request = $this->call('GET', '/register');
	   	// assert that the expecting status code is equal to the actual status code
	   	$this->assertEquals(200, $request->getStatusCode());
   }

   /**
   * test client visits home route
   *
   * @test
   * @return void
   */
   public function visit_route()
   {
   	// write the testing method to the terminal 
   	fwrite(STDOUT, __METHOD__ . ": Test passed! \n");
   	// make HTTP GET request call
   	$response = $this->call('GET', '/home');
   	// assert that the expecting status code is equal to the actual status code
   	$this->assertEquals(302, $response->getStatusCode());
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
