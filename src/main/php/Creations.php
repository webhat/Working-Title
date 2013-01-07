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
		$this->db = $this->mongo->selectDB($config->wtdatabase);
		//$this->db = $this->mongo->selectDB("wt365");
	}

	function getLatest( $index = 0) {
		$arr = $this->getCreations();

		$makers = array();

		foreach($arr as $elem) {
			$upload = $this->stripUpload( $elem['creations'][$index]['content']);
			if( sizeof($elem['creations']) > $index && array_key_exists( 'incentives', $elem))
				array_push( $makers, array(
							'username' => $elem['username'],
							'creation' => $upload,
							'type' => $elem['creations'][$index]['type']
							)
						);
		}
		//var_export($makers);

		return $makers;
	}

	function getCreations( $myneedle = array()) {
		$profiles = $this->db->profiles;

		$needle = array( 'creations.content' => array('$exists' => true));

		$needle = array_merge($needle, $myneedle);    

		$results = array( "username", "creations", "incentives");
		$cursor = $profiles->find($needle, $results);

		return iterator_to_array($cursor);
	}

	function stripUpload( $image) {
		return preg_replace( "/\/upload\//", "", $image );
	}
}
?>
