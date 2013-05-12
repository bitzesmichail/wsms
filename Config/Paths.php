<?php
	define('HOME', '//' . $_SERVER['HTTP_HOST'] . substr($_SERVER['REQUEST_URI'], 0, strlen($_SERVER['REQUEST_URI']) - strlen($_GET['url']) - 1 - strlen(strstr($_SERVER['REQUEST_URI'], '?'))));
	define('BOOTSTRAP', HOME . '/Bootstrap');
	define('USERS', HOME . '/users');
	define('PRODUCT', HOME . '/product');
	define('PROVIDER', HOME . '/provider');
	define('CUSTOMER', HOME . '/customer');
	define('SALEORDER', HOME . '/saleOrder');
	define('SUPPLYORDER', HOME . '/supplyOrder');

	define('BACK', '..');
