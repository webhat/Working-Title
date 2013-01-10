<?php

require_once 'loggedinas.php';

$json = "";
if(array_key_exists( 'json', $_POST))
	$json = json_decode( (string) $_POST['json']);

if($json == "") return;

$user = (string) $loggedinas;

$ul = new MakerProfile($user);
$ul->reset();


if($json->creation) {
	$filename = $json->filename;
	$filename = preg_replace("/[sml]_/","",$filename);
	$ul->removeCreation( $filename);
}

if($json->incentive)
	$ul->removeIncentive( $json->code);


$ul->store();

?>
