<?php
  require_once 'Views/navbars/navbar.php';
  $selectedProducts = array();
?>

<form class="form-horizontal" action="<?php echo SALEORDER . "/addsale_products"; ?>" method="post">
		<div id="step1" class="addsale stepDivs step1">
		<h2>
			Παραγγελία για πελάτη <?php echo $data->customer->ssn ." " . $data->customer->name ." ". $data->customer->surname; ?>
		</h2>

		<div class="control-group">
			<label class="control-label" for="datePublish">Ημερομηνία Έκδοσης</label>
			<div class="controls">
					<input data-format="dd/MM/yyyy hh:mm:ss" type="text" value="Σήμερα" readonly></input>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="dateDue">Ημερομηνία Παράδοσης</label>
			<div class="controls">
				<div id="dateDue" class="input-append date">
					<input data-format="dd/MM/yyyy hh:mm:ss" type="text"></input>
					<span class="add-on">
						<i data-time-icon="icon-time" data-date-icon="icon-calendar">
						</i>
					</span>
				</div>
			</div>
		</div>		
	
		<h2>
			Διεύθυνση Αποστολής
		</h2>
		
		<div class="control-group">
    		<label class="control-label" for="name">Όνομα</label>
    		<div class="controls">
      			<input type="text" value="<?php echo $data->customer->name; ?>" readonly>
    		</div>
  		</div>
  
  		<div class="control-group">
    		<label class="control-label" for="surname">Επώνυμο</label>
    		<div class="controls">
      			<input type="text" value="<?php echo $data->customer->surname; ?>" readonly>
    		</div>
  		</div>

  		<div class="control-group">
    		<label class="control-label" for="address">Διεύθυνση</label>
    		<div class="controls">
      			<input type="text" value="<?php echo $data->customer->address; ?>" readonly>
    		</div>
  		</div>

 	 	<div class="control-group">
    		<label class="control-label" for="zipCode">Ταχυδρομικός Κωδικός</label>
    		<div class="controls">
      			<input type="text" value="<?php echo $data->customer->zipCode; ?>" readonly>
    		</div>
  		</div>

  		<div class="control-group">
    		<label class="control-label" for="city">Πόλη</label>
    		<div class="controls">
      			<input type="text" value="<?php echo $data->customer->city; ?>" readonly>
    		</div>
  		</div>

		<h2>
			Επιλογή Προϊόντων
		</h2>

		<p>
      		<a target="_blank" href="<?php echo PRODUCT . "/wishproduct_index"; ?>"><button class="btn btn-primary" type="button" >Ευκταία Προϊόντα</button></a>
    	</p>

		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="selectProductTable">
			<thead>
			<tr>
				<th><strong>Κωδικός</strong></th>
				<th><strong>Περιγραφή</strong></th>
				<th><strong>Τιμή</strong></th>
				<th><strong>Απόθεμα</strong></th>
				<th><strong>Έκπτωση</strong></th>
				<th><strong>Ποσότητα</strong></th>
				<th><strong>Ενέργειες</strong></th>
			</tr>
			</thead>
			<tbody>
			<?php
				if (!empty($data->products_with_discount)) {
					foreach ($data->products_with_discount as &$value) {
						echo "<tr>";
						echo "<td>" . $value->sku . "</td>";
						echo "<td>" . $value->description . "</td>";
						echo "<td>" . $value->priceSale . "</td>";
						echo "<td>" . $value->availableSum . "</td>";
						echo "<td>" . $value->discount . "</td>";
						echo "<td>0</td>";
						echo '<td><a class="edit" href="">Επεξεργασία Ποσότητας</a></td>';
						echo "</tr>";
					}
				}
			?>
			</tbody>
		</table>
		
		
			<input id='selectedProds' name='selectedProds' type='hidden' value='jhkhhkh' />
		<button type="button" class="btn btn-warning addsale next" 
		onclick="$('#selectedProds').val('helloooooooo');window.location.href='<?php echo SALEORDER . "/addsale_products' ">Επόμενο</button>
	</div>
</form>

<form class="form-horizontal" action="<?php echo SALEORDER . "/create"; ?>" method="post">
	<div id="step2" class="addsale stepDivs step2">
		<h2>
			Επιβεβαίωση Παραγγελίας για πελάτη <?php echo $data->customer->ssn ." " . $data->customer->name ." ". $data->customer->surname; ?>

			<?php 
			if (isset($_POST['selectedProds'])) {
				echo $_POST['selectedProds']; 
			}
			?>
		</h2>

		<div class="control-group">
			<label class="control-label" for="datePublish">Ημερομηνία Έκδοσης</label>
			<div class="controls">
					<input data-format="dd/MM/yyyy hh:mm:ss" type="text" value="Σήμερα" readonly></input>
			</div>
		</div>

		<div>
			<label class="control-label" for="dateDueFinal">Ημερομηνία Παράδοσης</label>
			<div class="controls">
				<div id="dateDueFinal" class="date">
					<input name="dateDueFinal" data-format="dd/MM/yyyy hh:mm:ss" type="text" readonly></input>
				</div>
			</div>
		</div>		
		
		<h2>
			Διεύθυνση Αποστολής
		</h2>
		
		<div class="control-group">
    		<label class="control-label" for="name">Όνομα</label>
    		<div class="controls">
      			<input type="text" value="<?php echo $data->customer->name; ?>" readonly>
    		</div>
  		</div>
  
  		<div class="control-group">
    		<label class="control-label" for="surname">Επώνυμο</label>
    		<div class="controls">
      			<input type="text" value="<?php echo $data->customer->surname; ?>" readonly>
    		</div>
  		</div>

  		<div class="control-group">
    		<label class="control-label" for="address">Διεύθυνση</label>
    		<div class="controls">
      			<input type="text" value="<?php echo $data->customer->address; ?>" readonly>
    		</div>
  		</div>

 	 	<div class="control-group">
    		<label class="control-label" for="zipCode">Ταχυδρομικός Κωδικός</label>
    		<div class="controls">
      			<input type="text" value="<?php echo $data->customer->zipCode; ?>" readonly>
    		</div>
  		</div>

  		<div class="control-group">
    		<label class="control-label" for="city">Πόλη</label>
    		<div class="controls">
      			<input type="text" value="<?php echo $data->customer->city; ?>" readonly>
    		</div>
  		</div>

  		<h2>
			Προϊόντα
		</h2>

		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="selectedProductTable">
			<thead>
			<tr>
				<th><strong>Κωδικός</strong></th>
				<th><strong>Περιγραφή</strong></th>
				<th><strong>Τιμή</strong></th>
				<th><strong>Απόθεμα</strong></th>
				<th><strong>Έκπτωση</strong></th>
				<th><strong>Ποσότητα</strong></th>
			</tr>
			</thead>
			<tbody>
			
			</tbody>
		</table>	

  		<input type="hidden" name="customerSsn" value="<?php echo $data->customer->ssn ?>">
		<button type="button" class="btn btn-success addsale previous">Προηγούμενο</button>

		<div class="addsale stepDivs submitButton">
				<button type="submit" class="btn btn-primary addsale" style="float:right;">Επιβεβαίωση</button>
		</div>
	</div>
</form>
