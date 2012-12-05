<?php

class UploadHelperTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
	}

	public function tearDown() {
	}

	public function testUploadType() {
		$type = UploadHelper::UploadType("image/gif");
		$this->assertEquals('image', $type);

		$type = UploadHelper::UploadType("video/mp4");
		$this->assertEquals('video', $type);

		$type = UploadHelper::UploadType("audio/ogg");
		$this->assertEquals('audio', $type);

		$type = UploadHelper::UploadType("text/plain");
		$this->assertEquals('text', $type);

	}
}
 
?>
