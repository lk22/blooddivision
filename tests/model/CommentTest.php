
<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Blooddivision\Comment;

class CommentTest extends TestCase
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
    * show a message within end of test runnings
    * @return void
    */
    public static function tearDownAfterClass()
    {
       // logic message here
    }
}