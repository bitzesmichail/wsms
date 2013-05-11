<!doctype html>
<html>
<head>
  <meta charset="utf-8">
	<title>Test</title>
    
    <!-- metadata -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap -->
    <link href="<?php echo BOOTSTRAP; ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo BOOTSTRAP; ?>/css/bootstrap-tablesorter.css" rel="stylesheet" media="screen">
	
	<link href="<?php echo BOOTSTRAP; ?>/css/style.css" rel="stylesheet">
	<link href="<?php echo BOOTSTRAP; ?>/css/jquery.dataTables.css" rel="stylesheet">
	<link href="<?php echo BOOTSTRAP; ?>/css/jquery.dataTables_themeroller.css" rel="stylesheet">
	<link href="<?php echo BOOTSTRAP; ?>/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo BOOTSTRAP; ?>/css/DT_bootstrap.css" rel="stylesheet">		
  	
	
	<script src="<?php echo BOOTSTRAP; ?>/js/jquery-1.9.1.js"></script>
	<script src="<?php echo BOOTSTRAP; ?>/js/jquery.tablesorter.min.js"></script> 
    <script src="<?php echo BOOTSTRAP; ?>/js/bootstrap.min.js"></script>    
	<script src="<?php echo BOOTSTRAP; ?>/js/bootstrap-dropdown.js"></script>
	<script src="<?php echo BOOTSTRAP; ?>/js/jquery.dataTables.js"></script>
	<script src="<?php echo BOOTSTRAP; ?>/js/DT_bootstrap.js"></script>
	
	<script type="text/javascript">			
			$(document).ready(function() {
				oTable = $('#resultsTable').dataTable({
					"bJQueryUI": true,
					"bLengthChange": false,
					"sPaginationType": "bootstrap"
				});
			} );
	</script>
	
	<script type="text/javascript">			
			$(document).ready(function() {
				oTable = $('#users_table').dataTable({
					"bJQueryUI": true,
					"bLengthChange": false,
					"sPaginationType": "bootstrap"
				});
			} );
	</script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?php echo BOOTSTRAP; ?>/js/html5shiv.js"></script>
    <![endif]-->


    
</head>
<body>  

	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
			<a class="brand" href="<?php echo HOME; ?>/"><img src="<?php echo BOOTSTRAP; ?>/img/logo.png" alt="" /></a>
			<div class="nav-collapse collapse pull-right">
			<ul class="nav">
				<li class="divider-vertical"></li>
				<?php if (isset($_SESSION['username'])): ?>
					<li class="active"><p class="navbar-text pull-right">Είστε συνδεδεμένος ως, <a href="#" class="navbar-link"><b style="color:#FFCCFF">  <?php echo $_SESSION['username']; ?></b> </a></p></li>
					<li class="divider-vertical"></li>
					<li><a href="<?php echo USERS; ?>">Έξοδος</a></li>
				<?php endif ?>
			</ul>
			</div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

 