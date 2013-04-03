<?php
session_start() ;
if($_POST['subm'] == "yes")
{
	require "vcc.php" ;
	$username = addslashes($_POST['username']) ;
	$password = addslashes($_POST['password']) ;
	login($username, $password) ;
}
else
{
?>
<div id="logInForm">
	<form action="login.php" method="post">
		<input type="hidden" name="subm" value="yes" />
		Όνομα Χρήστη: <input type="text" name="username" /><br />
		Κωδικός Χρήστη: <input type="password" name="password" /><br />
		<input type="submit" value="Είσοδος στο Σύστημα" /> 
		<a href="reset_password.php">Δεν θυμάμαι τον κωδικό μου</a>
	</form>
</div>
<?php
}
?>
