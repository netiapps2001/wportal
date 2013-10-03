<?php
//All include paths
include_once("globals.php");
include_once($ROOTDIR."/class/SQLQuery.php");
include_once($ROOTDIR."/class/DBHelper.php");
include_once($ROOTDIR."/includes/system/phpmailer/class.phpmailer.php");
include_once($ROOTDIR."/actions/storemenu.php");
include_once($ROOTDIR."/includes/js/menuvalidation.js");
//Initialise all class-Objects
$QUERY = new SQLQuery();
$DB = new DBHelper();
$DB->connectPortal();


?>
