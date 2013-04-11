<ul>
<?php
$roles = $_SESSION['roles'] ;
foreach($roles as &$role)
{
	if($role == "manager")
	{
	?>
	<li>Πωλήσεις</li>
	<li>Προμήθειες</li>
	<li onclick="load_page_get('products.php', 'main', 'action=show_products') ; load_page_get('sub_menu.php', 'side_menu', 'action=products') ;">Προϊόντα</li>
	<li onclick="load_page_get('customers.php', 'main', 'action=show_customers') ; load_page_get('sub_menu.php', 'side_menu', 'action=customers') ;">Πελάτες</li>
	<li>Προμηθευτές</li>
	<li>Οικονομικά στοιχεία</li>
	<li onclick="load_page_get('users.php', 'main', 'action=show_users') ; load_page_get('sub_menu.php', 'side_menu', 'action=users') ;">Χρήστες</li>
	<?php
	}
	if(role == "salesman")
	{
	?>
	<li>Πωλήσεις</li>
	<li>Πελάτες</li>
	<li>Νέα Πώληση</li>
	<li>Τροποποίηση πώλησης</li>
	<?php
	}
	if($role == "scheduler")
	{
	?>
	<li>Αποθέματα</li>
	<li>Πωλήσεις</li>
	<li>Καταχώρηση Προμήθειας</li>
	<?php
	}
	if($role == "whw")
	{
	?>
	<li>Παραγγελίες</li>
	<li>Προμήθειες</li>
	<?php
	}
}
?>
	<li onclick="document.location='./logout.php' ;">Έξοδος</li>
</ul>
