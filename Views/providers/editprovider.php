<?php
  require_once 'Views/navbars/navbar.php';
?>
   
<div class="container">
<h2>
  	Επεξεργασία στοιχείων προμηθευτή
</h2>

<form class="form-horizontal" action="<?php echo PROVIDER . "/update"; ?>" method="post">
  <div class="control-group">
    <label class="control-label" for="sku">SKU</label>
    <div class="controls">
      <input type="text" name="sku" value="<?php echo $data->sku; ?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="description">Περιγραφή</label>
    <div class="controls">
      <input type="text" name="description" value="<?php echo $data->description; ?>">
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="priceSale">Τιμή Πώλησης</label>
    <div class="controls">
      <input type="text" name="priceSale" value="<?php echo $data->priceSale; ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="priceSupply">Τιμή Αγοράς</label>
    <div class="controls">
      <input type="text" name="priceSupply" value="<?php echo $data->priceSupply; ?>">
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="availableSum">Διαθέσιμο</label>
    <div class="controls">
      <input type="text" name="availableSum" value="<?php echo $data->availableSum; ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="reservedSum">Δεσμευμένο</label>
    <div class="controls">
      <input type="text" name="reservedSum" value="<?php echo $data->reservedSum; ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="orderedSum">Σε παραγγελία</label>
    <div class="controls">
      <input type="text" name="orderedSum" value="<?php echo $data->orderedSum; ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="criticalSum">Κρίσιμο</label>
    <div class="controls">
      <input type="text" name="criticalSum" value="<?php echo $data->criticalSum; ?>">
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
