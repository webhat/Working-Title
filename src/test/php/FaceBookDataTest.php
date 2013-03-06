<?php

class FaceBookDataTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
	}

	public function tearDown() {
		$fbdata = new FaceBookData();

		$fbdata->getDB()->social->fb->drop();
		$fbdata->getDB()->profiles->drop();
	}

	public function testFaceBookDataTest() {
		$this->markTestSkipped('must be revisited.');
	}

	/**
	 * @dataProvider provider
	 */
	public function testAddNoUser( $blob) {
		$fbdata = new FaceBookData();
		unset( $blob['username']);
		$blob['code'] = md5($blob['code']);

		$fbdata->add( $blob);
		$actual = (array) $fbdata->search( array( "id" => $blob['id']));

		$blob['wtusername'] = $blob['name'];
		$this->assertEquals( $blob, $actual);
	}

	/**
	 * @dataProvider provider
	 * @depends testAddNoUser
	 */
	public function testAdd( $blob) {
		$fbdata = new FaceBookData();
		$blob['code'] = md5($blob['code'] . $blob['username']);
		$blob['wtusername'] = $blob['username'];

		$fbdata->add($blob);
		$actual = (array) $fbdata->search( array( "username" => $blob['username']));
		$this->assertEquals( $blob, $actual);
	}

	/**
	 * @dataProvider provider
	 * @depends testAddNoUser
	 * @see https://github.com/webhat/Working-Title/issues/166
	 */
	public function testAddGitHub166( $blob) {
		$ignoredusername =  "USERNAME2";
		$fbdata = new FaceBookData();
		$blob['code'] = md5($blob['code'] . $blob['username']);
		$blob['wtusername'] = $blob['username'];

		$fbdata->add($blob, $blob['username']);

		$fbdata->add($blob, $ignoredusername);
		$actual = (array) $fbdata->search( array( "username" => $blob['username']));
		$this->assertEquals( $blob, $actual);

		$actual = (array) $fbdata->search( array( "username" => $ignoredusername));
		$this->assertNotEquals( $blob, $actual);
	}

	/**
	 * @dataProvider provider
	 * @depends testAddNoUser
	 */
	public function testLoginNoUser( $blob) {
		$fbdata = new FaceBookData();

		$actual = $fbdata->logmein( $blob);
		$this->assertEquals( "", $actual);
	}

	/**
	 * @dataProvider provider
	 * @depends testAdd
	 */
	public function testLogin( $blob) {
		$ul = new UserLogin( "wt". $blob['username']);
		$ul->setProperty("fbid", $blob['id']);
		$ul->store();
		$fbdata = new FaceBookData();
		$blob['wtusername'] = "wt". $blob['username'];

		$actual = $fbdata->logmein( $blob);
		$this->assertEquals( $blob['wtusername'], $actual);
	}

	/**
	 * @dataProvider provider
	 */
	public function testCreateUserWithFaceBook($blob) {
		$fbdata = new FaceBookData();
		$blob['wtusername'] = $blob['username'];
		$fbdata->createUserWithFaceBook($blob);

		$actual = $fbdata->logmein( $blob);
		$this->assertEquals( $blob['wtusername'], $actual);
	}

	/**
	 * @dataProvider provider
	 * @expectedException MyMongoException
	 */
	public function testCreateUserWithFaceBookUserExists($blob) {
		$blob['wtusername'] = $blob['username'];

		$ul = new UserLogin( $blob['wtusername']);
		$ul->store();

		$fbdata = new FaceBookData();
		$fbdata->createUserWithFaceBook($blob);
	}

	public function provider() {
		return array(
				array(array( "id" => "1234567890", "name" => "Ignaz Semmelweis", "username" => "testuser0", "code" => "XXXXX")),
				array(array( "id" => "1234567891", "name" => "Louis Pasteur", "username" => "testuser1", "code" => "XXXXY")),
				array(array( "id" => "1234567892", "name" => "Florence Nightingale", "username" => "testuser2", "code" => "XXXXZ"))
				);
	}
}
 
?>
