<?php
require "vcc.php" ;
if($_GET['action'] == "show_users")
{
	$users = get_users() ;
	foreach($users as $user)
	{
	?>
	<div class='user'>
		<h2><?php echo $user->username ; ?></h2>
		<p>roles: <?php foreach($user->roles as $role){echo $role->type." " ;} ?></p>
		<p>e-mail: <?php echo $user->email ; ?></p>
			<button onclick="load_page_get('users.php', 'main', 'action=edit&username=<?php echo $user->username ; ?>') ;">Επεξεργασία Χρήστη</button>
	</div>
	<?php
	}
}
else if($_GET['action'] == "edit")
{
	$username = addslashes($_GET['username']) ;
	$user = get_user($username) ;
	foreach($user->roles as $role_o)
		$role = $role_o->type ;
	?>
	<form action="edit_user.php" method="post">
	<table>
		<tr>
		<td>Όνομα Χρήστη:</td><td><input type="hidden" name="username" value="<?php echo $user->username ; ?>"/><?php echo $user->username ; ?></td>
		</tr>
		<tr>
		<td>Κωδικός:</td>
		<td><input type="password" name="password" value="<?php echo $user->password ; ?>" onchange="document.location.getElementById('pass_a').value='' ;" id="pass"/></td>
		</tr>
		<tr>
		<td>Επιβεβαίωση Κωδικού:</td><td><input type="password" name="password_ack" value="<?php echo $user->password ; ?>" onchange="check_pass() ;" id="pass_a"/></td>
		</tr>
		<tr>
		<td>E-mail:</td><td><input type="text" name="e_mail" value="<?php echo $user->email ; ?>" /></td>
		</tr>
		<tr>
		<td>Ρόλος</td>
		<td><select name="role">
			<option value="manager" <?php if($role == "manager"){ echo "selected" ;} ?>>Manager</option>
			<option value="scheduler" <?php if($role == "scheduler"){ echo "selected" ;} ?>>Scheduler</option>
			<option value="salesman" <?php if($role == "salesman"){ echo "selected" ;} ?>>Salesman</option>
			<option value="whw" <?php if($role == "whw"){ echo "selected" ;} ?>>WareHouse Worker</option>
		</select></td>
		</tr>
		<tr>
		<td></td>
		<td><input type="submit" value="Αποθήκευση Αλλαγών" id="subm" /></td>
		</tr>
	</table>
	</form>
	<?php
}
else if($_GET['action'] == "add")
{
?>
	<form action="add_user.php" method="post">
	<table>
		<tr>
		<td>Όνομα Χρήστη:</td><td><input type="text" name="username"/></td>
		</tr>
		<tr>
		<td>Κωδικός:</td><td><input type="password" name="password" onchange="document.location.getElementById('pass_a').value='' ;" id="pass"/></td>
		</tr>
		<tr>
		<td>Επιβεβαίωση Κωδικού:</td><td><input type="password" name="password_ack" onchange="check_pass() ;" id="pass_a"/></td>
		</tr>
		<tr>
		<td>E-mail:</td><td><input type="text" name="e_mail"/></td>
		</tr>
		<tr>
		<td>Ρόλος</td>
		<td><select name="role">
			<option value="manager">Manager</option>
			<option value="scheduler">Scheduler</option>
			<option value="salesman">Salesman</option>
			<option value="whw">WareHouse Worker</option>
		</select></td>
		</tr>
		<tr>
		<td></td>
		<td><input type="submit" value="Προσθήκη Χρήστη" id="subm"/></td>
		</tr>
	</table>
	</form>
<?php
}
else if($_GET['action'] == "delete")
{
	$users = get_users() ;
	foreach($users as $user)
	{
	?>
	<div class='user'>
		<h2><?php echo $user->username ; ?></h2>
		<p>roles: <?php foreach($user->roles as $role){echo $role->type." " ;} ?></p>
		<p>e-mail: <?php echo $user->email ; ?></p>
		<form action="delete_user.php" method="post">
			<input type="hidden" name="id" value="<?php echo $user->idUser ; ?>">
			<input type="submit" value="Διαγραφή Χρήστη" />
		</form>
	</div>
	<?php
	}
}
?>

















