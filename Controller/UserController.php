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
 		return 0;
 	}

 	public function logout($username='')
 	{
 		return 0;
 	}

 	public function create($user='')
 	{
 		try 
 		{
 			echo "username: ".$user->username."\n";
	 		echo "password: ".$user->password."\n";
	 		echo "email: ".$user->email."\n";
	 		echo "assigned roles: ".$user->roles[0]."\n\n";

	 		$userModel = new UserModel(); 
	 		return $userModel->create($user);
 		}
 		catch(Exception $ex)
 		{
 			echo "Error Message: " . $ex->getMessage() . "\n";
 			return $ex->getCode();
 		}
 	}

 	public function update($username='', $new_user='')
 	{
 		return 0;
 	}

 	public function delete($username='')
 	{
 		return 0;
 	}

 	public function view()
 	{
 		return 0;
 	}

 	public function viewRoles()
 	{
 		$roleModel = new RoleModel();
 		return $roleModel->getRoles();
 	}
 }