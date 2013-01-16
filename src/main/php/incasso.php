<?php

require 'bootstrap.php';
require 'gettext.php';

$pay = $_POST;

$mail = new Mail();
$payment = new Payment();

$payment->updateIncasso( $pay);

$mail->concierge( $pay);
	
?>
<html>
	<head>
	<meta http-equiv="refresh" content="5;URL='/'">
	</head>
	<body>
		<?=_("Opdracht ontvangen"); ?>
	</body>
</html>
