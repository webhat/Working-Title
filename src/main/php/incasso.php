<?php

require 'bootstrap.php';
require 'gettext.php';

$mail = new Mail();

$mail->concierge($_POST);
	
?>
<html>
	<head>
	<meta http-equiv="refresh" content="5;URL='/'">
	</head>
	<body>
		<?=_("Opdracht ontvangen"); ?>
	</body>
</html>
