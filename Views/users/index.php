
<?php
  $which = 'users'; //which navbar button is active
  require_once 'Views/navbars/navbar.php';
?>

<div class="container">
<h2>
  	Εγγεγραμμένοι Χρήστες
</h2>

<p>
  <a href="<?php echo USERS . "/adduser"; ?>"><button class="btn btn-primary" type="button" >Προσθήκη νέου χρήστη</button></a>
</p>

<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="users_table" width="100%">
<thead>
<tr>
	<th><strong>Username</strong></th>
	<th><strong>Email</strong></th>
	<th><strong>Ρόλος</strong></th>
	<th><strong>Ενέργειες</strong></th>
</tr>
</thead>
<tbody>
<?php
	if (!empty($data)) {
		foreach ($data as &$value) {
			echo "<tr>";
			echo "<td>" . $value->username . "</td>";
			echo "<td><a href=\"mailto:" . $value->email . "\">" . $value->email . "</a></td>";
			echo "<td>" . $value->role . "</td>";			
			echo "<td>" . "<a href=\"" . USERS . "/edituser?id=" . $value->idUser . "\">" . "<button class=\"btn btn-primary\" type=\"button\" >Επεξεργασία</button></a>";				
			echo "<a href=\"" . USERS . "/deleteuser?id=" . $value->idUser . "\">" . "<button class=\"btn btn-danger\" type=\"button\" >Διαγραφή</button></td></a>";
			echo "</tr>";
		}
	}
?>
</tbody>
</table>
</div>

