<?php

class View {

	function __construct() {
	}

	public function render($dirname = '', $filename = '', $data = '', $noInclude = false)
	{
		if (empty($filename)) {
			$filename = 'index';
		}

		if (is_array($data)) {
			extract($data);
		}

		if ($noInclude == true) {
			require 'views/' . $dirname. '/' . $filename . '.php';	
		}
		else {
			require 'views/header.php';
			require 'views/' . $dirname. '/' . $filename . '.php';
			require 'views/footer.php';	
		}
	}

}