<?php

class Users implements Countable {
	private $db;
	private $results;
	public function __construct() {
		$config = new WTConfig();
		try {
			$this->mongo = new MongoClient("mongodb://".$config->mongo["user"].":".$config->mongo["pass"]."@".$config->mongo["host"].":".$config->mongo["port"].""); // connect
		} catch (Exception $e) {
			print("ERROR: Database unreachable");
			exit(-1);
		}
		$this->mongo->authenticate($config->mongo["user"], $config->mongo["pass"]);
		$this->db = $this->mongo->selectDB($config->wtdatabase);
//		$this->db = $this->mongo->selectDB("wt365");
	}

	public function getUserNames() {
		$this->results = $this->db->profiles->find();
		$users = array();
		while($user = $this->results->getNext()) {
			array_push($users, $user['username']);
		}
		return $users;
	}

	public function getUsers() {
		$this->results = $this->db->profiles->find();
		$users = array();
		while($user = $this->results->getNext()) {
		if(array_key_exists('username', $user))
			array_push($users, array(
						"username" => $user['username'],
						"lastlogin" => isset($user['lastlogin'])?$user['lastlogin']:null,
						"mail" => isset($user['mail'])?$user['mail']:null,
						"fans" => isset($user['fans'])?$user['fans']:null
						)
					);
		}
		return $users;
	}

	public function count() {
		$this->results = $this->db->profiles->find();
		return $this->results->count();
	}
}

?>
