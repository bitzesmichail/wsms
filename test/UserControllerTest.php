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

	public function testCreateUpdateDelete()
	{
		$userController = new UserController;
		$roles = $userController->viewRoles();
		
		echo "\nCreating a test user\n";		
		$user = new User('test_user', 'test_password', 'test@test.gr', $roles, null);
		echo "\nError Code of create: " . $userController->create($user) . "\n";

		//find if the user was really created
		$users = UserController::view();

		$found = FALSE;
		foreach($users as &$user) {
			if($user->username === 'test_user') {
				$this->assertEquals($user->email, 'test@test.gr');
				$found = TRUE;
			}
		}

		$this->assertEquals(TRUE,$found);

		echo "Updating the test user\n";
		$newUser = new User('test_user', 'test_password', 'test2@test.gr', $roles, null);
		echo "\nError Code of update: " . $userController->update($newUser) . "\n";

		//find if the user was really updated
		$users = UserController::view();

		$found = FALSE;
		foreach($users as &$user) {
			if($user->username === 'test_user') {
				$this->assertEquals($user->email, 'test2@test.gr');				
				$found = TRUE;
			}
		}

		$this->assertEquals(TRUE,$found);
		
		echo "Deleting the test user\n";
		
		//find it's idUser first
		$users = UserController::view();

		$found = FALSE;
		foreach($users as &$user) {
			if($user->username === 'test_user') {
				echo "\nError Code of delete: " . $userController->delete($user->idUser) . "\n";
				$found = TRUE;
			}
		}

		$this->assertEquals(TRUE,$found);		
	}
}