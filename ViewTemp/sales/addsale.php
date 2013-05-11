<?php
	$which = 'saleorder'; //which navbar button is active
	require_once 'Views/navbars/navbar.php';
?>
   
<div class="container">
<h1>
  	Προσθήκη παραγγελίας
</h1>

<form class="form-horizontal" action="<?php echo PRODUCT . "/create"; ?>" method="post">
  <div class="control-group">
    <label class="control-label" for="saleDateTime">Ημερομηνία</label>
    <div class="controls">
      <input type="text" name="saleDateTime">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="customer">Πελάτης</label>
    <div class="controls">
      <input type="text" name="customer">
    </div>
  </div>
 
</form>
</div>