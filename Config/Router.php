<?php

class Router 
{
	function __construct() 
	{
		 ini_set('display_errors',1); 
		//	get url from browser and get each part.
		//	url[0] is for controller
		//  url[1] is for method
		//	url[2] is for arguments brought by GET
		//	any POST argument will be handled in the methods segment
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = explode('/', $url);

		//If no controller is defined then the PageController is required to show the home page of the application
		if (empty($url[0])) 
		{
			require 'Controllers/PageController.php';
			$controller = new PageController();
			$controller->index();
			return false;
		}

		//	Create controller's name from the url
		$url[0] = ucfirst ( $url[0] );
		$url[0] .= "Controller";

		//	Search for controller file
		$file = 'Controllers/' . $url[0] . '.php';
		if (file_exists($file)) 
		{
			require $file;
		} 
		else 
		{
			$this->error('Requested file ' . $url[0] . '.php does not exist');
			return false;
		}
		
		$controller = new $url[0];

		//	calling methods
		//	if a GET argument is defined
		if (isset($url[2])) 
		{
			if (method_exists($controller, $url[1])) 
			{
				//	call the defined method with the GET argument
				$controller->{$url[1]}($url[2]);
			}
			else 
			{
				$this->error('Requested method ' . $url[1] . ' does not exist');
			}
		} 
		else 
		{
			if (isset($url[1])) 
			{
				if (method_exists($controller, $url[1])) 
				{
					//	check for POST arguments
					if (!empty($_POST)) 
					{
						//	pass all POST arguments into the defined method
						call_user_func_array(array($controller, $url[1]), $_POST);
					}
					else 
					{
						$controller->{$url[1]}();
					}
				} 
				else 
				{
					$this->error('Requested method ' . $url[1] . ' does not exist');
				}
			} 
			else 
			{
				$controller->index();
			}
		}
	}
	
	function error($msg='') 
	{
		require 'Controllers/ErrorController.php';
		$controller = new ErrorController();
		$controller->index($msg);
		return false;
	}
}