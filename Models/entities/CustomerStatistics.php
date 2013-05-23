<?php

class CustomerStatistics
{
	private $customerSsn;
	private $sumIncome;
	private $sumOutcome;
	private $sumProfits;
	private $sumDiscount;
	private $minIncome;
	private $maxIncome;
	private $avgIncome;
	private $numSaleOrders;

	public function __construct($sumIncome,
								$sumOutcome,
								$sumProfits,
								$sumDiscount,
								$minIncome,
								$maxIncome,
								$avgIncome,
								$numSaleOrders,
								$customerSsn
								)
	{

		$this->sumIncome = $sumIncome;
		$this->sumOutcome = $sumOutcome;
		$this->sumProfits = $sumProfits;
		$this->sumDiscount = $sumDiscount;
		$this->minIncome = $minIncome;
		$this->maxIncome = $maxIncome;
		$this->avgIncome = $avgIncome;
		$this->numSaleOrders = $numSaleOrders;
		$this->customerSsn = $customerSsn;

	}

	public function __get($param)
	{
		switch ($param)
		{
			case "sumIncome":
				return $this->sumIncome;
			case "sumOutcome":
				return $this->sumOutcome;
			case "sumProfits":
				return $this->sumProfits;
			case "sumDiscount":
				return $this->sumDiscount;
			case "minIncome":
				return $this->minIncome;
			case "maxIncome":
				return $this->maxIncome;
			case "avgIncome":
				return $this->avgIncome;
			case "numSaleOrders":
				return $this->numSaleOrders;
			case "customerSsn":
				return $this->customerSsn;
		}
	}

	public function __set($name, $value)
	{
		switch ($name)
		{
			case "sumIncome":
				$this->sumIncome = $value;
				break;
			case "sumOutcome":
				$this->sumOutcome = $value;
				break;
			case "sumProfits":
				$this->sumProfits = $value;
				break;
			case "sumDiscount":
				$this->sumDiscount = $value;
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
			case "customerSsn":
				$this->customerSsn = $value;
				break;
		}
	}
}