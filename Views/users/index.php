<?php
  $which = 'users'; //which navbar button is active
  require_once 'Views/navbars/navbar.php';
?>

<h1>
  	Εγγεγραμμένοι Χρήστες
</h1>

<div class="container">
<table class="table table-striped table-bordered tablesorter" id="users_table">
<thead>
<tr>
	<th><strong>Username</strong></th>
	<th><strong>Email</strong></th>
</tr>
</thead>
<tbody>
<?php
	if (!empty($data)) {
		if (is_array($data)) {
			foreach ($data as &$value) {
				echo "<tr>";
				echo "<td>" . $value->username . "</td>";
				echo "<td>" . $value->email . "</td>";
				echo "</tr>";
			}
		}
		else {
			echo "<tr>";
			echo "<td>" . $data->username . "</td>";
			echo "<td>" . $data->email . "</td>";
			echo "</tr>";
		}
	}
?>
</tbody>
</table>
</div>

<p>
  <a href="<?php echo USERS . "/adduser"; ?>"><button class="btn btn-primary" type="button" >Προσθήκη νέου χρήστη</button></a>
</p>

<script type="text/javascript">
jQuery(document).ready(function() 
    { 
        jQuery("#users_table").tablesorter(); 
    } 
); 
</script>