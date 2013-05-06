<?php
  $which = 'product'; //which navbar button is active
  require_once 'Views/navbars/navbar.php';
?>

<h1>
	Προϊόντα
</h1>

<div class="container">
<table class="table table-striped table-bordered tablesorter" id="product_table">
<thead>
<tr>
	<th><strong>SKU</strong></th>
	<th><strong>Περιγραφή</strong></th>
	<th><strong>Τιμή Πώλησης</strong></th>
	<th><strong>Τιμή Αγοράς</strong></th>
	<th><strong>Διαθέσιμο</strong></th>
	<th><strong>Δεσμευμένο</strong></th>
	<th><strong>Σε παραγγελία</strong></th>
	<th><strong>Κρίσιμο</strong></th>
</tr>
</thead>
<tbody>
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
</tbody>
</table>
</div>

<script type="text/javascript">
jQuery(document).ready(function() 
    { 
        jQuery("#product_table").tablesorter(); 
    } 
); 

</script>