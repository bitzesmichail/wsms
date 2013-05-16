<?php
  require_once 'Views/navbars/navbar.php';
?>

<div class="container">

<form class="form-horizontal" action="<?php echo SALEORDER . "/create"; ?>" method="post">
  <div id="step1" class="stepDivs step1">
    <h2>
      Δημιουργία Παραγγελίας - Βήμα 1ο
    </h2>
    <div class="control-group">
      <label class="control-label" for="customerSsn">Κωδικός Παραγγελίας</label>
      <div class="controls">
        <input type="text" name="customerSsn" value="αυτόματο" readonly>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="dateDue">Ημερομηνία Έκδοσης</label>
      <div class="controls">
        <input type="text" name="dateDue" value="Σήμερα" readonly>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="dateDue">Ημερομηνία Παράδοσης</label>
      <div class="controls">
        <input type="text" name="dateDue">
      </div>
    </div>

    <button type="button" class="btn btn-success previous" >Προηγούμενο</button>
    <button type="button" class="btn btn-warning next">Επόμενο</button>
    
    
  </div>
  
  <div id="step2" class="stepDivs step2">
    <h2>
      Δημιουργία Παραγγελίας - Βήμα 2ο(Επιλογή πελάτη)
    </h2>
    
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="selectCustomerTable">
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
        if (!empty($data->customers)) {
          foreach ($data->customers as &$value) {
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
            echo "</tr>";
          }
        }
      ?>
      </tbody>
    </table>
    
    
    
    <button type="button" class="btn btn-success previous">Προηγούμενο</button>
    <button type="button" class="btn btn-warning next">Επόμενο</button>
  </div>
  
  <div id="step3" class="stepDivs step3">
    <h2>
      Δημιουργία Παραγγελίας - Βήμα 3ο(Επιλογή προϊόντων)
    </h2>
    <div class="control-group">
      <label class="control-label" for="dateDue">Ποσότητα</label>
      <div class="controls">
        <input type="text" name="dateDue">
      </div>
    </div>
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="selectProductTable">
      <thead>
      <tr>
        <th><strong>SKU</strong></th>
        <th><strong>Περιγραφή</strong></th>
        <th><strong>Τιμή</strong></th>
        <th><strong>Διαθέσιμο</strong></th>
        <th><strong>Δεσμευμένο</strong></th>
        <th><strong>Σε παραγγελία</strong></th>
      </tr>
      </thead>
      <tbody>
      <?php
        if (!empty($data)) {
        foreach ($data->products as &$value) {
          echo "<tr>";
          echo "<td>" . $value->sku . "</td>";
          echo "<td>" . $value->description . "</td>";
          echo "<td>" . $value->priceSale . "</td>";
          echo "<td>" . $value->availableSum . "</td>";
          echo "<td>" . $value->reservedSum . "</td>";
          echo "<td>" . $value->orderedSum . "</td>";
          echo "</tr>";
          }
        }
      ?>
      </tbody>
    </table>
    <button type="button" class="btn btn-success previous">Προηγούμενο</button>
    <button type="button" class="btn btn-warning next">Επόμενο</button>
  </div>
  
  <div id="step4" class="stepDivs step4">
    <h2>
      Στοιχεία Παραγγελίας
    </h2>
    <h3>
      Στοιχεία Πωλητή
    </h3>
    <?php echo $_SESSION['username']; ?>
    <h3>
      Στοιχεία Πελάτη
    </h3>
    <h3>
      Στοιχεία Προϊόντων
    </h3>
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="selectedProductTable">
      <thead>
      <tr>
        <th><strong>SKU</strong></th>
        <th><strong>Περιγραφή</strong></th>
        <th><strong>Τιμή</strong></th>
        <th><strong>Ποσότητα</strong></th>
      </tr>
      </thead>
      <tbody>
      <?php
        if (!empty($data)) {
        foreach ($data->products as &$value) {
          echo "<tr>";
          echo "<td>" . $value->sku . "</td>";
          echo "<td>" . $value->description . "</td>";
          echo "<td>" . $value->priceSale . "</td>";
          echo "<td>" . "</td>";
          echo "</tr>";
          }
        }
      ?>
      </tbody>
    </table>  
    <button type="button" class="btn btn-success previous">Προηγούμενο</button>
  </div>

  <div class="stepDivs submitButton">
    <div class="control-group">
      <div class="controls">
        <button type="submit" class="btn btn-primary">Προσθήκη</button>
      </div>
    </div>
  </div>
</form>
</div>
