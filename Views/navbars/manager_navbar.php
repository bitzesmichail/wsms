<div class="navbar">
  <div class="navbar-inner">
    <ul class="nav">
      <?php
          if(isset($which)) {
          switch($which) {
            case 'paraggelies':
              echo '<li class="active"><a href="' . SALEORDER . '/index' .'">Παραγγελίες</a></li>';
              echo '<li><a href="' . SUPPLYORDER . '/index' .'">Προμήθειες</a></li>';
              echo '<li><a href="' . CUSTOMER . '/index' .'">Πελάτες</a></li>';
              echo '<li><a href="' . PROVIDER . '/index' .'">Προμηθευτές</a></li>';
              echo '<li><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
              echo '<li><a href="' . USERS . '/index' .'">Χρήστες</a></li>';
              break;
            case 'promithies':
              echo '<li><a href="' . SALEORDER . '/index' .'">Παραγγελίες</a></li>';
              echo '<li class="active"><a href="' . SUPPLYORDER . '/index' .'">Προμήθειες</a></li>';
              echo '<li><a href="' . CUSTOMER . '/index' .'">Πελάτες</a></li>';
              echo '<li><a href="' . PROVIDER . '/index' .'">Προμηθευτές</a></li>';
              echo '<li><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
              echo '<li><a href="' . USERS . '/index' .'">Χρήστες</a></li>';
              break;
            case 'pelates':
              echo '<li><a href="' . SALEORDER . '/index' .'">Παραγγελίες</a></li>';
              echo '<li><a href="' . SUPPLYORDER . '/index' .'">Προμήθειες</a></li>';
              echo '<li class="active"><a href="' . CUSTOMER . '/index' .'">Πελάτες</a></li>';
              echo '<li><a href="' . PROVIDER . '/index' .'">Προμηθευτές</a></li>';
              echo '<li><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
              echo '<li><a href="' . USERS . '/index' .'">Χρήστες</a></li>';
              break;
            case 'promitheutes':
              echo '<li><a href="' . SALEORDER . '/index' .'">Παραγγελίες</a></li>';
              echo '<li><a href="' . SUPPLYORDER . '/index' .'">Προμήθειες</a></li>';
              echo '<li><a href="' . CUSTOMER . '/index' .'">Πελάτες</a></li>';
              echo '<li class="active"><a href="' . PROVIDER . '/index' .'">Προμηθευτές</a></li>';
              echo '<li><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
              echo '<li><a href="' . USERS . '/index' .'">Χρήστες</a></li>';
              break;
            case 'proionta':
              echo '<li><a href="' . SALEORDER . '/index' .'">Παραγγελίες</a></li>';
              echo '<li><a href="' . SUPPLYORDER . '/index' .'">Προμήθειες</a></li>';
              echo '<li><a href="' . CUSTOMER . '/index' .'">Πελάτες</a></li>';
              echo '<li><a href="' . PROVIDER . '/index' .'">Προμηθευτές</a></li>';
              echo '<li class="active"><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
              echo '<li><a href="' . USERS . '/index' .'">Χρήστες</a></li>';
              break;
            case 'xristes':
              echo '<li><a href="' . SALEORDER . '/index' .'">Παραγγελίες</a></li>';
              echo '<li><a href="' . SUPPLYORDER . '/index' .'">Προμήθειες</a></li>';
              echo '<li><a href="' . CUSTOMER . '/index' .'">Πελάτες</a></li>';
              echo '<li><a href="' . PROVIDER . '/index' .'">Προμηθευτές</a></li>';
              echo '<li><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
              echo '<li class="active"><a href="' . USERS . '/index' .'">Χρήστες</a></li>';
              break;
        }
        }
        else {
              echo '<li><a href="' . SALEORDER . '/index' .'">Παραγγελίες</a></li>';
              echo '<li><a href="' . SUPPLYORDER . '/index' .'">Προμήθειες</a></li>';
              echo '<li><a href="' . CUSTOMER . '/index' .'">Πελάτες</a></li>';
              echo '<li><a href="' . PROVIDER . '/index' .'">Προμηθευτές</a></li>';
              echo '<li><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
              echo '<li><a href="' . USERS . '/index' .'">Χρήστες</a></li>';
        }
      ?> 
    </ul>
  </div>
</div>