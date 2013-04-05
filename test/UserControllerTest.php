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
		$str_roles = array();

		foreach ($roles as &$value) {
			array_push($str_roles, $value->type);
		}
		
		$user = new User('kgiann78', 'qwerty', 'kg@kg.gr', $str_roles, null);
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
		$username = 'kgiann78';
		$password = 'qwerty';
		$result = $userController->login($username, $password);
		
		if ($result instanceof User) 
		{
			echo "Successful login for user " . $result->username . "\n";
			echo "User data\n" . $result->idUser ."\n" . $result->username ."\n". $result->password ."\n";
			$arr = $result->roles;
			foreach ($arr as &$role)
			{
				echo $role . "\n";
			}
		}
		else
		{
			echo "User " . $username . " does not exist!\n";
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

		foreach ($roles as &$value) {
			echo "Role " . $value->type . "\n";
		}
		
		echo "\nCreating a test user\n";		
		$user = new User('test_user', 'test_password', 'test@test.gr', $roles, null);
		echo "\nError Code of create: " . $userController->create($user) . "\n";

		//find if the user was really created
		$users = UserController::view();

		foreach ($users as &$value) {
			echo "User " . $value->username . " was added\n";
		}

		$found = FALSE;
		foreach($users as &$user) {
			if($user->username == 'test_user') {
				$this->assertEquals($user->email, 'test@test.gr');
				$found = TRUE;
			}
		}

		$this->assertEquals(TRUE,$found);

		echo "Updating the test user\n";
		$users = UserController::view();
		foreach($users as &$user)
		{
			if($user->username == 'test_user')
			{
				$newUser = $user;
			}
		}

		$newUser->email = 'test2@test.gr'; // = new User('test_user', 'test_password', 'test2@test.gr', $roles, null);
		echo "\nError Code of update: " . $userController->update($newUser) . "\n";

		//find if the user was really updated
		$users = UserController::view();

		$found = FALSE;
		foreach($users as &$user) {
			if($user->username == 'test_user') {
				echo "I  have this email " . $user->email . "\n";
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
			if($user->username == 'test_user') {
				echo "\nError Code of delete: " . $userController->delete($user->idUser) . "\n";
				$found = TRUE;
			}
		}

		$this->assertEquals(TRUE,$found);		
	}
}