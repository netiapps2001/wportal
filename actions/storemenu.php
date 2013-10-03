<?php
inlcude_once('../includes/system/kickstart.php');

	$name=$_POST['menuname'];
	$href=$_POST['href'];
	$status=$_POSt['status'];
	$QUERY->formStaticQuery('insertMenu');
?>
