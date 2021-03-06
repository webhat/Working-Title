<?php

require_once('bootstrap.php');
require_once('smartyload.php');
require_once('loggedinas.php');
require_once('gettext.php');

if($loggedinas == "") {
	$smarty->assign( 'LOGIN', 'display:block');
	$smarty->assign( 'LOGOUT', 'display:none');
	$smarty->assign( 'USER', '');
	$smarty->assign( 'ISMAKER', $ismaker);
} else {
	$smarty->assign( 'LOGIN', 'display:none');
	$smarty->assign( 'LOGOUT', 'display:block');
	$smarty->assign( 'USER', $loggedinas);
	$smarty->assign( 'ISMAKER', $ismaker);
}

$smarty->display( '../html/login.html');
?>
