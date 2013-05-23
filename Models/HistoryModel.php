<?php


require_once("Model.php");
require_once("entities/CustomerStatistics.php");


class HistoryModel extends Model
{
	public function __construct()
	{
		parent::__construct();
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
	
}