<?php

class MongoTest extends PHPUnit_Framework_TestCase {

	private $mongo = null;
	private $db = null;

	public function setUp() {
		$this->mongo = new Mongo(); // connect
		$this->db = $this->mongo->selectDB("example");
	}

	public function tearDown() {
	}

	public function testStoreToMongoDB() {
		$profiles = $this->db->profiles;
		$profile = array( "username" => "webhat", "firstname" => "Daniël", "lastname" => "Crompton", "about" => "Does cool stuff with MongoDB" );
		$profiles->insert($profile);

		$cursor = $profiles->findOne( array('username' => 'webhat'));

		$this->assertEquals('Daniël', $cursor["firstname"]);
		$this->assertEquals('Crompton', $cursor["lastname"]);
		$this->assertNotEquals('redhat', $cursor["username"]);

		$profiles->remove( array('username' => 'webhat'));
	}
}
 
?>
