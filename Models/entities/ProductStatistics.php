<?php

class ProductStatistics
{
	private $productSku;
	private $productDescription;
	private $sumIncome;
	private $minIncome;
	private $maxIncome;
	private $avgIncome;
	private $sumQuantitySold;
	private $minQuantitySold;
	private $maxQuantitySold;
	private $avgQuantitySold;
	private $numSaleOrders;
	private $sumOutcome;
	private $minOutcome;
	private $maxOutcome;
	private $avgOutcome;
	private $sumQuantitySupplied;
	private $minQuantitySupplied;
	private $maxQuantitySupplied;
	private $avgQuantitySupplied;
	private $numSupplyOrders;

	public function __construct($sumIncome,
								$minIncome,
								$maxIncome,
								$avgIncome,
								$sumQuantitySold,
								$minQuantitySold,
								$maxQuantitySold,
								$avgQuantitySold,
								$numSaleOrders,
								$sumOutcome,
								$minOutcome,
								$maxOutcome,
								$avgOutcome,
								$sumQuantitySupplied,
								$minQuantitySupplied,
								$maxQuantitySupplied,
								$avgQuantitySupplied,
								$numSupplyOrders,
								$productSku,
								$productDescription = null
								)
	{

		$this->sumIncome = $sumIncome;
		$this->minIncome = $minIncome;
		$this->maxIncome = $maxIncome;
		$this->avgIncome = $avgIncome;
		$this->sumQuantitySold = $sumQuantitySold;
		$this->minQuantitySold = $minQuantitySold;
		$this->maxQuantitySold = $maxQuantitySold;
		$this->avgQuantitySold = $avgQuantitySold;
		$this->numSaleOrders = $numSaleOrders;
		$this->sumOutcome = $sumOutcome;
		$this->minOutcome = $minOutcome;
		$this->maxOutcome = $maxOutcome;
		$this->avgOutcome = $avgOutcome;
		$this->sumQuantitySupplied = $sumQuantitySupplied;
		$this->minQuantitySupplied = $minQuantitySupplied;
		$this->maxQuantitySupplied = $maxQuantitySupplied;
		$this->avgQuantitySupplied = $avgQuantitySupplied;
		$this->numSupplyOrders = $numSupplyOrders;
		$this->productSku = $productSku;
		$this->productDescription = $productDescription;

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
			case "sumQuantitySold":
				return $this->sumQuantitySold;
			case "minQuantitySold":
				return $this->minQuantitySold;
			case "maxQuantitySold":
				return $this->maxQuantitySold;
			case "avgQuantitySold":
				return $this->avgQuantitySold;
			case "sumQuantitySupplied":
				return $this->sumQuantitySupplied;
			case "minQuantitySupplied":
				return $this->minQuantitySupplied;
			case "maxQuantitySupplied":
				return $this->maxQuantitySupplied;
			case "avgQuantitySupplied":
				return $this->avgQuantitySupplied;
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
			case "sumQuantitySold":
				$this->sumQuantitySold = $value;
				break;
			case "minQuantitySold":
				$this->minQuantitySold = $value;
				break;
			case "maxQuantitySold":
				$this->maxQuantitySold = $value;
				break;
			case "avgQuantitySold":
				$this->avgQuantitySold = $value;
				break;
			case "sumQuantitySupplied":
				$this->sumQuantitySupplied = $value;
				break;
			case "minQuantitySupplied":
				$this->minQuantitySupplied = $value;
				break;
			case "maxQuantitySupplied":
				$this->maxQuantitySupplied = $value;
				break;
			case "avgQuantitySupplied":
				$this->avgQuantitySupplied = $value;
				break;
		}
	}
}