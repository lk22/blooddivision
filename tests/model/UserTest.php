
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
     * test if user_model_exists
     * @test
     * @return void
     */
    public function check_if_user_model_exists(){
    	/**
    	 * output testing method to terminal
    	 */
    	fwrite(STDOUT, __METHOD__. " - says: test passed!\n\n ");
    
   	/**
    	 * instanciate object
    	 * @var user
    	 */
    	$user = new User;

    	/**
    	 * check if the model class exists in this application
    	 */
    	if (!class_exists(User::class)) {
    		throw new Exception("Eloquent model: " . $user . "dosen't exist" , 1);
    	}
    }

    /**
     * test if user_model_has_table_property
     * @test
     * @return void
     */
    public function check_if_user_model_has_table_property(){
    	/**
    	 * output testing method to terminal
    	 */
    	fwrite(STDOUT, __METHOD__. " - says: test passed!\n\n");
    
    	/**
    	 * instanciate object
    	 * @var $user
    	 */
    	$user = new User;

    	/**
    	 * check if the model has the table property
    	 */
    	if (!property_exists($user, "table")) {
    		throw new Exception("Model dont have a table property please make it (protected)" , 1);
    	}
    }

    /**
     * test if user_model_table_property_has_value_users
     * @test
     * @return void
     */
    public function check_if_user_model_table_property_has_value_users(){
    	/**
    	 * output testing method to terminal
    	 */
    	fwrite(STDOUT, __METHOD__. " - says: test passed!\n\n");
    
    	/**
    	 * instanciate object
    	 * @var $user
    	 */
    	$user = new User;

    	/**
    	 * make a check if the table property exists
    	 */
    	if(property_exists($user, "table")){

    		/**
    		 * if true then make a check if the table property has the value of users
    		 * @var $user
    		 */
    		if(!$user->table = "users"){

    			/**
    			 * if false throw new exception
    			 */
    			throw new Exception("Property dont have the correct value of users", 1);
    		}
    	}
    }

    /**
     * test if user_model_has_fillable_property
     * @test
     * @return void
     */
    public function check_if_user_model_has_fillable_property(){
    	/**
    	 * output testing method to terminal
    	 */
    	fwrite(STDOUT, __METHOD__. " - says: test passed!\n\n");
    
    	/**
    	 * instanciate object
    	 * @var $user
    	 */
    	$user = new User;

    	if (!property_exists($user, "fillable")) {
    		throw new Exception("This model is not using the sluggable trait", 1);
    	}
    }

    /**
     * test if user_model_has_fillable_property_and_has_value_name
     * @test
     * @return void
     */
    public function check_if_user_model_has_fillable_property_and_has_value_name(){
    	/**
    	 * output testing method to terminal
    	 */
    	fwrite(STDOUT, __METHOD__. " - says: test passed!\n\n");
    
    	/**
    	 * instanciate object
    	 * @var $user
    	 */
    	$user = new User;

    	/**
    	 * make a check for the fillable property's existence
    	 */
    	if(property_exists($user, "fillable")){

    		/**
    		 * if true then make a check for property is a array
    		 * @var array
    		 */
    		if($user->fillable = array()){

    			/**
    			 * if true then assert is has the name field for mass assignment
    			 */
    			$this->assertArrayHasKey('name', $user->fillable, 'message');
    		}
    	}
    }

    /**
     * test if user_model_has_fillable_property_and_has_value_email
     * @test
     * @return void
     */
    public function check_if_user_model_has_fillable_property_and_has_value_email(){
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
    	 * make a check for the fillable property's existence
    	 */
    	if(property_exists($user, "fillable")){

    		/**
    		 * if true then make a check for property is a array
    		 * @var array
    		 */
    		if($user->fillable = array()){

    			/**
    			 * if true then assert is has the email field for mass assignment
    			 */
    			$this->assertArrayHasKey('email', $user->fillable, 'message');
    		}
    	}
    }

    /**
     * test if user_model_has_fillable_property_and_has_value_password
     * @test
     * @return void
     */
    public function check_if_user_model_has_fillable_property_and_has_value_password(){
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
    	 * make a check for the fillable property's existence
    	 */
    	if(property_exists($user, "fillable")){

    		/**
    		 * if true then make a check for property is a array
    		 * @var array
    		 */
    		if($user->fillable = array()){

    			/**
    			 * if true then assert is has the password field for mass assignment
    			 */
    			$this->assertArrayHasKey('password', $user->fillable, 'message');
    		}
    	}
    }

    /**
     * test if user_model_has_fillable_property_and_has_value_avatar
     * @test
     * @return void
     */
    public function check_if_user_model_has_fillable_property_and_has_value_avatar(){
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
    	 * make a check for the fillable property's existence
    	 */
    	if(property_exists($user, "fillable")){

    		/**
    		 * if true then make a check for property is a array
    		 * @var array
    		 */
    		if($user->fillable = array()){

    			/**
    			 * if true then assert is has the avatar field for mass assignment
    			 */
    			$this->assertArrayHasKey('avatar', $user->fillable, 'message');
    		}
    	}
    }

    /**
     * test if user_model_has_fillable_property_and_has_value_cover
     * @test
     * @return void
     */
    public function check_if_user_model_has_fillable_property_and_has_value_cover(){
    	/**
    	 * output testing method to terminal
    	 */
    	fwrite(STDOUT, __METHOD__. " - says: test passed!\n\n");
    
    	/**
    	 * instanciate object
    	 * @var $user
    	 */
    	$user = new User;

    	/**
    	 * make a check for the fillable property's existence
    	 */
    	if(property_exists($user, "fillable")){

    		/**
    		 * if true then make a check for property is a array
    		 * @var array
    		 */
    		if($user->fillable = array()){

    			/**
    			 * if true then assert is has the cover field for mass assignment
    			 */
    			$this->assertArrayHasKey('cover', $user->fillable, 'message');
    		}
    	}
    }

    /**
     * test if user_model_has_fillable_property_and_has_value_remember_token
     * @test
     * @return void
     */
    public function check_if_user_model_has_fillable_property_and_has_value_remember_token(){
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
    	 * make a check for the fillable property's existence
    	 */
    	if(property_exists($user, "fillable")){

    		/**
    		 * if true then make a check for property is a array
    		 * @var array
    		 */
    		if($user->fillable = array()){

    			/**
    			 * if true then assert is has the remember_token field for mass assignment
    			 */
    			$this->assertArrayHasKey('remember_token', $user->fillable, 'message');
    		}
    	}
    }

    /**
     * test if user_model_has_hidden_property
     * @test
     * @return void
     */
    public function check_if_user_model_has_hidden_property(){
    	/**
    	 * output testing method to terminal
    	 */
    	fwrite(STDOUT, __METHOD__. " - says: test passed!\n\n");
    
    	/**
    	 * instanciate object
    	 * @var $user
    	 */
    	$user = new User;

    	/**
    	 * make a check that the hidden property exists
    	 */
    	if(!property_exists($user, "hidden")){

    		/**
    		 * if false throw exception
    		 */
    		throw new Exception("Property hidden dosen't exist create the property and make it protected", 1);
    	}
    }


    /**
     * test if user_model_hidden_property_is_array
     * @test
     * @return void
     */
    public function check_if_user_model_hidden_property_is_array(){
    	/**
    	 * output testing method to terminal
    	 */
    	fwrite(STDOUT, __METHOD__. " - says: test passed!\n\n");
    
    	/**
    	 * instanciate object
    	 * @var $user
    	 */
    	$user = new User;

    	/**
    	 * check that the hidden property is an array
    	 * @var array
    	 */
    	if(!$user->hidden == array()){
    		throw new Exception("Property is not an array..", 1);
    	}
    }


    /**
     * test if user_model_hidden_has_password_value
     * @test
     * @return void
     */
    public function check_if_user_model_hidden_has_password_value(){
    	/**
    	 * output testing method to terminal
    	 */
    	fwrite(STDOUT, __METHOD__. " - says: test passed!\n\n");
    
    	/**
    	 * instanciate object
    	 * @var $user
    	 */
    	$user = new User;

    	if($user->hidden = array()){

    		$this->assertArrayHasKey('password', $user->hidden, 'message');
    	}
    }

    /**
     * test if user_model_hidden_has_remember_token_value
     * @test
     * @return void
     */
    public function check_if_user_model_hidden_has_remember_token_value(){
    	/**
    	 * output testing method to terminal
    	 */
    	fwrite(STDOUT, __METHOD__. " - says: test passed!\n\n");
    
    	/**
    	 * instanciate object
    	 * @var $user
    	 */
    	$user = new User;

    	if($user->hidden = array()){

    		$this->assertArrayHasKey('remember_token', $user->hidden, 'message');
    	}
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