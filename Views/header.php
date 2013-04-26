<!doctype html>
<html>
<head>
	<title>Test</title>
	<meta charset="utf-8">
    
    <!-- metadata -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap -->
    <link href="<?php echo BOOTSTRAP ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo BOOTSTRAP ?>/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
    <link href="<?php echo BOOTSTRAP ?>/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?php echo BOOTSTRAP ?>/js/html5shiv.js"></script>
    <![endif]-->


    
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?php echo HOME; ?>/">wsms</a>
          <div class="nav-collapse collapse">
          	<?php if (isset($_SESSION['username'])): ?>
          		<p class="navbar-text pull-right">
          			<a href="<?php echo USERS; ?>/logout">log out</a>
          		</p>
          		<p class="navbar-text pull-right">&nbsp;&nbsp;&nbsp;&nbsp;</p>
          		<p class="navbar-text pull-right">
              		Logged in as <a href="#" class="navbar-link"><?php echo $_SESSION['username']; ?></a>
            	</p>
            <?php endif ?>
            <!-- <ul class="nav">
            	<li class="active"><a href="<?php echo HOME; ?>/">Home</a></li>
              	<li><a href="<?php echo HOME; ?>/help">Help</a></li>
              	<li><a href="<?php echo USERS; ?>/">Users</a></li>
            </ul> -->
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

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