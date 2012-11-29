<?php

class FanProfile extends ProfileMongo {

	public function __construct( $user = null) {
		parent::__construct();
		if( !is_string($user)) {
			throw new FanException("Cannot create user without a username");
		}
		$this->setUser( $user);
		$this->reset();
	}

	public function setFanFirstName( $firstname) {
		$this->setProperty( 'firstname', $firstname);
	}

	public function setFanLastName( $lastname) {
		$this->setProperty( 'lastname', $lastname);
	}

	public function addPayment( $payment) {
		$payments = $this->getProperty( 'payments');
		if( is_null($payments))
			$payments = array();

		$size = count($payments);
		$payments[$size] = $payment;

		$this->setProperty( 'payments', $payments);
		$this->store();
	}
}
 
?>
