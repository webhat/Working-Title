<?php
class WTConfig {
	public $wtdatabase = "wt365";
	//public $wtdatabase = "wt365test";

	public $mailchimp;
	public $mandrill;
	public $service;

	function __construct() {
		$this->mailchimp = array(
				"listid"	=> "c5774f1303",
				"apikey"	=> "df529fb3ed1cf3d90ff9dbba86924add-us5"
		);
		$this->mandrill = array(
				"host"			=> "smtp.mandrillapp.com",
				"port"			=> "587",
				"username"	=> "oid::b00f079660447361efceeba41ad3904b606c518a",
				"password"	=> "8fe0fbac-5b5c-49bf-92be-7deee013c8fc"
		);
		$this->service = array(
				"name"	=> "WorkingTitle365",
				"mail"	=> "info@workingtitle365.com"
		);
	}
}
?>
