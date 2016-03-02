
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
     * test if comment_class_exists
     * @test
     * @return void
     */
    public function check_if_comment_class_exists(){
        /**
         * output testing method to terminal
         */
        fwrite(STDOUT, __METHOD__. " - says: test passed! \n\n");
    
        /**
         * instanciate object
         * @var $comment
         */
        $comment = new Comment;

        $this->assertInstanceOf('Blooddivision\Comment', new Comment);

        // if(!class_exists($comment)){
        //     throw new Exception("Class dosen't exists", 1);
        // }
    }

    /**
     * test if comment_class_has_table_property
     * @test
     * @return void
     */
    public function check_if_comment_class_has_table_property(){
        /**
         * output testing method to terminal
         */
        fwrite(STDOUT, __METHOD__. " - says: test passed! \n\n");
    
        /**
         * instanciate object
         * @var $comment
         */
        $comment = new Comment;

        /**
         * assert 
         */
        $this->assertObjectHasAttribute('table', $comment);
    }

    /**
     * test if comment_class_fillable_has_comments_value
     * @test
     * @return void
     */
    public function check_if_comment_class_fillable_has_comments_value(){
        /**
         * output testing method to terminal
         */
        fwrite(STDOUT, __METHOD__. " - says: test passed! \n\n");
    
        /**
         * instanciate object
         * @var $comment
         */
        $comment = new Comment;

        if(!$comment->table = 'comments'){
            throw new Exception("property has another value or empty as value", 1);
        }
    }

    /**
     * test if comment_class_has_fillable_property
     * @test
     * @return void
     */
    public function check_if_comment_class_has_fillable_property(){
        /**
         * output testing method to terminal
         */
        fwrite(STDOUT, __METHOD__. " - says: test passed! \n\n");
    
        /**
         * instanciate object
         * @var $comment
         */
        $comment = new Comment;

        $this->assertObjectHasAttribute('fillable', $comment);
    }

    /**
     * test if comment_class_fillable_has_correct_value
     * @test
     * @return void
     */
    public function check_if_comment_class_fillable_has_correct_value(){
        /**
         * output testing method to terminal
         */
        fwrite(STDOUT, __METHOD__. " - says: test passed!");
    
        /**
         * instanciate object
         * @var $comment
         */
        $comment = new Comment;

        $this->assertAttributeContains('comment', 'fillable', $comment);
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