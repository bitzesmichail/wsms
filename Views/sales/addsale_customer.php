<?php
  require_once 'Views/navbars/navbar.php';
?>

<form class="form-horizontal" action="<?php echo SALEORDER . "/addsale_products"; ?>" method="post">
	<div class="container">
		<h2>
			Επιλογή πελάτη
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
			<?php
				if (!empty($data)) {
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
				}
			?>
			</tbody>
		</table>
		
		<button type="submit" class="btn btn-success">Επόμενο</button>
	</div>
	
</form>

