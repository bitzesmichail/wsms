<?php
  require_once 'Views/navbars/navbar.php';
?>

<form class="form-horizontal" action="<?php echo SALEORDER . "/create"; ?>" method="post">
	<div id="step1" class="stepDivs step1">
		<h2>
			Δημιουργία Παραγγελίας - Βήμα 1ο
		</h2>
		<div class="control-group">
			<label class="control-label" for="saleOrderID">Κωδικός Παραγγελίας</label>
			<div class="controls">
				<input type="text" name="saleOrderID" id="saleOrderID">
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

		<button type="button" class="btn btn-success previous" >Προηγούμενο</button>
		<button type="button" class="btn btn-warning next">Επόμενο</button>
		
		
	</div>
	
	<div id="step2" class="stepDivs step2">
		<h2>
			Δημιουργία Παραγγελίας - Βήμα 2ο
		</h2>
		
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="selectCustomerTable">
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
			<tr>
				<td>value->ssn</td>
				<td>value->name</td>
				<td>value->surname</td>
				<td>value->phone</td>
				<td>value->cellphone</td>
				<td>value->email</td>
				<td>value->address</td>
				<td>value->zipCode</td>
				<td>value->city</td>
			</tr>
			<tr>
				<td>value-eg>ssn</td>
				<td>value-eg>name</td>
				<td>value-ege>eggsurname</td>
				<td>value-egege>phone</td>
				<td>value->cellphone</td>
				<td>value-egege>email</td>
				<td>valueggeg->address</td>
				<td>valuege->zipCode</td>
				<td>value->city</td>
			</tr>
			<tr>
				<td>value-sgs>ssn</td>
				<td>value->name</td>
				<td>value->sgrgurname</td>
				<td>valuesg->phone</td>
				<td>value->cellphone</td>
				<td>value-ges>email</td>
				<td>value->address</td>
				<td>valuees->zipCode</td>
				<td>value->city</td>
			</tr>
			<tr>
				<td>value->ssn1</td>
				<td>value->name1</td>
				<td>value->surname1</td>
				<td>value->phone1</td>
				<td>value->cellphone1</td>
				<td>value->email1</td>
				<td>value->address1</td>
				<td>value->zipCode1</td>
				<td>value->city1</td>
			</tr>
			<tr>
				<td>value->ssn2</td>
				<td>value->name2</td>
				<td>value->surname2</td>
				<td>value->phone2</td>
				<td>value->cellphone2</td>
				<td>value->email2</td>
				<td>value->address2</td>
				<td>value->zipCode2</td>
				<td>value->city2</td>
			</tr>
			<?php
				/*if (!empty($data)) {
					foreach ($data as &$value) {
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
				}*/
			?>
			</tbody>
		</table>
		
		
		
		<button type="button" class="btn btn-success previous">Προηγούμενο</button>
		<button type="button" class="btn btn-warning next">Επόμενο</button>
	</div>
	
	<div id="step3" class="stepDivs step3">
		<h2>
			Δημιουργία Παραγγελίας - Βήμα 3ο
		</h2>
		<div class="control-group">
			<label class="control-label" for="dateDue">Ποσότητα</label>
			<div class="controls">
				<input type="text" name="dateDue">
			</div>
		</div>
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="selectProductTable">
			<thead>
			<tr>
				<th><strong>ΑΦΜ</strong></th>
				<th><strong>Όνομα</strong></th>
				<th><strong>Επώνυμο</strong></th>
				<th><strong>Τηλέφωνο</strong></th>
				<th><strong>Ποσότητα</strong></th>
				<th><strong>Ενέργειες</strong></th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>value->ssn</td>
				<td>value->name</td>
				<td>value->surname</td>
				<td>value->phone</td>
				<td>0</td>
				<td><a class="edit" href="">Επεξεργασία Ποσότητας</a></td>
			</tr>
			<tr>
				<td>value->ssn1</td>
				<td>value->name1</td>
				<td>value->surname1</td>
				<td>value->phone1</td>
				<td>0</td>
				<td><a class="edit" href="">Επεξεργασία Ποσότητας</a></td>
			</tr>
			<tr>
				<td>value->ssn2</td>
				<td>value->name2</td>
				<td>value->surname2</td>
				<td>value->phone2</td>
				<td>0</td>
				<td><a class="edit" href="">Επεξεργασία Ποσότητας</a></td>
			</tr>
			<?php
				/*if (!empty($data)) {
					foreach ($data as &$value) {
						echo "<tr>";
						echo "<td>" . $value->ssn . "</td>";
						echo "<td>" . $value->name . "</td>";
						echo "<td>" . $value->surname . "</td>";
						echo "<td>" . $value->phone . "</td>";
						echo "</tr>";
					}
				}*/
			?>
			</tbody>
		</table>
		<button type="button" class="btn btn-success previous">Προηγούμενο</button>
		<button type="button" class="btn btn-warning next">Επόμενο</button>
	</div>
	
	<div id="step4" class="stepDivs step4">
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
			Στοιχεία Προιόντων
		</h3>
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="selectedProductTable">
			<thead>
			<tr>
				<th><strong>ΑΦΜ</strong></th>
				<th><strong>Όνομα</strong></th>
				<th><strong>Επώνυμο</strong></th>
				<th><strong>Τηλέφωνο</strong></th>
				<th><strong>Ποσότητα</strong></th>
			</tr>
			</thead>
			<tbody>
			
			</tbody>
		</table>	
		<button type="button" class="btn btn-success previous">Προηγούμενο</button>
	</div>

	<div class="stepDivs submitButton">
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-primary" style="float:right;">Προσθήκη</button>
			</div>
		</div>
	</div>
</form>

