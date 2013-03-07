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
$sku = "no incentive";
foreach( $payments as $payment) {
	if( array_key_exists('uniq', $payment) && $payment['uniq'] == $json->transx) {
		if( array_key_exists('incentive', $payment) && $payment['incentive'] != "")
			$sku = $payment['incentive'];
		$amount = $payment['amount'];
		break;
	}
}

echo "{ \"transaction\":\"". $json->code ."\", \"amount\":\"$amount\", \"sku\":\"$sku\"}";
?>
