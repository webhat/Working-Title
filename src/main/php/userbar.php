<?php

require_once('bootstrap.php');
require_once('smartyload.php');
require_once('loggedinas.php');

if($loggedinas == "") {
	$smarty->assign( 'LOGIN', 'display:block');
	$smarty->assign( 'LOGOUT', 'display:none');
	$smarty->assign( 'USER', '');
} else {
	$smarty->assign( 'LOGIN', 'display:none');
	$smarty->assign( 'LOGOUT', 'display:block');
	$smarty->assign( 'USER', $loggedinas);
}

$smarty->display( '../html/login.html');
?>
