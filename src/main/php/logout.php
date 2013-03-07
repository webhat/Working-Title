<?php

require_once('loggedinas.php');

preg_match('/[^.]+\.[^.]+$/', $_SERVER['HTTP_HOST'], $matches);
$domain = ".". $matches[0];

setcookie("user", "", time()-5184000, "/", $domain);
setcookie("hash", "", time()-5184000, "/", $domain);


if($ismaker)
	header("Location: /maker/$loggedinas");
else
	header("Location: /");
?>
