
<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Blooddivision\Contact;

class ContactTest extends TestCase
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
     * test if contact_class_exists
     * @test
     * @return void
     */
    public function check_if_contact_class_exists(){
    	/**
    	 * output testing method to terminal
    	 */
    	fwrite(STDOUT, __METHOD__. " - says: test passed!");
    
    	/**
    	 * instanciate object
    	 * @var $contact
    	 */
    	$contact = new Contact;

    	$this->assertInstanceOf('Blooddivision\Contact', $contact);
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