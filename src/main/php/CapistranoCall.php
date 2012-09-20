<?php

class CapistranoCall {
	private $called = FALSE;
	private $capistrano_exec = "/usr/local/bin/cap";

	public function __construct() {
	}

	public function call() {
		$cwd = getcwd();
		chdir( dirname( __FILE__) ."/../resources/capistrano");
#		chdir("src/main/resources/capistrano");
		if(is_file($this->capistrano_exec)) {
			$this->passed = "". shell_exec($this->capistrano_exec ." -q deploy");
			$this->called = TRUE;
		}

		chdir($cwd);
		return $this->called;
	}
}

?>
