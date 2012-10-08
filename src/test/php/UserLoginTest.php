<?php

class UserLoginTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
		$user = "webhat"
		$uL = new UserLogin( $user);

		$uL->setProperty('firstname', 'Daniël');

		$uL->store();
	}

	public function tearDown() {
		$mongo = new Mongo(); // connect
		$db = $mongo->selectDB("wt365");
		$db->profiles->drop();
	}

	public function testHelloWorld() {
		$helloWorld = new HelloWorld();

		$this->assertEquals('Hello World', $helloWorld->hello());
	}
}
 
?>
