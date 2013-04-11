<?php
require_once "vcc.php" ;
if(isset($_SESSION['username']) == false)
{
	header("Location: ./login.php") ;
}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<script src="jquery.js"></script>
		<script src="scripts.js"></script>
	</head>
	<body onload="load_page_get('<?php
		if($_SESSION['section'] == 'users') echo 'users.php' ; else if($_SESSION['section'] == 'products' || $_SESSION['section'] == '' || isset($_SESSION['section']) == false) echo 'products.php' ; else if($_SESSION['section'] == 'customers') echo 'customers.php' ; else if($_SESSION['section'] == 'providers') echo 'providers.php' ;
	?>
	', 'main', '<?php
		if($_SESSION['section'] == 'users') echo 'action=show_users' ; else if($_SESSION['section'] == 'products' || $_SESSION['section'] == '' || isset($_SESSION['section']) == false) echo 'action=show_products' ; else if($_SESSION['section'] == 'customers') echo 'action=show_customers' ; else if($_SESSION['section'] == 'providers') echo 'action=show_providers' ;
	?>') ; load_page_get('sub_menu.php', 'side_menu', '<?php
		if($_SESSION['section'] == 'users') echo 'action=users' ; else if($_SESSION['section'] == 'products'|| $_SESSION['section'] == '' || isset($_SESSION['section']) == false) echo 'action=products' ; else if($_SESSION['section'] == 'customers') echo 'action=customers' ; else if($_SESSION['section'] == 'providers') echo 'action=providers' ;
	?>') ;">
	<?php
		require "index_user.php" ;
	?>
	</body>
</html>
