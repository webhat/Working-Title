<?php

require_once 'loggedinas.php';

if(array_key_exists( 'username', $_POST))
	$user = (string) $_POST['username'];


$ul = new UserLogin($user);
$ul->reset();



foreach( $_POST as $prop => $val) {
	$storedprop = ereg_replace("[^A-Za-z0-9]", "", (string) $prop);
	$storedval = ereg_replace("[^A-Za-z0-9._@+-]", "", (string) $val);

	switch( $storedprop) {
		case "username": 
			$ul->setUser($storedval);
			break;
		case "passwd": 
			$ul->setPassword( (string)$val);
			break;
		default:
			$ul->setProperty($storedprop, $storedval);
	}
}
$ul->store();

?>
