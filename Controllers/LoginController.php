<?php

require_once 'Controller.php';

class LoginController extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() {
		$this->view->render('login');
	}
	

}
