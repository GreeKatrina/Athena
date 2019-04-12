<?php
class HelloWorldTest extends PHPUnit_Framework_TestCase implements HelloInterface, WorldInterface
{
    /**
     * Comment
     *
     * @var PDO Description of var with a {@link getDb()}
     */
    private $pdo;

    public function setUp()
    {
        $this->pdo = new PDO($GLOBALS['db_dsn'], $GLOBALS['db_username'], $GLOBALS['db_password']);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->query("CREATE TABLE hello (what VARCHAR(50) NOT NULL)");
    }
    public function tearDown()
    {
        $helloWorld = 'hi';
        $this->testHelloWorld($helloWorld);
        $this->pdo->query("DROP TABLE hello");
    }
    public function testHelloWorld($helloWorld)
    {
        $this->assertEquals('Hello World', $helloWorld->hello());
    }
    public function testHello()
    {
        $helloWorld = new HelloWorld($this->pdo);
        $this->assertEquals('Hello Bar', $helloWorld->hello('Bar'));
    }
    public function testWhat()
    {
        $helloWorld = new HelloWorld($this->pdo);

        if ($helloWorld->what() === false) {
            $helloWorld->hello('Bar');
        }
    }
}
?>