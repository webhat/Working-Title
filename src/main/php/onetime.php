<?php

require_once('bootstrap.php');

$user = "";
$hash = "";

if(array_key_exists( 'hash', $_GET))
	$hash = (string) $_GET['hash'];
if(array_key_exists( 'user', $_GET))
	$user = (string) $_GET['user'];

$ul = new UserLogin($user);
$ul->reset();

$dbcookie = $ul->getCookie();

$loggedinas = "";

if( $hash == $dbcookie) {
		$ul->setProperty( 'cookie', "");
		$ul->store();
?>
<script>
	top.location = "/create.php?id=<?php print $user; ?>";
</script>
<?php
}
?>
