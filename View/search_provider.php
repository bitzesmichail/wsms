<?php
require "vcc.php" ;
$si = addslashes($_GET['si']) ;
$providers = search_providers($si) ;
if(is_array($providers))
{
	$i = 0 ;
	echo "<tr id='table_header'><td>ID</td><td>Όνομα</td><td>Επίθετο</td><td>Τηλέφωνο</td><td>Διεύθυνση</td></tr>" ;
	foreach($providers as $c)
	{
	?>
	<tr class="<?php if($i % 2 == 0) echo 'even' ; else echo 'odd' ; ?>">
		<td><?php echo $c->idProvider ; ?></td>
		<td><?php echo $c->name ; ?></td>
		<td><?php echo $c->surname ; ?></td>
		<td><?php echo $c->phone ; ?></td>
		<td><?php echo $c->address." ".$c->city." ".$c->zipCode ; ?></td>
		<td><button onclick="load_page_get('providers.php', 'main', 'action=edit_provider&id=<?php echo $c->idProvider ; ?>')">Προβολή - Επεξεργασία</button></td>
	</tr>
	<?php
	$i ++ ;
	}
}
?>
