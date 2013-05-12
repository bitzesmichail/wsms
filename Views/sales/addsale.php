<?php
  require_once 'Views/navbars/navbar.php';
?>
   
<h1>
  	Προσθήκη νέας παραγγελίας
</h1>

<form class="form-horizontal" action="<?php echo SALEORDER . "/create"; ?>" method="post">
  <div class="control-group">
    <label class="control-label" for="customerSsn">ΑΦΜ Πελάτη</label>
    <div class="controls">
      <input type="text" name="customerSsn">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="dateDue">Ημερομηνία Παράδοσης</label>
    <div class="controls">
      <input type="text" name="dateDue">
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="status">Κατάσταση</label>
    <div class="controls">
      <input type="text" name="status">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="idUser">id Χρήστη</label>
    <div class="controls">
      <input type="text" name="idUser">
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary">Προσθήκη</button>
    </div>
  </div>
  
</form>
