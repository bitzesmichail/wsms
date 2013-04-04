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
 		// getUserByUsername
 		// lets say we got one...
 		$user = $this->view()[0];

 		// compare user with given password
 		// if ok then return $user else return error
 		if ($user->password != $password) 
 		{
 			return -1;
 		}
 		else
 		{
 			return $user;
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
 			echo "username: ".$user->username."\n";
	 		echo "password: ".$user->password."\n";
	 		echo "email: ".$user->email."\n";
	 		
	 		$arr = $user->roles;

	 		foreach ($arr as &$role) {
	 			echo "assigned role: ".$role->type."\n";
	 		}

	 		// $userModel = new UserModel(); 
	 		// return UserModel::create($user);
	 		return 0;
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
 			echo "username to be updated: ".$newUser->username."\n";

 			echo "username: ".$newUser->username."\n";
	 		echo "password: ".$newUser->password."\n";
	 		echo "email: ".$newUser->email."\n";
	 		$arr = $newUser->roles;

	 		foreach ($arr as &$role) {
	 			echo "assigned role: ".$role->type."\n";
	 		}

	 		// $userModel = new UserModel(); 
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
 			echo "idUser to be deleted: ".$idUser."\n";

	 		//$arr = $newUser->roles;

	 		//foreach ($arr as &$role) {
	 		//	echo "assigned role: ".$role->type."\n";
	 		//}

	 		// $userModel = new UserModel(); 
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

 	public function viewRoles()
 	{
 		// $roleModel = new RoleModel();
 		return RoleModel::getRoles();
 	}
 }