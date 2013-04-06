<?php

require_once 'Controller/UserController.php';
require_once 'Model/entities/User.php';

class UserControllerTest extends PHPUnit_Framework_TestCase 
{
	public function testCreate()
	{
		echo "\nCreate test\n";
		$userController = new UserController;
		$roles = UserController::viewRoles();
		
		$user = new User('kgiann78', 'qwerty', 'kg@test.gr', $roles, null);

		$this->assertEquals($userController->create($user), 0);
	}

	public function testUpdate()
	{
		echo "\nUpdate test\n";
		$userController = new UserController;
		$users = UserController::viewAll();
		foreach ($users as &$value) 
		{
			if ($value->username == 'kgiann78')
			{
				$user = $value;
			}
		}

		$user->email = 'test@test2.gr';

		//Update this edited user
		$this->assertEquals($userController->update($user), 0);
	}

	public function testLogin()
	{
		echo "\nLogin test\n";
		$userController = new UserController;
		$username = 'kgiann78';
		$password = 'qwerty';
		$result = $userController->login($username, $password);

		assert($result instanceof User);
	}

	public function testDelete()
	{
		# code...
	}

	public function testCreateUpdateDelete()
	{
		$userController = new UserController;
		$roles = UserController::viewRoles();
		
		echo "\nCreating a test user\n";		
		$user = new User('test_user', 'test_password', 'test@test.gr', $roles, null);
		$this->assertEquals($userController->create($user), 0);

		echo "Updating the test user\n";
		$users = UserController::viewAll();
		foreach($users as &$user)
		{
			if($user->username == 'test_user')
			{
				$newUser = $user;
			}
		}

		$newUser->email = 'test2@test.gr';
		$this->assertEquals($userController->update($newUser), 0);
		
		echo "Deleting the test user\n";
		
		//find it's idUser first
		$users = UserController::viewAll();

		foreach($users as &$user) 
		{
			if($user->username == 'test_user') 
			{
				$this->assertEquals($userController->delete($user->idUser), 0);
			}
		}	
	}
}