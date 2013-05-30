<?php
  $which = 'supplyorder'; //which navbar button is active
  require_once 'Views/navbars/navbar.php';
?>

<div class="container">
<h2>
	Ιστορικό Προμηθειών
</h2>


<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="supplyHistory_table">
<thead>
<tr>
	<th><strong>Κωδικός Προμήθειας</strong></th>
	<th><strong>Κωδικός Προμηθευτή</strong></th>
	<th><strong>Ημερομηνία Δημιουργίας</strong></th>
	<th><strong>Ημερομηνία Ενημέρωσης</strong></th>
	<th><strong>Προθεσμία</strong></th>
	<th><strong>Ημερομηνία Κλεισίματος</strong></th>
	<th><strong>Τιμή Προμηθειών</strong></th>
</tr>
</thead>
<tbody>
<?php
	if (!empty($data)) {
		foreach ($data as &$value) {
			echo "<tr>";
			echo "<td>" . $value->idHistorySupplyOrder . "</td>";
			echo "<td>" . $value->idSupplyOrder . "</td>";
			echo "<td>" . $value->providerSsn . "</td>";
			echo "<td>" . $value->dateCreated . "</td>";
			echo "<td>" . $value->dateUpdated . "</td>";
			echo "<td>" . $value->dateDue . "</td>";
			echo "<td>" . $value->dateClosed . "</td>";
			echo "<td>" . $value->outcome . "</td>";	
			echo "</tr>";
		}
	}
?>
</tbody>
</table>
</div>
