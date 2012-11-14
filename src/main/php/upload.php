<?php

require('bootstrap.php');
require('loggedinas.php');

$maker = 'Unknown';
if(array_key_exists( 'id', $_GET))
	$maker = (string) $_GET['id'];

	if($maker != $loggedinas) {
		print "You are not logged in as this user";
		exit();
	}

$p = new MakerProfile( $maker);
$p->reset();

$mail = filter_input(INPUT_POST,'mail', FILTER_SANITIZE_EMAIL);

$nonce = time();

$realfilename = $_FILES["file"]["name"] + $nonce;

$allowedExts = array("jpg", "jpeg", "gif", "png");
$filename = explode(".", $_FILES["file"]["name"]);
$extension = end( $filename);
if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/png")
	|| ($_FILES["file"]["type"] == "image/pjpeg"))
	&& ($_FILES["file"]["size"] < 20000000)
	&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
			echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    } else {
//			echo "Upload: " . $_FILES["file"]["name"] . "<br />";
//			echo "Type: " . $_FILES["file"]["type"] . "<br />";
//			echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
//			echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

			if (file_exists("upload/" . $realfilename)) {
				echo $filename . " already exists. ";
			} else {
				move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $realfilename);
				$uploadType = (string)$_POST['type'];
				$p->addCreation(array( "type" => $uploadType, "content" => "/upload/" . $realfilename));
				$p->store();
				echo "Stored in: "  . getcwd() . "/upload/" . $realfilename;
?>
<script>
	top.location = "/profile.php?id=<?php print $user; ?>";
</script>
<?php

			}
    }
	//mail_attachment($_FILES["file"]["name"], getcwd() . "/upload/", "daniel.crompton@gmail.com", "daniel.crompton@gmail.com", "Working Title", "daniel.crompton@gmail.com", "Image From '$mail'", "");

  } else {
		echo "Invalid file";
  }
?>
