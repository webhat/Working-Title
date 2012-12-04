<?php

class UsersTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
	}

	public function tearDown() {
	}

	public function testUsers() {
		$users = new Users();

		$userlist = $users->getUserNames();
		$this->assertNotNull($userlist);
		$this->assertNotEmpty($userlist);
	}
}
 
?>
