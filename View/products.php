<?php
require_once "vcc.php" ;
if($_GET['action'] == "show_products")
{
	$i = 0 ;
	echo "<table class='prod_table'>" ;
	echo "<tr id='table_header'><td>Sku</td><td>Περιγραφή</td><td>Τιμή Αγοράς</td><td>Τιμή Πώλησης</td><td>Διαθέσιμο Υπόλοιπο</td><td>Κρίσιμο Υπόλοιπο</td></tr>" ;
	$products = get_products() ;
	foreach($products as $prod)
	{
	?>
	<tr class="<?php if($i % 2 == 0) echo 'even' ; else echo 'odd' ; ?>">
		<td><?php echo $prod->sku ; ?></td>
		<td><?php echo $prod->description ; ?></td>
		<td><?php echo $prod->priceSupply ; ?></td>
		<td><?php echo $prod->priceSale ; ?></td>
		<td><?php echo $prod->availableSum ; ?></td>
		<td><?php echo $prod->criticalSum ; ?></td>
		<td><button onclick="load_page_get('products.php', 'main', 'action=edit&pid=<?php echo $prod->idProduct ; ?>')">Επεξεργασία</button></td>
	</tr>
	<?php
	$i ++ ;
	}
	echo "</table>" ;
}
else if($_GET['action'] == "add")
{
?>
	<form action="create_product.php" method="post">
		<table>
			<tr>
				<td>Sku</td>
				<td><input type="text" name="sku" /></td>
			</tr>
			<tr>
				<td>Περιγραφή Προϊόντος</td>
				<td><input type="text" name="description" /></td>
			</tr>
			<tr>
				<td>Τιμή Αγοράς</td>
				<td><input type="text" name="priceSupply" /></td>
			</tr>
			<tr>
				<td>Τιμή Πώλησης</td>
				<td><input type="text" name="priceSale" /></td>
			</tr>
			<tr>
				<td>Κρίσιμο Απόθεμα</td>
				<td><input type="text" name="criticalSum" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Καταχώρηση Προϊόντος" /></td>
			</tr>
		</table>
	</form>
<?php
}
else if($_GET['action'] == "edit")
{
	$pid = addslashes($_GET['pid']) ;
	$product = ProductController::viewById($pid) ;
?>
<form action="edit_product.php" method="post">
	<table>
		<tr>
			<td>Sku</td>
			<td><input type="hidden" name="sku" value="<?php echo $product->sku ; ?>" /><?php echo $product->sku ; ?></td>
		</tr>
		<tr>
			<td>Περιγραφή</td>
			<td><input type="text" name="description" value="<?php echo $product->description ; ?>" /></td>
		</tr>
		<tr>
			<td>Τιμή Αγοράς</td>
			<td><input type="text" name="priceSupply" value="<?php echo $product->priceSupply ; ?>" /></td>
		</tr>
		<tr>
			<td>Τιμή Πώλησης</td>
			<td><input type="text" name="priceSale" value="<?php echo $product->priceSale ; ?>" /></td>
		</tr>
		<tr>
			<td>Διαθέσιμη Ποσότητα</td>
			<td><input type="text" name="availableSum" value="<?php echo $product->availableSum ; ?>" /></td>
		</tr>
		<tr>
			<td>Κρίσιμο Υπόλοιπο</td>
			<td><input type="text" name="criticalSum" value="<?php echo $product->criticalSum ; ?>" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Αποθήκευση Αλλαγών" /></td>
		</tr>
	</table>
</form>
<?php
}
else if($_GET['action'] == "delete_product")
{
	$i = 0 ;
	echo "<table class='prod_table'>" ;
	echo "<tr id='table_header'><td>Sku</td><td>Περιγραφή</td><td>Τιμή Αγοράς</td><td>Τιμή Πώλησης</td><td>Διαθέσιμο Υπόλοιπο</td><td>Κρίσιμο Υπόλοιπο</td></tr>" ;
	$products = get_products() ;
	foreach($products as $prod)
	{
	?>
	<tr class="<?php if($i % 2 == 0) echo 'even' ; else echo 'odd' ; ?>">
		<td><?php echo $prod->sku ; ?></td>
		<td><?php echo $prod->description ; ?></td>
		<td><?php echo $prod->priceSupply ; ?></td>
		<td><?php echo $prod->priceSale ; ?></td>
		<td><?php echo $prod->availableSum ; ?></td>
		<td><?php echo $prod->criticalSum ; ?></td>
		<td>
			<form action="delete_product.php" method="post"><input type="hidden" name="pid" value="<?php echo $prod->idProduct ; ?>" /><input type="submit" value="Διαγραφή" /></form>
		</td>
	</tr>
	<?php
	$i ++ ;
	}
	echo "</table>" ;
}
else if($_GET['action'] == "search_products")
{
?>
	<form>
	Λέξη Κλειδί: <input type="text" id="si" onkeyup="search_p('products') ;" autocomplete="off"/>
	</form>
	<table class="prod_table" id="sr">
	</table>
<?php
}






















?>
