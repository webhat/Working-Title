<?php

date_default_timezone_set("UTC");

setcookie("user", "", time()+5184000);
setcookie("hash", "", time()+5184000);

require('bootstrap.php');
require('loggedinas.php');
require('gettext.php');

$maker = '';
if(array_key_exists( 'id', $_GET))
	$maker = (string) $_GET['id'];

$smarty = new Smarty;

$p = new MakerProfile( $maker);
$p->reset();

$smarty->setConfigDir(getcwd() ."/../resources/smarty");
$smarty->setCacheDir('/tmp/smarty/cache');
$smarty->setCompileDir('/tmp/smarty/compile');

$smarty->caching = 0;
$smarty->compile_check = true;
$smarty->force_compile = true;
$smarty->debugging = false;

$smarty->registerPlugin("function","gettext", "smarty_function_gettext", false);

if( $loggedinas != $maker) {
	$smarty->assign( 'EDIT', 'display:none;');
} else {
	$smarty->assign( 'EDIT', 'display:inline;');
}

$mail = $p->getProperty('mail');
$profilename = $p->getProperty('profilename');
$site = $p->getProperty('site');

$smarty->assign( 'USER', $p->getUser());
$smarty->assign( 'WT', $profilename);
$smarty->assign( 'MAIL', ''. $mail);
$smarty->assign( 'SITE', ''. $site);
$smarty->assign( 'PROFILENAME', ''. $profilename);

$smarty->display( 'smarty/reset.tpl');

?>
