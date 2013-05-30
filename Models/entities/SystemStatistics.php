<?php

class SystemStatistics
{
	private $sumIncome;
	private $minIncome;
	private $maxIncome;
	private $avgIncome;
	private $sumProfit;
	private $minProfit;
	private $maxProfit;
	private $avgProfit;
	private $numSaleOrders;
	private $sumOutcome;
	private $minOutcome;
	private $maxOutcome;
	private $avgOutcome;
	private $sumDiscount;
	private $minDiscount;
	private $maxDiscount;
	private $avgDiscount;
	private $numSupplyOrders;
	private $numUsers;
	private $numCustomers;
	private $numProviders;
	private $numProducts;
	private $numWishProducts;
	private $creationTime;

	public function __construct($sumIncome,
								$minIncome,
								$maxIncome,
								$avgIncome,
								$sumProfit,
								$minProfit,
								$maxProfit,
								$avgProfit,
								$numSaleOrders,
								$sumOutcome,
								$minOutcome,
								$maxOutcome,
								$avgOutcome,
								$sumDiscount,
								$minDiscount,
								$maxDiscount,
								$avgDiscount,
								$numSupplyOrders,
								$numUsers,
								$numCustomers,
								$numProviders,
								$numProducts,
								$numWishProducts,
								$creationTime
								)
	{

		$this->sumIncome = $sumIncome;
		$this->minIncome = $minIncome;
		$this->maxIncome = $maxIncome;
		$this->avgIncome = $avgIncome;
		$this->sumProfit = $sumProfit;
		$this->minProfit = $minProfit;
		$this->maxProfit = $maxProfit;
		$this->avgProfit = $avgProfit;
		$this->numSaleOrders = $numSaleOrders;
		$this->sumOutcome = $sumOutcome;
		$this->minOutcome = $minOutcome;
		$this->maxOutcome = $maxOutcome;
		$this->avgOutcome = $avgOutcome;
		$this->sumDiscount = $sumDiscount;
		$this->minDiscount = $minDiscount;
		$this->maxDiscount = $maxDiscount;
		$this->avgDiscount = $avgDiscount;
		$this->numSupplyOrders = $numSupplyOrders;
		$this->numUsers = $numUsers;
		$this->numCustomers = $numCustomers;
		$this->numProviders = $numProviders;
		$this->numProducts = $numProducts;
		$this->numWishProducts = $numWishProducts;
		$this->creationTime = $creationTime;

	}

	public function __get($param)
	{
		switch ($param)
		{
			case "sumIncome":
				return $this->sumIncome;
			case "minIncome":
				return $this->minIncome;
			case "maxIncome":
				return $this->maxIncome;
			case "avgIncome":
				return $this->avgIncome;
			case "numSaleOrders":
				return $this->numSaleOrders;
			case "sumOutcome":
				return $this->sumOutcome;
			case "minOutcome":
				return $this->minOutcome;
			case "maxOutcome":
				return $this->maxOutcome;
			case "avgOutcome":
				return $this->avgOutcome;
			case "numSupplyOrders":
				return $this->numSupplyOrders;
			case "productSku":
				return $this->productSku;
			case "productDescription":
				return $this->productDescription;
			case "sumProfit":
				return $this->sumProfit;
			case "minProfit":
				return $this->minProfit;
			case "maxProfit":
				return $this->maxProfit;
			case "avgProfit":
				return $this->avgProfit;
			case "sumDiscount":
				return $this->sumDiscount;
			case "minDiscount":
				return $this->minDiscount;
			case "maxDiscount":
				return $this->maxDiscount;
			case "avgDiscount":
				return $this->avgDiscount;
			case "numUsers":
				return $this->numUsers;
			case "numCustomers":
				return $this->numCustomers;
			case "numProviders":
				return $this->numProviders;
			case "numProducts":
				return $this->numProducts;
			case "numWishProducts":
				return $this->numWishProducts;
			case "creationTime":
				return $this->creationTime;
		}
	}

	public function __set($name, $value)
	{
		switch ($name)
		{
			case "sumIncome":
				$this->sumIncome = $value;
				break;
			case "minIncome":
				$this->minIncome = $value;
				break;
			case "maxIncome":
				$this->maxIncome = $value;
				break;
			case "avgIncome":
				$this->avgIncome = $value;
				break;
			case "numSaleOrders":
				$this->numSaleOrders = $value;
				break;
			case "sumOutcome":
				$this->sumOutcome = $value;
				break;
			case "minOutcome":
				$this->minOutcome = $value;
				break;
			case "maxOutcome":
				$this->maxOutcome = $value;
				break;
			case "avgOutcome":
				$this->avgOutcome = $value;
				break;
			case "numSupplyOrders":
				$this->numSupplyOrders = $value;
				break;
			case "productSku":
				$this->productSku = $value;
				break;
			case "productDescription":
				$this->productDescription = $value;
				break;
			case "sumProfit":
				$this->sumProfit = $value;
				break;
			case "minProfit":
				$this->minProfit = $value;
				break;
			case "maxProfit":
				$this->maxProfit = $value;
				break;
			case "avgProfit":
				$this->avgProfit = $value;
				break;
			case "sumDiscount":
				$this->sumDiscount = $value;
				break;
			case "minDiscount":
				$this->minDiscount = $value;
				break;
			case "maxDiscount":
				$this->maxDiscount = $value;
				break;
			case "avgDiscount":
				$this->avgDiscount = $value;
				break;
			case "numUsers":
				$this->numUsers = $value;
				break;
			case "numCustomers":
				$this->numCustomers = $value;
				break;
			case "numProviders":
				$this->numProviders = $value;
				break;
			case "numProducts":
				$this->numProducts = $value;
				break;
			case "numWishProducts":
				$this->numWishProducts = $value;
				break;
			case "creationTime":
				$this->creationTime = $value;
				break;
		}
	}
}