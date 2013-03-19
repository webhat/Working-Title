<?php

require_once("bootstrap.php");
require_once("loggedinas.php");
require_once("gettext.php");
require_once("smartyload.php");

$maker = $loggedinas;

if($maker == '') exit;

error_reporting(0);

$p = new MakerProfile( $maker);
$p->reset();

$mailaddr = $p->getProperty('mail');
$inc = $p->getProperty('incentives');

$smarty->assign('USER', $maker);
$smarty->assign('WELCOMEGIFT', "Welcome!");
try {
	$smarty->assign('INC1', array(
				"url" => "http://workingtitle365.com/payments.php?id=". $maker ."&inc=". $inc[0]['code'],
				"title" => $inc[0]['title'],
				"value" => $inc[0]['amount'] . " cent/day",
				"desc" => $inc[0]['desc'],
				));
	$smarty->assign('INC2', array(
				"url" => "http://workingtitle365.com/payments.php?id=". $maker ."&inc=". $inc[1]['code'],
				"title" => $inc[1]['title'],
				"value" => $inc[1]['amount'] . " cent/day",
				"desc" => $inc[1]['desc'],
				));
	$smarty->assign('INC3', array(
				"url" => "http://workingtitle365.com/payments.php?id=". $maker ."&inc=". $inc[2]['code'],
				"title" => $inc[2]['title'],
				"value" => $inc[2]['amount'] . " cent/day",
				"desc" => $inc[2]['desc'],
				));
} catch( Exception $e) {
	echo "Error: not enough incentives";
}

$mailmessage = array();
$mailmessage['body'] = $smarty->fetch('smarty/mail/maker_'. $locale['lang'] .'.tpl.html');
$mailmessage['SUBJECT'] = "WT365 Fan Mail - Remember to change the subject";
$mailmessage['USER'] = $maker;

$to = array( "name" => $maker, "mail" => $mailaddr);

$mail = new Mail();

$mail->send($to, $mailmessage);

echo $mailmessage['body'];

?>
        <script>
            var _gaq=[['_setAccount','UA-34506988-1'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
