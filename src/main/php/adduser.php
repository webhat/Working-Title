<?php

require_once('loggedinas.php');
require_once('gettext.php');

$json = "";
if(array_key_exists( 'json', $_POST))
	$json = json_decode( (string) $_POST['json']);

if($json == "") return;

$ul = new UserLogin($json->username);
$ul->reset();
if($ul->getCookie() != "" && $ul->getCookie() != $json->hash) {
	header("HTTP/1.1 403 User Exists");
	echo "{ \"error\": \"". _("Gebruiker bestaat al") ."\"}";
	return;
}


foreach( $json as $prop => $val) {
	$storedprop = preg_replace("[^A-Za-z0-9]", "", (string) $prop);
	$storedval = preg_replace("[:/^A-Za-z0-9._@+-]", "", (string) $val);

	switch( $storedprop) {
		case "username": 
			$ul->setUser($storedval);
			break;
		case "passwd": 
			$ul->setPassword( (string)$val);
			break;
		case "hash": 
			break;
		case "mail":
			$ret = $ul->subscribe($storedval);
		default:
			$ul->setProperty($storedprop, $storedval);
	}
}
$ul->store();

header("HTTP/1.1 201 Created");
echo "{ \"error\": \"". _("User Created") ."\"}";
?>
