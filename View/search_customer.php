<?php
require "vcc.php" ;
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
		<td><form action="delete_customer.php" method="post"><input type="hidden" name="cid" value="<?php echo $c->idCustomer ; ?>" /><input type="submit" value="Διαγραφή Πελάτη" /></form></td>
	</tr>
	<?php
	$i ++ ;
	}
}
?>
