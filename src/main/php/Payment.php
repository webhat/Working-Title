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
					"payments.uniq" => $transx,
					"payments.pending" => true
				)
		);
		$record = $record['payments'];
		//var_export( $record);
		//var_export( $transx);

		/* FIXME: exponetital growth */
		for( $it = 0; $it < count($record); $it++) {
			if($record[$it]['uniq'] == $transx) {
				$this->db->profiles->update(
						array(
							"payments.uniq" => $transx,
							"payments.pending" => true
						),
						array( "\$set" =>
							array( "payments.". $it .".pending" => false )
						),
						array(
							"upsert" => true
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

	public function getPaymentsCount($user = "") {
		$t = $this->db->profiles->findOne(
				array(
					"payments.maker" => $user,
					"payments.code" => array( "\$exists" => true)
					)
			);

		$cnt = 0;
		if(!empty($t) && !empty($t['payments']))
		foreach($t['payments'] as $p ) {
			if(array_key_exists('maker',$p) && $p['maker'] == $user)
				$cnt++;
		}
		//var_export($t);

		return $cnt;
	}

	public function getPayments($user = "") {
		$tr = $this->db->profiles->find(
				array(
					"payments.code" => array( "\$exists" => true)
					)
			);

		$tx = array();
		foreach($tr as $t)
			if($user != "") {
				if(!empty($t) && !empty($t['payments'])) {
					foreach($t['payments'] as $p ) {
						if(array_key_exists( 'maker', $p) && $p['maker'] == $user)
							$tx[] = $p;
					}
				}
			} else
				$tx = $t['payments'];

		return $tx;
	}
}
?>
