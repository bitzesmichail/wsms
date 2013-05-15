<?php
  require_once 'Views/navbars/navbar.php';
?>
  
<div class="container">
<h2>
  	Διαγραφή προμηθευτή
</h2>

Είστε σίγουροι ότι επιθυμείτε τη διαγραφή του προμηθευτή με τα ακόλουθα στοιχεία:

<form class="form-horizontal" action="<?php echo PROVIDER . "/delete"; ?>" method="post">
  <div class="control-group">
    <label class="control-label" for="ssn">ΑΦΜ</label>
    <div class="controls">
      <input type="text" name="ssn" value="<?php echo $data->ssn; ?>" readonly>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="name">Όνομα</label>
    <div class="controls">
      <input type="text" name="name" value="<?php echo $data->name; ?>" readonly>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="surname">Επώνυμο</label>
    <div class="controls">
      <input type="text" name="surname" value="<?php echo $data->surname; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="phone">Τηλέφωνο</label>
    <div class="controls">
      <input type="text" name="phone" value="<?php echo $data->phone; ?>" readonly>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="cellphone">Κινητό Τηλέφωνο</label>
    <div class="controls">
      <input type="text" name="cellphone" value="<?php echo $data->cellphone; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="email">Email</label>
    <div class="controls">
      <input type="text" name="email" value="<?php echo $data->email; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="address">Διεύθυνση</label>
    <div class="controls">
      <input type="text" name="address" value="<?php echo $data->address; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="zipCode">Ταχυδρομικός Κωδικός</label>
    <div class="controls">
      <input type="text" name="zipCode" value="<?php echo $data->zipCode; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Πόλη</label>
    <div class="controls">
      <input type="text" name="city" value="<?php echo $data->city; ?>" readonly>
    </div>
  </div>
  
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-danger">Διαγραφή</button>
      <a href="<?php echo PROVIDER . "/index"; ?>"><button type="button" class="btn">Επιστροφή</button></a>
    </div>
  </div>

</form>
</div>




