<?php

require_once 'Controller.php';
require_once 'Model/UserModel.php';
/**
 * Controller for users
 */
 class UserController extends Controller
 {
 	public function __construct()
 	{
    	# code...
 	}

 	public function create($user='')
 	{
 		try 
 		{
 			echo $user->username;
	 		echo "\n";
	 		echo $user->password;
	 		echo "\n";
	 		echo $user->email;
	 		echo "\n";
	 		$model = new UserModel;
	 		$model->create($user);
	 		return 0;
 		}
 		catch(Exception $ex)
 		{
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
 }