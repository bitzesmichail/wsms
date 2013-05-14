<?php
  require_once 'Views/navbars/navbar.php';
?>

<div class="hero-unit">
	<h3>Warehouse &amp; Sales Management System</h3>
	<p>
		<?php if (!isset($_SESSION['username'])): ?>
			<p>Καλώς ήρθατε! Αυτή είναι η αρχική σελίδα του συστήματος διαχείρισης αποθηκών και οργάνωσης πωλήσεων. Αν δεν έχετε ήδη λογαριασμό 
				αποτανθείτε στον manager προκειμένου να δημιουργήσει ένα για λογαριασμό σας.
            	<form class="navbar-form pull-right" onsubmit="return check()" method="post" action="<?php echo USERS; ?>/login">
            		<input class="span2" id="username" name="username" type="text" placeholder="Username">
                	<input class="span2" id="password" name="password" type="password" placeholder="Password">
              		<button type="submit" class="btn">Είσοδος</button>
	            </form>
	        <?php else: ?>
	        	<p>Καλώς ήρθατε! Έχετε συνδεθεί επιτυχώς στο σύστημα διαχείρισης αποθηκών και οργάνωσης πωλήσεων. Από το μενού επιλέξτε τη λειτουργία που επιθυμείτε να εκτελέσετε.</p>
            	</div>
            <?php endif ?>
	</p>
</div>

<script type="text/javascript">
//check if username/password fields are empty
function check() {
  if(document.getElementById("username").value == "" || document.getElementById("password").value == "") 
  {
      alert("Κενό username ή password");
      return false;
  }
    return true;
}
</script>