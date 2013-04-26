<?php

require_once("Model.php");

class Help_Model extends Model {

	function __construct() {
		echo 'Help model';
	}
	
	function blah() {
		return 10 + 10;
	}

}