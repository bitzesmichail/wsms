<?php
  $which = 'xristes'; //which navbar button is active
  require_once 'Views/navbars/navbar.php';
?>

<h1>
	Εγγεγραμμένοι Χρήστες
</h1>

<table class="table">
<tr>
	<td><strong>Username</strong></td>
	<td><strong>Email</strong></td>
</tr>

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
</table>