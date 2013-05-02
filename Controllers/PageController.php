<?php

require_once 'Controller.php';
require_once 'Models/UserModel.php';
require_once 'Models/RoleModel.php';
require_once 'Models/entities/User.php';

/**
 * Controller for users to redirect to the proper page.
 * Functions login and logout may probably be moved as
 * functions of the UserController class
 */
 class PageController extends Controller
 {
 	function __construct()
 	{
 		parent::__construct();
 	}

 	public function index()
 	{
 		$this->view->render('index');
 	}

 	public function error404($value='')
 	{
 		$this->view->msg = $value;
		$this->view->render('error', 'error404', null, true);
 	}

 	public function error501($value='')
 	{
 		$this->view->msg = $value;
		$this->view->render('error', 'error501', null, true);
 	}

 	public function redirect() //aka view
 	{
 		return 0;
 	}
 }
