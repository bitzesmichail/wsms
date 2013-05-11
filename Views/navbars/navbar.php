<div class="container">
  <div class="row-fluid">
	<?php
	  if (isset($_SESSION['role'])) {
		switch ($_SESSION['role']) {
		  case 'SELLER':
			require_once 'Views/navbars/seller_navbar.php';
			break;
		  case 'SCHEDULER':
			require_once 'Views/navbars/scheduler_navbar.php';
			break;
		  case 'MANAGER':
			require_once 'Views/navbars/manager_navbar.php';
			break;
		  case 'STOREKEEPER':
			require_once 'Views/navbars/apo8hkarios_navbar.php';
			break;
		  default:
			  # code...
			  break;
		  }
		}
	?>
  </div>
</div>
  
