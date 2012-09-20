<?php

class WebHook {

	private $payload = null;

	public function __construct($_payload) {
		$this->payload = json_decode($_payload);
	}

	public function branch() {
		list( $refs, $location, $branch) = explode('/', $this->payload->{"ref"});
		return $branch;
	}
}

?>
