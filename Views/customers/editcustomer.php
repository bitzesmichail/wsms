<?php
  require_once 'Views/navbars/navbar.php';
?>

<div class="container">
<h2>
  	Επεξεργασία στοιχείων πελάτη
</h2>

<form class="form-horizontal" action="<?php echo CUSTOMER . "/update"; ?>" method="post">
  <div class="control-group">
    <label class="control-label" for="ssn">ΑΦΜ</label>
    <div class="controls">
      <input type="text" name="ssn" value="<?php echo $data->ssn; ?>" readonly>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="name">Όνομα</label>
    <div class="controls">
      <input type="text" name="name" value="<?php echo $data->name; ?>">
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="surname">Επώνυμο</label>
    <div class="controls">
      <input type="text" name="surname" value="<?php echo $data->surname; ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="phone">Τηλέφωνο</label>
    <div class="controls">
      <input type="text" name="phone" value="<?php echo $data->phone; ?>">
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="cellphone">Κινητό Τηλέφωνο</label>
    <div class="controls">
      <input type="text" name="cellphone" value="<?php echo $data->cellphone; ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="email">Email</label>
    <div class="controls">
      <input type="text" name="email" value="<?php echo $data->email; ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="address">Διεύθυνση</label>
    <div class="controls">
      <input type="text" name="address" value="<?php echo $data->address; ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="zipCode">Ταχυδρομικός Κωδικός</label>
    <div class="controls">
      <input type="text" name="zipCode" value="<?php echo $data->zipCode; ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Πόλη</label>
    <div class="controls">
      <input type="text" name="city" value="<?php echo $data->city; ?>">
    </div>
  </div>
  
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary">Ανανέωση</button>
    </div>
  </div>
</form>
</div>
