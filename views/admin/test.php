<?php
include_once($ROOTDIR.$VERSIONDIR."includes/system/globals.php");
include_once('../../includes/system/kickstart.php');

$p=$_REQUEST['q'];

$r=$_REQUEST['p'];
$query = new SQLQuery();
echo $query ->formStaticQuery($p,$r);
$db = new DBHelper();
$db->executeQuery($query->formStaticQuery($p,$r));
?>
