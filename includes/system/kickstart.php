<?php
include_once("globals.php");
include_once($ROOTDIR.$VERSIONDIR."class/SQLQuery.php");
include_once($ROOTDIR.$VERSIONDIR."class/DBHelper.php");
include_once($ROOTDIR.$VERSIONDIR."class/IOHelper.php");

include_once($ROOTDIR.$VERSIONDIR."includes/system/phpmailer/class.phpmailer.php");


//Initialise all class-Objects
$QUERY = new SQLQuery();
$DB = new DBHelper(); 
$IO = new IOHelper();
$DB->connectPortal();

?>
