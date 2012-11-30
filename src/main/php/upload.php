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

$crTitle = "";
if(array_key_exists( 'title', $_POST))
	$crTitle = (string) $_POST['title'];

$crDesc = "";
if(array_key_exists( 'desc', $_POST))
	$crDesc = (string) $_POST['desc'];

$p = new MakerProfile( $maker);
$p->reset();

$nonce = time();


$allowedExts = array(
		  // Image Formats
		"jpg", "jpeg", "gif", "png"
		, // Video Formats
		"mpg", "mpeg", "mp4", "mov", "avi", "3gp", "3gpp", "3g2", "webm", "m4v"
		, // Audio Formats
		"mid", "wav", "mpa", "mp3", "m4a", "ogg"
		, // Text  Formats
		"txt", "doc", "pdf"
		);
$filename = explode(".", $_FILES["file"]["name"]);
$extension = end( $filename);
$realfilename = $_FILES["file"]["name"] . $nonce .".". $extension;
if (
	// Image mime types
		(($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/png")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	
	// Video mime types
	|| ($_FILES["file"]["type"] == "video/3gpp")
	|| ($_FILES["file"]["type"] == "video/mp4")
	|| ($_FILES["file"]["type"] == "video/mpeg")
	|| ($_FILES["file"]["type"] == "video/quicktime")
	|| ($_FILES["file"]["type"] == "video/webm")
	|| ($_FILES["file"]["type"] == "video/x-m4v")

	// Audio mime types
	|| ($_FILES["file"]["type"] == "audio/midi")
	|| ($_FILES["file"]["type"] == "audio/mpeg")
	|| ($_FILES["file"]["type"] == "audio/ogg")
	|| ($_FILES["file"]["type"] == "audio/x-m4a")

	// Text  mime types
	|| ($_FILES["file"]["type"] == "text/plain")
	|| ($_FILES["file"]["type"] == "application/pdf")
	|| ($_FILES["file"]["type"] == "application/msword")
	)
	&& ($_FILES["file"]["size"] < 20971520)
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
				$p->addCreation(array( "type" => $uploadType, "content" => "/upload/" . $realfilename, "title" => $crTitle, "description" => $crDesc));
				$p->store();
				echo "Stored in: "  . getcwd() . "/upload/" . $realfilename;
?>
<script>
	//top.location = "/profile.php?id=<?php print $user; ?>";
</script>
<?php

			}
    }
  } else {
		echo "Invalid file";
?>
<script>
	location = "/upload.html?id=<?php print $user; ?>&msg=Invalid%20File";
</script>
<?php
  }
?>
