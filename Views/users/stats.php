<?php
  $which = 'stats'; //which navbar button is active
  require_once 'Views/navbars/navbar.php';
?>

<div class="container">
	<h2>	
		Στατιστικά Συστήματος
	</h2>

<form class="form-horizontal">
  <div class="control-group">
    <label class="control-label" for="ssn">Συνολικά Έσοδα Από Όλες Τις Παραγγελίες</label>
    <div class="controls">
      <input type="text" name="ssn" value="<?php echo $data->stats->sumIncome; ?>" readonly>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="name">Ελάχιστα Έσοδα Από Μία Παραγγελία</label>
    <div class="controls">
      <input type="text" name="name" value="<?php echo $data->stats->minIncome; ?>" readonly>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="surname">Μέγιστα Έσοδα Από Μία Παραγγελία</label>
    <div class="controls">
      <input type="text" name="surname" value="<?php echo $data->stats->maxIncome; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="phone">Μέσα Έσοδα Από Μία Παραγγελία</label>
    <div class="controls">
      <input type="text" name="phone" value="<?php echo $data->stats->avgIncome; ?>" readonly>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="cellphone">Συνολικά Κέρδη Από Όλες Τις Παραγγελίες</label>
    <div class="controls">
      <input type="text" name="cellphone" value="<?php echo $data->stats->sumProfit; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="email">Ελάχιστα Κέρδη Από Μία Παραγγελία</label>
    <div class="controls">
      <input type="text" name="email" value="<?php echo $data->stats->minProfit; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="address">Μέγιστα Κέρδη Από Μία Παραγγελία</label>
    <div class="controls">
      <input type="text" name="address" value="<?php echo $data->stats->maxProfit; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="zipCode">Μέσα Κέρδη Από Μία Παραγγελία</label>
    <div class="controls">
      <input type="text" name="zipCode" value="<?php echo $data->stats->avgProfit; ?>" readonly> 
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Συνολικό Πόσο Εκπτώσεων Από Όλες Τις Παραγγελίες</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->sumDiscount; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Ελάχιστο Πόσο Έκπτωσης Από Μία Παραγγελία</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->minDiscount; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Μέγιστο Πόσο Έκπτωσης Από Μία Παραγγελία</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->maxDiscount; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Μέσο Πόσο Έκπτωσης Από Μία Παραγγελία</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->avgDiscount; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Συνολικός Αριθμός Εκπληρωμένων Παραγγελιών</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->numSaleOrders; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Συνολικά Έξοδα Από Όλες Τις Προμήθειες</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->sumOutcome; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Ελάχιστα Έξοδα Από Μία Προμήθεια</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->minOutcome; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Μέγιστα Έξοδα Από Μία Προμήθεια</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->maxOutcome; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Μέσα Έξοδα Από Μία Προμήθεια</label>
    <div class="controls">
      <input type="text" name="city" value="<?php echo $data->stats->avgOutcome; ?>" readonly>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="city">Συνολικός Αριθμός Εκπληρωμένων Προμηθειών</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->numSupplyOrders; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Αριθμός Χρηστών Συστήματος</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->numUsers; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Αριθμός Πελατών Συστήματος</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->numCustomers; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Αριθμός Προμηθευτών Συστήματος</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->numProviders; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Αριθμός Προϊόντων Συστήματος</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->numProducts; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Αριθμός Ευκταίων Προϊόντων Συστήματος</label>
    <div class="controls">
      <input type="text" name="city" value="<?php echo $data->stats->numWishProducts; ?>" readonly>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="city">Ημερομηνία Εκκίνησης Συστήματος</label>
    <div class="controls">
      <input type="text" name="city" value="<?php echo $data->stats->creationTime; ?>" readonly>
    </div>
  </div>

</form>

</div>