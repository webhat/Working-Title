<?php

require_once('bootstrap.php');
require_once('smartyload.php');
require_once('gettext.php');

$maker = 'Unknown';
if(array_key_exists( 'id', $_GET))
	$maker = (string) $_GET['id'];

$m = new MongoConnection();
$m->setDB("wt365");

$out = (array)$m->getDB()->selectCollection($maker)->findOne();
$stats = (array)$m->getDB()->selectCollection($maker .".data")->findOne();

$smarty->assign( 'HOST', ''. $maker);
$smarty->assign( 'USER', ''. $maker);

$smarty->assign( 'BUSINESS', ''. $out['business']);
$smarty->assign( 'CITY', ''. $out['city']);
$smarty->assign( 'EMAIL', ''. $out['email']);
$smarty->assign( 'PHONE', ''. $out['phone']);
$smarty->assign( 'URL', ''. $out['url']);
$smarty->assign( 'DESCRIPTION', ''. $out['description']);
$smarty->assign( 'ADDRESS', ''. $out['address']);
$smarty->assign( 'STATE', ''. $out['state']);
$smarty->assign( 'POSTCODE', ''. $out['postcode']);
$smarty->assign( 'COUNTRY', ''. $out['country']);
$smarty->assign( 'GOAL', ''. $out['goal']);
$smarty->assign( 'COMPLETED', ''. $stats['current']);
$smarty->assign( 'DAYS', ''. $stats['days']);
$smarty->assign( 'LONGDESC', ''. $out['longdesc']);
$smarty->assign( 'IMAGE', ''. $out['image']);
$smarty->assign( 'IMAGEALT', ''. $out['imagealt']);

$smarty->display( 'smarty/whitelabel.tpl.html');

?>
