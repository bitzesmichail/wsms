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
  
