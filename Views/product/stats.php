<?php
  require_once 'Views/navbars/navbar.php';
?>

<div class="container">
	<h2>	
		Στατιστικά Προϊόντος
	</h2>

<p>
  <a href="<?php echo PRODUCT . "/exportStatistics"; ?>"><button class="btn btn-primary" type="button" >Εξαγωγή σε Excel</button></a>
</p>

<form class="form-horizontal">
  <div class="control-group">
    <label class="control-label" for="ssn">ΑΦΜ</label>
    <div class="controls">
      <input type="text" name="ssn" value="<?php echo $data->customer->ssn; ?>" readonly>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="name">Όνομα</label>
    <div class="controls">
      <input type="text" name="name" value="<?php echo $data->customer->name; ?>" readonly>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="surname">Επώνυμο</label>
    <div class="controls">
      <input type="text" name="surname" value="<?php echo $data->customer->surname; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="phone">Τηλέφωνο</label>
    <div class="controls">
      <input type="text" name="phone" value="<?php echo $data->customer->phone; ?>" readonly>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="cellphone">Κινητό Τηλέφωνο</label>
    <div class="controls">
      <input type="text" name="cellphone" value="<?php echo $data->customer->cellphone; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="email">Email</label>
    <div class="controls">
      <input type="text" name="email" value="<?php echo $data->customer->email; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="address">Διεύθυνση</label>
    <div class="controls">
      <input type="text" name="address" value="<?php echo $data->customer->address; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="zipCode">Ταχυδρομικός Κωδικός</label>
    <div class="controls">
      <input type="text" name="zipCode" value="<?php echo $data->customer->zipCode; ?>" readonly> 
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Πόλη</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->customer->city; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Συνολικά Έσοδα</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->sumIncome; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Συνολικά Έξοδα</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->sumOutcome; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Κέρδη</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->sumProfits; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Συνολική Έκπτωση</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->sumDiscount; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Ελάχιστο Εισόδημα</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->minIncome; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Αριθμός Παραγγελιών</label>
    <div class="controls">
      <input type="text" name="city" value="<?php echo $data->stats->numSaleOrders; ?>" readonly>
    </div>
  </div>

</form>


<!--object(CustomerStatistics)[7]
  private 'customerSsn' => string '1111' (length=4)
  private 'sumIncome' => null
  private 'sumOutcome' => null
  private 'sumProfits' => null
  private 'sumDiscount' => null
  private 'minIncome' => null
  private 'maxIncome' => null
  private 'avgIncome' => null
  private 'numSaleOrders' => string '0' (length=1)
-->
</div>