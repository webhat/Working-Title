<?php

require_once 'loggedinas.php';

$json = "";
if(array_key_exists( 'json', $_POST))
	$json = json_decode( (string) $_POST['json']);

if($json == "") return;

$user = (string) $loggedinas;

$ul = new MakerProfile($user);
$ul->reset();

$ul->removeCreation( $json->filename);

$ul->store();

?>
