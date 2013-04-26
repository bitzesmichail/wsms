<?php

require_once 'Views/View.php';

class Controller {

	function __construct() {
		session_start();
		$this->view = new View();
	}

}