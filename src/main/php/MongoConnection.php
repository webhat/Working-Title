<?php

class MongoConnection {
	protected $db = null;

	public function __construct( $user = null) {
		$config = new WTConfig();
		try {
			$this->mongo = new MongoClient("mongodb://".$config->mongo["user"].":".$config->mongo["pass"]."@".$config->mongo["host"].":".$config->mongo["port"].""); // connect
		} catch (Exception $e) {
			print("ERROR: Database unreachable");
			exit(-1);
		}
		$this->db = $this->mongo->selectDB($config->wtdatabase);
		//$this->db = $this->mongo->selectDB("wt365");
	}

	public function setDB( $db) {
		$this->db = $this->mongo->selectDB($config->wtdatabase);
	}

	public function getDB( $db = "") {
		if( $db == "") return $this->db;
		return $this->mongo->selectDB($config->wtdatabase);
	}
}
?>
