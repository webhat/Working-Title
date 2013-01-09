<?php

class Creations extends MongoConnection {
	private $profile = array();

	function getLatest( $index = 0) {
		$arr = $this->getCreations();

		$makers = array();

		foreach($arr as $elem) {
			$upload = $this->stripUpload( $elem['creations'][$index]['content']);
			if( sizeof($elem['creations']) > $index && array_key_exists( 'incentives', $elem) && sizeof($elem['incentives']) > 0)
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
