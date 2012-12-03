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
		$db->profiles->drop();
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

	public function testSubscribeMC() {
		$this->noMC();

		$user = "webhat";
		$fname = "Daniël";
		$mail = "info123@workingtitle365.com";
		$uL = new UserLogin( $user);

		$uL->setUser( $user);
		$uL->setProperty( 'fname', $fname);
		$uL->setProperty( 'mail', $mail);

		$actual = $uL->subscribe();

		$this->assertTrue( $actual);

		$this->unSubMC($mail);
	}

	public function testSubscribeMCNoFirstName() {
		$this->noMC();

		$user = "webhat";
		$mail = "info123@workingtitle365.com";
		$uL = new UserLogin( $user);

		$uL->setUser( $user);
		$uL->setProperty( 'mail', $mail);

		$actual = $uL->subscribe();

		$this->assertTrue( $actual);

		$this->unSubMC($mail);
	}

	public function unSubMC( $mail) {
		$c = new WTConfig();
		$api = new MCAPI($c->mailchimp["apikey"]);
		$listId = $c->mailchimp["listid"];
		$retval = $api->listUnsubscribe( $listId,$mail);
	}

	public function noMC () {
		$c = new WTConfig();
		if($c->mailchimp["apikey"] == "")
			$this->markTestIncomplete(
				'This test has not been implemented yet.'
			);

		$api = new MCAPI($c->mailchimp["apikey"]);

		$retval = $api->lists();

		if ($api->errorCode)
			$this->markTestIncomplete(
				'This test has not been implemented yet.'
			);
	}

	public function testMailReset() {
		$this->noMandrill();

		$user = "webhat";
		$mail = "info@workingtitle365.com";
		$uL = new UserLogin( $user);

		$uL->setUser( $user);
		$uL->setProperty( 'mail', $mail);

		$actual = $uL->mailReset();

		$this->assertTrue( $actual);
	}

	public function noMandrill () {
		$c = new WTConfig();
		if($c->mandrill["password"] == "")
			$this->markTestIncomplete(
				'This test has not been implemented yet.'
			);
	}
}
 
?>
