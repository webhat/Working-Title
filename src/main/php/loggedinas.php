<?php

if(array_key_exists( 'user', $_COOKIE))
	$user = (string) $_COOKIE['user'];
if(array_key_exists( 'hash', $_COOKIE))
	$hash = (string) $_COOKIE['hash'];

$ul = new UserLogin( $user);
$ul->reset();

$dbcookie = $ul->getCookie();

$loggedinas = "";

if( $hash == $dbcookie) {
	$loggedinas = $ul->getUser();
}


?>
