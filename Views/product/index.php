
<?php
  $which = 'product'; //which navbar button is active
  require_once 'Views/navbars/navbar.php';
?>

<div class="container">
<h2>
	Προϊόντα
</h2>

<p>
  <a href="<?php echo PRODUCT . "/addproduct"; ?>"><button class="btn btn-primary" type="button" >Προσθήκη νέου προϊόντος</button></a>
  <a href="<?php echo PRODUCT . "/wishproduct_index"; ?>"><button class="btn btn-primary" type="button" >Ευκταία Προϊόντα</button></a>
</p>

<p>
  <a href="<?php echo PRODUCT . "/exportStatistics"; ?>"><button class="btn btn-primary" type="button" >Εξαγωγή σε Excel</button></a>
</p>

<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="product_table">
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
	<th><strong>Ενέργειες</strong></th>
</tr>
</thead>
<tbody>
<?php
	if (!empty($data)) {
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
			echo "<td>" . "<a href=\"" . PRODUCT . "/editproduct?sku=" . $value->sku . "\">" . "<button class=\"btn btn-primary\" type=\"button\" >Επεξεργασία</button></a>";
			echo "<a href=\"" . PRODUCT . "/getStatistics?sku=" . $value->sku . "\">" . "<button class=\"btn btn-primary\" type=\"button\" >Στατιστικά</button></a>";				
			echo "<a href=\"" . PRODUCT . "/deleteproduct?sku=" . $value->sku . "\">" . "<button class=\"btn btn-danger\" type=\"button\" >Διαγραφή</button></td></a>";
			echo "</tr>";
		}
	}
?>
</tbody>
</table>
</div>

