<?php

require_once 'Controller/ProviderController.php';
require_once 'Model/entities/Provider.php';

class ProviderControllerTest extends PHPUnit_Framework_TestCase 
{

	public function testAll()
	{
		echo "Creating 100 Providers!\n";
		$providerController = new ProviderController;
		for($i=0;$i<100;$i++)
		{
			$providerController->create(new Provider($i, $i, $i, $i, $i, $i, $i, $i, $i, null));
		}

		$providers=ProviderController::viewAll();
		echo "View all inserted Providers\n";
		if (is_array($providers)) 
		{
			foreach ($providers as &$value) 
			{
				echo $value->name ." ". $value->surname . " " . $value->ssn . "\n";
			}
		}

		echo "Edit Providers!\n";
		$i = 0;
		if (is_array($providers)) 
		{
			foreach ($providers as &$value)
			{
				$value->phone = $i+100;
				$value->cellphone = $i;
				$i++;
			}
		}

		echo "Update Providers!\n";
		if (is_array($providers)) 
		{
			foreach ($providers as &$provider)
			{
				$providerController->update($provider);
			}
		}

		$providers=ProviderController::viewAll();
		echo "View all edited Providers\n";
		if (is_array($providers)) 
		{
			foreach ($providers as &$value) 
			{
				echo $value->name ." ". $value->surname . " " . $value->ssn . "\n";
			}
		}

		/*echo "Get providers with sku: 0,1,2,3 and print them!\n";
		for($i=0;$i<4;$i++)
		{
			$value = ProviderController::viewBySku($i);
			if ($value instanceof Provider) 
			{
				echo $value->idProvider . "\n";
			}
		}*/

		echo "Delete all providers!\n";
		$providers=ProviderController::viewAll();
		if (is_array($providers)) 
		{
			foreach ($providers as &$value){
				$providerController->delete($value->idProvider);
			}
		}
	}
	
	public function testViewAll()
	{
		echo "\nView all Providers test\n";
		$providers = ProviderController::viewAll();
		if (is_array($providers)) 
		{
			foreach ($providers as &$value) 
			{
				echo $value->ssn ."\n";
			}
		}
	}
}