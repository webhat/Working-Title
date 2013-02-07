<?php

date_default_timezone_set("UTC");

require('bootstrap.php');
require('loggedinas.php');
require('gettext.php');

$maker = 'Unknown';
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

$smarty->assign( 'USER', $p->getUser());
$smarty->assign( 'WT', ''. $p->getProperty("profilename"));
$smarty->assign( 'PIMG', ''. md5(strtolower(trim($p->getProperty('mail')))));
$smarty->assign( 'INCTEXT', ''. sprintf(_("incentive text"), $maker));
$smarty->assign( 'PROFILE', ''. $p->getProperty('profile'));
$smarty->assign( 'MAIL', ''. $p->getProperty('mail'));

$smarty->display( 'smarty/payments.tpl');

?>
