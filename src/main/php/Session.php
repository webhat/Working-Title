<?php

class Session {

	public function get( $key = "") {

	}

	public function set( $key = "", $val = "") {

	}

	public function update() {
		if( !isset($_SESSION['last_access']) || (time() - $_SESSION['last_access']) > 60 )
			$_SESSION['last_access'] = time(); 
	}

	public function test() {
		return "test";
	}
}

?>
