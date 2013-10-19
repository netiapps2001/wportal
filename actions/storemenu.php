<?php
include_once('../includes/system/kickstart.php');
//getting Values for the menus that should be added to the home page
 	$name=$_REQUEST['menuname'];
	$href=$_POST['href'];
	$status=$_POST['status'];
	$arr= array($name,$href,$status);
	$getQuery = $QUERY->formStaticQuery("insertMenu",$arr);
	$DB->executeQuery($getQuery);
	
?>


