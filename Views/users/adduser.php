<?php
  //$which = 'users'; //which navbar button is active
  require_once 'Views/navbars/navbar.php';
?>
   
    <script src="<?php echo BOOTSTRAP; ?>/js/jquery.js"></script>

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
      <input type="password" id="password" name="password" placeholder="password" oninput="passwordStrength()">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="retypepassword">Επιβεβαίωση Password</label>
    <div class="controls">
      <input type="password" id="retypepassword" name="retypepassword" placeholder="password">
    </div>
  </div>

  <div class="alert" id="alertstrength">
    Password strength
  </div>

  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Δημιουργία</button>
    </div>
  </div>
</form>

<script type="text/javascript">
  jQuery(document).ready(function($) {
      jQuery('#alertstrength').hide();
  });

	function validate() {
		if(document.getElementById("password").value != document.getElementById("retypepassword").value) 
		{
			alert("Τα passwords που δόθηκαν δεν ταιριάζουν");
			return false;
		}
		return true;
	}

	function passwordStrength()
	{
    jQuery('#alertstrength').show();

    var msg = new Array();
    msg[0] = "Μη αποδεκτό - Απαιτούνται τουλάχιστον 6 χαρακτήρες";
    msg[1] = "Αδύναμο";
    msg[2] = "Αδύναμο+";
    msg[3] = "Μέτριο";
    msg[4] = "Μέτριο+";
    msg[5] = "Καλό";
    msg[6] = "Καλό+";
    msg[7] = "Δυνατό";
    msg[8] = "Δυνατό+";
    msg[9] = "Πολύ δυνατό";
    msg[10] = "Πολύ δυνατό+";

    var password = jQuery('#password').val();

    var strength = 0;

    if (password.length < 6)
      strength = 0;

    if (password.length >= 6) 
      strength = 1;

    if (password.length >= 10) 
      strength = 3;

    if (password.length >= 12) 
      strength = 5;

    if (password.length >= 15) 
      strength = 7;

    if (password.length >= 20) 
      strength = 9;

    if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) 
      strength++;

      jQuery('#alertstrength').text(msg[strength]);
}
</script>