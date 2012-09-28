<?php

class MakerProfile extends ProfileMongo {

	public function __construct( $user = null) {
		parent::__construct();
		if( !is_string($user)) {
			throw new MakerException("Cannot create user without a username");
		}
		$this->setUser( $user);
		$this->store();
	}

	public function setMakerWhoAmI( $whoami) {
		$this->setProperty( 'whoami', $whoami);
	}

	public function setMakerWhatDoIDo( $whatdoido) {
		$this->setProperty( 'whatdoido', $whatdoido);
	}

	public function setMakerWhyDoIDoThis( $whydoidothis) {
		$this->setProperty( 'whydoidothis', $whydoidothis);
	}

	public function setMakerWhatWillIDoWithYourSupport( $whatwillidowithyoursupport) {
		$this->setProperty( 'whatwillidowithyoursupport', $whatwillidowithyoursupport);
	}

	public function setMakerFirstName( $firstname) {
		$this->setProperty( 'firstname', $firstname);
	}

	public function setMakerLastName( $lastname) {
		$this->setProperty( 'lastname', $lastname);
	}

	public function addCreation( $creation) {
		$creations = $this->getProperty( 'creations');
		if( is_null($creations))
			$creations = array();

		$epoch = time();
		$creations[$epoch] = $creation;
#print "\n". $epoch . "\n";

		$this->setProperty( 'creations', $creations);
	}
}
 
?>
