<?php

require_once 'Controller/UserController.php';
require_once 'Model/entities/User.php';

class UserControllerTest extends PHPUnit_Framework_TestCase 
{
	public function testCreate()
	{
		echo "Create test\n";
		$userController = new UserController;
		$user = new User('kgiann789', 'qwerty');

		echo "Error Code: ".$userController->create($user);
	}

	public function testUdate()
	{
		# code...
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