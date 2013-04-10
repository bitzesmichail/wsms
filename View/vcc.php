<?php
session_start() ;
require "Controller/UserController.php" ;
require "Controller/ProductController.php" ;
require_once 'Model/entities/Product.php';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//------------------------------USERS-----------------------------------------------------------------------//
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

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//------------------------------------PRODUCTS------------------------------------------------------------------------//

function get_products()
{
	return ProductController::viewAll() ;
}

function create_product($sku, $description, $priceSupply, $priceSale, $criticalSum)
{
	$prod = new Product($sku, $description, $priceSale, $priceSupply, 0, 0, 0, $criticalSum, NULL) ;
	ProductController::create($prod) ;
}

function edit_product($sku, $description, $priceSale, $priceSupply, $availableSum, $criticalSum)
{
	$product = ProductController::viewBySku($sku) ;
	$product->description = $description ;
	$product->priceSale = $priceSale ;
	$product->priceSupply = $priceSupply ;
	$product->availableSum = $availableSum ;
	$product->criticalSum = $criticalSum ;
	ProductController::update($product) ;
}

function delete_product($id)
{
	ProductController::delete($id) ;
}

function search_products($key)
{
	$products = ProductController::viewAll() ;
	$i = 0 ;
	foreach($products as $prod)
	{
		if(strpos($prod->sku, $key) !== false || strpos($prod->description, $key) !== false)
		{
			$my_products[$i] = $prod ;
			$i++ ;
		}
	}
	return $my_products ;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



















?>
