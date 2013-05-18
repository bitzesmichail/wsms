
<?php
  require_once 'Views/navbars/navbar.php';
?>

<div class="container">
<h2>
	Ευκταία Προϊόντα
</h2>

<p>
  <a href="<?php echo PRODUCT . "/addwishproduct"; ?>"><button class="btn btn-primary" type="button" >Προσθήκη νέου ευκταίου προϊόντος</button></a>
</p>

<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="wishproduct_table">
<thead>
<tr>
	<th><strong>Περιγραφή</strong></th>
	<th><strong>Ποσότητα</strong></th>
	<th><strong>Καταχωρήθηκε από</strong></th>
</tr>
</thead>
<tbody>
<?php
	if (!empty($data)) {
		foreach ($data as &$value) {
			echo "<tr>";
			echo "<td>" . $value->description . "</td>";
			echo "<td>" . $value->quantity . "</td>";
			echo "<td>" . $value->username . "</td>";
			echo "</tr>";
		}
	}
?>
</tbody>
</table>
</div>

