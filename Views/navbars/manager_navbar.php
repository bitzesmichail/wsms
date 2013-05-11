<ul class="nav nav-pills">
	  <?php
		  if(isset($which)) {
		  switch($which) {
			case 'saleorder':
			  echo '<li class="active"><a>Παραγγελίες</a></li>';
			  echo '<li><a href="' . SUPPLYORDER . '/index' .'">Προμήθειες</a></li>';
			  echo '<li><a href="' . CUSTOMER . '/index' .'">Πελάτες</a></li>';
			  echo '<li><a href="' . PROVIDER . '/index' .'">Προμηθευτές</a></li>';
			  echo '<li><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
			  echo '<li><a href="' . USERS . '/index' .'">Χρήστες</a></li>';
			  break;
			case 'supplyorder':
			  echo '<li><a href="' . SALEORDER . '/index' .'">Παραγγελίες</a></li>';
			  echo '<li class="active"><a>Προμήθειες</a></li>';
			  echo '<li><a href="' . CUSTOMER . '/index' .'">Πελάτες</a></li>';
			  echo '<li><a href="' . PROVIDER . '/index' .'">Προμηθευτές</a></li>';
			  echo '<li><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
			  echo '<li><a href="' . USERS . '/index' .'">Χρήστες</a></li>';
			  break;
			case 'customer':
			  echo '<li><a href="' . SALEORDER . '/index' .'">Παραγγελίες</a></li>';
			  echo '<li><a href="' . SUPPLYORDER . '/index' .'">Προμήθειες</a></li>';
			  echo '<li class="active"><a>Πελάτες</a></li>';
			  echo '<li><a href="' . PROVIDER . '/index' .'">Προμηθευτές</a></li>';
			  echo '<li><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
			  echo '<li><a href="' . USERS . '/index' .'">Χρήστες</a></li>';
			  break;
			case 'provider':
			  echo '<li><a href="' . SALEORDER . '/index' .'">Παραγγελίες</a></li>';
			  echo '<li><a href="' . SUPPLYORDER . '/index' .'">Προμήθειες</a></li>';
			  echo '<li><a href="' . CUSTOMER . '/index' .'">Πελάτες</a></li>';
			  echo '<li class="active"><a>Προμηθευτές</a></li>';
			  echo '<li><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
			  echo '<li><a href="' . USERS . '/index' .'">Χρήστες</a></li>';
			  break;
			case 'product':
			  echo '<li><a href="' . SALEORDER . '/index' .'">Παραγγελίες</a></li>';
			  echo '<li><a href="' . SUPPLYORDER . '/index' .'">Προμήθειες</a></li>';
			  echo '<li><a href="' . CUSTOMER . '/index' .'">Πελάτες</a></li>';
			  echo '<li><a href="' . PROVIDER . '/index' .'">Προμηθευτές</a></li>';
			  echo '<li class="active"><a>Προϊόντα</a></li>';
			  echo '<li><a href="' . USERS . '/index' .'">Χρήστες</a></li>';
			  break;
			case 'users':
			  echo '<li><a href="' . SALEORDER . '/index' .'">Παραγγελίες</a></li>';
			  echo '<li><a href="' . SUPPLYORDER . '/index' .'">Προμήθειες</a></li>';
			  echo '<li><a href="' . CUSTOMER . '/index' .'">Πελάτες</a></li>';
			  echo '<li><a href="' . PROVIDER . '/index' .'">Προμηθευτές</a></li>';
			  echo '<li><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
			  echo '<li class="active"><a>Χρήστες</a></li>';
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
