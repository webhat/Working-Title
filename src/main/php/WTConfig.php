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
				"apikey"	=> "d58a02510bccd7125d729859cf52d24e-us5"
		);
		$this->mandrill = array(
				"host"			=> "smtp.mandrillapp.com",
				"port"			=> "587",
				"username"	=> "oid::b00f079660447361efceeba41ad3904b606c518a",
				"password"	=> "bd00f83f-7679-4690-b824-d6d965f5f17f"
		);
		$this->service = array(
				"name"	=> "WorkingTitle365",
				"mail"	=> "info@workingtitle365.com"
		);
	}
}
?>
