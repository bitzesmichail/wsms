<?php
  $which = 'saleorder'; //which navbar button is active
  require_once 'Views/navbars/navbar.php';
?>

<div class="container">
<h2>
	Παραγγελίες
</h2>

<p>
  <a href="<?php echo SALEORDER . "/addsaleorder"; ?>"><button class="btn btn-primary" type="button" >Προσθήκη νέας παραγγελίας</button></a>
</p>

<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="saleorder_table">
<thead>
<tr>
	<th><strong>AΦΜ Πελάτη</strong></th>
	<th><strong>id Χρήστη</strong></th>
	<th><strong>Ημερομηνία Δημιουργίας</strong></th>
	<th><strong>Προθεσμία</strong></th>
	<th><strong>Κατάσταση</strong></th>
</tr>
</thead>
<tbody>
<?php
	if (!empty($data)) {
		foreach ($data as &$value) {
			echo "<tr>";
			echo "<td>" . $value->customerSsn . "</td>";
			echo "<td>" . $value->idUser . "</td>";
			echo "<td>" . $value->dateCreated . "</td>";
			echo "<td>" . $value->dateDue . "</td>";
			echo "<td>" . $value->status . "</td>";
			//echo "<td>" . "<a href=\"" . PROVIDER . "/editprovider?sku=" . $value->sku . "\">" . "<button class=\"btn btn-primary\" type=\"button\" >Επεξεργασία</button></a>";				
			//echo "<a href=\"" . PROVIDER . "/deleteprovider?sku=" . $value->sku . "\">" . "<button class=\"btn btn-danger\" type=\"button\" >Διαγραφή</button></td></a>";
			echo "</tr>";
		}
	}
?>
</tbody>
</table>
</div>
