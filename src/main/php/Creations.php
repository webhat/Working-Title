<?php

class Creations {
	private $profile = array();
	private $db = null;

	public function __construct( $user = null) {
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

	function getLatest( $index = 0) {
		$profiles = $this->db->profiles;

		$needle = array( 'creations.content' => array('$exists' => true));
		$results = array( "username", "creations");
		$cursor = $profiles->find($needle, $results);

		//var_export(iterator_to_array($cursor));

		$arr = iterator_to_array($cursor);

		$makers = array();

		foreach($arr as $elem) {
			if( sizeof($elem['creations']) > $index )
			array_push( $makers, array( 'username' => $elem['username'], 'creation' => $elem['creations'][$index]['content']));
		}
		//var_export($makers);

		return $makers;
	}
}
?>
