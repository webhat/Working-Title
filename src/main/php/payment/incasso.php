<?php

require_once '../bootstrap.php';
require_once '../gettext.php';

// XXX: hack to make Swift work DON'T REMOVE!!!
chdir("../");

$pay = $_POST;

$mail = new Mail();
$payment = new Payment();
$success = "Payment Successful";
$gaevent = "complete";

try {
$payment->updateIncasso( $pay);
} catch( InvalidArgumentException $e) {
	$success = "Payment NOT Successful";
	$gaevent = "failed";
}
//$mail->concierge( $pay);
	
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<script>
	$(window.opener.document).ready(function() {
			window.opener.document.getElementById('paytext').innerHTML = "<?= _($success); ?>" ;
			if("<?= $gaevent ?>" == "complete")
				window.opener.document.getElementById('paysuc').style.display = "inline" ;
			_gaq.push(['_trackEvent', 'payment', '<?= $gaevent; ?>']);
			setTimeout(window.close, 2000);
	});
</script>
<script>
		var _gaq=[['_setAccount','UA-34506988-1'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<html>
	<head>
	<meta http-equiv="refresh" content="5;URL='/'">
	</head>
	<body>
		<?=_("Opdracht ontvangen"); ?>
	</body>
</html>
