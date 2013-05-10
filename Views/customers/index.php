<?php
  $which = 'customer'; //which navbar button is active
  require_once 'Views/navbars/navbar.php';
?>

<h1>
	Πελάτες
</h1>

<p>
  <a href="<?php echo CUSTOMER . "/addcustomer"; ?>"><button class="btn btn-primary" type="button" >Προσθήκη νέου πελάτη</button></a>
</p>

<div class="container">
<table class="table table-striped table-bordered tablesorter" id="product_table">
<thead>
<tr>
	<th><strong>ΑΦΜ</strong></th>
	<th><strong>Όνομα</strong></th>
	<th><strong>Επώνυμο</strong></th>
	<th><strong>Τηλέφωνο</strong></th>
	<th><strong>Κινητό Τηλέφωνο</strong></th>
	<th><strong>Email</strong></th>
	<th><strong>Διεύθυνση</strong></th>
	<th><strong>Ταχυδρομικός Κωδικός</strong></th>
	<th><strong>Πόλη</strong></th>
</tr>
</thead>
<tbody>
<?php
	if (!empty($data)) {
		foreach ($data as &$value) {
			echo "<tr>";
			echo "<td>" . $value->ssn . "</td>";
			echo "<td>" . $value->name . "</td>";
			echo "<td>" . $value->surname . "</td>";
			echo "<td>" . $value->phone . "</td>";
			echo "<td>" . $value->cellphone . "</td>";
			echo "<td>" . $value->email . "</td>";
			echo "<td>" . $value->address . "</td>";
			echo "<td>" . $value->zipCode . "</td>";
			echo "<td>" . $value->city . "</td>";
			echo "<td>" . "<a href=\"" . CUSTOMER . "/editproduct?sku=" . $value->sku . "\">" . "<button class=\"btn btn-primary\" type=\"button\" >Επεξεργασία</button></a>";				
			echo "<a href=\"" . CUSTOMER . "/deleteproduct?sku=" . $value->sku . "\">" . "<button class=\"btn btn-danger\" type=\"button\" >Διαγραφή</button></td></a>";
			echo "</tr>";
		}
	}
?>
</tbody>
</table>
</div>

<script type="text/javascript">
jQuery(document).ready(function() 
    { 
        jQuery("#product_table").tablesorter(); 
    } 
); 

</script>
