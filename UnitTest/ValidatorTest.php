<?php

require_once 'Controllers/utilities/Validator.php';

class ValidationTest extends PHPUnit_Framework_TestCase 
{
	public function testSSNValidator()
	{
		echo "\n";
		$this->assertEquals(true, Validator::isValid_SSN("090000045"));
		$this->assertEquals(false, Validator::isValid_SSN("tyropites"));
		$this->assertEquals(true, Validator::isValid_SSN("094019245"));
		$this->assertEquals(false, Validator::isValid_SSN("123"));
		$this->assertEquals(false, Validator::isValid_SSN("123456789"));
	}
}