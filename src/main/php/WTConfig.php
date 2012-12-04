<?php
class WTConfig {
	public $wtdatabase = "wt365";
	//public $wtdatabase = "wt365test";

	public $mailchimp;
	public $mandrill;
	public $service;

	function __construct() {
		$this->mailchimp = array(
				"listid"	=> "",
				"apikey"	=> ""
		);
		$this->mandrill = array(
				"host"			=> "smtp.mandrillapp.com",
				"port"			=> "587",
				"username"	=> "",
				"password"	=> ""
		);
		$this->service = array(
				"name"	=> "WorkingTitle365",
				"mail"	=> "info@workingtitle365.com"
		);
	}
}
?>
