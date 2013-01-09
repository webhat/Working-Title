<?php

class CapistranoCallTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
	}

	public function tearDown() {
	}

	public function testCapistranoCall() {
		$this->markTestSkipped('must be revisited.');
		$capistrano = new CapistranoCall();

		$this->assertTrue( $capistrano->call());
	}
}
 
?>
