<?php
  $which = 'saleorder'; //which navbar button is active
  require_once 'Views/navbars/navbar.php';
?>

<div class="container">
<h1>
	Παραγγελίες
</h1>

<p>
  <a href="<?php echo PRODUCT . "/addproduct"; ?>"><button class="btn btn-primary" type="button" >Προσθήκη νέας παραγγελίας</button></a>
</p>

<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="resultsTable" width="100%">
<thead>
<tr>
	<th><strong>Κωδικός</strong></th>
	<th><strong>Ημερομηνία</strong></th>
	<th><strong>Πελάτης</strong></th>
	<th><strong>Ενέργειες</strong></th>
</tr>
</thead>
<tbody>
	<tr>
		<td>1</td>
		<td>09/05/2013</td>
		<td>Πελάτης1</td>
		<td><button class="btn btn-primary" type="button" >Επεξεργασία</button><button class="btn btn-danger" type="button" >Διαγραφή</button></td></td>
	</tr>
<tbody>
</table>
<div>

