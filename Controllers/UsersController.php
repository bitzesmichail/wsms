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
 		$user = UsersController::viewByUsername($username);

 		if (!is_null($user))
 		{
 			if ($user->password == $password)
 			{
 				$_SESSION['username'] = $user->username;
 				switch ($user->username) {
 					case 'manager':
 						$_SESSION['role'] = 'manager';
 						break;
 					case 'seller':
 						$_SESSION['role'] = 'seller';
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

  				$this->view->render('index');
  				//header("Location: " . HOME);
 			}
 		}
 		return -1;
 	}

 	public function logout($username='')
 	{
 		$_SESSION['role'] = null;
 		$_SESSION['username'] = null;

 		$this->view->render('index');
 		//header("Location: " . HOME);
 	}

 	public function index()
 	{
 		$this->view->render('users', 'index', UserModel::getUsers());
 	}

 	public function create($username='', $password='', $email='', $role='')
 	{
 		try 
 		{
 			//some validation here
 			$user = new User($username, $password, $email, $role);
 			return UserModel::create($user);
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
	 		return UserModel::update($newUser);
 		}
 		catch(Exception $ex)
 		{
 			echo "Error Message: " . $ex->getMessage() . "\n";
 			return $ex->getCode();
 		}
 	}

 	public function delete($idUser='')
 	{
 		try 
 		{
	 		return UserModel::delete($idUser);
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
