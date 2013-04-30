
	<div class="container-fluid">
		<div class="row-fluid">
      <?php
        if (isset($_SESSION['role'])) {
          switch ($_SESSION['role']) {
            case 'seller':
              require_once 'Views/navbars/seller_navbar.php';
              break;
            case 'scheduler':
              require_once 'Views/navbars/scheduler_navbar.php';
              break;
            case 'manager':
              $which = 'xristes';
              require_once 'Views/navbars/manager_navbar.php';
              break;
            case 'apo8hkarios':
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
<?php
	echo "This is the user controller index";
	if (!empty($data)) {
		if (is_array($data)) {
			foreach ($data as &$value) {
				echo "<br>" . $value->username . " " . $value->password . " " . $value->email;
			}
		}
		else {
			echo "<br>" . $data->username . " " . $data->password . " " . $data->email;
		}
	}
?>
