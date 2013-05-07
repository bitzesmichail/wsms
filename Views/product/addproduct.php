<?php
  require_once 'Views/navbars/navbar.php';
?>
   
<h1>
  	Προσθήκη προϊόντος
</h1>

<form class="form-horizontal" action="<?php echo PRODUCT . "/create"; ?>" method="post">
  <div class="control-group">
    <label class="control-label" for="sku">SKU</label>
    <div class="controls">
      <input type="text" name="sku">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="description">Περιγραφή</label>
    <div class="controls">
      <input type="text" name="description">
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="priceSale">Τιμή Πώλησης</label>
    <div class="controls">
      <input type="text" name="priceSale">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="priceSupply">Τιμή Αγοράς</label>
    <div class="controls">
      <input type="text" name="priceSupply">
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="availableSum">Διαθέσιμο</label>
    <div class="controls">
      <input type="text" name="availableSum">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="reservedSum">Δεσμευμένο</label>
    <div class="controls">
      <input type="text" name="reservedSum" value="0" disabled>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="orderedSum">Σε παραγγελία</label>
    <div class="controls">
      <input type="text" name="orderedSum" value="0" disabled>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="criticalSum">Κρίσιμο</label>
    <div class="controls">
      <input type="text" name="criticalSum">
    </div>
  </div>  

  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary">Προσθήκη</button>
    </div>
  </div>
</form>
