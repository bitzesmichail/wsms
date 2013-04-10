<?php
session_start() ;
require "Controller/UserController.php" ;

function login($username, $password)
{
	$user = UserController::login($username, $password) ;
	if($user == -1)
	{
		return -1 ;
	}
	else
	{
		$_SESSION['username'] = $user->username ;
		$_SESSION['email'] = $user->email ;
		$roles = $user->roles ;
		$i = 0 ;
		foreach($roles as $role)
		{
			$_SESSION['roles'][$i] = $role->type ;
			$i ++ ;
		}
		header("Location: ./") ;
	}
}

function get_users()
{
	return UserController::viewAll() ;
}

function get_user($username)
{
	return UserController::viewByUsername($username) ;
}

function add_user($username, $password, $email, $role)
{
	$user = new User($username, $password, $email, Null) ;
	$roles = UserController::viewRoles() ;
	foreach($roles as $r)
	{
		if($r->type == $role)
		{
			$user->roles = array($r) ;
		}
	}
	UserController::create($user) ;
}

function edit_user($username, $password, $email, $role)
{
	$user = UserController::viewByUsername($username) ;
	$id = $user->idUser ;
	$user = new User($username, $password, $email, Null, $id) ;
	$roles = UserController::viewRoles() ;
	foreach($roles as $r)
	{
		if($r->type == $role)
		{
			$user->roles = array($r) ;
		}
	}
	UserController::update($user) ;
}

function delete_user($id)
{
	UserController::delete($id) ;
}






















?>
