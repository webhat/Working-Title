<?php

class UserLogin extends ProfileMongo {

	private $salt = "salty";

	public function setPassword( $passwd) {
		$this->setProperty( 'salt', $this->salt);
		$this->setProperty( 'passwd', $this->generatePassword( $passwd));
	}

	public function passwordCheck( $passwd) {
		$this->reset();
		$dbpass = $this->getProperty( "passwd");
		$uspass = $this->generatePassword( $passwd);

		if( $dbpass == $uspass)
			return true;

		return false;
	}

	private function generatePassword( $passwd) {
		$this->salt = md5(time());
		return hash('sha512', $passwd . $this->salt);
	}

	public function generateCookie() {
		$cookie = "";
		$user = $this->getUser();

		$cookie = $this->generatePassword( "". time() ."-". $user ."". mt_rand());

		$this->setProperty( 'cookie', $cookie);
		$this->store();
		return $cookie;
	}

	public function getCookie() {
		$cookie = $this->getProperty( 'cookie');
		return $cookie;
	}
	/*
	$data = "hello"; 

	foreach (hash_algos() as $v) { 
		$r = hash($v, $data, false); 
		printf("%-12s %3d %s\n", $v, strlen($r), $r); 
	} 
	*/
}

?>
