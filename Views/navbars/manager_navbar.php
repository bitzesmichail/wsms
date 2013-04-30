<div class="navbar">
  <div class="navbar-inner">
    <ul class="nav">
      <?php
          if(isset($which)) {
          switch($which) {
            case 'paraggelies':
              echo '<li class="active"><a>Παραγγελίες</a></li>';
              echo '<li><a href="">Προμήθειες</a></li>';
              echo '<li><a href="">Πελάτες</a></li>';
              echo '<li><a href="">Προμηθευτές</a></li>';
              echo '<li><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
              echo '<li><a href="' . USERS . '/index' .'">Χρήστες</a></li>';
              break;
            case 'promithies':
              echo '<li><a href="">Παραγγελίες</a></li>';
              echo '<li class="active"><a>Προμήθειες</a></li>';
              echo '<li><a href="">Πελάτες</a></li>';
              echo '<li><a href="">Προμηθευτές</a></li>';
              echo '<li><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
              echo '<li><a href="' . USERS . '/index' .'">Χρήστες</a></li>';                      
              break;
            case 'pelates':
              echo '<li><a href="">Παραγγελίες</a></li>';
              echo '<li><a href="">Προμήθειες</a></li>';
              echo '<li class="active"><a>Πελάτες</a></li>';
              echo '<li><a href="">Προμηθευτές</a></li>';
              echo '<li><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
              echo '<li><a href="' . USERS . '/index' .'">Χρήστες</a></li>';                      
              break;
            case 'promitheutes':
              echo '<li><a href="">Παραγγελίες</a></li>';
              echo '<li><a href="">Προμήθειες</a></li>';
              echo '<li><a href="">Πελάτες</a></li>';
              echo '<li class="active"><a>Προμηθευτές</a></li>';
              echo '<li><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
              echo '<li><a href="' . USERS . '/index' .'">Χρήστες</a></li>';                      
              break;
            case 'proionta':
              echo '<li><a href="">Παραγγελίες</a></li>';
              echo '<li><a href="">Προμήθειες</a></li>';
              echo '<li><a href="">Πελάτες</a></li>';
              echo '<li><a href="">Προμηθευτές</a></li>';
              echo '<li class="active"><a>Προϊόντα</a></li>';
              echo '<li><a href="' . USERS . '/index' .'">Χρήστες</a></li>';                      
              break;
            case 'xristes':
              echo '<li><a href="">Παραγγελίες</a></li>';
              echo '<li><a href="">Προμήθειες</a></li>';
              echo '<li><a href="">Πελάτες</a></li>';
              echo '<li><a href="">Προμηθευτές</a></li>';
              echo '<li><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
              echo '<li class="active"><a>Χρήστες</a></li>';            
              break;
        }
        }
        else {
              echo '<li><a href="">Παραγγελίες</a></li>';
              echo '<li><a href="">Προμήθειες</a></li>';
              echo '<li><a href="">Πελάτες</a></li>';
              echo '<li><a href="">Προμηθευτές</a></li>';
              echo '<li><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
              echo '<li><a href="' . USERS . '/index' .'">Χρήστες</a></li>';                      
        }
      ?> 
    </ul>
  </div>
</div>