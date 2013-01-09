<?php

class Payments extends MongoConnection {
	public function __construct() {
	}

	public function hello($what = 'World') {
		return "Hello $what";
	}
}
?>
