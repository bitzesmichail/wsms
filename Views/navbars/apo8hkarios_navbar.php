	<ul class="nav nav-pills">
    	<?php
        if(isset($which)) {
          switch($which) {
            case 'saleorder':
              echo '<li class="active"><a>Παραγγελίες</a></li>';
              echo '<li><a href="' . SUPPLYORDER . '/index' .'">Προμήθειες</a></li>';
              break;
            case 'supplyorder':
              echo '<li><a href="' . SALEORDER . '/index' .'">Παραγγελίες</a></li>';
              echo '<li class="active"><a>Προμήθειες</a></li>';
              break;
          }
        } else {
              echo '<li><a href="' . SALEORDER . '/index' .'">Παραγγελίες</a></li>';
              echo '<li><a href="' . SUPPLYORDER . '/index' .'">Προμήθειες</a></li>';
        }
      ?>
    </ul>
