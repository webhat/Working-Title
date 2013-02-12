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

		$payment = (array) $payment;

		$hash = md5(implode($payment));
		$uniq = md5(implode($payment) ."". time());

		$payment['code'] = $hash;
		$payment['uniq'] = $uniq;
		$payment['pending'] = true;

		$payments[] = $payment;

		$this->setProperty( 'payments', $payments);
		$this->store();

		return $uniq;
	}
}
 
?>
