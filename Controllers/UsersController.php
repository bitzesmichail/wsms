<?php

require_once 'Controller.php';
require_once 'Models/UserModel.php';
require_once 'Models/RoleModel.php';
require_once 'Models/entities/User.php';
/**
 * Controller for users
 */
 class UsersController extends Controller
 {
 	public function __construct()
 	{
 		parent::__construct();
 	}

 	public function login($username='', $password='')
 	{
 		require_once 'PageController.php';
		$page = new PageController;

 		if (empty($username) && empty($password)) {
 			$page->redirect(HOME);
 		}

 		$user = UsersController::viewByUsername($username);

 		if (!is_null($user))
 		{
 			if ($user->password == $password)
 			{
 				$_SESSION['success_logged_in'] = true;
 				$_SESSION['username'] = $user->username;
 				switch ($user->username) {
 					case 'manager':
 						$_SESSION['role'] = 'manager';
 						break;
 					case 'seller':
 						$_SESSION['role'] = 'seller';
 						$page->redirect(SALEORDER . '/');
 						break;
 					case 'scheduler':
 						$_SESSION['role'] = 'scheduler';
 						break;
 					case 'apo8hkarios':
 						$_SESSION['role'] = 'apo8hkarios';
 						break;
 					default:
 						$_SESSION['role'] = null;
 						break;
 				}
		 		$page->redirect(HOME);
 			}
 		}
		$page->redirect(HOME);
 	}

 	public function logout($username='')
 	{
 		$_SESSION['role'] = null;
 		$_SESSION['username'] = null;
 		$_SESSION['success_logged_in'] = null;

 		require_once 'PageController.php';
 		$page = new PageController;
 		$page->redirect(HOME);
 	}

 	public function index()
 	{
 		if (isset($_SESSION['role'])) {
 			if( $_SESSION['role'] == 'manager') {
				$this->view->render('users', 'index', UserModel::getUsers()); 
			}
 		}
 		else {
			$this->view->render('users', null, null);
		}
 	}

 	public function adduser()
 	{
 		if (isset($_SESSION['role'])) {
 			if( $_SESSION['role'] == 'manager') {
				$this->view->render('users', 'adduser', UserModel::getUsers()); 
			}
 		}
 		else {
			$this->view->render('users', null, null);
		}
 	}

 	public function edituser()
 	{
 		if (isset($_SESSION['role'])) {
 			if( $_SESSION['role'] == 'manager') {
				$this->view->render('users', 'edituser', UserModel::getUserById($_GET['id'])); 
			}
 		}
 		else {
			$this->view->render('users', null, null);
		}
 	}

 	public function deleteuser()
 	{
 		if (isset($_SESSION['role'])) {
 			if( $_SESSION['role'] == 'manager') {
				$this->view->render('users', 'deleteuser', UserModel::getUserById($_GET['id'])); 
			}
 		}
 		else {
			$this->view->render('users', null, null);
		}
 	}

 	public function create()
 	{
 		try 
 		{
	 		if (isset($_SESSION['role'])) {
 				if( $_SESSION['role'] == 'manager') {
 					$user = new User($_POST['username'], $_POST['password'], $_POST['email'], null);
 					UserModel::create($user);
 					UsersController::index();
 				}
 			}
 		}
 		catch(Exception $ex)
 		{
 			echo "Error Message: " . $ex->getMessage() . "\n";
 			return $ex->getCode();
 		}
 	}

 	public function update($newUser='')
 	{
 		try 
 		{
 			if (isset($_SESSION['role'])) {
 				if( $_SESSION['role'] == 'manager') {
 					$user = new User($_POST['username'], $_POST['password'], $_POST['email'], null, $_POST['idUser']);
 					UserModel::update($user);
 					UsersController::index();
 				}
 			}
 		}
 		catch(Exception $ex)
 		{
 			echo "Error Message: " . $ex->getMessage() . "\n";
 			return $ex->getCode();
 		}
 	}

 	public function delete()
 	{
 		try
 		{
 			if (isset($_SESSION['role'])) {
 				if( $_SESSION['role'] == 'manager') {
 					UserModel::delete($_POST['idUser']);
 					UsersController::index();
 				}
 			}
 		}
 		catch(Exception $ex)
 		{
 			echo "Error Message: " . $ex->getMessage() . "\n";
 			return $ex->getCode();
 		}
 	}

 	public function viewAll()
 	{
 		$data = UserModel::getUsers();
 		$this->view->render('users', 'viewAll', $data);
 	}

 	public function viewById($idUser='')
 	{
 		$users = UserModel::getUsers();

 		if (is_array($users)) 
 		{
 			foreach ($users as &$value) 
 			{
 				if ($value->idUser == $idUser)
 				{
 					$this->view->render('users', '', $value);
 				}
 			}
 		}
 		return null;
 	}

 	public static function viewByUsername($username='')
 	{
 		$users = UserModel::getUsers();

 		if (is_array($users)) 
 		{
 			foreach ($users as &$value) 
 			{
 				if ($value->username == $username)
 				{
 					return $value;
 				}
 			}
 		}
 		return null;
 	} 	

 	public static function viewRoles()
 	{
 		return RoleModel::getRoles();
 	}
 }
