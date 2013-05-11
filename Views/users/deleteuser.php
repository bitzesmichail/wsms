<?php
  //$which = 'users'; //which navbar button is active
  require_once 'Views/navbars/navbar.php';
?>

<div class="container">
<h1>
  	Διαγραφή χρήστη
</h1>

Είστε σίγουροι ότι επιθυμείτε τη διαγραφή του χρήστη με τα ακόλουθα στοιχεία:

<form class="form-horizontal" action="<?php echo USERS . "/delete"; ?>" method="post">
  <div class="control-group">
    <label class="control-label" for="username">Username</label>
    <div class="controls">
      <input type="text" name="username" value="<?php echo $data->username; ?>" disabled>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="email">Email</label>
    <div class="controls">
      <input type="text" name="email" value="<?php echo $data->email; ?>" disabled>
    </div>
  </div>
  
  <input type="hidden" name="idUser" value="<?php echo $data->idUser; ?>">

  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-danger">Διαγραφή</button>
      <a href="<?php echo USERS . "/index"; ?>"><button type="button" class="btn">Επιστροφή</button></a>
    </div>
  </div>
</form>
  </div>
