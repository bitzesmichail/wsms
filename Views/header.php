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
				var selectedProvider = -1;
				var selectedProducts = [];
				dTable = $('#users_table, #product_table, #saleorderHistory_table, #supplyHistory_table, #selectedProductTable, #customer_table, #saleorder_table, #provider_table, #supplyorder_table').dataTable({
					"bLengthChange": false,
					"sPaginationType": "bootstrap"
				});
				
				var selectCustomerTable = $("#selectCustomerTable").dataTable({
					"bLengthChange": false,
					"sPaginationType": "bootstrap",
				});
				
				var selectProviderTable = $("#selectProviderTable").dataTable({
					"bLengthChange": false,
					"sPaginationType": "bootstrap",
				});
				
				var selectProductTable = $("#selectProductTable").dataTable({
					//"bPaginate": false,
					"bLengthChange": false,
					"sPaginationType": "bootstrap",
				});
				
				function editRow ( oTable, nRow )
				{
					var aData = oTable.fnGetData(nRow);
					var jqTds = $('>td', nRow);
					jqTds[5].innerHTML = '<input type="text" value="'+aData[4]+'">';
					jqTds[6].innerHTML = '<a class="edit" href="">Αποθήκευση</a>';
				}
				
				function saveRow ( oTable, nRow )
				{
					var jqInputs = $('input', nRow);
					oTable.fnUpdate( jqInputs[0].value, nRow, 5, false );
					oTable.fnUpdate( '<a class="edit" href="">Επεξεργασία Ποσότητας</a>', nRow, 6, false );
					oTable.fnDraw();
				}
				
				var nEditing = null;
     
				$('#selectProductTable a.edit').live('click', function (e) {
					e.preventDefault();
					 
					/* Get the row as a parent of the link that was clicked on */
					var nRow = $(this).parents('tr')[0];
					 
					if ( nEditing !== null && nEditing != nRow ) {
						/* A different row is being edited - the edit should be cancelled and this row edited */
						restoreRow( selectProductTable, nEditing );
						editRow( selectProductTable, nRow );
						nEditing = nRow;
					}
					else if ( nEditing == nRow && this.innerHTML == "Αποθήκευση" ) {
						/* This row is being edited and should be saved */
						saveRow( selectProductTable, nEditing );
						nEditing = null;
					}
					else {
						/* No row currently being edited */
						editRow( selectProductTable, nRow );
						nEditing = nRow;
					}
				} );
				
				/*$("#selectProductTable tbody tr").click(function(event) {
					console.log('click');
					console.log(selectProductTable.fnGetPosition(this));
					$(event.target.parentNode).toggleClass('row_selected');
					/*var index = $.inArray(selectProductTable.fnGetPosition(this), selectedProducts);
					if (index == -1) {
						selectedProducts.push(selectProductTable.fnGetPosition(this))
					}
					else {
						selectedProducts.splice(index, 1);
					}
				});*/
				
				$("body").on('click', '#selectCustomerTable tbody tr', function(event) {
					$('.row_selected').removeClass('row_selected');
					if (selectCustomerTable.fnGetPosition(this) != selectedCustomer) {
						$(event.target.parentNode).toggleClass('row_selected');
						selectedCustomer = selectCustomerTable.fnGetPosition(this);
						$("#customerSsnFinal").val(selectCustomerTable.fnGetData(selectedCustomer)[0]);
					}
					else 
						selectedCustomer = -1;
				});
				
				$("body").on('click', '#selectProviderTable tbody tr', function(event) {
					$('.row_selected').removeClass('row_selected');
					if (selectProviderTable.fnGetPosition(this) != selectedProvider) {
						$(event.target.parentNode).toggleClass('row_selected');
						selectedProvider = selectProviderTable.fnGetPosition(this);
					}
					else 
						selectedProvider = -1;
				});
				
				$("body").on('click', '#selectProductTable tbody tr', function(event) {
					//console.log(this);
					//console.log('click');
					//console.log(selectProductTable.fnGetPosition(this));
					//$(event.target.parentNode).toggleClass('row_selected');
				});
				
				$('.addsale.stepDivs').hide();
				$('.addsale.step1').show();
				$('.addsale.next').click(function (event){
					$('.addsale.stepDivs').hide();
					var divID = $(this).parent().attr('id');
					if (divID == 'step1') {
						$('.addsale.step2').show();
						var nodes = selectProductTable.fnGetNodes();
						for (var j=0; j < nodes.length; j++) {
							if(selectProductTable.fnGetData(nodes[j])[5] > 0) {
								$('#selectedProductTable').dataTable().fnAddData( <?php echo "kati"; ?>);//selectProductTable.fnGetData(nodes[j]) );

							}
								//console.log(selectProductTable.fnGetData(nodes[j]));
								//$('#selectedProductTable').dataTable().fnAddData( selectProductTable.fnGetData(nodes[j]) );
						}
						$('.addsale.submitButton').show();
					}
					else if (divID == 'step3') {
						$('.addsale.step4').show();						
						$('#selectedProductTable').dataTable().fnClearTable();
						var nodes = selectProductTable.fnGetNodes();
						for (var j=0; j < nodes.length; j++) {
							if ($(nodes[j]).hasClass('row_selected')) {
								//console.log(selectProductTable.fnGetData(nodes[j]));
							}
						}
						if (selectedCustomer != -1) {
							$("#customerSsnFinal").val(selectCustomerTable.fnGetData(selectedCustomer)[0]);
						}
						$("#saleOrderIDFinal").val($("#saleOrderID").val());
						
					}
				});
				$('.addsale.previous').click(function (event){
					$('.addsale.stepDivs').hide();
					var divID = $(this).parent().attr('id');
					if (divID == 'step2') {
						$('.addsale.step1').show();
					}
					else if (divID == 'step3') {
						$('.addsale.step2').show();
					}
					else if (divID == 'step4') {
						$('.addsale.step3').show();
					}
				});
				
				$('.addsupply.stepDivs').hide();
				$('.addsupply.step1').show();
				$('.addsupply.next').click(function (event){
					$('.addsupply.stepDivs').hide();
					var divID = $(this).parent().attr('id');
					if (divID == 'step1') {
						$('.addsupply.step2').show();
					}
					else if (divID == 'step2') {
						$('.addsupply.step3').show();
					}
					else if (divID == 'step3') {
						$('.addsupply.step4').show();						
						$('#selectedProductTable').dataTable().fnClearTable();
						var nodes = selectProductTable.fnGetNodes();
						for (var j=0; j < nodes.length; j++) {
							if ($(nodes[j]).hasClass('row_selected')) {
								//console.log(selectProductTable.fnGetData(nodes[j]));
								$('#selectedProductTable').dataTable().fnAddData( selectProductTable.fnGetData(nodes[j]) );
							}
						}
						if (selectedProvider != -1) {
							$("#providerSsnFinal").val(selectProviderTable.fnGetData(selectedProvider)[0]);
						}
						$("#supplyOrderIDFinal").val($("#supplyOrderID").val());
						$('.addsupply.submitButton').show();
					}
				});
				$('.addsupply.previous').click(function (event){
					$('.addsupply.stepDivs').hide();
					var divID = $(this).parent().attr('id');
					if (divID == 'step2') {
						$('.addsupply.step1').show();
					}
					else if (divID == 'step3') {
						$('.addsupply.step2').show();
					}
					else if (divID == 'step4') {
						$('.addsupply.step3').show();
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

 