<?php
 require_once 'Views/navbars/navbar.php';
?>
<h1>
Προσθήκη νέας Προμήθειας
</h1>

<form class="form-horizontal" action="<?php echo SUPPLYORDER . "/create"; ?>" method="post">
<div class="control-group">
<label class="control-label" for="providerSsn">ΑΦΜ Προμηθευτή</label>
<div class="controls">
<input type="text" name="providerSsn">
</div>
</div>
<div class="control-group">
<label cloass="control-label" for="dateCreated">Ημερομηνία Δημιουργίας</label>
<div class="controls">
<input type="text" name="dateCreated">
</div>
</div>

<div class="control-group">
<label class="control-label" for="dateDue">Ημερομηνία Παράδοσης</label>
<div class="controls">
<input type="text" name="dateDue">
</div>
</div>
<div class="control-group">
<label class="control-label" for="status">Κατάσταση</label>
<div class="controls">
<input type="text" name="status">
</div>
</div>

<div class="control-group">
<label class="control-label" for="idUser">id Χρήστη</label>
<div class="controls">
<input type="text" name="idUser">
</div>
</div>
