<?php
require_once "vcc.php" ;
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
<!DOCTYPE html> 
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="style.css" rel="stylesheet" type="text/css"  />
		<script src="scripts.js"></script>	
		<script src="js/jquery-1.9.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<form class="form-signin" action="login.php" method="post">
				<h2 class="form-signin-heading">Σύνδεση</h2>
				<div class="control-group">
						<input type="hidden" name="subm" value="yes" />
						<input type="text" id="username" name="username" class="input-block-level" placeholder="Όνομα Χρήστη">
				</div>
				<div class="control-group">
						<input type="password" id="password" name="password" class="input-block-level" placeholder="Κωδικός Χρήστη">
				</div>
				<div class="control-group">
						<a href="reset_password.php">Δεν θυμάμαι τον κωδικό μου</a>
				</div>
				<div class="control-group">					
						<button type="submit" class="btn btn-large btn-primary">Είσοδος στο Σύστημα</button>
				</div>
			</form>	
		 </div>
	</body>
</html>
<?php
}
?>
