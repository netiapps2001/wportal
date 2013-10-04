<?php
include_once("globals.php");
include_once($ROOTDIR.$VERSIONDIR."class/SQLQuery.php");
include_once($ROOTDIR.$VERSIONDIR."class/DBHelper.php");
include_once($ROOTDIR.$VERSIONDIR."includes/system/phpmailer/class.phpmailer.php");
include_once($ROOTDIR.$VERSIONDIR."includes/js/menuvalidation.js");

//Initialise all class-Objects
$QUERY = new SQLQuery();
$DB = new DBHelper(); 
$DB->connectPortal();

?>
