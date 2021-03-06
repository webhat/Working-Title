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

$smarty->assign( 'HIDE', $p->getProperty('hidden'));

$wG = new WelcomeGift();
$gift = "";
if(($gift = $wG->getGift($maker)) == null ) $gift = "";
$smarty->assign( 'WELCOMEGIFT', $gift);

/** FIXME: creation hack */
$fbcreation = "";
$crelist = $p->getProperty('creations');
if(sizeof($crelist))
	$fbcreation = $crelist[0]['content'] ."?". rand();
$smarty->assign( 'FBCREA', $fbcreation);

/** END: creation hack */

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
	$smarty->assign( 'E', false);
} else {
	$smarty->assign( 'EDIT', 'display:inline;');
	$smarty->assign( 'E', true);
}

function addhttp($url) {
	    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
				        $url = "http://" . $url;
								    }
			    return $url;
}
$fans = $p->getFans();

if($fans > 0)
	$smarty->assign( 'SHOWFANS', true);
else
	$smarty->assign( 'SHOWFANS', false);

if($fans < 10) $fans = "&nbsp;". $fans ."&nbsp;";

$smarty->assign( 'USER', $p->getUser());
$smarty->assign( 'FANS', $fans);
$smarty->assign( 'WT', ''. $p->getProperty("profilename"));
$smarty->assign( 'PROFILE', ''. $p->getProperty('profile'));
$smarty->assign( 'SITE', ''. addhttp($p->getProperty('site')));
$smarty->assign( 'PIMG', ''. md5(strtolower(trim($p->getProperty('mail')))));
$smarty->assign( 'WHO', ''. $p->getProperty('whoami'));
$smarty->assign( 'WHAT', ''. $p->getProperty('whatdoido'));
$smarty->assign( 'WHY', ''. $p->getProperty('whydoidothis'));
$smarty->assign( 'WANT', ''. $p->getProperty('whatdoiwant'));
$smarty->assign( 'WORK', ''. $p->getProperty('work'));

$smarty->display( 'smarty/profile.tpl');

?>
