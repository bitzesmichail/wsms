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
		//update user
		$user = new User('michalis', 'tralala!@#', 'test@test2.gr', $roles, null);
		echo "\nError Code: " . $userController->update($user) . "\n";
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