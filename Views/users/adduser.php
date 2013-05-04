<?php
  //$which = 'users'; //which navbar button is active
  require_once 'Views/navbars/navbar.php';
?>

<h1>
  	Προσθήκη νέου χρήστη
</h1>

<form class="form-horizontal" action="<?php echo USERS . "/create"; ?>" method="post">
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
      <input type="password" name="password" placeholder="password">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="retypepassword">Επιβεβαίωση Password</label>
    <div class="controls">
      <input type="password" name="retypepassword" placeholder="password">
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Δημιουργία</button>
    </div>
  </div>
</form>