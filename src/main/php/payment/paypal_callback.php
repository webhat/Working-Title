<?php

require_once('../bootstrap.php');

$c = new WTConfig();
 
// STEP 1: Read POST data
 
// reading posted data from directly from $_POST causes serialization 
// issues with array data in POST
// reading raw POST data from input stream instead. 
$raw_post_data = file_get_contents('php://input');
$raw_post_array = explode('&', $raw_post_data);
$myPost = array();
foreach ($raw_post_array as $keyval) {
  $keyval = explode ('=', $keyval);
  if (count($keyval) == 2)
     $myPost[(string)$keyval[0]] = urldecode((string)$keyval[1]);
}


// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-validate';
if(function_exists('get_magic_quotes_gpc')) {
   $get_magic_quotes_exists = true;
} 
foreach ($myPost as $key => $value) {        
   if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) { 
        $value = urlencode(stripslashes($value)); 
   } else {
        $value = urlencode($value);
   }
   $req .= "&$key=$value";
}
 
 
// STEP 2: Post IPN data back to paypal to validate
 
$ch = curl_init("https://www". ($c->paypal['sandbox']?".sandbox":"") .".paypal.com/cgi-bin/webscr");
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
// FIXME: dirty hack
if( $c->paypal['sandbox']) {
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
} else {
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
}
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
 
// In wamp like environments that do not come bundled with root authority certificates,
// please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set the directory path 
// of the certificate as shown below.
// curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
if( !($res = curl_exec($ch)) ) {
    error_log("Got " . curl_error($ch) . " when processing IPN data");
    curl_close($ch);
    exit;
}
curl_close($ch);
 
 
// STEP 3: Inspect IPN validation result and act accordingly
 
		error_log(var_export($myPost,true));
if (strcmp ($res, "VERIFIED") == 0) {
    // check whether the payment_status is Completed
    // check that txn_id has not been previously processed
    // check that receiver_email is your Primary PayPal email
    // check that payment_amount/payment_currency are correct
    // process payment
 
    // assign posted variables to local variables
		$payment = new Payment();
		$payment->updatePayPal($myPost);

    $item_name = $_POST['item_name'];
    $item_number = $_POST['item_number'];
    $payment_status = $_POST['payment_status'];
    $payment_amount = $_POST['mc_gross'];
    $payment_currency = $_POST['mc_currency'];
    $txn_id = $_POST['txn_id'];
    $receiver_email = $_POST['receiver_email'];
    $payer_email = $_POST['payer_email'];
} else if (strcmp ($res, "INVALID") == 0) {
    // log for manual investigation
}
?>
