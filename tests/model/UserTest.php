
<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Blooddivision\User;

class UserTest extends TestCase
{
	/**
	 * use DatabaseTransactions
	 * @return \Illuminate\Foundation\Testing\DatabaseTransactions
	 */
	use DatabaseTransactions;

	/**
     * setttings before firing the tests
     *
     * @return void
     */
    public static function setUpBeforeClass()
    {
        echo "Hello Tester of Blood Division\n";
        // logic message here ...
    }


    /**
     * test if user_class_exists
     * @test
     * @return void
     */
    public function check_if_user_class_exists(){
        /**
         * output testing method to terminal
         */
        fwrite(STDOUT, __METHOD__. " - says: test passed! \n\n");
    
        /**
         * instanciate object
         * @var $user
         */
        $user = new User;

        $this->assertInstanceOf('Blooddivision\User', $user);
    }


    /**
     * test if user_class_has_table_property
     * @test
     * @return void
     */
    public function check_if_user_class_has_table_property(){
        /**
         * output testing method to terminal
         */
        fwrite(STDOUT, __METHOD__. " - says: test passed! \n\n");
    
        /**
         * instanciate object
         * @var $user
         */
        $user = new User;

        $this->assertTrue(property_exists($user, 'table'));
    }

    /**
     * test if user_class_has_sluggable_property
     * @test
     * @return void
     */
    public function check_if_user_class_has_sluggable_property(){
        /**
         * output testing method to terminal
         */
        fwrite(STDOUT, __METHOD__. " - says: test passed! \n\n");
    
        /**
         * instanciate object
         * @var $user
         */
        $user = new User;

        $this->assertTrue(property_exists($user, 'sluggable'));
    }
    
    /**
     * test if user_class_has_fillable_property
     * @test
     * @return void
     */
    public function check_if_user_class_has_fillable_property(){
        /**
         * output testing method to terminal
         */
        fwrite(STDOUT, __METHOD__. " - says: test passed! \n\n");
    
        /**
         * instanciate object
         * @var $user
         */
        $user = new User;

        $this->assertTrue(property_exists($user, 'fillable'));
    }

    /**
     * test if user_class_has_guarded_property
     * @test
     * @return void
     */
    public function check_if_user_class_has_guarded_property(){
        /**
         * output testing method to terminal
         */
        fwrite(STDOUT, __METHOD__. " - says: test passed! \n\n");
    
        /**
         * instanciate object
         * @var $user
         */
        $user = new User;

        $this->assertTrue(property_exists($user, 'guarded'));
    }

    /**
    * show a message within end of test runnings
    * @return void
    */
    public static function tearDownAfterClass()
    {
       // logic message here
    }
}