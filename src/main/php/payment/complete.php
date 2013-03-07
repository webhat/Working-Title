<?php

require_once('../bootstrap.php');
require_once('../gettext.php');

$c = new WTConfig();

$pp_hostname = "www.". ($c->paypal['sandbox']?"sandbox.":"") ."paypal.com"; // Change to www.sandbox.paypal.com to test against sandbox

if(array_key_exists( 'auth', $_GET))
	$tx_token = (string) $_GET['auth'];
else
	exit();

// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-synch';
 
$auth_token = $c->paypal['datareturn'];
$req .= "&auth_id=$tx_token&at=$auth_token";
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://$pp_hostname/cgi-bin/webscr");
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
//set cacert.pem verisign certificate path in curl using 'CURLOPT_CAINFO' field here,
//if your server does not bundled with default verisign certificates.
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Host: $pp_hostname"));
$res = curl_exec($ch);
curl_close($ch);

if(!$res){
    //HTTP ERROR
			error_log("HTTP Error: ". var_export($res, true));
}else{
     // parse the data
    $lines = explode("\n", $res);
    $keyarray = array();
    if (strcmp ($lines[0], "SUCCESS") == 0) {
        for ($i=1; $i<count($lines);$i++){
        list($key,$val) = explode("=", $lines[$i]);
        $keyarray[urldecode($key)] = urldecode($val);
    }
    // check the payment_status is Completed
    // check that txn_id has not been previously processed
    // check that receiver_email is your Primary PayPal email
    // check that payment_amount/payment_currency are correct
    // process payment
    $firstname = $keyarray['first_name'];
    $lastname = $keyarray['last_name'];
    $itemname = $keyarray['item_name'];
    $amount = $keyarray['payment_gross'];
     
    echo ("<p><h3>Thank you for your purchase!</h3></p>");
     
    echo ("<b>Payment Details</b><br>\n");
    echo ("<li>Name: $firstname $lastname</li>\n");
    echo ("<li>Item: $itemname</li>\n");
    echo ("<li>Amount: $amount</li>\n");
    echo ("");
    }
    else if (strcmp ($lines[0], "FAIL") == 0) {
        // log for manual investigation
			error_log(var_export($lines, true));
    }
}
 
?>

 
Your transaction has been completed, and a receipt for your purchase has been emailed to you.<br> You may log into your account at <a href='https://www.paypal.com'>www.paypal.com</a> to view details of this transaction.<br>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<script>
	$(window.opener.document).ready(function() {
			window.opener.document.getElementById('paytext').innerHTML = "<?= _("Payment Successful"); ?>" ;
			window.opener.document.getElementById('paysuc').style.display = "inline" ;
			_gaq.push(['_trackEvent', 'payment', 'complete']);
			setTimeout(window.close, 2000);
	});
</script>
<script>
		var _gaq=[['_setAccount','UA-34506988-1'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
