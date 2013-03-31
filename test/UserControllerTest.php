<?php

require_once 'Controller/UserController.php';
require_once 'Model/entities/User.php';

class UserControllerTest extends PHPUnit_Framework_TestCase 
{
	public function testCreate()
	{
		$userController = new UserController;

		$params = array('username' => 'kgiann78',
		 'password' => 'qwerty',
		 'email' => 'kg_123@dz.gr');
		$user = new User($params);
		$userController->create($user);
	}
}