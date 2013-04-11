<?php
require "vcc.php" ;
if($_GET['action'] == "show_providers")
{
	$providers = get_providers() ;
	$i = 0 ;
	echo "<table>" ;
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
	}
	echo "</table>" ;
}
else if($_GET['action'] == "create_provider")
{
?>
	<form action="create_provider.php" method="post">
		<table>
			<tr>
				<td>Όνομα</td>
				<td><input type="text" name="name" /></td>
			</tr>
			<tr>
				<td>Επίθετο</td>
				<td><input type="text" name="surname" /></td>
			</tr>
			<tr>
				<td>ΑΦΜ</td>
				<td><input type="text" name="ssn" /></td>
			</tr>
			<tr>
				<td>Τηλέφωνο</td>
				<td><input type="text" name="phone" /></td>
			</tr>
			<tr>
				<td>Κινητό</td>
				<td><input type="text" name="cellphone" /></td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td><input type="text" name="email" /></td>
			</tr>
			<tr>
				<td>Διεύθυνση</td>
				<td><input type="text" name="address" /></td>
			</tr>
			<tr>
				<td>Ταχυδρομικός Κώδικας</td>
				<td><input type="text" name="zipCode" /></td>
			</tr>
			<tr>
				<td>Πόλη</td>
				<td><input type="text" name="city" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Δημιουργία Προμηθευτή" /></td>
			</tr>
		</table>
	</form>
<?php
}
else if($_GET['action'] == "delete_provider")
{
	$providers = get_providers() ;
	$i = 0 ;
	echo "<table>" ;
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
		<td><form action="delete_provider.php" method="post"><input type="hidden" name="cid" value="<?php echo $c->idProvider ; ?>" /><input type="submit" value="Διαγραφή Προμηθευτή" /></form></td>
	</tr>
	<?php
	$i ++ ;
	}
	echo "</table>" ;
}
else if($_GET['action'] == "edit_provider")
{
	$id = addslashes($_GET['id']) ;
	$provider = ProviderController::viewById($id) ;
?>
<form action="edit_provider.php" method="post">
	<input type="hidden" name="cid" value="<?php echo $provider->idProvider ; ?>" />
		<table>
			<tr>
				<td>Όνομα</td>
				<td><input type="text" name="name" value="<?php echo $provider->name ; ?>" /></td>
			</tr>
			<tr>
				<td>Επίθετο</td>
				<td><input type="text" name="surname" value="<?php echo $provider->surname ; ?>" /></td>
			</tr>
			<tr>
				<td>ΑΦΜ</td>
				<td><input type="text" name="ssn" value="<?php echo $provider->ssn ; ?>" /></td>
			</tr>
			<tr>
				<td>Τηλέφωνο</td>
				<td><input type="text" name="phone" value="<?php echo $provider->phone ; ?>" /></td>
			</tr>
			<tr>
				<td>Κινητό</td>
				<td><input type="text" name="cellphone" value="<?php echo $provider->cellphone ; ?>" /></td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td><input type="text" name="email" value="<?php echo $provider->email ; ?>" /></td>
			</tr>
			<tr>
				<td>Διεύθυνση</td>
				<td><input type="text" name="address" value="<?php echo $provider->address ; ?>" /></td>
			</tr>
			<tr>
				<td>Ταχυδρομικός Κώδικας</td>
				<td><input type="text" name="zipCode" value="<?php echo $provider->zipCode ; ?>" /></td>
			</tr>
			<tr>
				<td>Πόλη</td>
				<td><input type="text" name="city" value="<?php echo $provider->city ; ?>" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Αποθήκευση Αλλαγών" /></td>
			</tr>
		</table>
	</form>
<?php
}
else if($_GET['action'] == "search_providers")
{
?>
	<form>
	Λέξη Κλειδί: <input type="text" id="si" onkeyup="search_p('providers') ;" autocomplete="off"/>
	</form>
	<table class="prod_table" id="sr">
	</table>
<?php
}






















?>
