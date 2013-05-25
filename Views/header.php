<!doctype html>
<html>
<head>
  <meta charset="utf-8">
	<title>WSMS</title>
    
    <!-- metadata -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap -->
    <link href="<?php echo BOOTSTRAP; ?>/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="<?php echo BOOTSTRAP; ?>/css/style.css" rel="stylesheet">
	<link href="<?php echo BOOTSTRAP; ?>/css/jquery.dataTables.css" rel="stylesheet">
	<link href="<?php echo BOOTSTRAP; ?>/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo BOOTSTRAP; ?>/css/DT_bootstrap.css" rel="stylesheet">
	<link href="<?php echo BOOTSTRAP; ?>/css/bootstrap-datetimepicker.min.css" rel="stylesheet">	
  	
	
	<script src="<?php echo BOOTSTRAP; ?>/js/jquery-1.8.1.min.js"></script>
    <script src="<?php echo BOOTSTRAP; ?>/js/bootstrap.min.js"></script>    
	<script src="<?php echo BOOTSTRAP; ?>/js/bootstrap-dropdown.js"></script>
	<script src="<?php echo BOOTSTRAP; ?>/js/bootstrap-modal.js"></script>
	<script src="<?php echo BOOTSTRAP; ?>/js/jquery.dataTables.js"></script>
	<script src="<?php echo BOOTSTRAP; ?>/js/DT_bootstrap.js"></script>
	<script src="<?php echo BOOTSTRAP; ?>/js/bootstrap-datetimepicker.min.js"></script>
	<script src="<?php echo BOOTSTRAP; ?>/js/jquery.dataTables.editable.js"></script>
	<script src="<?php echo BOOTSTRAP; ?>/js/jquery.jeditable.js"></script>
	
	
	<script type="text/javascript">			
		$(document).ready(function() {
			oTable = $('#resultsTable').dataTable({
				"bJQueryUI": true,
				"bLengthChange": false,
				"sPaginationType": "bootstrap"
			});
			
			$(function() {
				$('#datePublish, #dateDue, #datePublishFinal, #dateDueFinal').datetimepicker({
					language: 'en',
					pick12HourFormat: true
				});
			});
					
			$("#datePublish").on('changeDate', function(e) {
				var picker = $('#datePublishFinal').data('datetimepicker');
				picker.setLocalDate(e.localDate);
			});
			
			$("#dateDue").on('changeDate', function(e) {
				var picker = $('#dateDueFinal').data('datetimepicker');
				picker.setLocalDate(e.localDate);
			});
			
			$('.dropdown-toggle').dropdown();
		
		} );

	</script>
	
	<script type="text/javascript">			
			$(document).ready(function() {
				var selectedCustomer = -1;
				var selectedProducts = [];
				dTable = $('#users_table, #product_table, #saleorderHistory_table, #supplyHistory_table, #selectedProductTable, #customer_table, #saleorder_table, #provider_table, #supplyorder_table').dataTable({
					"bLengthChange": false,
					"sPaginationType": "bootstrap"
				});
				
				var selectCustomerTable = $("#selectCustomerTable").dataTable({
					"bLengthChange": false,
					"sPaginationType": "bootstrap",
				});
				
				var selectProductTable = $("#selectProductTable").dataTable({
					"bLengthChange": false,
					"sPaginationType": "bootstrap",
				});
				
				/*$('#selectProductTable').dataTable().makeEditable({
							sUpdateURL: function(value, settings)
                                {
										console.log(value);
										console.log(settings);
                                        //return(value);
                                }
				});*/
				
				
				$("#selectCustomerTable tbody tr").click(function(event) {
					$('.row_selected').removeClass('row_selected');
					if (selectCustomerTable.fnGetPosition(this) != selectedCustomer) {
						$(event.target.parentNode).toggleClass('row_selected');
						selectedCustomer = selectCustomerTable.fnGetPosition(this);
					}
					else 
						selectedCustomer = -1;
					//var sData = selectCustomerTable.fnGetData( this );
					//var aPos = selectCustomerTable.fnGetPosition(this);
				});
				
				$("#selectProductTable tbody tr").click(function(event) {
					$(event.target.parentNode).toggleClass('row_selected');
					var index = $.inArray(selectProductTable.fnGetPosition(this), selectedProducts);
					if (index == -1) {
						selectedProducts.push(selectProductTable.fnGetPosition(this))
					}
					else {
						selectedProducts.splice(index, 1);
					}
 					//console.log(selectedProducts);
					//var sData = selectProductTable.fnGetData( this );
				});
				
				

				$('.stepDivs').hide();
				$('.step1').show();
				$('.next').click(function (event){
					$('.stepDivs').hide();
					var divID = $(this).parent().attr('id');
					if (divID == 'step1') {
						$('.step2').show();
					}
					else if (divID == 'step2') {
						$('.step3').show();
					}
					else if (divID == 'step3') {
						$('.step4').show();
						$('#selectedProductTable').dataTable().fnClearTable();
						for (var i = 0; i < selectedProducts.length; i++) {
							//console.log(selectProductTable.fnGetData(selectedProducts[i]));
							$('#selectedProductTable').dataTable().fnAddData( selectProductTable.fnGetData(selectedProducts[i]) );
						}
						if (selectedCustomer != -1) {
							$("#customerSsnFinal").val(selectCustomerTable.fnGetData(selectedCustomer)[0]);
						}
						$("#saleOrderIDFinal").val($("#saleOrderID").val());
						$('.submitButton').show();
					}
				});
				$('.previous').click(function (event){
					$('.stepDivs').hide();
					var divID = $(this).parent().attr('id');
					if (divID == 'step2') {
						$('.step1').show();
					}
					else if (divID == 'step3') {
						$('.step2').show();
					}
					else if (divID == 'step4') {
						$('.step3').show();
					}
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
					<li><a href="<?php echo USERS; ?>/logout">Έξοδος</a></li>
				<?php endif ?>
			</ul>
			</div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
	<div id="main" class="container">

 