<?php
require "vcc.php" ;
$si = addslashes($_GET['si']) ;
$products = search_products($si) ;
if(is_array($products))
{
	$i = 0 ;
	echo "<tr id='table_header'><td>Sku</td><td>Περιγραφή</td><td>Τιμή Αγοράς</td><td>Τιμή Πώλησης</td><td>Διαθέσιμο Υπόλοιπο</td><td>Κρίσιμο Υπόλοιπο</td></tr>" ;
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
}
?>
