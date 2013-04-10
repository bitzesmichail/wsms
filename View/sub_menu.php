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
?>
</ul>
