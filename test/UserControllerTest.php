<?php

require_once 'Controller/UserController.php';
require_once 'Model/entities/User.php';

class UserControllerTest extends PHPUnit_Framework_TestCase 
{
	public function testCreate()
	{
		echo "Create test\n";
		$userController = new UserController;
		$roles = $userController->viewRoles();
		
		$user = new User('kgiann789', 'qwerty', 'kg@kg.gr', $roles, null);
		echo "\nError Code: " . $userController->create($user) . "\n";
	}

	public function testUpdate()
	{
		echo "Update test\n";
		$userController = new UserController;
		$roles = $userController->viewRoles();

		//this test requires a user michalis to be present in the db
		//so...
		//
		//$user = $userController->viewUserByUsername/ById/bySomething
		//
		//update user
		//
		//change $user's some value (username/pass/email/roles)
		$newUser = new User('michalis', 'tralala!@#', 'test@test2.gr', $roles, null);
		//Update this newUser
		echo "\nError Code: " . $userController->update($newUser) . "\n";
	}

	public function testLogin()
	{
		echo "Login test\n";
		$userController = new UserController;
		$result = $userController->login('kgiann789', 'qwert');
		
		if ($result instanceof User) 
		{
			echo "User " . $result->username . " was found!\n";
		}
		else
		{
			echo "User kgiann789 was not found!\n";
		}
	}

	public function testDelete()
	{
		# code...
	}

	public function testGetUsesrs($value='')
	{
		# code...
	}
}