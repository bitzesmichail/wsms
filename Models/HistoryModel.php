<?php


require_once("Model.php");
require_once("entities/Connector.php");
require_once("entities/CustomerStatistics.php");
require_once("entities/ProviderStatistics.php");
require_once("entities/ProductStatistics.php");
require_once("entities/MiddleProduct.php");
require_once("entities/HistorySaleOrder.php");
require_once("entities/HistorySupplyOrder.php");
require_once("entities/SystemStatistics.php");
//require_once("../phpexcel/Classes/PHPExcel.php");

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
										  WHERE idHistoryCustomer  
												IN 
										 (SELECT idHistoryCustomer 
										 FROM history_customer 
										 WHERE customerSsn = :customerSsn) 
										 AND idHistorySaleOrder IN 
										 (SELECT idHistorySaleOrder FROM history_saleorder 
										 WHERE idSaleOrder NOT IN 
										(SELECT idSaleOrder FROM history_saleorder 
										 WHERE dateUpdated<>dateCreated) 
												UNION 
									    (SELECT idHistorySaleOrder FROM history_saleorder 
										 WHERE dateUpdated <> dateCreated))");
			
		
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
	
	public static function getAllCustomersStatistics(){
	
		$pdo = Connector::getPDO();
	
		try
		{
			$stmt = $pdo->prepare("SELECT * FROM history_customer GROUP BY customerSsn
									");
			
			$stmt->execute();
			
			$customerColumns = $stmt->fetchAll();
			
			$customersObjArray = array();
			
			foreach ($customerColumns as $customersCol)
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
										  WHERE idHistoryCustomer
												IN
										 (SELECT idHistoryCustomer
										 FROM history_customer
										 WHERE customerSsn = :customerSsn)
										 AND idHistorySaleOrder IN
										 (SELECT idHistorySaleOrder FROM history_saleorder
										 WHERE idSaleOrder NOT IN
										(SELECT idSaleOrder FROM history_saleorder
										 WHERE dateUpdated<>dateCreated)
												UNION
									    (SELECT idHistorySaleOrder FROM history_saleorder
										 WHERE dateUpdated <> dateCreated))");
				
				
				$stmt->bindValue(":customerSsn", $customersCol['customerSsn']);
				$stmt->execute();
				
				$customerCol = $stmt->fetch(PDO::FETCH_NUM);
				
				$customersObjArray[] = new CustomerStatistics($customerCol[0],
						$customerCol[1],
						$customerCol[2],
						$customerCol[3],
						$customerCol[4],
						$customerCol[5],
						$customerCol[6],
						$customerCol[7],
						$customersCol['customerSsn'],
						$customersCol['name'],
						$customersCol['surname']
				);
				
			}
			return $customersObjArray;
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
								   WHERE providerSsn = :providerSsn)
								   AND idHistorySupplyOrder IN 
								   (SELECT idHistorySupplyOrder FROM history_supplyorder 
								   WHERE idSupplyOrder NOT IN 
								   (SELECT idSupplyOrder FROM history_supplyorder 
								   WHERE dateUpdated<>dateCreated) 
										UNION 
									(SELECT idHistorySupplyOrder FROM history_supplyorder 
								   WHERE dateUpdated <> dateCreated))");
	
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
	
	public static function getAllProvidersStatistics(){
	
		$pdo = Connector::getPDO();
	
		try
		{
			$stmt = $pdo->prepare("SELECT * FROM history_provider GROUP BY providerSsn
									");
				
			$stmt->execute();
				
			$providersColumns = $stmt->fetchAll();
				
			$providersObjArray = array();
				
			foreach ($providersColumns as $providersCol)
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
								   WHERE providerSsn = :providerSsn)
								   AND idHistorySupplyOrder IN
								   (SELECT idHistorySupplyOrder FROM history_supplyorder
								   WHERE idSupplyOrder NOT IN
								   (SELECT idSupplyOrder FROM history_supplyorder
								   WHERE dateUpdated<>dateCreated)
										UNION
									(SELECT idHistorySupplyOrder FROM history_supplyorder
								   WHERE dateUpdated <> dateCreated))");
				
				$stmt->bindValue(":providerSsn", $providersCol['providerSsn']);
				$stmt->execute();
				
				$providerCol = $stmt->fetch(PDO::FETCH_NUM);
				
				$providersObjArray[] = new ProviderStatistics($providerCol[0],
															$providerCol[1],
															$providerCol[2],
															$providerCol[3],
															$providerCol[4],
															$providersCol['providerSsn'],
															$providersCol['name'],
															$providersCol['surname']
															);
			}
			return $providersObjArray;	
		}
		catch(PDOException $e)
		{
			throw $e;
			//      echo $e->getMessage();
		}
	
	}
	
	public static function getAllProductsStatistics(){
	
		$pdo = Connector::getPDO();
	
		try
		{	
			
			$stmt = $pdo->prepare("SELECT * FROM history_product GROUP BY sku
									");
			
			$stmt->execute();
			
			$productsColumns = $stmt->fetchAll();
			
			$productsObjArray = array();
			
			foreach ($productsColumns as $productsCol)
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
								   s ON ((h.idHistorySaleOrder = s.idHistorySaleOrder
								   AND h.dateUpdated <> h.dateCreated)
								   OR (h.idHistorySaleOrder = s.idHistorySaleOrder
					               AND h.idSaleOrder NOT IN
								   (SELECT idSaleOrder
								   FROM history_saleorder
								   WHERE dateUpdated <> dateCreated)))
								");
				
				$stmt->bindValue(":productSku", $productsCol['sku']);
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
								   s ON ((h.idHistorySupplyOrder = s.idHistorySupplyOrder
								   AND h.dateUpdated <> h.dateCreated)
								   OR (h.idHistorySupplyOrder = s.idHistorySupplyOrder
								   AND h.idSupplyOrder
								   NOT IN (SELECT idSupplyOrder
								   FROM history_supplyorder
								   WHERE dateUpdated <> dateCreated)))
								");
				
				$stmt->bindValue(":productSku", $productsCol['sku']);
				$stmt->execute();
				
				$productSupplyCol = $stmt->fetch(PDO::FETCH_NUM);
				
				
				$productsObjArray[] = new ProductStatistics($productSaleCol[0],
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
						$productsCol['sku'],
						$productsCol['description']);
			}			
			return $productsObjArray;
		}
		catch(PDOException $e)
		{
			throw $e;
			echo $e->getMessage();
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
								   s ON ((h.idHistorySaleOrder = s.idHistorySaleOrder 
								   AND h.dateUpdated <> h.dateCreated) 
								   OR (h.idHistorySaleOrder = s.idHistorySaleOrder 
					               AND h.idSaleOrder NOT IN 
								   (SELECT idSaleOrder 
								   FROM history_saleorder 
								   WHERE dateUpdated <> dateCreated)))
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
								   s ON ((h.idHistorySupplyOrder = s.idHistorySupplyOrder 
								   AND h.dateUpdated <> h.dateCreated) 
								   OR (h.idHistorySupplyOrder = s.idHistorySupplyOrder 
								   AND h.idSupplyOrder 
								   NOT IN (SELECT idSupplyOrder 
								   FROM history_supplyorder 
								   WHERE dateUpdated <> dateCreated)))
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
	
	public static function getHistorySaleOrdersToExcel($user) 
	{	
	
		$saleOrderObjArray = self::getHistorySaleOrders();
		
		date_default_timezone_set('Europe/Athens');

		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		foreach(range('A','K') as $columnID) {
			$objPHPExcel->getActiveSheet()
						->getColumnDimension($columnID)->setAutoSize(true);			
		}
			
		$objPHPExcel->getDefaultStyle()
					->getAlignment()
					->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
		$objPHPExcel->getActiveSheet()->getStyle("A1:K1")->getFont()->applyFromArray(
				array(
					'name'	  => 'Arial',
					'underline' => PHPExcel_Style_Font::UNDERLINE_SINGLE,
					)
				 );
					 
		$objPHPExcel->getProperties()->setCreator($user)
									 ->setLastModifiedBy($user)
									 ->setTitle("Warehouse Statistics")
									 ->setSubject("Warehouse Statistics")
									 ->setDescription("Warehouse Statistics")
									 ->setKeywords("office 2007")
									 ->setCategory("Statistics");


		// Add some data
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'Κωδικός Παραγγελίας')
					->setCellValue('B1', 'Ημερομηνία Δημιουργίας')
					->setCellValue('C1', 'Ημερομηνία Προθεσμίας')
					->setCellValue('D1', 'Ημερομηνία Εκτέλεσης')
					->setCellValue('E1', 'Α.Φ.Μ Πελάτη')
					->setCellValue('F1', 'Κατάσταση')
					->setCellValue('G1', 'Διεύθυνση Αποστολής')
					->setCellValue('H1', 'Μικτό Κέρδος')
					->setCellValue('I1', 'Κόστος')
					->setCellValue('J1', 'Ποσό Έκπτωσης')
					->setCellValue('K1', 'Κέρδος');

		$i = 2;			 
		foreach( $saleOrderObjArray as $hso ) 
		{
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$i, $hso->idSaleOrder)
						->setCellValue('B'.$i, $hso->dateCreated)
						->setCellValue('C'.$i, $hso->dateDue)
						->setCellValue('D'.$i, $hso->dateClosed)
						->setCellValue('E'.$i, $hso->customerSsn)
						->setCellValue('F'.$i, $hso->status)
						->setCellValue('G'.$i, $hso->address)
						->setCellValue('H'.$i, $hso->income)
						->setCellValue('I'.$i, $hso->outcome)
						->setCellValue('J'.$i, $hso->amountDiscount)
						->setCellValue('K'.$i, $hso->income - $hso->outcome);
			$i++;			
		}	
		
		$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('G'.($i + 1), 'Σύνολο')
				->setCellValue('H'.($i + 1), "=SUM(H1:H".($i-1).")")
				->setCellValue('I'.($i + 1), "=SUM(I1:I".($i-1).")")
				->setCellValue('J'.($i + 1), "=SUM(J1:J".($i-1).")")
				->setCellValue('K'.($i + 1), "=SUM(K1:K".($i-1).")");
		
		$objPHPExcel->getActiveSheet()
					->getStyle('G'.($i + 1))
					->getFont()
					->applyFromArray(
						array(
							'name'	  => 'Arial',
							'underline' => PHPExcel_Style_Font::UNDERLINE_SINGLE,
							)
					);
					
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="statistics.xls"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
	}

	
	public static function getHistorySupplyOrdersToExcel($user) 
	{	 
		
		$supplyOrderObjArray = self::getHistorySupplyOrders();
		
		date_default_timezone_set('Europe/Athens');

		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		foreach(range('A','F') as $columnID) {
			$objPHPExcel->getActiveSheet()
						->getColumnDimension($columnID)->setAutoSize(true);		
		}

		$objPHPExcel->getDefaultStyle()
					->getAlignment()
					->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);		
		
		$objPHPExcel->getActiveSheet()->getStyle("A1:F1")->getFont()->applyFromArray(
				array(
					'name'	  => 'Arial',
					'underline' => PHPExcel_Style_Font::UNDERLINE_SINGLE,
					)
				 );
		// Set properties

		$objPHPExcel->getProperties()->setCreator($user)
									 ->setLastModifiedBy($user)
									 ->setTitle("Warehouse Statistics")
									 ->setSubject("Warehouse Statistics")
									 ->setDescription("Warehouse Statistics")
									 ->setKeywords("office 2007")
									 ->setCategory("Statistics");

		// Add some data
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'Κωδικός Προμήθειας')
					->setCellValue('B1', 'Ημερομηνία Δημιουργίας')
					->setCellValue('C1', 'Ημερομηνία Εκτέλεσης')
					->setCellValue('D1', 'Ημερομηνία Προθεσμίας')
					->setCellValue('E1', 'Α.Φ.Μ Προμηθευτή')
					->setCellValue('F1', 'Κόστος');
		
		$i = 2;			 
		foreach( $supplyOrderObjArray as $hso ) 
		{
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$i, $hso->idSupplyOrder)
						->setCellValue('B'.$i, $hso->dateCreated)
						->setCellValue('C'.$i, $hso->dateClosed)
						->setCellValue('D'.$i, $hso->dateDue)
						->setCellValue('E'.$i, $hso->providerSsn)
						->setCellValue('F'.$i, $hso->outcome);
			
			$i++;			
		}	
		
		$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('E'.($i + 1), 'Σύνολο')
				->setCellValue('F'.($i + 1), "=SUM(F1:F".($i-1).")");
		
		$objPHPExcel->getActiveSheet()
					->getStyle('E'.($i + 1))
					->getFont()
					->applyFromArray(
						array(
							'name'	  => 'Arial',
							'underline' => PHPExcel_Style_Font::UNDERLINE_SINGLE,
							)
					);
			
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="statistics.xls"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
	}
	
	public static function getAllCustomersStatisticsToExcel($user) 
	{	

		$customersObjArray = self::getAllCustomersStatistics();
		
		date_default_timezone_set('Europe/Athens');

		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		foreach(range('A','K') as $columnID) {
			$objPHPExcel->getActiveSheet()
						->getColumnDimension($columnID)->setAutoSize(true);			
		}

		$objPHPExcel->getDefaultStyle()
					->getAlignment()
					->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
		$objPHPExcel->getActiveSheet()->getStyle("A1:K1")->getFont()->applyFromArray(
					array(
						'name'	  => 'Arial',
						'underline' => PHPExcel_Style_Font::UNDERLINE_SINGLE,
						)
					 );
						
		// Set properties

		$objPHPExcel->getProperties()->setCreator($user)
									 ->setLastModifiedBy($user)
									 ->setTitle("Warehouse Statistics")
									 ->setSubject("Warehouse Statistics")
									 ->setDescription("Warehouse Statistics")
									 ->setKeywords("office 2007")
									 ->setCategory("Statistics");

		// Add some data
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'Α.Φ.Μ')
					->setCellValue('B1', 'Όνομα')
					->setCellValue('C1', 'Επώνυμο')
					->setCellValue('D1', 'Μικτό Κέρδος')
					->setCellValue('E1', 'Kόστος')
					->setCellValue('F1', 'Καθαρό Κέρδος')
					->setCellValue('G1', 'Σύνολο Έκπτωσης')
					->setCellValue('H1', 'Μικτό Κέρδος(Ελάχιστο)')
					->setCellValue('I1', 'Μικτό Κέρδος(Μέγιστο)')
					->setCellValue('J1', 'Μικτό Κέρδος(Μ.Ο)')
					->setCellValue('K1', 'Αριθμός Παραγγελιών');

		$i = 2;			 
		foreach( $customersObjArray as $coa ) 
		{
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$i, $coa->customerSsn)
						->setCellValue('B'.$i, $coa->customerName)
						->setCellValue('C'.$i, $coa->customerSurname)
						->setCellValue('D'.$i, $coa->sumIncome)
						->setCellValue('E'.$i, $coa->sumOutcome)
						->setCellValue('F'.$i, $coa->sumProfits)
						->setCellValue('G'.$i, $coa->sumDiscount)
						->setCellValue('H'.$i, $coa->minIncome)
						->setCellValue('I'.$i, $coa->maxIncome)
						->setCellValue('J'.$i, $coa->avgIncome)
						->setCellValue('K'.$i, $coa->numSaleOrders);
			
			$i++;			
		}	
			
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="statistics.xls"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
	}
	
	public static function getAllProductsStatisticsToExcel($user) 
	{	
		$productsObjArray = self::getAllProductsStatistics();
		
		date_default_timezone_set('Europe/Athens');

		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		foreach(range('A','T') as $columnID) {
			$objPHPExcel->getActiveSheet()
						->getColumnDimension($columnID)->setAutoSize(true);			
		}

		$objPHPExcel->getDefaultStyle()
					->getAlignment()
					->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);		

		$objPHPExcel->getActiveSheet()->getStyle("A1:T1")->getFont()->applyFromArray(
					array(
						'name'	  => 'Arial',
						'underline' => PHPExcel_Style_Font::UNDERLINE_SINGLE,
						)
					 );	

		// Set properties

		$objPHPExcel->getProperties()->setCreator($user)
									 ->setLastModifiedBy($user)
									 ->setTitle("Warehouse Statistics")
									 ->setSubject("Warehouse Statistics")
									 ->setDescription("Warehouse Statistics")
									 ->setKeywords("office 2007")
									 ->setCategory("Statistics");
		
		// Add some data
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'Κωδικός')
					->setCellValue('B1', 'Περιγραφή')
					->setCellValue('C1', 'Μικτό Κέρδος')
					->setCellValue('D1', 'Μικτό Κέρδος(Ελάχιστο)')
					->setCellValue('E1', 'Μικτό Κέρδος(Μέγιστο)')
					->setCellValue('F1', 'Μικτό Κέρδος(Μ.Ο)')
					->setCellValue('G1', 'Πουλημένα Τεμάχια')
					->setCellValue('H1', 'Πουλημένα Τεμάχια(Ελάχιστο)')
					->setCellValue('I1', 'Πουλημένα Τεμάχια(Μέγιστο)')
					->setCellValue('J1', 'Πουλημένα Τεμάχια(Μ.Ο)')
					->setCellValue('K1', 'Αριθμός Παραγγελιών')
					->setCellValue('L1', 'Κόστος')
					->setCellValue('M1', 'Κόστος(Ελάχιστο)')
					->setCellValue('N1', 'Κόστος(Μέγιστο)')
					->setCellValue('O1', 'Κόστος(Μ.Ο)')
					->setCellValue('P1', 'Παραγγελμένα Τεμάχια')
					->setCellValue('Q1', 'Παραγγελμένα Τεμάχια(Ελάχιστο)')
					->setCellValue('R1', 'Παραγγελμένα Τεμάχια(Μέγιστο)')
					->setCellValue('S1', 'Παραγγελμένα Τεμάχια(Μ.Ο)')
					->setCellValue('T1', 'Αριθμός Προμηθειών');

		$i = 2;			 
		foreach( $productsObjArray as $poa ) 
		{
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$i, $poa->productSku)
						->setCellValue('B'.$i, $poa->productDescription)
						->setCellValue('C'.$i, $poa->sumIncome)
						->setCellValue('D'.$i, $poa->minIncome)
						->setCellValue('E'.$i, $poa->maxIncome)
						->setCellValue('F'.$i, $poa->avgIncome)
						->setCellValue('G'.$i, $poa->sumQuantitySold)
						->setCellValue('H'.$i, $poa->minQuantitySold)
						->setCellValue('I'.$i, $poa->maxQuantitySold)
						->setCellValue('J'.$i, $poa->avgQuantitySold)
						->setCellValue('K'.$i, $poa->numSaleOrders)
						->setCellValue('L'.$i, $poa->sumOutcome)
						->setCellValue('M'.$i, $poa->minOutcome)
						->setCellValue('N'.$i, $poa->maxOutcome)
						->setCellValue('O'.$i, $poa->avgOutcome)
						->setCellValue('P'.$i, $poa->sumQuantitySupplied)
						->setCellValue('Q'.$i, $poa->minQuantitySupplied)
						->setCellValue('R'.$i, $poa->maxQuantitySupplied)
						->setCellValue('S'.$i, $poa->avgQuantitySupplied)
						->setCellValue('T'.$i, $poa->numSupplyOrders);
			
			$i++;			
		}	
			
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="statistics.xls"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
	}
	
	public static function getAllProvidersStatisticsToExcel($user) 
	{	
		$providersObjArray = self::getAllProvidersStatistics();
		
		date_default_timezone_set('Europe/Athens');

		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		foreach(range('A','H') as $columnID) {
			$objPHPExcel->getActiveSheet()
						->getColumnDimension($columnID)->setAutoSize(true);			
		}
		
		$objPHPExcel->getDefaultStyle()
				->getAlignment()
				->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$objPHPExcel->getActiveSheet()->getStyle("A1:H1")->getFont()->applyFromArray(
				array(
					'name'	  => 'Arial',
					'underline' => PHPExcel_Style_Font::UNDERLINE_SINGLE
					)	
				 );
					 
		// Set properties

		$objPHPExcel->getProperties()->setCreator($user)
									 ->setLastModifiedBy($user)
									 ->setTitle("Warehouse Statistics")
									 ->setSubject("Warehouse Statistics")
									 ->setDescription("Warehouse Statistics")
									 ->setKeywords("office 2007")
									 ->setCategory("Statistics");

		// Add some data
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'Α.Φ.Μ')
					->setCellValue('B1', 'Όνομα')
					->setCellValue('C1', 'Επώνυμο')
					->setCellValue('D1', 'Κόστος')
					->setCellValue('E1', 'Kόστος(Ελάχιστο)')
					->setCellValue('F1', 'Kόστος(Μέγιστο)')
					->setCellValue('G1', 'Kόστος(Μ.Ο)')
					->setCellValue('H1', 'Αριθμός Προμηθειών');
						
		$i = 2;			 
		foreach( $providersObjArray as $poa ) 
		{
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$i, $poa->providerSsn)
						->setCellValue('B'.$i, $poa->providerName)
						->setCellValue('C'.$i, $poa->providerSurname)
						->setCellValue('D'.$i, $poa->sumOutcome)
						->setCellValue('E'.$i, $poa->minOutcome)
						->setCellValue('F'.$i, $poa->maxOutcome)
						->setCellValue('G'.$i, $poa->avgOutcome)
						->setCellValue('H'.$i, $poa->numSupplyOrders);
			
			$i++;			
		}	
			
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="statistics.xls"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
	}	
	
	
	
	public static function getSystemStatistics(){
	
	
		$pdo = Connector::getPDO();
	
		try
		{
			$stmt = $pdo->prepare("SELECT SUM(priceSale),
										  MIN(priceSale),
										  MAX(priceSale),
										  AVG(priceSale),
										  SUM(priceSale-priceSupply),
										  MIN(priceSale-priceSupply),
										  MAX(priceSale-priceSupply),
										  AVG(priceSale-priceSupply),
										  SUM(discount),
										  MIN(discount),
										  MAX(discount),
										  AVG(discount),
										  COUNT(DISTINCT idHistorySaleOrder)
										  FROM history_saleorder
										  WHERE idHistorySaleOrder IN
										 (SELECT idHistorySaleOrder
										  FROM history_saleorder
										  WHERE idSaleOrder NOT IN
										 (SELECT idSaleOrder FROM history_saleorder
										  WHERE dateUpdated<>dateCreated))
										  OR idHistorySaleOrder IN
										  (SELECT idHistorySaleOrder
										  FROM history_saleorder
										  WHERE dateUpdated <> dateCreated)
									");
	
	
			$stmt->execute();

			$productSaleCol = $stmt->fetch(PDO::FETCH_NUM);
	
	
	
			$stmt = $pdo->prepare("SELECT SUM(priceSupply),
										  MIN(priceSupply),
										  MAX(priceSupply),
										  AVG(priceSupply),
										  COUNT(DISTINCT idHistorySupplyOrder)
										  FROM history_supplyorder
										  WHERE idHistorySupplyOrder IN
										 (SELECT idHistorySupplyOrder
										  FROM history_supplyorder
										  WHERE idSupplyOrder NOT IN
										 (SELECT idSupplyOrder FROM history_supplyorder
										  WHERE dateUpdated<>dateCreated))
										  OR idHistorySupplyOrder IN
										  (SELECT idHistorySupplyOrder
										  FROM history_supplyorder
										  WHERE dateUpdated <> dateCreated)
									");
			
			
			$stmt->execute();

			$productSupplyCol = $stmt->fetch(PDO::FETCH_NUM);
			
			
			$stmt = $pdo->prepare("SELECT COUNT(*) FROM user");
				
				
			$stmt->execute();
				
			$numUsers = $stmt->fetchColumn();
			
			$stmt = $pdo->prepare("SELECT COUNT(*) FROM wishproduct");
			
			
			$stmt->execute();
			
			$numWishProducts = $stmt->fetchColumn();
			
			
			$stmt = $pdo->prepare("SELECT COUNT(sku) FROM product");
				
				
			$stmt->execute();
				
			$numProducts = $stmt->fetchColumn();
			
			
			$stmt = $pdo->prepare("SELECT COUNT(ssn) FROM provider");
				
				
			$stmt->execute();
				
			$numProviders = $stmt->fetchColumn();
			
			
			
			$stmt = $pdo->prepare("SELECT COUNT(ssn) FROM customer");
				
				
			$stmt->execute();
				
			$numCustomers = $stmt->fetchColumn();
			
			
			$stmt = $pdo->prepare("SELECT create_time FROM INFORMATION_SCHEMA.TABLES WHERE table_schema = 'wsms'");
				
				
			$stmt->execute();
				
			$creationTime = $stmt->fetchColumn();
			

			
			return new SystemStatistics($productSaleCol[0], 
										$productSaleCol[1], 
										$productSaleCol[2], 
										$productSaleCol[3], 
										$productSaleCol[4], 
										$productSaleCol[5], 
										$productSaleCol[6], 
										$productSaleCol[7], 
										$productSaleCol[12], 
										$productSupplyCol[0], 
										$productSupplyCol[1], 
										$productSupplyCol[2], 
										$productSupplyCol[3], 
										$productSaleCol[8], 
										$productSaleCol[9], 
										$productSaleCol[10], 
										$productSaleCol[11], 
										$productSupplyCol[4], 
										$numUsers, 
										$numCustomers, 
										$numProviders, 
										$numProducts, 
										$numWishProducts,
										$creationTime);
	

		}
		catch(PDOException $e)
		{
			throw $e;
			echo $e->getMessage();
		}
	
	}
}