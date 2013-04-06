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
		$users = UserController::view();
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

	public function testGetUsesrs($value='')
	{
		# code...
	}

	// public function testCreateUpdateDelete()
	// {
	// 	$userController = new UserController;
	// 	$roles = $userController->viewRoles();

	// 	foreach ($roles as &$value) {
	// 		echo "Role " . $value->type . "\n";
	// 	}
		
	// 	echo "\nCreating a test user\n";		
	// 	$user = new User('test_user', 'test_password', 'test@test.gr', $roles, null);
	// 	echo "\nError Code of create: " . $userController->create($user) . "\n";

	// 	//find if the user was really created
	// 	$users = UserController::view();

	// 	foreach ($users as &$value) {
	// 		echo "User " . $value->username . " was added\n";
	// 	}

	// 	$found = FALSE;
	// 	foreach($users as &$user) {
	// 		if($user->username == 'test_user') {
	// 			$this->assertEquals($user->email, 'test@test.gr');
	// 			$found = TRUE;
	// 		}
	// 	}

	// 	$this->assertEquals(TRUE,$found);

	// 	echo "Updating the test user\n";
	// 	$users = UserController::view();
	// 	foreach($users as &$user)
	// 	{
	// 		if($user->username == 'test_user')
	// 		{
	// 			$newUser = $user;
	// 		}
	// 	}

	// 	$newUser->email = 'test2@test.gr'; // = new User('test_user', 'test_password', 'test2@test.gr', $roles, null);
	// 	echo "\nError Code of update: " . $userController->update($newUser) . "\n";

	// 	//find if the user was really updated
	// 	$users = UserController::view();

	// 	$found = FALSE;
	// 	foreach($users as &$user) {
	// 		if($user->username == 'test_user') {
	// 			echo "I  have this email " . $user->email . "\n";
	// 			$this->assertEquals($user->email, 'test2@test.gr');			
	// 			$found = TRUE;
	// 		}
	// 	}

	// 	$this->assertEquals(TRUE,$found);
		
	// 	echo "Deleting the test user\n";
		
	// 	//find it's idUser first
	// 	$users = UserController::view();

	// 	$found = FALSE;
	// 	foreach($users as &$user) {
	// 		if($user->username == 'test_user') {
	// 			echo "\nError Code of delete: " . $userController->delete($user->idUser) . "\n";
	// 			$found = TRUE;
	// 		}
	// 	}

	// 	$this->assertEquals(TRUE,$found);		
	// }
}