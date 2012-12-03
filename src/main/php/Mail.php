<?php

if(file_exists("../../../ext/php/lib/swift_required.php"))
	include_once "../../../ext/php/lib/swift_required.php";
if(file_exists("ext/php/lib/swift_required.php"))
	include_once "ext/php/lib/swift_required.php";

class Mail {
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
		$message->addPart($text, 'text/plain');

		if ($recipients = $swift->send($message, $failures)) {
			return true;
		} else {
			return false;
			print_r($failures);
		}
	}
}

?>
