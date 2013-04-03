<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<script src="jquery.js"></script>
		<script src="scriptd.js"></script>
	</head>
	<body>
	<?php
	if($loggedin == true)
	{
		require "index_user.php" ;
	}
	else
	{
		require "login.php" ;
	}
	?>
	</body>
</html>
