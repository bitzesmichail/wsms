<?php

class ProviderStatistics
{
	private $providerSsn;
	private $sumOutcome;
	private $minOutcome;
	private $maxOutcome;
	private $avgOutcome;
	private $numSupplyOrders;
	private $providerName;
	private $providerSurname;

	public function __construct($sumOutcome,
								$minOutcome,
								$maxOutcome,
								$avgOutcome,
								$numSupplyOrders,
								$providerSsn,
							    $providerName = null,
								$providerSurname = null
								)
	{

		$this->sumOutcome = $sumOutcome;
		$this->minOutcome = $minOutcome;
		$this->maxOutcome = $maxOutcome;
		$this->avgOutcome = $avgOutcome;
		$this->numSupplyOrders = $numSupplyOrders;
		$this->providerSsn = $providerSsn;
		$this->providerName = $providerName;
		$this->providerSurname = $providerSurname;

	}

	public function __get($param)
	{
		switch ($param)
		{
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
			case "providerSsn":
				return $this->providerSsn;
			case "providerName":
				return $this->providerName;
			case "providerSurname":
				return $this->providerSurname;
		}
	}

	public function __set($name, $value)
	{
		switch ($name)
		{
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
			case "providerSsn":
				$this->providerSsn = $value;
				break;
			case "providerName":
				$this->providerName = $value;
				break;
			case "providerSurname":
				$this->providerSurname = $value;
				break;
		}
	}
}