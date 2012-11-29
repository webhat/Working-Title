<?php

require_once 'loggedinas.php';

$json = "";
if(array_key_exists( 'json', $_POST))
	$json = json_decode( (string) $_POST['json']);

if($json == "") return;

$json->code = md5($_POST['json']);
$json->pending = true;

$user = (string) $loggedinas;

$fp = new FanProfile($user);

$fp->addPayment( $json);

$fp->store();

echo "{ \"transaction\":\"". $json->code ."\"}";
?>
