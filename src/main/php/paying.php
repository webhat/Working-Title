<?php

require_once 'loggedinas.php';

$json = "";
if(array_key_exists( 'json', $_POST))
	$json = json_decode( (string) $_POST['json']);

if($json == "") return;

// FIXME: When fans are added
$user = "";//(string) $loggedinas;

$fp = new FanProfile($user);

$hash = $fp->addPayment( $json);

$fp->store();

echo "{ \"transaction\":\"". $hash ."\"}";
?>
