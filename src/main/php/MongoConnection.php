<?php

class MongoConnection {
	protected $db = null;

	public function __construct( $user = null) {
		try {
			$this->mongo = new Mongo(); // connect
		} catch (Exception $e) {
			print("ERROR: Database unreachable");
			exit(-1);
		}
		$config = new WTConfig();
		$this->db = $this->mongo->selectDB($config->wtdatabase);
		//$this->db = $this->mongo->selectDB("wt365");
	}
}
?>
