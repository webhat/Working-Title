<?php

class MakerProfileTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
		$user = 'webhat';
		$makerProfile = new MakerProfile( $user);

		$makerProfile->setProperty('firstname', 'Daniël');

		$makerProfile->store();
	}

	public function tearDown() {
		$mongo = new Mongo(); // connect
		$db = $mongo->selectDB("wt365");
		$db->profiles->drop();
	}

	/**
	 * @expectedException MakerException
	 */
	public function testMakerCreationException() {
		$makerProfile = new MakerProfile();
	}

	public function testMakerCreation() {
		$user = 'webhat';
		$makerProfile = new MakerProfile( $user);

		$actual = $makerProfile->getUser();

		$this->assertEquals( $user, $actual);
	}

	public function testMakerWhoAmI() {
		$user = 'webhat';
		$makerProfile = new MakerProfile( $user);

		$expected = "XXXXXXXXYXXXXX";

		$makerProfile->setMakerWhoAmI( $expected);

		$actual = $makerProfile->getProperty( 'whoami');
		$this->assertEquals( $expected, $actual);
	}

	public function testMakerWhatDoIDo() {
		$user = 'webhat';
		$makerProfile = new MakerProfile( $user);

		$expected = "XXXXXXXXXYXXXX";

		$makerProfile->setMakerWhatDoIDo( $expected);

		$actual = $makerProfile->getProperty( 'whatdoido');
		$this->assertEquals( $expected, $actual);
	}

	public function testMakerWhyDoIDoThis() {
		$user = 'webhat';
		$makerProfile = new MakerProfile( $user);

		$expected = "XXXXXXXXXXYXXX";

		$makerProfile->setMakerWhyDoIDoThis( $expected);

		$actual = $makerProfile->getProperty( 'whydoidothis');
		$this->assertEquals( $expected, $actual);
	}

	public function testMakerWhatWillIDoWithYourSupport() {
		$user = 'webhat';
		$makerProfile = new MakerProfile( $user);

		$expected = "XXXXXXXXXXXYXX";

		$makerProfile->setMakerWhatWillIDoWithYourSupport( $expected);

		$actual = $makerProfile->getProperty( 'whatwillidowithyoursupport');
		$this->assertEquals( $expected, $actual);
	}

	public function testMakerFirstName() {
		$user = 'webhat';
		$makerProfile = new MakerProfile( $user);

		$expected = "XXXXXXXXXXXXYX";

		$makerProfile->setMakerFirstName( $expected);

		$actual = $makerProfile->getProperty( 'firstname');
		$this->assertEquals( $expected, $actual);
	}

	public function testMakerLastName() {
		$user = 'webhat';
		$makerProfile = new MakerProfile( $user);

		$expected = "XXXXXXXXXXXXXY";

		$makerProfile->setMakerLastName( $expected);

		$actual = $makerProfile->getProperty( 'lastname');
		$this->assertEquals( $expected, $actual);
	}

	public function testAddCreation() {
		$user = 'webhat';
		$makerProfile = new MakerProfile( $user);

		$expected = "YYYYYYYYYYXXXY";

		$makerProfile->addCreation( $expected);

		$epoch = time();

		$actual = $makerProfile->getProperty( 'creations');
#print $epoch . "\n";
		$this->assertEquals( $expected, $actual[$epoch]);
	}
}
 
?>
