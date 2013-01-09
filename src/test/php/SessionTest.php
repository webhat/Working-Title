<?php

class SessionTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
	}

	public function tearDown() {
	}

	public function testSession() {
		$session = new Session();

		$this->assertEquals('test', $session->test());
	}
}
 
?>
