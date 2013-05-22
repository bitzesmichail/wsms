<?php
  $which = 'supplyorder'; //which navbar button is active
  require_once 'Views/navbars/navbar.php';
?>


<h2>
	Ενεργές Προμήθειες
</h2>

<p>
  <a href="<?php echo SUPPLYORDER . "/addsupplyorder"; ?>"><button class="btn btn-primary" type="button" >Προσθήκη νέας προμήθειας</button></a>
</p>

<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="supplyorder_table">
<thead>
<tr>
	<th><strong>Κωδικός Προμήθειας</strong></th>
	<th><strong>Κωδικός Προμηθευτή</strong></th>
	<th><strong>Κωδικός Πωλητή</strong></th>
	<th><strong>Κατάσταση</strong></th>
	<th><strong>Ημερομηνία Κλεισίματος</strong></th>
</tr>
</thead>
<tbody>
<?php
	if (!empty($data)) {
		foreach ($data as &$value) {
			echo "<tr>";
			echo "<td>" . $value->idSupplyOrder . "</td>";
			echo "<td>" . $value->providerSsn . "</td>";
			echo "<td>" . $value->idUser . "</td>";
			echo "<td>" . $value->status . "</td>";
			echo "<td>" . $value->dateClosed . "</td>";			
			echo "<td>" . "<a href=\"" . SUPPLYORDER . "/editsupplyorder?idSupplyOrder=" . $value->idSupplyOrder . "\">" . "<button class=\"btn btn-primary\" type=\"button\" >Επεξεργασία</button></a>";				
			echo "<a href=\"" . SUPPLYORDER . "/deletesupplyorder?idSupplyOrder=" . $value->idSupplyOrder . "\">" . "<button class=\"btn btn-danger\" type=\"button\" >Διαγραφή</button></td></a>";
			echo "</tr>";
		}
	}
?>
</tbody>
</table>
</div>