<?php

class ProductStatistics
{
	private $productSku;
	private $sumIncome;
	private $minIncome;
	private $maxIncome;
	private $avgIncome;
	private $numSaleOrders;
	private $sumOutcome;
	private $minOutcome;
	private $maxOutcome;
	private $avgOutcome;
	private $numSupplyOrders;

	public function __construct($sumIncome,
								$minIncome,
								$maxIncome,
								$avgIncome,
								$numSaleOrders,
								$sumOutcome,
								$minOutcome,
								$maxOutcome,
								$avgOutcome,
								$numSupplyOrders,
								$productSku
								)
	{

		$this->sumIncome = $sumIncome;
		$this->minIncome = $minIncome;
		$this->maxIncome = $maxIncome;
		$this->avgIncome = $avgIncome;
		$this->numSaleOrders = $numSaleOrders;
		$this->sumOutcome = $sumOutcome;
		$this->minOutcome = $minOutcome;
		$this->maxOutcome = $maxOutcome;
		$this->avgOutcome = $avgOutcome;
		$this->numSupplyOrders = $numSupplyOrders;
		$this->productSku = $productSku;

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
		}
	}
}