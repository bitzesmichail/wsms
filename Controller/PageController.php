<?php

/**
 * Controller for users to redirect to the proper page.
 * Functions login and logout may probably be moved as
 * functions of the UserController class
 */
 class PageController extends Controller
 {
 	function __construct(argument)
 	{
 		# code...
 	}

 	public function login($username='', $password='')
 	{
 		return 0;
 	}

 	public function logout($username='')
 	{
 		return 0;
 	}

 	public function redirect() //aka view
 	{
 		return 0;
 	}￼
 }