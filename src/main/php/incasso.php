<?php

require 'bootstrap.php';

$mail = new Mail();

$mail->concierge($_POST);
	
?>
<html>
	<head>
	<meta http-equiv="refresh" content="5;URL='/'">
	</head>
	<body>
		Opdracht ontvangen
	</body>
</html>
