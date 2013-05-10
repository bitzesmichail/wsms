<?php
  $which = 'product'; //which navbar button is active
  require_once 'Views/navbars/navbar.php';
?>

<h1>
	Προϊόντα
</h1>

<p>
  <a href="<?php echo PRODUCT . "/addproduct"; ?>"><button class="btn btn-primary" type="button" >Προσθήκη νέου προϊόντος</button></a>
</p>

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
			echo "<a href=\"" . PRODUCT . "/deleteproduct?sku=" . $value->sku . "\">" . "<button class=\"btn btn-danger\" type=\"button\" >Διαγραφή</button></td></a>";
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
