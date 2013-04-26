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
<div class="hero-unit">
	<h3>Warehouse &amp; Sales Management System</h3>
	<p>
		<?php if (!isset($_SESSION['username'])): ?>
			<p>Καλώς ήρθατε! Αυτή είναι η αρχική σελίδα του συστήματος διαχείρισης αποθηκών και οργάνωσης πωλήσεων. Αν δεν έχετε ήδη λογαριασμό 
				αποτανθείτε στον manager προκειμένου να δημιουργήσει ένα για λογαριασμό σας.
			<!-- <p><a href="#" class="btn btn-primary btn-large">Εγγραφή »</a></p> -->
            	<form class="navbar-form pull-right" method="post" action="<?php echo USERS; ?>/login">
            		<input class="span2" name="username" type="text" placeholder="Email">
                	<input class="span2" name="password" type="password" placeholder="Password">
              		<button type="submit" class="btn">Sign in</button>
	            </form>
	        <?php else: ?>
	        	<p>Καλώς ήρθατε! Έχετε συνδεθεί επιτυχώς στο σύστημα διαχείρισης αποθηκών και οργάνωσης πωλήσεων. Από το μενού επιλέξτε τη λειτουργία που επιθυμείτε να εκτελέσετε.</p>
            	</div>
            <?php endif ?>
	</p>
</div>