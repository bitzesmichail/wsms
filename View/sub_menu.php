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
?>
</ul>
