<ul>
<?php
if($_GET['action'] == "users")
{
?>
	<li onclick="load_page_get('users.php', 'main', 'action=show_users') ;">Χρήστες</li>
	<li onclick="load_page_get('users.php', 'main', 'action=add') ;">Προσθήκη Χρήστη</li>
	<li onclick="load_page_get('users.php', 'main', 'action=delete') ;">Διαγραφή Χρήστη</li>
<?php
}
else if($_GET['action'] == "products")
{
?>
	<li onclick="load_page_get('products.php', 'main', 'action=show_products') ;">Προϊόντα</li>
	<li onclick="load_page_get('products.php', 'main', 'action=add') ;">Προσθήκη Προϊόντος</li>
	<li onclick="load_page_get('products.php', 'main', 'action=delete_product') ;">Διαγραφή Προϊόντος</li>
	<li onclick="load_page_get('products.php', 'main', 'action=search_products') ;">Αναζήτηση Προϊόντων</li>
<?php
}
else if($_GET['action'] == "customers")
{
?>
	<li onclick="load_page_get('customers.php', 'main', 'action=show_customers') ;">Πελάτες</li>
	<li onclick="load_page_get('customers.php', 'main', 'action=create_customer') ;">Δημιουργία Πελάτη</li>
	<li onclick="load_page_get('customers.php', 'main', 'action=delete_customer') ;">Διαγραφή Πελάτη</li>
	<li onclick="load_page_get('customers.php', 'main', 'action=search_customers') ;">Αναζήτηση Πελάτη</li>
<?php
}
else if($_GET['action'] == "providers")
{
?>
	<li onclick="load_page_get('providers.php', 'main', 'action=show_providers') ;">Προμηθευτές</li>
	<li onclick="load_page_get('providers.php', 'main', 'action=create_provider') ;">Δημιουργία Προμηθευτή</li>
	<li onclick="load_page_get('providers.php', 'main', 'action=delete_provider') ;">Διαγραφή Προμηθευτή</li>
	<li onclick="load_page_get('providers.php', 'main', 'action=search_providers') ;">Αναζήτηση Προμηθευτή</li>
<?php
}
?>
</ul>
