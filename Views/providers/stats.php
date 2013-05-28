<?php
  require_once 'Views/navbars/navbar.php';
?>

<div class="container">
	<h2>	
		Στατιστικά Προμηθευτή
	</h2>

<?php
  var_dump($data->stats);
?>

<p>
  <a href="<?php echo PROVIDER . "/exportStatistics"; ?>"><button class="btn btn-primary" type="button" >Εξαγωγή σε Excel</button></a>
</p>

<form class="form-horizontal">
  <div class="control-group">
    <label class="control-label" for="ssn">ΑΦΜ</label>
    <div class="controls">
      <input type="text" name="ssn" value="<?php echo $data->provider->ssn; ?>" readonly>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="name">Όνομα</label>
    <div class="controls">
      <input type="text" name="name" value="<?php echo $data->provider->name; ?>" readonly>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="surname">Επώνυμο</label>
    <div class="controls">
      <input type="text" name="surname" value="<?php echo $data->provider->surname; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="phone">Τηλέφωνο</label>
    <div class="controls">
      <input type="text" name="phone" value="<?php echo $data->provider->phone; ?>" readonly>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="cellphone">Κινητό Τηλέφωνο</label>
    <div class="controls">
      <input type="text" name="cellphone" value="<?php echo $data->provider->cellphone; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="email">Email</label>
    <div class="controls">
      <input type="text" name="email" value="<?php echo $data->provider->email; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="address">Διεύθυνση</label>
    <div class="controls">
      <input type="text" name="address" value="<?php echo $data->provider->address; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="zipCode">Ταχυδρομικός Κωδικός</label>
    <div class="controls">
      <input type="text" name="zipCode" value="<?php echo $data->provider->zipCode; ?>" readonly> 
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Πόλη</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->provider->city; ?>" readonly>
    </div>
  </div>






  <div class="control-group">
    <label class="control-label" for="city">Συνολικά Έσοδα</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->sumOutcome; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Συνολικά Έξοδα</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->minOutcome; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Ελάχιστα Έσοδα</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->maxOutcome; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Mέγιστα Έσοδα</label>
    <div class="controls">
      <input type="text" value="<?php echo $data->stats->avgOutcome; ?>" readonly>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="city">Αριθμός Παραγγελιών</label>
    <div class="controls">
      <input type="text" name="city" value="<?php echo $data->stats->numSaleOrders; ?>" readonly>
    </div>
  </div>

</form>


<!--
  private 'sumOutcome' => null
  private 'minOutcome' => null
  private 'maxOutcome' => null
  private 'avgOutcome' => null
  private 'numSupplyOrders' => string '0' (length=1)
-->
</div>