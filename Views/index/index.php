<?php if (isset($_SESSION['username'])): ?>
		<!-- <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Users Menu</li>
              <li class="active"><a href="<?php echo USERS; ?>/viewAll">Users</a></li>
              <li><a href="<?php echo USERS; ?>/create">Create New User</a></li>
              <li><a href="<?php echo USERS; ?>/viewById/1">View By Id (1)</a></li>
            </ul>
          </div><!--/.well -->
        <!--</div><!--/span-->
    	<!-- <div class="span9"> -->
<?php endif ?>






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


<div class="hero-unit">
	<h3>Warehouse &amp; Sales Management System</h3>
	<p>
		<?php if (!isset($_SESSION['username'])): ?>
			<p>Καλώς ήρθατε! Αυτή είναι η αρχική σελίδα του συστήματος διαχείρισης αποθηκών και οργάνωσης πωλήσεων. Αν δεν έχετε ήδη λογαριασμό 
				αποτανθείτε στον manager προκειμένου να δημιουργήσει ένα για λογαριασμό σας.
			<!-- <p><a href="#" class="btn btn-primary btn-large">Εγγραφή »</a></p> -->
            	<form class="navbar-form pull-right" method="post" action="<?php echo USERS; ?>/login">
            		<input class="span2" name="username" type="text" placeholder="Username">
                	<input class="span2" name="password" type="password" placeholder="Password">
              		<button type="submit" class="btn">Είσοδος</button>
	            </form>
	        <?php else: ?>
	        	<p>Καλώς ήρθατε! Έχετε συνδεθεί επιτυχώς στο σύστημα διαχείρισης αποθηκών και οργάνωσης πωλήσεων. Από το μενού επιλέξτε τη λειτουργία που επιθυμείτε να εκτελέσετε.</p>
            	</div>
            <?php endif ?>
	</p>
</div>