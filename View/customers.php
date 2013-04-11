<?php
require "vcc.php" ;
if($_GET['action'] == "show_customers")
{
	$customers = get_customers() ;
	$i = 0 ;
	echo "<table>" ;
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
	}
	echo "</table>" ;
}
else if($_GET['action'] == "create_customer")
{
?>
	<form action="create_customer.php" method="post">
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
				<td><input type="submit" value="Δημιουργία Πελάτη" /></td>
			</tr>
		</table>
	</form>
<?php
}
else if($_GET['action'] == "delete_customer")
{
	$customers = get_customers() ;
	$i = 0 ;
	echo "<table>" ;
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
	echo "</table>" ;
}
else if($_GET['action'] == "edit_customer")
{
	$id = addslashes($_GET['id']) ;
	$customer = CustomerController::viewById($id) ;
?>
<form action="edit_customer.php" method="post">
	<input type="hidden" name="cid" value="<?php echo $customer->idCustomer ; ?>" />
		<table>
			<tr>
				<td>Όνομα</td>
				<td><input type="text" name="name" value="<?php echo $customer->name ; ?>" /></td>
			</tr>
			<tr>
				<td>Επίθετο</td>
				<td><input type="text" name="surname" value="<?php echo $customer->surname ; ?>" /></td>
			</tr>
			<tr>
				<td>ΑΦΜ</td>
				<td><input type="text" name="ssn" value="<?php echo $customer->ssn ; ?>" /></td>
			</tr>
			<tr>
				<td>Τηλέφωνο</td>
				<td><input type="text" name="phone" value="<?php echo $customer->phone ; ?>" /></td>
			</tr>
			<tr>
				<td>Κινητό</td>
				<td><input type="text" name="cellphone" value="<?php echo $customer->cellphone ; ?>" /></td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td><input type="text" name="email" value="<?php echo $customer->email ; ?>" /></td>
			</tr>
			<tr>
				<td>Διεύθυνση</td>
				<td><input type="text" name="address" value="<?php echo $customer->address ; ?>" /></td>
			</tr>
			<tr>
				<td>Ταχυδρομικός Κώδικας</td>
				<td><input type="text" name="zipCode" value="<?php echo $customer->zipCode ; ?>" /></td>
			</tr>
			<tr>
				<td>Πόλη</td>
				<td><input type="text" name="city" value="<?php echo $customer->city ; ?>" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Αποθήκευση Αλλαγών" /></td>
			</tr>
		</table>
	</form>
<?php
}
else if($_GET['action'] == "search_customers")
{
?>
	<form>
	Λέξη Κλειδί: <input type="text" id="si" onkeyup="search_p('customers') ;" autocomplete="off"/>
	</form>
	<table class="prod_table" id="sr">
	</table>
<?php
}






















?>
