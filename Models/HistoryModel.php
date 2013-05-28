<?php


require_once("Model.php");
require_once("entities/Connector.php");
require_once("entities/CustomerStatistics.php");
require_once("entities/ProviderStatistics.php");
require_once("entities/ProductStatistics.php");
require_once("entities/MiddleProduct.php");
require_once("entities/HistorySaleOrder.php");
require_once("entities/HistorySupplyOrder.php");


class HistoryModel extends Model
{
	public function __construct()
	{
		//parent::__construct();
	}
	
	
	public static function getCustomerStatistics($customerSsn){
		
		$pdo = Connector::getPDO();
		
		try
		{
			$stmt = $pdo->prepare("SELECT SUM(priceSale),
										  SUM(priceSupply),
										  SUM(priceSale-priceSupply),
										  SUM(discount),
										  MIN(priceSale),
										  MAX(priceSale),
										  AVG(priceSale),
										  COUNT(*)
								   FROM history_saleorder
								   WHERE idHistoryCustomer IN (
								   SELECT idHistoryCustomer 
								   FROM history_customer 
								   WHERE customerSsn = :customerSsn)");
		
			$stmt->bindValue(":customerSsn", $customerSsn);
			$stmt->execute();
		
			$customerCol = $stmt->fetch(PDO::FETCH_NUM);
		
			return new CustomerStatistics($customerCol[0],
										$customerCol[1],
										$customerCol[2],
										$customerCol[3],
										$customerCol[4],
										$customerCol[5],
										$customerCol[6],
										$customerCol[7],
										$customerSsn
										);

		}
		catch(PDOException $e)
		{
			throw $e;
			//      echo $e->getMessage();
		}
		
	}
	
	public static function getProviderStatistics($providerSsn){
	
		$pdo = Connector::getPDO();
	
		try
		{
			$stmt = $pdo->prepare("SELECT SUM(priceSupply),
										  MIN(priceSupply),
										  MAX(priceSupply),
										  AVG(priceSupply),
										  COUNT(*)
								   FROM history_supplyorder
								   WHERE idHistoryProvider IN (
								   SELECT idHistoryProvider
								   FROM history_provider
								   WHERE providerSsn = :providerSsn)");
	
			$stmt->bindValue(":providerSsn", $providerSsn);
			$stmt->execute();
	
			$providerCol = $stmt->fetch(PDO::FETCH_NUM);
	
			return new ProviderStatistics($providerCol[0], 
										  $providerCol[1], 
										  $providerCol[2],
										  $providerCol[3],
										  $providerCol[4],
										  $providerSsn
										 );
				
		}
		catch(PDOException $e)
		{
			throw $e;
			//      echo $e->getMessage();
		}
	
	}
	
	public static function getProductStatistics($productSku){
		
		$pdo = Connector::getPDO();

		try
		{
			$stmt = $pdo->prepare("SELECT SUM(s.priceSale),
										  MIN(s.priceSale),
										  MAX(s.priceSale),
										  AVG(s.priceSale),
										  SUM(s.quantityClosed),
										  MIN(s.quantityClosed),
										  MAX(s.quantityClosed),
										  AVG(s.quantityClosed),
										  COUNT(DISTINCT h.idHistorySaleOrder)
								   FROM history_saleorder AS h
								   JOIN (SELECT s.priceSale,
								   s.quantityClosed,s.idHistorySaleOrder
								   FROM history_saleorder_has_history_product AS s
								   WHERE s.idHistoryProduct IN (
								   SELECT idHistoryProduct
								   FROM history_product
								   WHERE sku = :productSku))
								   s ON (h.idHistorySaleOrder = s.idHistorySaleOrder)
								");

			$stmt->bindValue(":productSku", $productSku);
			$stmt->execute();
			
			$productSaleCol = $stmt->fetch(PDO::FETCH_NUM);
			
			
			
			$stmt = $pdo->prepare("SELECT SUM(s.priceSupply),
										  MIN(s.priceSupply),
										  MAX(s.priceSupply),
										  AVG(s.priceSupply),
										  SUM(s.quantityClosed),
										  MIN(s.quantityClosed),
										  MAX(s.quantityClosed),
										  AVG(s.quantityClosed),
										  COUNT(DISTINCT h.idHistorySupplyOrder)
								   FROM history_supplyorder AS h
								   JOIN (SELECT s.priceSupply,
								   s.quantityClosed,s.idHistorySupplyOrder
								   FROM history_supplyorder_has_history_product AS s
								   WHERE s.idHistoryProduct IN (
								   SELECT idHistoryProduct
								   FROM history_product
								   WHERE sku = :productSku))
								   s ON (h.idHistorySupplyOrder = s.idHistorySupplyOrder)
								");
			
			$stmt->bindValue(":productSku", $productSku);
			$stmt->execute();
			
			$productSupplyCol = $stmt->fetch(PDO::FETCH_NUM);
	
			
			return new ProductStatistics($productSaleCol[0],
										 $productSaleCol[1],
										 $productSaleCol[2],
										 $productSaleCol[3],
										 $productSaleCol[4],
										 $productSaleCol[5],
										 $productSaleCol[6],
										 $productSaleCol[7],
										 $productSaleCol[8],
										 $productSupplyCol[0],
										 $productSupplyCol[1],
										 $productSupplyCol[2],
										 $productSupplyCol[3],
										 $productSupplyCol[4],
										 $productSupplyCol[5],
										 $productSupplyCol[6],
										 $productSupplyCol[7],
										 $productSupplyCol[8],
										 $productSku);
			
	
		}
		catch(PDOException $e)
		{
			throw $e;
		    echo $e->getMessage();
		}
	
	}
	
	
	public static function getAllHistorySaleOrders()
	{
		$pdo = Connector::getPDO();
	
		try
		{
			$stmt = $pdo->prepare("SELECT * FROM history_saleorder
									");
	
			$stmt->execute();

			$saleOrderColumns = $stmt->fetchAll();
			$saleOrderObjArray = array();
	
			foreach ($saleOrderColumns as $saleOrderCol)
			{
				
				$stmt = $pdo->prepare("SELECT customerSsn FROM history_customer
										WHERE idHistoryCustomer = :idHistoryCustomer
									  ");
				
				$stmt->bindValue(":idHistoryCustomer", $saleOrderCol['idHistoryCustomer']);
				$stmt->execute();

				$customerSsn = $stmt->fetchColumn();
				
				$stmt = $pdo->prepare("SELECT idHistoryProduct,discount,quantityCreated,quantityClosed,priceSale,priceSupply,profit
									  FROM history_saleorder_has_history_product
                                      WHERE idHistorySaleOrder = :idHistorySaleOrder
									  ");
	
				$stmt->bindValue(":idHistorySaleOrder", $saleOrderCol['idHistorySaleOrder']);
				$stmt->execute();

				$middleProductsColumns = $stmt->fetchAll();
	
				$middleProductObjArray = array();
	
				foreach ($middleProductsColumns as $middleProductsCol)
				{
					
					$stmt = $pdo->prepare("SELECT sku,description,priceSale,priceSupply
									  FROM history_product
                                      WHERE idHistoryProduct = :idHistoryProduct
									  ");
					
					$stmt->bindValue(":idHistoryProduct", $middleProductsCol['idHistoryProduct']);
					$stmt->execute();

					$middleProductsExtras = $stmt->fetch(PDO::FETCH_NUM);

					$middleProductObjArray[] = new MiddleProduct($middleProductsExtras[0],
							$middleProductsExtras[1],
							$middleProductsExtras[2],
							$middleProductsExtras[3],
							$middleProductsCol['discount'],
							$middleProductsCol['quantityCreated'],
							$middleProductsCol['quantityClosed'],
							$middleProductsCol['priceSale'],
							$middleProductsCol['priceSupply'],
							$middleProductsCol['profit']); 
				}
				$saleOrderObjArray[] = new HistorySaleOrder($saleOrderCol['idHistorySaleOrder'],
															 $saleOrderCol['idSaleOrder'],
															 $saleOrderCol['dateUpdated'],
															 $saleOrderCol['dateCreated'],
															 $saleOrderCol['dateClosed'],
															 $saleOrderCol['dateDue'],
															 $customerSsn,
															 $saleOrderCol['status'],
															 $middleProductObjArray,
															 $saleOrderCol['address'],
															 $saleOrderCol['priceSale'],
															 $saleOrderCol['priceSupply'],
															 $saleOrderCol['discount']);

			}
			return $saleOrderObjArray;
		}
		catch(PDOException $e)
		{
	
			//	throw $e;
			echo $e->getMessage();
		}
	}
	
	
	// Returns only the latest of every SaleOrder
	
	public static function getHistorySaleOrders()
	{
		$pdo = Connector::getPDO();
	
		try
		{
			$stmt = $pdo->prepare("(SELECT * FROM history_saleorder 
									WHERE idSaleOrder NOT IN (
									SELECT idSaleOrder FROM history_saleorder 
									WHERE dateUpdated<>dateCreated)) 
										UNION 
									(SELECT * FROM history_saleorder 
									WHERE dateUpdated <> dateCreated)
									");
	
			$stmt->execute();
	
			$saleOrderColumns = $stmt->fetchAll();
			$saleOrderObjArray = array();
	
			foreach ($saleOrderColumns as $saleOrderCol)
			{
	
				$stmt = $pdo->prepare("SELECT customerSsn FROM history_customer
										WHERE idHistoryCustomer = :idHistoryCustomer
									  ");
	
				$stmt->bindValue(":idHistoryCustomer", $saleOrderCol['idHistoryCustomer']);
				$stmt->execute();
	
				$customerSsn = $stmt->fetchColumn();
	
				$stmt = $pdo->prepare("SELECT idHistoryProduct,discount,quantityCreated,quantityClosed,priceSale,priceSupply,profit
									  FROM history_saleorder_has_history_product
                                      WHERE idHistorySaleOrder = :idHistorySaleOrder
									  ");
	
				$stmt->bindValue(":idHistorySaleOrder", $saleOrderCol['idHistorySaleOrder']);
				$stmt->execute();
	
				$middleProductsColumns = $stmt->fetchAll();
	
				$middleProductObjArray = array();
	
				foreach ($middleProductsColumns as $middleProductsCol)
				{
						
					$stmt = $pdo->prepare("SELECT sku,description,priceSale,priceSupply
									  FROM history_product
                                      WHERE idHistoryProduct = :idHistoryProduct
									  ");
						
					$stmt->bindValue(":idHistoryProduct", $middleProductsCol['idHistoryProduct']);
					$stmt->execute();
	
					$middleProductsExtras = $stmt->fetch(PDO::FETCH_NUM);
	
					$middleProductObjArray[] = new MiddleProduct($middleProductsExtras[0],
							$middleProductsExtras[1],
							$middleProductsExtras[2],
							$middleProductsExtras[3],
							$middleProductsCol['discount'],
							$middleProductsCol['quantityCreated'],
							$middleProductsCol['quantityClosed'],
							$middleProductsCol['priceSale'],
							$middleProductsCol['priceSupply'],
							$middleProductsCol['profit']);
				}
				$saleOrderObjArray[] = new HistorySaleOrder($saleOrderCol['idHistorySaleOrder'],
						$saleOrderCol['idSaleOrder'],
						$saleOrderCol['dateUpdated'],
						$saleOrderCol['dateCreated'],
						$saleOrderCol['dateClosed'],
						$saleOrderCol['dateDue'],
						$customerSsn,
						$saleOrderCol['status'],
						$middleProductObjArray,
						$saleOrderCol['address'],
						$saleOrderCol['priceSale'],
						$saleOrderCol['priceSupply'],
						$saleOrderCol['discount']);
	
			}
			return $saleOrderObjArray;
		}
		catch(PDOException $e)
		{
	
			//	throw $e;
			echo $e->getMessage();
		}
	}
	
	
	public static function getAllHistorySupplyOrders()
	{
		$pdo = Connector::getPDO();
	
		try
		{
			$stmt = $pdo->prepare("SELECT * FROM history_supplyorder
									");
	
			$stmt->execute();

			$supplyOrderColumns = $stmt->fetchAll();
			$supplyOrderObjArray = array();
	
			foreach ($supplyOrderColumns as $supplyOrderCol)
			{
	
				$stmt = $pdo->prepare("SELECT providerSsn FROM history_provider
										WHERE idHistoryProvider = :idHistoryProvider
									  ");
	
				$stmt->bindValue(":idHistoryProvider", $supplyOrderCol['idHistoryProvider']);
				$stmt->execute();

				$providerSsn = $stmt->fetchColumn();
	
				$stmt = $pdo->prepare("SELECT idHistoryProduct,quantityCreated,quantityClosed,priceSupply
									  FROM history_supplyorder_has_history_product
                                      WHERE idHistorySupplyOrder = :idHistorySupplyOrder
									  ");
	
				$stmt->bindValue(":idHistorySupplyOrder", $supplyOrderCol['idHistorySupplyOrder']);
				$stmt->execute();

				$middleProductsColumns = $stmt->fetchAll();
	
				$middleProductObjArray = array();
	
				foreach ($middleProductsColumns as $middleProductsCol)
				{
						
					$stmt = $pdo->prepare("SELECT sku,description,priceSale,priceSupply
									  FROM history_product
                                      WHERE idHistoryProduct = :idHistoryProduct
									  ");
						
					$stmt->bindValue(":idHistoryProduct", $middleProductsCol['idHistoryProduct']);
					$stmt->execute();

					$middleProductsExtras = $stmt->fetch(PDO::FETCH_NUM);
	
					$middleProductObjArray[] = new MiddleProduct($middleProductsExtras[0],
							$middleProductsExtras[1],
							$middleProductsExtras[2],
							$middleProductsExtras[3],
							null,
							$middleProductsCol['quantityCreated'],
							$middleProductsCol['quantityClosed'],
							null,
							$middleProductsCol['priceSupply'],
							null);
				}
				$supplyOrderObjArray[] = new HistorySupplyOrder($supplyOrderCol['idHistorySupplyOrder'],
																$supplyOrderCol['idSupplyOrder'], 
																$supplyOrderCol['dateUpdated'],
																$supplyOrderCol['dateCreated'],
																$supplyOrderCol['dateClosed'],
																$supplyOrderCol['dateDue'], 
																$providerSsn, 
																$middleProductObjArray, 
																$supplyOrderCol['priceSupply']);
			}
			return $supplyOrderObjArray;
		}
		catch(PDOException $e)
		{
	
			//	throw $e;
			echo $e->getMessage();
		}
	}
	
	
	
	// Returns only the latest of every SupplyOrder
	
	public static function getHistorySupplyOrders()
	{
	$pdo = Connector::getPDO();
	
		try
		{
			$stmt = $pdo->prepare("(SELECT * FROM history_supplyorder
									WHERE idSupplyOrder NOT IN (
									SELECT idSupplyOrder FROM history_supplyorder
									WHERE dateUpdated<>dateCreated))
										UNION
									(SELECT * FROM history_supplyorder
									WHERE dateUpdated <> dateCreated)
									");
			
			$stmt->execute();

			$supplyOrderColumns = $stmt->fetchAll();
			$supplyOrderObjArray = array();
	
			foreach ($supplyOrderColumns as $supplyOrderCol)
			{
	
				$stmt = $pdo->prepare("SELECT providerSsn FROM history_provider
										WHERE idHistoryProvider = :idHistoryProvider
									  ");
	
				$stmt->bindValue(":idHistoryProvider", $supplyOrderCol['idHistoryProvider']);
				$stmt->execute();

				$providerSsn = $stmt->fetchColumn();
	
				$stmt = $pdo->prepare("SELECT idHistoryProduct,quantityCreated,quantityClosed,priceSupply
									  FROM history_supplyorder_has_history_product
                                      WHERE idHistorySupplyOrder = :idHistorySupplyOrder
									  ");
	
				$stmt->bindValue(":idHistorySupplyOrder", $supplyOrderCol['idHistorySupplyOrder']);
				$stmt->execute();

				$middleProductsColumns = $stmt->fetchAll();
	
				$middleProductObjArray = array();
	
				foreach ($middleProductsColumns as $middleProductsCol)
				{
						
					$stmt = $pdo->prepare("SELECT sku,description,priceSale,priceSupply
									  FROM history_product
                                      WHERE idHistoryProduct = :idHistoryProduct
									  ");
						
					$stmt->bindValue(":idHistoryProduct", $middleProductsCol['idHistoryProduct']);
					$stmt->execute();
	
					$middleProductsExtras = $stmt->fetch(PDO::FETCH_NUM);
	
					$middleProductObjArray[] = new MiddleProduct($middleProductsExtras[0],
							$middleProductsExtras[1],
							$middleProductsExtras[2],
							$middleProductsExtras[3],
							null,
							$middleProductsCol['quantityCreated'],
							$middleProductsCol['quantityClosed'],
							null,
							$middleProductsCol['priceSupply'],
							null);
				}
				$supplyOrderObjArray[] = new HistorySupplyOrder($supplyOrderCol['idHistorySupplyOrder'],
																$supplyOrderCol['idSupplyOrder'], 
																$supplyOrderCol['dateUpdated'],
																$supplyOrderCol['dateCreated'],
																$supplyOrderCol['dateClosed'],
																$supplyOrderCol['dateDue'], 
																$providerSsn, 
																$middleProductObjArray, 
																$supplyOrderCol['priceSupply']);
			}
			return $supplyOrderObjArray;
		}
		catch(PDOException $e)
		{
	
			//	throw $e;
			echo $e->getMessage();
		}
	}
}