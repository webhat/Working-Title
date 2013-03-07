<?php

class WelcomeGiftTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
	}

	public function tearDown() {
	}

	public function testEmptyGetGift() {
		$wG = new WelcomeGift();

		$this->assertNull( $wG->getGift(""));
	}

	public function testGetGift() {
		$wG = new WelcomeGift();

		$this->assertEquals('An exciting surprise', $wG->getGift("redhat"));
	}
}
 
?>
