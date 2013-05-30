<?php

class UploadHelper {
	public static function UploadType( $mime) {
			switch( $mime) {
				// Image mime types
				case  "image/gif":
				case  "image/jpeg":
				case  "image/png":
				case  "image/pjpeg":
					return "image";

				// Video mime types
				case  "video/3gpp":
				case  "video/mp4":
				case  "video/mpeg":
				case  "video/quicktime":
				case  "video/webm":
				case  "video/x-m4v":
					return "video";

				// Audio mime types
				case  "audio/midi":
				case  "audio/mpeg":
				case  "audio/mp3":
				case  "audio/ogg":
				case  "audio/x-m4a":
					return "audio";

				// Text  mime types
				case  "text/plain":
				case  "application/pdf":
				case  "application/msword":
					return "text";
			}
	}
}

?>
