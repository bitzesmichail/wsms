<div class="navbar">
  <div class="navbar-inner">
    <ul class="nav">
      <?php
        if(isset($which)) {
          switch($which) {
            case 'supplyorder':
              echo '<li class="active"><a>Προμήθειες</a></li>';
              echo '<li><a href="' . PROVIDER . '/index' .'">Προμηθευτές</a></li>';
              break;
            case 'provider':
              echo '<li><a href="' . SUPPLYORDER . '/index' .'">Προμήθειες</a></li>';
              echo '<li class="active"><a>Προμηθευτές</a></li>';
              break;
          }
        } else {
              echo '<li><a href="' . SUPPLYORDER . '/index' .'">Προμήθειες</a></li>';
              echo '<li><a href="' . PROVIDER . '/index' .'">Προμηθευτές</a></li>';
        }
      ?>
    </ul>
  </div>
</div>