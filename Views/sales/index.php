<?php
  $which = 'saleorder'; //which navbar button is active
  require_once 'Views/navbars/navbar.php';
?>

<div class="container">
<h2>
	Ενεργές Παραγγελίες
</h2>

<p>
   <a href="<?php echo SALEORDER . "/addsale_customer"; ?>"><button class="btn btn-primary" type="button" >Προσθήκη νέας παραγγελίας</button></a></p>

<p>
  <a href="<?php echo SALEORDER . "/exportStatistics"; ?>"><button class="btn btn-primary" type="button" >Εξαγωγή σε Excel</button></a>
</p>

<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="saleorder_table">
<thead>
<tr>
	<th><strong>Αριθμός Παραγγελίας</strong></th>
	<th><strong>Όνομα Πελάτη</strong></th>
	<th><strong>Επώνυμο Πελάτη</strong></th>
	<th><strong>ΑΦΜ Πελάτη</strong></th>
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
			echo "<td>" . $value->order->idSaleOrder . "</td>";
			echo "<td>" . $value->customer->name . "</td>";
			echo "<td>" . $value->customer->surname . "</td>";
			echo "<td>" . $value->order->customerSsn . "</td>";
			echo "<td>" . $value->order->username . "</td>";
			echo "<td>" . $value->order->status . "</td>";
			echo "<td>" . $value->order->dateCreated . "</td>";
			echo "<td>" . $value->order->dateUpdated . "</td>";
			echo "<td>" . $value->order->dateDue . "</td>";
			echo "<td>" . $value->order->dateClosed . "</td>";
			echo "<td>";		
			if ($_SESSION['role'] == 'MANAGER' || $_SESSION['role'] == 'SELLER') {
				echo "<a href=\"" . SALEORDER . "/editsaleorder/" . $value->order->idSaleOrder . "\">" . "<button class=\"btn btn-primary\" type=\"button\" >Επεξεργασία</button></a>";				
				echo "<a href=\"" . SALEORDER . "/deletesaleorder?id=" . $value->order->idSaleOrder . "\">" . "<button class=\"btn btn-danger\" type=\"button\" >Διαγραφή</button></a>";
			}
			echo "<a href=\"" . SALEORDER . "/closesaleorder?id=" . $value->order->idSaleOrder . "\">" . "<button class=\"btn btn-danger\" type=\"button\" >Κλείσιμο</button></td></a>";
			echo "</tr>";
		}
	}
?>
</tbody>
</table>
</div>
