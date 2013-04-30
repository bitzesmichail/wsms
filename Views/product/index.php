<?php
  $which = 'proionta'; //which navbar button is active
  require_once 'Views/navbars/navbar.php';
?>

<h1>
	Προϊόντα
</h1>

<table class="table">
<tr>
	<td><strong>SKU</strong></td>
	<td><strong>Περιγραφή</strong></td>
	<td><strong>Τιμή Πώλησης</strong></td>
	<td><strong>Τιμή Αγοράς</strong></td>
	<td><strong>Διαθέσιμο</strong></td>
	<td><strong>Δεσμευμένο</strong></td>
	<td><strong>Σε παραγγελία</strong></td>
	<td><strong>Κρίσιμο</strong></td>
</tr>

<?php
	if (!empty($data)) {
		if (is_array($data)) {
			foreach ($data as &$value) {
				echo "<tr>";
				echo "<td>" . $value->sku . "</td>";
				echo "<td>" . $value->description . "</td>";
				echo "<td>" . $value->priceSale . "</td>";
				echo "<td>" . $value->priceSupply . "</td>";
				echo "<td>" . $value->availableSum . "</td>";
				echo "<td>" . $value->reservedSum . "</td>";
				echo "<td>" . $value->orderedSum . "</td>";
				echo "<td>" . $value->criticalSum . "</td>";
				echo "</tr>";
			}
		}
		else {
			echo "<tr>";
			echo "<td>" . $value->sku . "</td>";
			echo "<td>" . $value->description . "</td>";
			echo "<td>" . $value->priceSale . "</td>";
			echo "<td>" . $value->priceSupply . "</td>";
			echo "<td>" . $value->availableSum . "</td>";
			echo "<td>" . $value->reservedSum . "</td>";
			echo "<td>" . $value->orderedSum . "</td>";
			echo "<td>" . $value->criticalSum . "</td>";
			echo "</tr>";
		}
	}
?>
</table>