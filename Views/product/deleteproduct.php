<?php
  require_once 'Views/navbars/navbar.php';
?>
   
<h1>
  	Διαγραφή προϊόντος
</h1>

Είστε σίγουροι ότι επιθυμείτε τη διαγραφή του προϊόντος με τα ακόλουθα στοιχεία:

<form class="form-horizontal" action="<?php echo PRODUCT . "/delete"; ?>" method="post">
  <div class="control-group">
    <label class="control-label" for="sku">SKU</label>
    <div class="controls">
      <input type="text" name="sku" value="<?php echo $data->sku; ?>" readonly>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="description">Περιγραφή</label>
    <div class="controls">
      <input type="text" name="description" value="<?php echo $data->description; ?>" disabled>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="priceSale">Τιμή Πώλησης</label>
    <div class="controls">
      <input type="text" name="priceSale" value="<?php echo $data->priceSale; ?>" disabled>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="priceSupply">Τιμή Αγοράς</label>
    <div class="controls">
      <input type="text" name="priceSupply" value="<?php echo $data->priceSupply; ?>" disabled>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="availableSum">Διαθέσιμο</label>
    <div class="controls">
      <input type="text" name="availableSum" value="<?php echo $data->availableSum; ?>" disabled>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="reservedSum">Δεσμευμένο</label>
    <div class="controls">
      <input type="text" name="reservedSum" value="<?php echo $data->reservedSum; ?>" disabled>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="orderedSum">Σε παραγγελία</label>
    <div class="controls">
      <input type="text" name="orderedSum" value="<?php echo $data->orderedSum; ?>" disabled>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="criticalSum">Κρίσιμο</label>
    <div class="controls">
      <input type="text" name="criticalSum" value="<?php echo $data->criticalSum; ?>" disabled>
    </div>
  </div>

  <input type="hidden" name="idProduct" value="<?php echo $data->idProduct; ?>">
  
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-danger">Διαγραφή</button>
      <a href="<?php echo PRODUCT . "/index"; ?>"><button type="button" class="btn">Επιστροφή</button></a>
    </div>
  </div>
</form>





