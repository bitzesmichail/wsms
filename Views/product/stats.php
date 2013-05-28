<?php
  require_once 'Views/navbars/navbar.php';
?>

<div class="container">
	<h2>	
		Στατιστικά Προϊόντος
	</h2>

<?php
  var_dump($data->stats);
?>

<p>
  <a href="<?php echo PRODUCT . "/exportStatistics"; ?>"><button class="btn btn-primary" type="button" >Εξαγωγή σε Excel</button></a>
</p>

<form class="form-horizontal">
    <div class="control-group">
    <label class="control-label" for="sku">SKU</label>
    <div class="controls">
      <input type="text" name="sku" value="<?php echo $data->product->sku; ?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="description">Περιγραφή</label>
    <div class="controls">
      <input type="text" name="description" value="<?php echo $data->product->description; ?>">
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="priceSale">Τιμή Πώλησης</label>
    <div class="controls">
      <input type="text" name="priceSale" value="<?php echo $data->product->priceSale; ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="priceSupply">Τιμή Αγοράς</label>
    <div class="controls">
      <input type="text" name="priceSupply" value="<?php echo $data->product->priceSupply; ?>">
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="availableSum">Διαθέσιμο</label>
    <div class="controls">
      <input type="text" name="availableSum" value="<?php echo $data->product->availableSum; ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="reservedSum">Δεσμευμένο</label>
    <div class="controls">
      <input type="text" name="reservedSum" value="<?php echo $data->product->reservedSum; ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="orderedSum">Σε παραγγελία</label>
    <div class="controls">
      <input type="text" name="orderedSum" value="<?php echo $data->product->orderedSum; ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="criticalSum">Κρίσιμο</label>
    <div class="controls">
      <input type="text" name="criticalSum" value="<?php echo $data->product->criticalSum; ?>">
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Συνολικά Έσοδα</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->sumIncome; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Ελάχιστο Εισόδημα</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->minIncome; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Μέγιστο Εισόδημα</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->maxIncome; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Μέσο Εισόδημα</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->avgIncome; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Αριθμός Παραγγελιών</label>
    <div class="controls">
      <input type="text" name="city" value="<?php echo $data->stats->numSaleOrders; ?>" readonly>
    </div>
  </div>

</form>
</div>

<!--
  private 'sumIncome' => null 
  private 'minIncome' => null 
  private 'maxIncome' => null 
  private 'avgIncome' => null 
  private 'numSaleOrders' => null private 'sumOutcome' => null
  private 'minOutcome' => null private 'maxOutcome' => null private 'avgOutcome' => null private 'numSupplyOrders' => null
  -->