<?php
include_once($ROOTDIR.$VERSIONDIR.'includes/system/kickstart.php');

	$name=$_REQUEST['menuname'];
	$href=$_POST['href'];
	$status=$_POST['status'];
	$arr= array($name,$href,$status);
	//print_r($arr);	
	$QUERY->formStaticQuery("insertMenu",$arr);
		
//$DB->executeQuery($QUERY);
	
?>


