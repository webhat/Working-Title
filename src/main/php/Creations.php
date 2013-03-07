<?php

class Creations extends MongoConnection {
	private $profile = array();

	function getLatest( $index = 0) {
		$arr = $this->getCreations();

		$makers = array();

		foreach($arr as $elem) {
			if(array_key_exists( 'hidden', $elem) && $elem['hidden'] == true) continue;
			$upload = $this->stripUpload( $elem['creations'][$index]['content']);
			if( sizeof($elem['creations']) > $index && array_key_exists( 'incentives', $elem) && sizeof($elem['incentives']) > 0) {
				$file = explode(".", $upload);
				$ext = array_pop($file);
				$webmfile = implode(".", $file) ."webm";
				array_push( $makers, array(
							'username' => $elem['username'],
							'creation' => $upload,
							'creationwebm' => $webmfile,
							'type' => $elem['creations'][$index]['type']
							)
						);
			}
		}
		//var_export($makers);

		return $makers;
	}

	function getCreations( $myneedle = array()) {
		$profiles = $this->db->profiles;

		$needle = array( 'creations.content' => array('$exists' => true));

		$needle = array_merge($needle, $myneedle);    

		$results = array( "username", "creations", "incentives", "hidden");
		$cursor = $profiles->find($needle, $results);

		return iterator_to_array($cursor);
	}

	function stripUpload( $image) {
		return preg_replace( "/\/upload\//", "", $image );
	}
}
?>
