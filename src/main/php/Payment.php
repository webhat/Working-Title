<?php

class Payment extends MongoConnection {

	public function updatePayPal($pay) {
		$this->db->payments->update(
				array("custom" => $pay['custom']),
				$pay,
				array("upsert" => true)
				);
	}

	public function getPayPal($id) {
		return $this->db->payments->findOne( array( "custom" => $id));
	}
}
?>
