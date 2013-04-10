<?php
require "vcc.php" ;
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
	<body>
	<?php
		require "index_user.php" ;
	?>
	</body>
</html>
