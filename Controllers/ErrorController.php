<?php

require_once 'Controller.php';

class ErrorController extends Controller 
{
	public function __construct() 
	{
		parent::__construct();
	}
	
	public function index($msg='') 
	{
		$this->view->msg = $msg;
		$this->view->render('error', null, null, true);
	}
}
