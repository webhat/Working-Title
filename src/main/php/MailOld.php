<?php

if(file_exists("../../../ext/php/lib/swift_required.php"))
	include_once "../../../ext/php/lib/swift_required.php";
if(file_exists("ext/php/lib/swift_required.php"))
	include_once "ext/php/lib/swift_required.php";
include_once "bootstrap.php";

class MailOld {
	function concierge( $data) {
		$c = new WTConfig();

		$from = array( $c->service["mail"] => $c->service["name"]);
		$to = array( $c->service["mail"] => $c->service["name"]);
		$subject = "Automatisch Incasso";

		$transport = Swift_SmtpTransport::newInstance(
				$c->mandrill['host'],
				$c->mandrill['port']
			);
		$transport->setUsername($c->mandrill['username']);
		$transport->setPassword($c->mandrill['password']);
		$swift = Swift_Mailer::newInstance($transport);

		$message = new Swift_Message($subject);
		$message->setFrom($from);
		$message->setBody(var_export($data, true), 'text/plain');
		$message->setTo($to);

		if ($recipients = $swift->send($message, $failures)) {
			return true;
		} else {
			return false;
			print_r($failures);
		}

	}

	function send( $u) {
		$c = new WTConfig();

		$fname = $u->getProperty('fname');
		$lname = $u->getProperty('lname');
		$uname = $u->getProperty('username');

		$fullname = $fname?$fname." ":"" ."".$lname?$lname." ":"" ."". $uname;

		$from = array( $c->service["mail"] => $c->service["name"]);
		$to = array(
				  $u->getProperty('mail') => $fullname
				);

		$text = $c->service["name"] ."speaks plaintext";
		$html = "<em>". $c->service["name"] ."speaks <strong>HTML</strong></em>";
		$subject = $c->service["name"] .": Wachtwoord Reset";

		$arr = array(
				"FNAME" => $fname,
				"UNAME" => $uname,
				"LNAME" => $lname,
				"_rcpt" => $u->getProperty('mail'),
				"RESET" => "http://workingtitle365.com/create.php?id=". $uname ."&hash=". $u->generateCookie()
				);

		$json = json_encode($arr);

		$transport = Swift_SmtpTransport::newInstance(
				$c->mandrill['host'],
				$c->mandrill['port']
			);
		$transport->setUsername($c->mandrill['username']);
		$transport->setPassword($c->mandrill['password']);
		$swift = Swift_Mailer::newInstance($transport);

		$message = new Swift_Message($subject);
		$message->setFrom($from);
		$message->setBody($html, 'text/html');
		$message->setTo($to);
		//$message->addPart($text, 'text/plain');
		$headers = $message->getHeaders();
		$headers->addTextHeader('X-MC-MergeVars', $json);
		$headers->addTextHeader('X-MC-Template', "password reset");

		if ($recipients = $swift->send($message, $failures)) {
			return true;
		} else {
			return false;
			print_r($failures);
		}
	}
}

?>
