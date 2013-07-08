<?php

class ProfileMongo {

	private $profile = array();
	private $realusername;
	private $dirty = FALSE;

	public function __construct( $user = null) {
		try {
			$this->mongo = new Mongo(); // connect
		} catch (Exception $e) {
			print("ERROR: Database unreachable");
			exit(-1);
		}
		$config = new WTConfig();
		$this->mongo->authenticate($config->mongo["user"], $config->mongo["pass"]);
		$this->db = $this->mongo->selectDB($config->wtdatabase);

		if( is_string( $user))
			$this->setUser( $user);
	}
	
	public function isMaker() {
		if( $this->profile == null || !array_key_exists( 'terms', $this->profile))
				return false;
		return true;
	}

	public function getUser() {
		if( $this->profile == null || !array_key_exists( 'username', $this->profile))
				return null;
		return $this->getProperty('username');
	}

	private function getRealUser() {
		return $this->realusername;
	}

	public function store() {
		$this->db->profiles->update(
				array( 'username' => $this->getRealUser()),
				$this->profile,
				array("upsert" => true)
				);

		$this->profile = $this->db->profiles->findOne( array('username' => $this->getUser()));

		if($this->dirty) {
			$this->realusername = $this->profile['username'];
		}
		$this->dirty = FALSE;
	}

	public function reset() {
		$profiles = $this->db->profiles;
		$user = $this->getRealUser();

		if( $user == "") {
			$user = $this->getUser();
		}

		$search = array('username' => $user);

		$this->profile = $profiles->findOne( $search);
		if( is_null($this->profile)) {
			$search = array('mail' => $user);

			$this->profile = $profiles->findOne( $search);
			if( is_null($this->profile)) {
				$this->profile = array('username' => $user);
			}
		}

		//error_log(var_export($this, true));

		return $this->profile;
	}

	public function setUser( $user) {
		if(!$this->dirty && array_key_exists( 'username', $this->profile)) {
			$this->realusername = $this->profile['username'];
			$this->dirty = TRUE;
		} else
			$this->realusername = $user;

		$this->setProperty( 'username', $user);
		return $this->profile;
	}

	public function setProperty( $key, $value) {
		if(is_string($value))
			$this->profile[$key] = (string)$value;
		else if(is_array($value))
			$this->profile[$key] = (array)$value;
		else if(is_int($value))
			$this->profile[$key] = (int)$value;
	}

	public function getProperty( $key) {
		if( !is_null($this->profile) && (array_key_exists( $key, $this->profile))) {
			return $this->profile[$key];
		} else
			return null;
	}
}

?>
