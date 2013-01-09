<?php

class Users implements Countable {
	private $db;
	private $results;
	public function __construct() {
		try {
			$this->mongo = new Mongo(); // connect
		} catch (Exception $e) {
			print("ERROR: Database unreachable");
			exit(-1);
		}
		$config = new WTConfig();
		//$this->db = $this->mongo->selectDB($config->wtdatabase);
		$this->db = $this->mongo->selectDB("wt365");
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
			array_push($users, array(
						"username" => $user['username'],
						"lastlogin" => isset($user['lastlogin'])?$user['lastlogin']:null,
						"mail" => isset($user['mail'])?$user['mail']:null
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
