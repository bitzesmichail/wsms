<div id="container">
	<div id="header">
		<?php require "includes/header.php" ;?>
	</div>
	<div id="menu">
		<?php require "menu.php" ; ?>
	</div>
	<?php
	foreach($_SESSION['roles'] as $role)
	{
		if($role == "manager")
		{
	?>
	<div id="side_menu">
	</div>
	<?php
		}
	}
	?>
	<div id="main">
		
	</div>
	<div id="footer">
		<?php require "includes/footer.php" ; ?>
	</div>
</div>
<div id="notifications">
	<?php require "includes/notifications.php" ; ?>
</div>
<div id="error">
	<?php echo $_SESSION['error'] ; ?>
</div>
<div id="success">
	<?php echo $_SESSION['success'] ; ?>
</div>













