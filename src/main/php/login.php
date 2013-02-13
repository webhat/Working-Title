<?php

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Content-type: text/html");

require_once('bootstrap.php');
require_once('onetime.php');
require_once('gettext.php');

$user = "";
$pass = "";

$fail = _("Login failed");
$success = _("Login successful");

if(array_key_exists( 'user', $_POST))
	$user = (string) $_POST['user'];
if(array_key_exists( 'pass', $_POST))
	$pass = (string) $_POST['pass'];


if( $user == "" || $pass == "") {
	print $fail;
	exit();
}

preg_match('/[^.]+\.[^.]+$/', $_SERVER['HTTP_HOST'], $matches);
$domain = ".". $matches[0];

$ul = new UserLogin($user);

if( $ul->passwordCheck( $pass)) {
	$user = $ul->getUser();

	$ul->setProperty( "lastlogin", time());
	$ul->store();

	$ul = new UserLogin($user);
	$ul->reset();
	setcookie("user", $user, time()+5184000, "/", $domain);
	setcookie("hash", $ul->generateCookie(), time()+2592000, "/", $domain);

	error_log("SUCCESS");
	print $success;
} else {
	error_log("FAIL");
	print $fail;
	exit();
}


?>
<script>
	top.location = "/profile.php?id=<?php print $user; ?>";
</script>
