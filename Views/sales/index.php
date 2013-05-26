<?php
  $which = 'saleorder'; //which navbar button is active
  require_once 'Views/navbars/navbar.php';
?>

<div class="container">
<h2>
	Ενεργές Παραγγελίες
</h2>

<p>
  <a href="<?php echo SALEORDER . "/addsaleorder"; ?>"><button class="btn btn-primary" type="button" >Προσθήκη νέας παραγγελίας</button></a>
</p>

<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="saleorder_table">
<thead>
<tr>
	<th><strong>Αριθμός Παραγγελίας</strong></th>
	<th><strong>Όνομα Πελάτη</strong></th>
	<th><strong>Επώνυμο Πελάτη</strong></th>
	<th><strong>ΑΦΜ Πελάτη</strong></th>
	<th><strong>Προθεσμία</strong></th>
	<th><strong>Ενέργειες</strong></th>
</tr>
</thead>
<tbody>
<?php
	if (!empty($data)) {
		foreach ($data as &$value) {
			echo "<tr>";
			echo "<td>" . $value->id . "</td>";
			echo "<td>" . $value->name . "</td>";
			echo "<td>" . $value->surname . "</td>";
			echo "<td>" . $value->ssn . "</td>";
			echo "<td>" . $value->dateDue . "</td>";			
			echo "<td>" . "<a href=\"" . SALEORDER . "/editsaleorder?id=" . $value->id . "\">" . "<button class=\"btn btn-primary\" type=\"button\" >Επεξεργασία</button></a>";				
			echo "<a href=\"" . SALEORDER . "/deletesaleorder?ssn=" . $value->ssn . "\">" . "<button class=\"btn btn-danger\" type=\"button\" >Διαγραφή</button></td></a>";
			echo "</tr>";
		}
	}
?>
</tbody>
</table>
</div>
