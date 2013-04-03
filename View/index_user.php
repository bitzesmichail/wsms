<div id="container">
	<div id="header">
		<?php require "header.php" ; ?>
	</div>
	<div id="menu">
		<?php require "menu.php" ; ?>
	</div>
	<div id="side_menu">
		<?php require "sub_menu.php" ?>
	</div>
	<div id="main">
		
	</div>
	<div id="footer">
		<?php require "footer.php" ; ?>
	</div>
</div>
<div id="notifications">
	<?php require "notifications.php" ; ?>
</div>
<div id="error">
	<?php echo $_SESSION['error'] ; ?>
</div>
<div id="success">
	<?php echo $_SESSION['success'] ; ?>
</div>













