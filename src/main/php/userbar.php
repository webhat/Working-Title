<?php

require_once('bootstrap.php');
require_once('smartyload.php');
require_once('loggedinas.php');

if($loggedinas == "") {
	$smarty->assign( 'LOGIN', 'display:block');
} else {
	$smarty->assign( 'LOGIN', 'display:none');
}

$smarty->display( '../html/login.html');
?>
