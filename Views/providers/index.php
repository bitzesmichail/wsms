<div class="container">

<?php
  $which = 'provider'; //which navbar button is active
  require_once 'Views/navbars/navbar.php';
?>

<div class="container">
<h2>
	Προμηθευτές
</h2>

<p>
  <a href="<?php echo PROVIDER . "/addprovider"; ?>"><button class="btn btn-primary" type="button" >Προσθήκη νέου προμηθευτή</button></a>
</p>

<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="provider_table">
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
	<th><strong>Ενέργειες</strong></th>
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
			echo "<td>" . "<a href=\"" . PROVIDER . "/editprovider?ssn=" . $value->ssn . "\">" . "<button class=\"btn btn-primary\" type=\"button\" >Επεξεργασία</button></a>";				
			echo "<a href=\"" . PROVIDER . "/deleteprovider?ssn=" . $value->ssn . "\">" . "<button class=\"btn btn-danger\" type=\"button\" >Διαγραφή</button></td></a>";
			echo "</tr>";
		}
	}
?>
</tbody>
</table>
</div>

