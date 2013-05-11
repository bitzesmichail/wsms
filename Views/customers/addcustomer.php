<?php
  require_once 'Views/navbars/navbar.php';
?>
   
<h1>
  	Προσθήκη νέου πελάτη
</h1>

<form class="form-horizontal" action="<?php echo CUSTOMER . "/create"; ?>" method="post">
  <div class="control-group">
    <label class="control-label" for="ssn">ΑΦΜ</label>
    <div class="controls">
      <input type="text" name="ssn">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="name">Όνομα</label>
    <div class="controls">
      <input type="text" name="name">
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="surname">Επώνυμο</label>
    <div class="controls">
      <input type="text" name="surname">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="phone">Τηλέφωνο</label>
    <div class="controls">
      <input type="text" name="phone">
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="cellphone">Κινητό Τηλέφωνο</label>
    <div class="controls">
      <input type="text" name="cellphone">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="email">Email</label>
    <div class="controls">
      <input type="text" name="email">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="address">Διεύθυνση</label>
    <div class="controls">
      <input type="text" name="address">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="zipCode">Ταχυδρομικός Κωδικός</label>
    <div class="controls">
      <input type="text" name="zipCode">
    </div>
  </div>  

  <div class="control-group">
    <label class="control-label" for="city">Πόλη</label>
    <div class="controls">
      <input type="text" name="city">
    </div>
  </div>  

  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary">Προσθήκη</button>
    </div>
  </div>
</form>
