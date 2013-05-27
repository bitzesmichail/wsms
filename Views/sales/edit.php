<?php
  require_once 'Views/navbars/navbar.php';
?>

<?php
  require_once 'Views/navbars/navbar.php';
?>

<form class="form-horizontal" action="<?php echo SALEORDER . "/create"; ?>" method="post">
	<div class="container">
		<h3>
			Στοιχεία Παραγγελίας
		</h3>
		<div class="control-group">
			<label class="control-label" for="saleOrderID">Κωδικός Παραγγελίας</label>
			<div class="controls">
				<input type="text" name="saleOrderID" id="saleOrderID" value="<?php echo $data->saleorder->idSaleOrder; ?>" readonly>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="datePublish">Ημερομηνία Έκδοσης</label>
			<div class="controls">
				<div id="datePublish" class="input-append date">
					<input data-format="dd/MM/yyyy hh:mm:ss" type="text" value="<?php echo $data->saleorder->dateCreated; ?>" readonly></input>
				</div>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="dateDue">Ημερομηνία Παράδοσης</label>
			<div class="controls">
				<div id="dateDue" class="input-append date">
					<input data-format="dd/MM/yyyy hh:mm:ss" type="text" value="<?php echo $data->saleorder->dateDue; ?>"></input>
					<span class="add-on">
						<i data-time-icon="icon-time" data-date-icon="icon-calendar">
						</i>
					</span>
				</div>
			</div>
		</div>	
	</div>
	
	<div class="container">
		<h3>
			Στοιχεία Πελάτη
		</h3>

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
      				<input type="text" name="city" value="<?php echo $data->customer->city; ?>" readonly>
    			</div>	
  		</div>

	</div>
	
	<div class="container">
		<h3>
			Διεύθυνση Αποστολής
		</h3>

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
      				<input type="text" name="city" value="<?php echo $data->customer->city; ?>" readonly>
    			</div>	
  		</div>

	</div>

	<?php
		var_dump($data->saleorder->products);
	?>

	<div class="container">
		<h2>
			Προϊόντα
		</h2>
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%">
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
				//if (!empty($data->saleorder->products)) {
					for ($i = 0; $i <= count($data->saleorder->products) - 1; $i++) {
						echo "<tr>";
						echo "<td>" . $data->saleorder->products[$i]->sku . "</td>";
						echo "<td>" . $data->saleorder->products[$i]->description . "</td>";
						echo "<td>" . $data->saleorder->products[$i]->priceSale . "</td>";
						echo "<td>" . $data->saleorder->products[$i]->availableSum . "</td>";
						echo "<td>" . "" . "</td>";
						echo "<td>0</td>";
						echo '<td><a class="edit" href="">Επεξεργασία Ποσότητας</a></td>';
						echo "</tr>";
					}
				//}
			?>
			</tbody>
		</table>
	</div>
	
	<div class="container">
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-primary">Επεξεργασία</button>
			</div>
		</div>
	</div>
</form>

