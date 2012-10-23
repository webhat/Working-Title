<?php

date_default_timezone_set("UTC");

require('bootstrap.php');
require('loggedinas.php');

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


if( $loggedinas != $maker) {
	$smarty->assign( 'EDIT', 'display:none;');
} else {
	$smarty->assign( 'EDIT', 'display:inline;');
}

$smarty->assign( 'USER', $p->getUser());
$smarty->assign( 'WT', 'Working Title 365 - '. $p->getUser());
$smarty->assign( 'PROFILE', ''. $p->getProperty('profile'));
$smarty->assign( 'WHO', ''. $p->getProperty('whoami'));
$smarty->assign( 'WHAT', ''. $p->getProperty('whatdoido'));
$smarty->assign( 'WHY', ''. $p->getProperty('whydoidothis'));
$smarty->assign( 'WORK', ''. $p->getProperty('work'));

$smarty->display( 'smarty/index.tpl');

?>
