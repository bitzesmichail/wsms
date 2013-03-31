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
 		echo $user->username;
 		echo "\n";
 		echo $user->password;
 		echo "\n";
 		echo $user->email;
 		echo "\n";
 		$model = new UserModel;
 		$model->create($user);
 	}

 	public function update($username='', $new_user='')
 	{
 		# code...
 	}

 	public function delete($username='')
 	{
 		# code...
 	}

 	public function view()
 	{
 		# code...
 	}
 }