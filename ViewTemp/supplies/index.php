<?php
  $which = 'supplyOrder'; //which navbar button is active
  require_once 'Views/navbars/navbar.php';
?>

<div class="container">
<h2>
  Προμήθειες υπό Παραγγελία
</h2>

<p>
  <a href="<?php echo SUPPLYORDER . "/addsupplyorder"; ?>"><button class="btn btn-primary" type="button" >Προσθήκη νέας Προμήθειας υπό παραγγελία</button></a>
</p>

<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="supplyorder_table">
<thead>
<tr>
	<th><strong>Όνομα Προμηθευτή/strong></th>
	<th><strong>Επώνυμο Προμηθευτή</strong></th>
	<th><strong>ΑΦΜ Προμηθευτή</strong></th>
	<th><strong>Προθεσμία</strong></th>
	<th><strong>Ενέργειες</strong></th>
</tr>
</thead>
<tbody>
<?php
	if (!empty($data)) {
		foreach ($data as &$value) {
			echo "<tr>";
			echo "<td>" . $value->name . "</td>";
			echo "<td>" . $value->surname . "</td>";
			echo "<td>" . $value->ssn . "</td>";
			echo "<td>" . $value->dateDue . "</td>";			
			echo "<td>" . "<a href=\"" . SUPPLYORDER . "/editsupplyorder?ssn=" . $value->ssn . "\">" . "<button class=\"btn btn-primary\" type=\"button\" >Επεξεργασία</button></a>";				
			echo "<a href=\"" . SUPPLYORDER . "/deletesUPPLYorder?ssn=" . $value->ssn . "\">" . "<button class=\"btn btn-danger\" type=\"button\" >Διαγραφή</button></td></a>";
			echo "</tr>";
		}
	}
?>
</tbody>
</table>
</div>
