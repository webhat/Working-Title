<?php

require_once '../bootstrap.php';
require_once '../gettext.php';

// XXX: hack to make Swift work DON'T REMOVE!!!
chdir("../");

$pay = $_POST;

$mail = new Mail();
$payment = new Payment();

$payment->updateIncasso( $pay);

$mail->concierge( $pay);
	
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<script>
	$(window.opener.document).ready(function() {
			window.opener.document.getElementById('paytext').innerHTML = "<?= _("Payment Successful"); ?>" ;
			window.opener.document.getElementById('paysuc').style.display = "inline" ;
			window.close();
	});
</script>
<html>
	<head>
	<meta http-equiv="refresh" content="5;URL='/'">
	</head>
	<body>
		<?=_("Opdracht ontvangen"); ?>
	</body>
</html>
