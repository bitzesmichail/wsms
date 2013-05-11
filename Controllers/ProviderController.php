<?php

require_once 'Controller.php';
require_once 'Models/ProviderModel.php';

/**
 * Controller for providers
 */
 class ProviderController extends Controller
 {
 	function __construct()
 	{
 		parent::__construct();
 	}

 	public function index()
 	{
 		if (isset($_SESSION['role'])) {
 			if ($_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SCHEDULER') {
				try 
				{
	 				$this->view->render('providers', 'index', ProviderModel::getProviders());
				}
 				catch(Exception $ex)
			 	{
	 				require_once 'PageController.php';
					$page = new PageController;
					$page->errordb($ex->getMessage());
 				}
	 		}
			else {
 				require_once 'PageController.php';
				$page = new PageController;
				$page->error_accdenied();
			}
 		}
 	}

 	public function create($provider='')
 	{
 		try 
 		{
 			return ProviderModel::create($provider);
 		}
 		catch(Exception $ex)
 		{
 			echo "Error Message: " . $ex->getMessage() . "\n";
 			return $ex->getCode();
 		}

 	}

 	public function update($newProvider='')
 	{
 		try 
 		{
	 		return ProviderModel::update($newProvider);
 		}
 		catch(Exception $ex)
 		{
 			echo "Error Message: " . $ex->getMessage() . "\n";
 			return $ex->getCode();
 		}
 	}

 	public function delete($idProvider='')
 	{
 		try 
 		{
	 		return ProviderModel::delete($idProvider);
 		}
 		catch(Exception $ex)
 		{
 			echo "Error Message: " . $ex->getMessage() . "\n";
 			return $ex->getCode();
 		}
 	}

 	public static function viewAll()
 	{
 		return ProviderModel::getProviders();
 	}

 	public function viewById($id='')
 	{
 		$providers = ProviderModel::getProviders();

 		if (is_array($providers)) 
 		{
 			foreach ($providers as &$value) 
 			{
 				if ($value->idProvider == $id)
 				{
 					return $value;
 				}
 			}
 		}
 		return null;
 	}

 	public function viewByProduct($product_id='')
 	{
		return 0;
 	}

 	public function getStatistics($id='')
 	{
 		return 0;
 	}
 }
