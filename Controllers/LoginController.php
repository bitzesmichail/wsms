<?php

require_once 'Controller.php';

class LoginController extends Controller {

	public function __construct() {
		parent::__construct();	
	}
	
	public function index() {
		$this->view->render('login');
	}
	

}
