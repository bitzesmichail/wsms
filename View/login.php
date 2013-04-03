<?php
if($_POST['subm'] == "yes")
{
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
