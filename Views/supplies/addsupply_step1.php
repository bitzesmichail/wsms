<?php
  require_once 'Views/navbars/navbar.php';
?>

<form class="form-horizontal" action="<?php echo SUPPLYORDER . "/create"; ?>" method="post">
	<div id="step1" class="addsupply stepDivs step1">
		<h2>
			Δημιουργία Προμήθειας - Βήμα 1ο
		</h2>
		<div class="control-group">
			<label class="control-label" for="supplyOrderID">Κωδικός Προμήθειας</label>
			<div class="controls">
				<input type="text" name="supplyOrderID" id="supplyOrderID">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="datePublish">Ημερομηνία Έκδοσης</label>
			<div class="controls">
				<div id="datePublish" class="input-append date">
					<input data-format="dd/MM/yyyy hh:mm:ss" type="text"></input>
					<span class="add-on">
						<i data-time-icon="icon-time" data-date-icon="icon-calendar">
						</i>
					</span>
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

		<button type="button" class="btn btn-success addsupply previous" >Προηγούμενο</button>
		<button type="button" class="btn btn-warning addsupply next">Επόμενο</button>
		
		
	</div>
	
	<div id="step2" class="addsupply stepDivs step2">
		<h2>
			Δημιουργία Προμήθειας - Βήμα 2ο
		</h2>
		
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="selectProviderTable">
			<thead>
			<tr>
				<th><strong>ΑΦΜ</strong></th>
				<th><strong>Όνομα</strong></th>
				<th><strong>Επώνυμο</strong></th>
				<th><strong>Τηλέφωνο</strong></th>
				<th><strong>Κινητό Τηλέφωνο</strong></th>
				<th><strong>Email</strong></th>
				<th><strong>Διεύθυνση</strong></th>
				<th><strong>Ταχυδρομικός Κωδικός</strong></th>
				<th><strong>Πόλη</strong></th>
			</tr>
			</thead>
			<tbody>
			<?php
				if (!empty($data->providers)) {
					foreach ($data->providers as &$value) {
						echo "<tr>";
						echo "<td>" . $value->ssn . "</td>";
						echo "<td>" . $value->name . "</td>";
						echo "<td>" . $value->surname . "</td>";
						echo "<td>" . $value->phone . "</td>";
						echo "<td>" . $value->cellphone . "</td>";
						echo "<td>" . $value->email . "</td>";
						echo "<td>" . $value->address . "</td>";
						echo "<td>" . $value->zipCode . "</td>";
						echo "<td>" . $value->city . "</td>";
						echo "</tr>";
					}
				}
			?>
			</tbody>
		</table>
		
		
		
		<button type="button" class="btn btn-success addsupply previous">Προηγούμενο</button>
		<button type="button" class="btn btn-warning addsupply next">Επόμενο</button>
	</div>
	
	<div id="step3" class="addsupply stepDivs step3">
		<h2>
			Δημιουργία Προμήθειας - Βήμα 3ο
		</h2>
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="selectProductTable">
			<thead>
			<tr>
				<th><strong>Κωδικός</strong></th>
				<th><strong>Περιγραφή</strong></th>
				<th><strong>Τιμή</strong></th>
				<th><strong>Απόθεμα</strong></th>
				<th><strong>Έκδοση</strong></th>
				<th><strong>Ποσότητα</strong></th>
				<th><strong>Ενέργειες</strong></th>
			</tr>
			</thead>
			<tbody>
			<?php
				if (!empty($data->products)) {
					foreach ($data->products as &$value) {
						echo "<tr>";
						echo "<td>" . $value->sku . "</td>";
						echo "<td>" . $value->description . "</td>";
						echo "<td>" . $value->priceSale . "</td>";
						echo "<td>" . $value->availableSum . "</td>";
						echo "<td>" . $value->version . "</td>";
						echo "<td>0</td>";
						echo '<td><a class="edit" href="">Επεξεργασία Ποσότητας</a></td>';
						echo "</tr>";
					}
				}
			?>
			</tbody>
		</table>
		<button type="button" class="btn btn-success addsupply previous">Προηγούμενο</button>
		<button type="button" class="btn btn-warning addsupply next">Επόμενο</button>
	</div>
	
	<div id="step4" class="addsupply stepDivs step4">
		<h2>
			Στοιχεία Προμήθειας
		</h2>
		<div>
			<label class="control-label" for="supplyOrderIDFinal">Κωδικός Παραγγελίας</label>
			<div class="controls">
				<input type="text" name="supplyOrderIDFinal" id="supplyOrderIDFinal" readonly></input>
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
			Στοιχεία Προμηθευτή
		</h3>
		<div>
			<label class="control-label" for="providerSsnFinal">Κωδικός Προμηθευτή</label>
			<div class="controls">
				<input type="text" name="providerSsnFinal" id="providerSsnFinal" readonly></input>
			</div>
		</div>		
		<h3>
			Στοιχεία Προιόντων
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
		<button type="button" class="btn btn-success addsupply previous">Προηγούμενο</button>
	</div>

	<div class="addsupply stepDivs submitButton">
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-primary addsupply" style="float:right;">Προσθήκη</button>
			</div>
		</div>
	</div>
</form>

