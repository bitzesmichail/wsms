<?php
require "vcc.php" ;
if(isset($_SESSION['username']) == true)
{
	header("Location: ./") ;
}
if($_POST['subm'] == "yes")
{
	$username = addslashes($_POST['username']) ;
	$password = addslashes($_POST['password']) ;
	if(login($username, $password) == -1)
	{
		echo "Wrong login" ;
	} 
}
else
{
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<script src="jquery.js"></script>
		<script src="scripts.js"></script>
	</head>
	<body>
		<div id="logInForm">
			<form action="login.php" method="post">
				<input type="hidden" name="subm" value="yes" />
				Όνομα Χρήστη: <input type="text" name="username" /><br />
				Κωδικός Χρήστη: <input type="password" name="password" /><br />
				<input type="submit" value="Είσοδος στο Σύστημα" /> 
				<a href="reset_password.php">Δεν θυμάμαι τον κωδικό μου</a>
			</form>
		</div>
	</body>
</html>
<?php
}
?>
