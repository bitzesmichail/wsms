<?php
  //$which = 'users'; //which navbar button is active
  require_once 'Views/navbars/navbar.php';
?>

<h1>
  	Προσθήκη νέου χρήστη
</h1>

<form class="form-horizontal" onsubmit="return validate()" action="<?php echo USERS . "/create"; ?>" method="post">
  <div class="control-group">
    <label class="control-label" for="username">Username</label>
    <div class="controls">
      <input type="text" name="username" placeholder="username">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="email">Email</label>
    <div class="controls">
      <input type="text" name="email" placeholder="email">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="password">Password</label>
    <div class="controls">
      <input type="password" id="password" name="password" placeholder="password">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="retypepassword">Επιβεβαίωση Password</label>
    <div class="controls">
      <input type="password" id="retypepassword" name="retypepassword" placeholder="password">
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Δημιουργία</button>
    </div>
  </div>
</form>

<script type="text/javascript">
	function validate() {
		if(document.getElementById("password").value != document.getElementById("retypepassword").value)
		{
			alert("Passwords don't match");
			return false;
		}
		return true;
	}

	function passwordStrength(password)
	{
 		var desc = new Array();
 		desc[0] = "Πολύ Αδύναμο";
 		desc[1] = "Αδύναμο";
 		desc[2] = "Μέτριο";
 		desc[3] = "Καλό";
 		desc[4] = "Δυνατό";
 		desc[5] = "Strongest";

 		var strength = 0;

 		if (password.length > 6) 
 			strength++;

 		if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) 
 			strength++;

 		if (password.match(/\d+/)) 
 			strength++;

		if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) 
			strength++;

		if (password.length > 12) 
			strength++;
	}
</script>