<?php
  require_once 'Views/navbars/navbar.php';
?>

<form class="form-horizontal" action="<?php echo SUORDER . "/create"; ?>" method="post">
<div class="container">
<h3>
Στοιχεία Προμήθειας
</h3>
<div class="control-group">
<label class="control-label" for="supplyOrderID">Κωδικός Προμήθειας</label>
<div class="controls">
<input type="text" name="supplyOrderID" id="supplyOrderID" value="<?php echo $data->supplyorder->idSupplyOrder; ?>" readonly>
</div>
</div>

<div class="control-group">
<label class="control-label" for="datePublish">Ημερομηνία Έκδοσης</label>
<div class="controls">
<div id="datePublish" class="input-append date">
<input data-format="dd/MM/yyyy hh:mm:ss" type="text" value="<?php echo $data->supplyorder->dateCreated; ?>" readonly></input>
</div>
</div>
</div>

<div class="control-group">
<label class="control-label" for="dateDue">Ημερομηνία Παραλαβής</label>
<div class="controls">
<div id="dateDue" class="input-append date">
<input data-format="dd/MM/yyyy hh:mm:ss" type="text" value="<?php echo $data->supplyorder->dateDue; ?>"></input>
<span class="add-on">
<i data-time-icon="icon-time" data-date-icon="icon-calendar">
</i>
</span>
</div>
</div>
</div>
</div>
<div class="container">
<h3>
Στοιχεία Προμηθευτή
</h3>

<div class="control-group">
<label class="control-label" for="ssn">ΑΦΜ</label>
<div class="controls">
<input type="text" name="ssn" value="<?php echo $data->provider->ssn; ?>" readonly>
</div>
</div>

<div class="control-group">
<label class="control-label" for="name">Όνομα</label>
<div class="controls">
<input type="text" name="name" value="<?php echo $data->provider->name; ?>" readonly>
</div>
</div>
<div class="control-group">
<label class="control-label" for="surname">Επώνυμο</label>
<div class="controls">
<input type="text" name="surname" value="<?php echo $data->provider->surname; ?>" readonly>
</div>
</div>

<div class="control-group">
<label class="control-label" for="phone">Τηλέφωνο</label>
<div class="controls">
<input type="text" name="phone" value="<?php echo $data->provider->phone; ?>" readonly>
</div>
</div>
<div class="control-group">
<label class="control-label" for="cellphone">Κινητό Τηλέφωνο</label>
<div class="controls">
<input type="text" name="cellphone" value="<?php echo $data->provider->cellphone; ?>" readonly>
</div>
</div>

<div class="control-group">
<label class="control-label" for="email">Email</label>
<div class="controls">
<input type="text" name="email" value="<?php echo $data->provider->email; ?>" readonly>
</div>
</div>

<div class="control-group">
<label class="control-label" for="address">Διεύθυνση</label>
<div class="controls">
<input type="text" name="address" value="<?php echo $data->provider->address; ?>" readonly>
</div>
</div>

<div class="control-group">
<label class="control-label" for="zipCode">Ταχυδρομικός Κωδικός</label>
<div class="controls">
<input type="text" name="zipCode" value="<?php echo $data->provider->zipCode; ?>" readonly>
</div>
</div>

<div class="control-group">
<label class="control-label" for="city">Πόλη</label>
<div class="controls">
<input type="text" name="city" value="<?php echo $data->provider->city; ?>" readonly>
</div>
</div>

</div>
</div>

</div>

<?php
var_dump($data->supplyorder->products);
?>

<div class="container">
<h2>
Προϊόντα
</h2>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="selectProductTable">
<thead>
<tr>
<th><strong>Κωδικός</strong></th>
<th><strong>Περιγραφή</strong></th>
<th><strong>Τιμή</strong></th>
<th><strong>Απόθεμα</strong></th>
<th><strong>Έκπτωση</strong></th>
<th><strong>Ποσότητα</strong></th>
<th><strong>Ενέργειες</strong></th>
</tr>
</thead>
<tbody>
<?php
if (!empty($data->supplyorder->products)) {
foreach ($data->supplyorder->products as &$value) {
echo "<tr>";
echo "<td>" . $value->sku . "</td>";
echo "<td>" . $value->description . "</td>";
echo "<td>" . $value->priceSale . "</td>";
echo "<td>" . $value->availableSum . "</td>";
echo "<td>" . "" . "</td>";
echo "<td>0</td>";
echo '<td><a class="edit" href="">Επεξεργασία Ποσότητας</a></td>';
echo "</tr>";
}
}
?>
</tbody>
</table>
</div>
<div class="container">
<div class="control-group">
<div class="controls">
<button type="submit" class="btn btn-primary">Επεξεργασία</button>
</div>
</div>
</div>
</form>

