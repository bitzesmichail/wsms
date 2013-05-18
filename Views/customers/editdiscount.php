<?php
  require_once 'Views/navbars/navbar.php';
?>

<div class="container">
<h2>
  Έκπτωση ανά προϊόν για τον πελάτη <?php echo $_GET['ssn'] ?>
</h2>

<p>
  <a href="<?php echo CUSTOMER . "/adddiscount"; ?>"><button class="btn btn-primary" type="button" >Προσθήκη νέας έκπτωσης</button></a>
</p>

<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" width="100%" id="customerdiscount_table">
<thead>
<tr>
  <th><strong>SKU</strong></th>
  <th><strong>Περιγραφή</strong></th>
  <th><strong>Έκπτωση</strong></th>
  <th><strong>Τιμή Πώλησης</strong></th>
  <th><strong>Τιμή Αγοράς</strong></th>

  <!--<th><strong>Ενέργειες</strong></th>-->
</tr>
</thead>
<tbody>
<?php
  if (!empty($data)) {
    foreach ($data as &$value) {
      echo "<tr>";
      echo "<td>" . $value->sku . "</td>";
      echo "<td>" . $value->description . "</td>";
      echo "<td>" . $value->discount . "</td>";
      echo "<td>" . $value->priceSale . "</td>";
      echo "<td>" . $value->priceSupply . "</td>";
      
      //echo "<td>" . "<a href=\"" . CUSTOMER . "/editcustomer?ssn=" . $value->ssn . "\">" . "<button class=\"btn btn-primary\" type=\"button\" >Επεξεργασία</button></a>";       
      //echo "<a href=\"" . CUSTOMER . "/editdiscount?ssn=" . $value->ssn . "\">" . "<button class=\"btn btn-primary\" type=\"button\" >Εκπτώσεις</button></a>";      
      //echo "<a href=\"" . CUSTOMER . "/deletecustomer?ssn=" . $value->ssn . "\">" . "<button class=\"btn btn-danger\" type=\"button\" >Διαγραφή</button></td></a>";
      echo "</tr>";
    }
  }
?>
</tbody>
</table>
</div>

