<?php

require_once 'loggedinas.php';

$json = "";
if(array_key_exists( 'json', $_POST))
	$json = json_decode( (string) $_POST['json']);

if($json == "") return;

$json->code = md5($_POST['json']);

$user = (string) $loggedinas;

$ul = new MakerProfile($user);
$ul->reset();

$ul->addIncentive( $json);

$ul->store();

?>
