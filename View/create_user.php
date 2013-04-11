 <?php
require_once "vcc.php" ;
if($loggedin)
{
  if($user['role'] == manager)
	{
		if(isset($_POST['subm']) == false)
		{
	?>
	<form action="create_user.php" method="post">
		<input type="hidden" name="subm" value="a" />
		Όνομα χρήστη: <input type="text" name="username" /><br />
		Κωδικός χρήστη: <input type="password" name="password" /><br />
		Επιβεβαίωση κωδικού: <input type="password" name="password_acc" onChange="check_passwords()" /><img id="check_passwords" /><br />
		E-mail: <input type="text" name="mail" /><br />
		<input type="submit" value="Δημιουργία Χρήστη" />
	</form>
	<?php
		}
		else
		{
			$username = addslashes($_POST['username']) ;
			$password = addslashes($_POST['password']) ;
			$mail = addslashes($_POST['mail']) ;
			create_user($username, $password, $mail) ;
		}
	}
}
?>
