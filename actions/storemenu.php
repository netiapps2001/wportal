<?php
include_once('../includes/system/kickstart.php');

	$name=$_REQUEST['menuname'];
	$href=$_POST['href'];
	$status=$_POST['status'];
	$arr= array($name,$href,$status);
	//print_r($arr);	
	//print_r($QUERY);
	//exit;
	$getQuery = $QUERY->formStaticQuery("insertMenu",$arr);
	$DB->executeQuery($getQuery);
	
?>


