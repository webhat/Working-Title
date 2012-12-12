<?php

require_once('bootstrap.php');

$huser = "";
$hash = "";

if(array_key_exists( 'hash', $_GET))
	$hash = (string) $_GET['hash'];
if(array_key_exists( 'user', $_GET))
	$huser = (string) $_GET['user'];

$ul = new UserLogin($huser);
$ul->reset();

$dbcookie = $ul->getCookie();

$loggedinas = "";

if( $hash == $dbcookie && $huser != "") {
		$ul->setProperty( 'cookie', "");
		$ul->store();
?>
<script>
alert("X");
	top.location = "/create.php?id=<?php print $huser; ?>";
</script>
<?php
}
?>
