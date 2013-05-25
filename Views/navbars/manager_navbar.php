<ul class="nav nav-pills">
	  <?php
		  if(isset($which)) {
		  switch($which) {
			case 'saleorder':
			  echo '<li class="dropdown active">';
				echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Παραγγελίες <b class="caret"></b></a>';
				echo '<ul class="dropdown-menu">';
				echo '	  <li><a href="' . SALEORDER . '/index' .'">Διαχείρηση Παραγγελιών</a></li>';
				echo '	  <li><a href="' . SALEORDER . '/saleHistory' .'">Ιστορικό</a></li>';
				echo '	</ul>';
				echo '  </li>';
				echo '<li class="dropdown">';
				echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Προμήθειες <b class="caret"></b></a>';
				echo '<ul class="dropdown-menu">';
				echo '	  <li><a href="' . SUPPLYORDER . '/index' .'">Διαχείρηση Προμηθειών</a></li>';
				echo '	  <li><a href="' . SUPPLYORDER . '/supplyHistory' .'">Ιστορικό</a></li>';
				echo '	</ul>';
				echo '  </li>';
			  echo '<li><a href="' . CUSTOMER . '/index' .'">Πελάτες</a></li>';
			  echo '<li><a href="' . PROVIDER . '/index' .'">Προμηθευτές</a></li>';
			  echo '<li><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
			  echo '<li><a href="' . USERS . '/index' .'">Χρήστες</a></li>';
			  break;
			case 'supplyorder':
				echo '<li class="dropdown">';
				echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Παραγγελίες <b class="caret"></b></a>';
				echo '<ul class="dropdown-menu">';
				echo '	  <li><a href="' . SALEORDER . '/index' .'">Διαχείρηση Παραγγελιών</a></li>';
				echo '	  <li><a href="' . SALEORDER . '/saleHistory' .'">Ιστορικό</a></li>';
				echo '	</ul>';
				echo '  </li>';
				echo '<li class="dropdown active">';
				echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Προμήθειες <b class="caret"></b></a>';
				echo '<ul class="dropdown-menu">';
				echo '	  <li><a href="' . SUPPLYORDER . '/index' .'">Διαχείρηση Προμηθειών</a></li>';
				echo '	  <li><a href="' . SUPPLYORDER . '/supplyHistory' .'">Ιστορικό</a></li>';
				echo '	</ul>';
				echo '  </li>';
				echo '<li><a href="' . CUSTOMER . '/index' .'">Πελάτες</a></li>';
				echo '<li><a href="' . PROVIDER . '/index' .'">Προμηθευτές</a></li>';
				echo '<li><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
				echo '<li><a href="' . USERS . '/index' .'">Χρήστες</a></li>';
				break;
			case 'customer':
			  echo '<li class="dropdown">';
				echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Παραγγελίες <b class="caret"></b></a>';
				echo '<ul class="dropdown-menu">';
				echo '	  <li><a href="' . SALEORDER . '/index' .'">Διαχείρηση Παραγγελιών</a></li>';
				echo '	  <li><a href="' . SALEORDER . '/saleHistory' .'">Ιστορικό</a></li>';
				echo '	</ul>';
				echo '  </li>';
			  echo '<li class="dropdown">';
				echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Προμήθειες <b class="caret"></b></a>';
				echo '<ul class="dropdown-menu">';
				echo '	  <li><a href="' . SUPPLYORDER . '/index' .'">Διαχείρηση Προμηθειών</a></li>';
				echo '	  <li><a href="' . SUPPLYORDER . '/supplyHistory' .'">Ιστορικό</a></li>';
				echo '	</ul>';
				echo '  </li>';
			  echo '<li class="active"><a>Πελάτες</a></li>';
			  echo '<li><a href="' . PROVIDER . '/index' .'">Προμηθευτές</a></li>';
			  echo '<li><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
			  echo '<li><a href="' . USERS . '/index' .'">Χρήστες</a></li>';
			  break;
			case 'provider':
			  echo '<li class="dropdown">';
				echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Παραγγελίες <b class="caret"></b></a>';
				echo '<ul class="dropdown-menu">';
				echo '	  <li><a href="' . SALEORDER . '/index' .'">Διαχείρηση Παραγγελιών</a></li>';
				echo '	  <li><a href="' . SALEORDER . '/saleHistory' .'">Ιστορικό</a></li>';
				echo '	</ul>';
				echo '  </li>';
			  echo '<li class="dropdown">';
				echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Προμήθειες <b class="caret"></b></a>';
				echo '<ul class="dropdown-menu">';
				echo '	  <li><a href="' . SUPPLYORDER . '/index' .'">Διαχείρηση Προμηθειών</a></li>';
				echo '	  <li><a href="' . SUPPLYORDER . '/supplyHistory' .'">Ιστορικό</a></li>';
				echo '	</ul>';
				echo '  </li>';
			  echo '<li><a href="' . CUSTOMER . '/index' .'">Πελάτες</a></li>';
			  echo '<li class="active"><a>Προμηθευτές</a></li>';
			  echo '<li><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
			  echo '<li><a href="' . USERS . '/index' .'">Χρήστες</a></li>';
			  break;
			case 'product':
			  echo '<li class="dropdown">';
				echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Παραγγελίες <b class="caret"></b></a>';
				echo '<ul class="dropdown-menu">';
				echo '	  <li><a href="' . SALEORDER . '/index' .'">Διαχείρηση Παραγγελιών</a></li>';
				echo '	  <li><a href="' . SALEORDER . '/saleHistory' .'">Ιστορικό</a></li>';
				echo '	</ul>';
				echo '  </li>';
			  echo '<li class="dropdown">';
				echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Προμήθειες <b class="caret"></b></a>';
				echo '<ul class="dropdown-menu">';
				echo '	  <li><a href="' . SUPPLYORDER . '/index' .'">Διαχείρηση Προμηθειών</a></li>';
				echo '	  <li><a href="' . SUPPLYORDER . '/supplyHistory' .'">Ιστορικό</a></li>';
				echo '	</ul>';
				echo '  </li>';
			  echo '<li><a href="' . CUSTOMER . '/index' .'">Πελάτες</a></li>';
			  echo '<li><a href="' . PROVIDER . '/index' .'">Προμηθευτές</a></li>';
			  echo '<li class="active"><a>Προϊόντα</a></li>';
			  echo '<li><a href="' . USERS . '/index' .'">Χρήστες</a></li>';
			  break;
			case 'users':
			  echo '<li class="dropdown">';
				echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Παραγγελίες <b class="caret"></b></a>';
				echo '<ul class="dropdown-menu">';
				echo '	  <li><a href="' . SALEORDER . '/index' .'">Διαχείρηση Παραγγελιών</a></li>';
				echo '	  <li><a href="' . SALEORDER . '/saleHistory' .'">Ιστορικό</a></li>';
				echo '	</ul>';
				echo '  </li>';
			  echo '<li class="dropdown">';
				echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Προμήθειες <b class="caret"></b></a>';
				echo '<ul class="dropdown-menu">';
				echo '	  <li><a href="' . SUPPLYORDER . '/index' .'">Διαχείρηση Προμηθειών</a></li>';
				echo '	  <li><a href="' . SUPPLYORDER . '/supplyHistory' .'">Ιστορικό</a></li>';
				echo '	</ul>';
				echo '  </li>';
			  echo '<li><a href="' . CUSTOMER . '/index' .'">Πελάτες</a></li>';
			  echo '<li><a href="' . PROVIDER . '/index' .'">Προμηθευτές</a></li>';
			  echo '<li><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
			  echo '<li class="active"><a>Χρήστες</a></li>';
			  break;
		}
		}
		else {
			  echo '<li class="dropdown">';
				echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Παραγγελίες <b class="caret"></b></a>';
				echo '<ul class="dropdown-menu">';
				echo '	  <li><a href="' . SALEORDER . '/index' .'">Διαχείρηση Παραγγελιών</a></li>';
				echo '	  <li><a href="' . SALEORDER . '/saleHistory' .'">Ιστορικό</a></li>';
				echo '	</ul>';
				echo '  </li>';
			 echo '<li class="dropdown">';
				echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Προμήθειες <b class="caret"></b></a>';
				echo '<ul class="dropdown-menu">';
				echo '	  <li><a href="' . SUPPLYORDER . '/index' .'">Διαχείρηση Προμηθειών</a></li>';
				echo '	  <li><a href="' . SUPPLYORDER . '/supplyHistory' .'">Ιστορικό</a></li>';
				echo '	</ul>';
				echo '  </li>';
			  echo '<li><a href="' . CUSTOMER . '/index' .'">Πελάτες</a></li>';
			  echo '<li><a href="' . PROVIDER . '/index' .'">Προμηθευτές</a></li>';
			  echo '<li><a href="' . PRODUCT . '/index' .'">Προϊόντα</a></li>';
			  echo '<li><a href="' . USERS . '/index' .'">Χρήστες</a></li>';
		}
	  ?> 
</ul>
