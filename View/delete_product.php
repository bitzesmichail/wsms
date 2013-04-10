<?php
require "vcc.php" ;
$id = addslashes($_POST['pid']) ;
delete_product($id) ;
header("Location: ./") ;
?>
