<?php
class ProfileMongoTest extends PHPUnit_Framework_TestCase {
	private $mongo = null;
	private $db = null;
	private $profileMongo = null;

	public function setUp() {
		$this->mongo = new Mongo(); // connect
		$this->db = $this->mongo->selectDB("wt365");
		$this->profileMongo = new ProfileMongo();
	}

	public function tearDown() {
		$this->db->profiles->drop();
	}

	public function testStoreProfileToMongoDB() {
		$user = "webhat";

		$profiles = $this->db->profiles;

		$ret = $this->profileMongo->getUser($user);
		$this->assertNull($ret);

		$ret = $this->profileMongo->setUser($user);
		$this->assertArrayHasKey( 'username', $ret);

		$ret = $this->profileMongo->getUser($user);
		$this->assertEquals( $user, $ret);

		$this->profileMongo->store();

		$cursor = $profiles->findOne( array('username' => $user));

		$this->assertEquals( 'webhat', $cursor["username"]);

		$profiles->remove( array( 'username' => 'webhat'));
	}

	public function testResetProfileFromMongoDB() {
		$user = 'webhat';
		$expected = array( 'username' => $user);

		$this->profileMongo->setUser( $user);

		$this->profileMongo->store();

		$this->profileMongo->setUser( 'redhat');

		$actual = $this->profileMongo->reset();

		$this->assertEquals($expected['username'], $this->profileMongo->getUser());
	}

	public function testChangeUserInMongoDB() {
		$expected = 'redhat';

		$this->profileMongo->setUser( 'webhat');

		$this->profileMongo->store();

		$this->profileMongo->setUser( $expected);

		$this->profileMongo->store();

		$actual = $this->profileMongo->getUser();

		$this->assertEquals( $expected, $this->profileMongo->getUser());
	}
}

?>
