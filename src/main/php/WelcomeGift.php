<?php

class WelcomeGift extends MongoConnection {
	public function __construct() {
		parent::__construct();
	}

	public function getGift($user) {
		$t = $this->db->welcomegift->findOne(
				array(
					"username" => $user
					)
				);

		return $t['gift'];
	}
}
?>
