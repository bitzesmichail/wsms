<?php
  require_once 'Views/navbars/navbar.php';
?>
   
<div class="container">
<h2>
  	Επεξεργασία ευκταίου προϊόντος
</h2>

<form class="form-horizontal" action="<?php echo PRODUCT . "/wishproduct_create"; ?>" method="post">
  <div class="control-group">
    <label class="control-label" for="description">Περιγραφή</label>
    <div class="controls">
      <input type="text" name="description">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="quantity">Ποσότητα</label>
    <div class="controls">
      <input type="text" name="quantity">
    </div>
  </div>
  

  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary">Προσθήκη</button>
    </div>
  </div>
</form>
</div>