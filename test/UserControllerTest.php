<?php

require_once 'Controller/UserController.php';
require_once 'Model/entities/User.php';

class UserControllerTest extends PHPUnit_Framework_TestCase 
{
	public function testCreate()
	{
		echo "Create test\n";
		$userController = new UserController;
		$roles = array(0);
		$user = new User('kgiann789', 'qwerty', 'kg@kg.gr', $roles, null);
		echo "\nError Code: ".$userController->create($user);
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