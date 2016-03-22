
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
        echo "--------------------------------\n\n";
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

        /**
         * assert the property exists
         */
        
            $this->assertTrue(property_exists($user, 'fillable'));

        /**
         * assert the array has name key
         */
        
            $this->assertAttributeContains('name', 'fillable', $user);

        /**
         * assert the array has email key
         */
        
            $this->assertAttributeContains('email', 'fillable', $user);

        /**
         * assert the array has password key
         */
        
            $this->assertAttributeContains('password', 'fillable', $user);

        /**
         * assert the array has verified key
         */
        
            $this->assertAttributeContains('verified', 'fillable', $user);

        /**
         * assert the array has token field
         */
        
            $this->assertAttributeContains('token', 'fillable', $user);

        /**
         * assert the array has avatar key
         */
        
            $this->assertAttributeContains('avatar', 'fillable', $user);

        /**
         * assert the array has the cover key
         */
        
            $this->assertAttributeContains('cover', 'fillable', $user);

        /**
         * assert the array has remember_token key
         */
        
            $this->assertAttributeContains('remember_token', 'fillable', $user);
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

        /**
         * assert the property exists
         */
       
            $this->assertTrue(property_exists($user, 'guarded'));

        /**
         * assert it has the token key 
         */
        
            $this->assertAttributeContains('token', 'guarded', $user);

        /**
         * assert it has the verified key
         */
        
            $this->assertAttributeContains('verified', 'guarded', $user);
    }
    
    /**
     * test if user_class_has_hidden_property
     * @test
     * @return void
     */
    public function check_if_user_class_has_hidden_property(){
        /**
         * output testing method to terminal
         */
        fwrite(STDOUT, __METHOD__. " - says: test passed! \n\n");
    
        /**
         * instanciate object
         * @var $user
         */
        $user = new User;

        /**
         * assert property exists
         */
        $this->assertTrue(property_exists($user, 'hidden'));

        /**
         * assert array has password key
         */
        $this->assertAttributeContains('password', 'hidden', $user);

        /**
         * assert array has remember token key
         */
        $this->assertAttributeContains('remember_token', 'hidden', $user);
    }

    /**
     * test if user_class_has_message_method
     * @test
     * @return void
     */
    public function check_if_user_class_has_message_method(){
        /**
         * output testing method to terminal
         */
        fwrite(STDOUT, __METHOD__. " - says: test passed! \n\n");
    
        /**
         * instanciate object
         * @var $user
         */
        $user = new User;

        $this->assertTrue(method_exists($user, 'messages'));
    }

    /**
     * test if user_class_has_comments_method
     * @test
     * @return void
     */
    public function check_if_user_class_has_comments_method(){
        /**
         * output testing method to terminal
         */
        fwrite(STDOUT, __METHOD__. " - says: test passed! \n\n");
    
        /**
         * instanciate object
         * @var $user
         */
        $user = new User;

        $this->assertTrue(method_exists($user, 'comments'));

    }

    /**
     * test if user_class_belongsToEvents_method
     * @test
     * @return void
     */
    public function check_if_user_class_belongsToEvents_method(){
        /**
         * output testing method to terminal
         */
        fwrite(STDOUT, __METHOD__. " - says: test passed! \n\n");
    
        /**
         * instanciate object
         * @var $user
         */
        $user = new User;;

        $this->assertTrue(method_exists($user, 'belongsToEvents'));
    }

    /**
     * test if user_class_has_events_method
     * @test
     * @return void
     */
    public function check_if_user_class_has_events_method(){
        /**
         * output testing method to terminal
         */
        fwrite(STDOUT, __METHOD__. " - says: test passed! \n\n");
    
        /**
         * instanciate object
         * @var $user
         */
        $user = new User;

        $this->assertTrue(method_exists($user, 'events'));
    }

    /**
     * test if user_class_has_games_method
     * @test
     * @return void
     */
    public function check_if_user_class_has_games_method(){
        /**
         * output testing method to terminal
         */
        fwrite(STDOUT, __METHOD__. " - says: test passed!");
    
        /**
         * instanciate object
         * @var $user
         */
        $user = new User;

        $this->assertTrue(method_exists($user, 'games'));
    }

    /**
     * test if user_class_has_roles_method
     * @test
     * @return void
     */
    public function check_if_user_class_has_roles_method(){
        /**
         * output testing method to terminal
         */
        fwrite(STDOUT, __METHOD__. " - says: test passed!");
    
        /**
         * instanciate object
         * @var $user
         */
        $user = new User;

        $this->assertTrue(method_exists($user, 'roles'));
    }

    /**
     * test if user_class_has_ranks
     * @test
     * @return void
     */
    public function check_if_user_class_has_ranks(){
        /**
         * output testing method to terminal
         */
        fwrite(STDOUT, __METHOD__. " - says: test passed!");
    
        /**
         * instanciate object
         * @var $user
         */
        $user = new User;

        $this->assertTrue(method_exists($user, 'ranks'));
    }

    /**
     * test if user_class_has_getRank_method
     * @test
     * @return void
     */
    public function check_if_user_class_has_getRank_method(){
        /**
         * output testing method to terminal
         */
        fwrite(STDOUT, __METHOD__. " - says: test passed!");
    
        /**
         * instanciate object
         * @var $user
         */
        $user = new User;

        $this->assertTrue(method_exists($user, 'getRank'));
    }

    /**
    * show a message within end of test runnings
    * @return void
    */
    public static function tearDownAfterClass()
    {
       echo "\n\n----------------------------------\n\n";
       echo "user model is now tested\n\n";
       echo "----------------------------------\n\n";
       echo "string";
    }
}