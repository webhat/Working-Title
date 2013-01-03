<?php
error_reporting(0);

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Content-type: text/html");

require('bootstrap.php');

if(array_key_exists( 'page', $_GET))
	$page = (int) $_GET['page'];

$page--;

$smarty = new Smarty;

$crea = new Creations();

$smarty->setConfigDir(getcwd() ."/../resources/smarty");
$smarty->setCacheDir('/tmp/smarty/cache');
$smarty->setCompileDir('/tmp/smarty/compile');

$smarty->caching = 0;
$smarty->compile_check = true;
$smarty->force_compile = true;
$smarty->debugging = false;

$smarty->assign( 'USER', "Frontpage");
$smarty->assign( 'MAKERS', $crea->getLatest($page));

$smarty->display( 'smarty/frontpageplus.tpl');

?>
