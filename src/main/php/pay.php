<?php

date_default_timezone_set("UTC");

require('bootstrap.php');
require('loggedinas.php');
require('gettext.php');

$maker = 'Unknown';
if(array_key_exists( 'id', $_GET))
	$maker = (string) $_GET['id'];

$transx = 'Unknown';
if(array_key_exists( 'transaction', $_GET))
	$transx = (string) $_GET['transaction'];

$smarty = new Smarty;

$c = new WTConfig();

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
$smarty->assign( 'LANG', $locale['lang']);
$smarty->assign( 'INCTEXT', ''. sprintf(_("incentive text"), $maker));
$smarty->assign( 'PAYPAL', $c->paypal['user']);
$smarty->assign( 'PAYPALSANDBOX', $c->paypal['sandbox']?"sandbox.":"");
$smarty->assign( 'PAYPALDEMO', $c->paypal['sandbox']?"demo.":"");
$smarty->assign( 'TRANSX', $transx);
$smarty->assign( 'WT', ''. $p->getProperty("profilename"));
$smarty->assign( 'PROFILE', ''. $p->getProperty('profile'));
$smarty->assign( 'MAIL', ''. $p->getProperty('mail'));

$smarty->display( 'smarty/pay.tpl');

?>
