<?php

class UserLogin extends ProfileMongo {

	private $salt = "salty";

	public function setPassword( $passwd) {
		$this->salt = md5(time());
		$this->setProperty( 'salt', $this->salt);
		$this->setProperty( 'passwd', $this->generatePassword( $passwd));
	}

	public function passwordCheck( $passwd) {
		$this->reset();
		$this->salt = $this->getProperty( "salt");
		$dbpass = $this->getProperty( "passwd");
		$uspass = $this->generatePassword( $passwd);

		if( $dbpass == $uspass)
			return true;

		return false;
	}

	private function generatePassword( $passwd) {
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
	public function subscribe() {
		$c = new WTConfig();
		$api = new MCAPI($c->mailchimp["apikey"]);
		$my_email = $this->getProperty('mail');
		$listId = $c->mailchimp["listid"];
 
		$fname = $this->getProperty('fname');
		if($fname == "") {
			$fname = $this->getProperty('username');
		}

		$merge_vars = array(
			'FNAME'=> $fname,
			'LNAME'=> $this->getProperty('lname')
		);

		$retval = $api->listSubscribe( $listId, $my_email, $merge_vars, "html", false);

		return $api->errorCode?false:true;
	}

	public function mailReset() {
		$m = new Mail();
		return $m->send($this);
	}
}

?>
