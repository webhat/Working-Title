<?php

require_once 'loggedinas.php';

$json = "";
if(array_key_exists( 'json', $_POST))
	$json = json_decode( (string) $_POST['json']);

if($json == "") return;

$json->code = md5($_POST['json']);
$json->pending = true;

$user = "";//(string) $loggedinas;

$fp = new FanProfile($user);

$payments = $fp->getProperty( "payments");

$amount = 10000;
foreach( $payments as $payment) {
	if( $payment['code'] == $json->transx) {
		$amount = $payment['amount'];
	}
}

$fp->store();

echo "{ \"transaction\":\"". $json->code ."\", \"amount\":\"$amount\"}";
?>
