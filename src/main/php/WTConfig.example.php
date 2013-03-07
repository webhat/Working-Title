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
		$this->google = array(
				"client"	 => "",
				"account"	 => "",
				"public"	 => "",
				"gacode"	 => "UA-XXXXX-1"
		);
		$this->paypal = array(
				"user"		=> "",
				"pass"		=> "",
				"sandbox"	=>	true,
				"datareturn"	=> ""
		);
	}
}
?>
