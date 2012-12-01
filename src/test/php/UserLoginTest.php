<?php

class UserLoginTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
		$user = "webhat";
		$uL = new UserLogin( $user);

		$uL->setUser( $user);
		$uL->setPassword( $user);

		$uL->store();
	}

	public function tearDown() {
		$mongo = new Mongo(); // connect
		$config = new WTConfig();
		$db = $mongo->selectDB($config->wtdatabase);
//		$db->profiles->drop();
	}

	public function testSetPassword() {
		$passwd = "webhat1";
		$expected = hash('sha512', $passwd . md5(time()));

		$user = "webhat";
		$uL = new UserLogin( $user);
		$uL->setUser( $user);
		$uL->setPassword( $passwd);

		$actual = $uL->getProperty( 'passwd');

		$this->assertEquals( $expected, $actual);
	}

	public function testLoginFail() {
		$user = "webhat";
		$uL = new UserLogin( $user);

		$uL->setUser( $user);

		$actual = $uL->passwordCheck( $user ."-");
		$this->assertFalse( $actual);
	}

	public function testGeneratePassward() {
		$passwd = "webhat";
		$expected = hash('sha512', $passwd . md5(time()));

		$user = "webhat";
		$uL = new UserLogin( $user);
		$uL->setUser( $user);
		$uL->reset();

		$actual = $uL->getProperty( 'passwd');

		$this->assertEquals( $expected, $actual);
	}

	public function testLogin() {
		$user = "webhat";
		$uL = new UserLogin( $user);

		$uL->setUser( $user);

		$actual = $uL->passwordCheck( $user);
		$this->assertTrue( $actual);
	}
}
 
?>
