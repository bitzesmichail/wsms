<?php
require "vcc.php" ;
$id = addslashes($_POST['cid']) ;
delete_provider($id) ;
header("Location: ./") ;
?>
