<?php
require "vcc.php" ;
$id = addslashes($_POST['cid']) ;
delete_customer($id) ;
header("Location: ./") ;
?>
