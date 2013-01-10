<?php

class MakerProfile extends ProfileMongo {

	public function __construct( $user = null) {
		parent::__construct();
		if( !is_string($user)) {
			throw new MakerException("Cannot create user without a username");
		}
		$this->setUser( $user);
		$this->reset();
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

		$size = count($creations);
		$creations[$size] = $creation;

		$this->setProperty( 'creations', $creations);
		$this->store();
	}

	public function addIncentive( $incentive) {
		$incentives = $this->getProperty( 'incentives');
		if( is_null($incentives))
			$incentives = array();

		$size = count($incentives);
		$incentives[$size] = $incentive;

		$this->setProperty( 'incentives', $incentives);
		$this->store();
	}

	public function removeCreation( $filename) {
		$creations = $this->getProperty( 'creations');
		if( is_null($creations))
			$creations = array();
		$creations_out = array();

		$size = count($creations);
		for($i = 0; $i < $size; $i++) {
			if($creations[$i]["content"] == $filename) {
				continue;
			}
			array_push($creations_out, $creations[$i]);
		}

		$this->setProperty( 'creations', $creations_out);
		$this->store();
	}

	public function removeIncentive( $code) {
		$incentives = $this->getProperty( 'incentives');
		if( is_null($incentives))
			$incentives = array();
		$incentives_out = array();

		$size = count($incentives);
		for($i = 0; $i < $size; $i++) {
			if($incentives[$i]["code"] == $code) {
				continue;
			}
			array_push($incentives_out, $incentives[$i]);
		}

		$this->setProperty( 'incentives', $incentives_out);
		$this->store();
	}
}
 
?>
