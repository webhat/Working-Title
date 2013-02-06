<?php

class Payment extends MongoConnection {

	public function updatePayPal($pay) {
		$this->update( $pay['custom'], $pay);
	}

	public function getPayment($transx) {
		return $this->db->payments->findOne( array( "transx" => $transx));
	}

	public function updateIncasso( $pay) {
		if( !is_array($pay) || empty($pay))
			throw new InvalidArgumentException();
		$this->update( $pay['transx'], $pay);
	}

	public static function utf8_encode_array (&$array, $key = "") {
		if(is_array($array)) {
			array_walk ($array, 'Payment::utf8_encode_array');
		} else {
			$array = utf8_encode($array);
		}
	}

	private function update( $transx, $pay) {
		$this->utf8_encode_array($pay);
		$this->db->payments->update(
				array("transx" => $transx),
				$pay,
				array("upsert" => true)
		);

		$record =$this->db->profiles->findOne(
				array(
					"payments.code" => $transx,
					"payments.pending" => true
				)
		)['payments'];
		//var_export( $record);
		//var_export( $transx);

		/* FIXME: exponetital growth */
		for( $it = 0; $it < count($record); $it++) {
			if($record[$it]['code'] == $transx) {
				$this->db->profiles->update(
						array(
							"payments.code" => $transx,
							"payments.pending" => true
						),
						array( "\$set" =>
							array( "payments.". $it .".pending" => false )
						),
						array(
							"upsert" => true,
							"multiple" => true
						)
				);
				break;
			}
		}
	}

	public function setPayment( $user, $transx) {
		$fp = new FanProfile($user);
		$fp->addPayment( $transx);
		$fp->store();
	}

	public function getTransactions() {
		$t = $this->db->payments->find(
				array(),
			array(
				"transx" => true,
				"custom" => true
				)
		);
		return $t;
	}

	public function getTransaction($transx) {
		$t = $this->db->payments->find(
			array( "transx" => $transx)
		);
		return $t;
	}

	public function getPayments($user = "") {
		$t = $this->db->profiles->findOne(
				array(
					"username" => $user,
					"payments.code" => array( "\$exists" => true)
					)
			);

		$t = $t['payments'];
		//var_export($t);

		return $t;
	}
}
?>
