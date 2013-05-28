<?php
  require_once 'Views/navbars/navbar.php';
?>

<form class="form-horizontal" action="<?php echo SALEORDER . "/create"; ?>" method="post">
	<div  class="container">
		<h2>
			Παραγγελία για πελάτη <?php echo $data->customer->ssn ." " . $data->customer->name ." ". $data->customer->surname; ?>
		</h2>

		<div class="control-group">
			<label class="control-label" for="datePublish">Ημερομηνία Έκδοσης</label>
			<div class="controls">
					<input data-format="dd/MM/yyyy hh:mm:ss" type="text" value="Σήμερα" readonly></input>
				</div>
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

		<h2>
			Προϊόντα
		</h2>
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

		<button type="submit" class="btn btn-primary">Επιβεβαίωση</button>
	</div>
	
	<div id="step4" class="addsale stepDivs step3">
		<h2>
			Στοιχεία Παραγγελίας
		</h2>
		<div>
			<label class="control-label" for="saleOrderIDFinal">Κωδικός Παραγγελίας</label>
			<div class="controls">
				<input type="text" name="saleOrderIDFinal" id="saleOrderIDFinal" readonly></input>
			</div>
		</div>		
		<h3>
			Στοιχεία Πωλητή
		</h3>
		<div>
			<label class="control-label" for="datePublishFinal">Ημερομηνία Έκδοσης</label>
			<div class="controls">
				<div id="datePublishFinal" class="date">
					<input data-format="dd/MM/yyyy hh:mm:ss" type="text" readonly></input>
				</div>
			</div>
			<label class="control-label" for="dateDueFinal">Ημερομηνία Παράδοσης</label>
			<div class="controls">
				<div id="dateDueFinal" class="date">
					<input data-format="dd/MM/yyyy hh:mm:ss" type="text" readonly></input>
				</div>
			</div>
		</div>		
		<h3>
			Στοιχεία Πελάτη
		</h3>
		<div>
			<label class="control-label" for="customerSsnFinal">Κωδικός Πελάτη</label>
			<div class="controls">
				<input type="text" name="customerSsnFinal" id="customerSsnFinal" readonly></input>
			</div>
		</div>		
		<h3>
			Στοιχεία Προϊόντων
		</h3>
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="selectedProductTable">
			<thead>
			<tr>
				<th><strong>Κωδικός</strong></th>
				<th><strong>Περιγραφή</strong></th>
				<th><strong>Τιμή</strong></th>
				<th><strong>Απόθεμα</strong></th>
				<th><strong>Έκδοση</strong></th>
				<th><strong>Ποσότητα</strong></th>
			</tr>
			</thead>
			<tbody>
			
			</tbody>
		</table>	
	</div>

</form>

