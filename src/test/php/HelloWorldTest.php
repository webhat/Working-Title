<?php

class HelloWorldTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
	}

	public function tearDown() {
	}

    public function testHelloWorld()
    {
	    print(getcwd() . "\n");
        $helloWorld = new HelloWorld();

        $this->assertEquals('Hello World', $helloWorld->hello());
    }

}
 
?>
