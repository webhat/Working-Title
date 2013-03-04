<?php

require_once 'bootstrap.php';

$user = "";
$hash = "";
if(array_key_exists( 'user', $_COOKIE))
	$user = (string) $_COOKIE['user'];
if(array_key_exists( 'hash', $_COOKIE))
	$hash = (string) $_COOKIE['hash'];

$loggedinas = "";
$ismaker = false;

if( $hash != "") {
	$ul = new UserLogin( $user);
	$ul->reset();

	$dbcookie = $ul->getCookie();

	if( $hash == $dbcookie) {
		$loggedinas = $ul->getUser();
		$ismaker = $ul->isMaker();
	}
}


?>
