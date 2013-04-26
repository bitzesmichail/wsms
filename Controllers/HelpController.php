<?php

require_once 'Controller.php';

class HelpController extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this->view->render('help');
	}

	public function other($arg = false) {
		
		require 'models/help_model.php';
		$model = new Help_Model();
		$this->view->blah = $model->blah();
	}

}
