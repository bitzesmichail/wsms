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

<p>
  <a href="<?php echo SUPPLYORDER . "/exportStatistics"; ?>"><button class="btn btn-primary" type="button" >Εξαγωγή σε Excel</button></a>
</p>

<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="supplyorder_table">
<thead>
<tr>
	<th><strong>Κωδικός Προμήθειας</strong></th>
	<th><strong>Όνομα Προμηθευτή</strong></th>
	<th><strong>Επώνυμο Προμηθευτή</strong></th>
	<th><strong>ΑΦΜ Προμηθευτή</strong></th>
	<th><strong>UserName Πωλητή</strong></th>
	<th><strong>Κατάσταση</strong></th>
	<th><strong>Ημερομηνία Δημιουργίας</strong></th>
	<th><strong>Ημερομηνία Ενημέρωσης</strong></th>
	<th><strong>Προθεσμία</strong></th>
	<th><strong>Ημερομηνία Κλεισίματος</strong></th>
	<th><strong>Ενέργειες</strong></th>
</tr>
</thead>
<tbody>
<?php
	if (!empty($data)) {
		foreach ($data as &$value) {
			echo "<tr>";
			echo "<td>" . $value->order->idSupplyOrder . "</td>";
			echo "<td>" . $value->provider->name . "</td>";
			echo "<td>" . $value->provider->surname . "</td>";
			echo "<td>" . $value->order->providerSsn . "</td>";
			echo "<td>" . $value->order->username . "</td>";
			echo "<td>" . $value->order->status . "</td>";
			echo "<td>" . $value->order->dateCreated . "</td>";
			echo "<td>" . $value->order->dateUpdated . "</td>";
			echo "<td>" . $value->order->dateDue . "</td>";
			echo "<td>" . $value->order->dateClosed . "</td>";
			echo "<td>" . "<a href=\"" . SUPPLYORDER . "/edit/" . $value->idSupplyOrder . "\">" . "<button class=\"btn btn-primary\" type=\"button\" >Επεξεργασία</button></a>";				
			echo "<a href=\"" . SUPPLYORDER . "/deletesupplyorder?idSupplyOrder=" . $value->idSupplyOrder . "\">" . "<button class=\"btn btn-danger\" type=\"button\" >Διαγραφή</button></td></a>";
			echo "</tr>";
		}
	}
?>
</tbody>
</table>
</div>