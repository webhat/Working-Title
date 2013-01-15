<?php

class FaceBookDataTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
	}

	public function tearDown() {
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
		$this->assertEquals( $blob, $actual);
	}

	/**
	 * @dataProvider provider
	 * @depends testAddNoUser
	 */
	public function testAdd( $blob) {
		$fbdata = new FaceBookData();
		$blob['code'] = md5($blob['code'] . $blob['username']);
		$blob['wtusername'] = "wt". $blob['username'];

		$fbdata->add($blob);
		$actual = (array) $fbdata->search( array( "username" => $blob['username']));
		$this->assertEquals( $blob, $actual);
	}

	/**
	 * @dataProvider provider
	 * @depends testAddNoUser
	 */
	public function testLoginNoUser( $blob) {
		$this->markTestSkipped('must be revisited.');
		$fbdata = new FaceBookData();

		$actual = $fbdata->logmein( $blob);
		$this->assertEquals( "", $actual);
	}

	/**
	 * @dataProvider provider
	 * @depends testAdd
	 */
	public function testLogin( $blob) {
		$fbdata = new FaceBookData();
		$blob['wtusername'] = "wt". $blob['username'];

		$actual = $fbdata->logmein( $blob);
		$this->assertEquals( $blob['wtusername'], $actual);
	}

	public function provider() {
		return array(
				array(array( "id" => "1234567890", "username" => "testuser0", "code" => "XXXXX")),
				array(array( "id" => "1234567891", "username" => "testuser1", "code" => "XXXXY")),
				array(array( "id" => "1234567892", "username" => "testuser2", "code" => "XXXXZ"))
				);
	}
}
 
?>
