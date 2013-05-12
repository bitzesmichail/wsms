 <ul class="nav nav-pills">
      <?php
        if(isset($which)) {
          switch($which) {
            case 'saleorder':
              echo '<li class="active"><a>Παραγγελίες</a></li>';
              echo '<li><a href="' . CUSTOMER . '/index' .'">Πελάτες</a></li>';
              break;
            case 'customer':
              echo '<li><a href="' . SALEORDER . '/index' .'">Παραγγελίες</a></li>';
              echo '<li class="active"><a>Πελάτες</a></li>';
              break;
          }
        } else {
              echo '<li><a href="' . SALEORDER . '/index' .'">Παραγγελίες</a></li>';
              echo '<li><a href="' . CUSTOMER . '/index' .'">Πελάτες</a></li>';
        }
      ?>
    </ul>
