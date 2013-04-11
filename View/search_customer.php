<?php
require_once "vcc.php" ;
$si = addslashes($_GET['si']) ;
$customers = search_customers($si) ;
if(is_array($customers))
{
	$i = 0 ;
	echo "<tr id='table_header'><td>ID</td><td>Όνομα</td><td>Επίθετο</td><td>Τηλέφωνο</td><td>Διεύθυνση</td></tr>" ;
	foreach($customers as $c)
	{
	?>
	<tr class="<?php if($i % 2 == 0) echo 'even' ; else echo 'odd' ; ?>">
		<td><?php echo $c->idCustomer ; ?></td>
		<td><?php echo $c->name ; ?></td>
		<td><?php echo $c->surname ; ?></td>
		<td><?php echo $c->phone ; ?></td>
		<td><?php echo $c->address." ".$c->city." ".$c->zipCode ; ?></td>
		<td><button onclick="load_page_get('customers.php', 'main', 'action=edit_customer&id=<?php echo $c->idCustomer ; ?>')">Προβολή - Επεξεργασία</button></td>
	</tr>
	<?php
	$i ++ ;
	}
}
?>
