<?php
	$which = 'saleorder'; //which navbar button is active
	require_once 'Views/navbars/navbar.php';
?>

<div class="container">
<h1>
  	Επεξεργασία στοιχείων παραγγελίας
</h1>

<form class="form-horizontal" action="<?php echo PRODUCT . "/update"; ?>" method="post">
  <div class="control-group">
    <label class="control-label" for="dateDue">Ημερομηνία</label>
    <div class="controls">
      <input type="text" name="dateDue" value="<?php echo $data->dateDue; ?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="customerSsn">Πελάτης</label>
    <div class="controls">
      <input type="text" name="customerSsn" value="<?php echo $data->customerSsn; ?>">
    </div>
  </div>
  
  <input type="hidden" name="idProduct" value="<?php echo $data->idProduct; ?>">
  
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary">Ανανέωση</button>
    </div>
  </div>
</form>
</div>
