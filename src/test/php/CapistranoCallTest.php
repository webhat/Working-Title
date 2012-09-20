<?php

class CapistranoCallTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
	}

	public function tearDown() {
	}

	public function testCapistranoCall() {
		$capistrano = new CapistranoCall();

		$this->assertTrue( $capistrano->call());
	}
}
 
?>
