<?php
  require_once 'Views/navbars/navbar.php';
?>
<div class="container">
	<?php if (empty($data)): ?>
		Data is empty
	<?php else:?>
	<?php foreach ($data as &$value) { ?>
		Hello <?php echo $value->name; ?>, <?php echo $value->surname; ?>!!!
	<?php } ?>
	<?php endif ?>
</div>