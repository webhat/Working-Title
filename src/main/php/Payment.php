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

	private function update( $transx, $pay) {
		$this->db->payments->update(
				array("transx" => $transx),
				$pay,
				array("upsert" => true)
		);
	}
}
?>
