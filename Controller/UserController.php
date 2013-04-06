<?php

require_once 'Controller.php';
require_once 'Model/UserModel.php';
require_once 'Model/RoleModel.php';
/**
 * Controller for users
 */
 class UserController extends Controller
 {
 	public function __construct()
 	{
 		# code...
 	}

 	public function login($username='', $password='')
 	{
 		$users = $this->view();
 		if (is_array($users)) 
 		{
 			foreach ($users as &$value) 
 			{
 				if ($value->username == $username
 					&& $value->password == $password) 
 				{
 					return $value;
 				}
 			}
 		}
 		else {
 			return -1;
 		}
 	}

 	public function logout($username='')
 	{
 		// do something here that I dont understand wtf can logout do in the UserController...
 		return 0;
 	}

 	public function create($user='')
 	{
 		try 
 		{
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

 	public static function view()
 	{
 		return UserModel::getUsers();
 	}

 	public static function viewRoles()
 	{
 		// $roleModel = new RoleModel();
 		return RoleModel::getRoles();
 	}
 }