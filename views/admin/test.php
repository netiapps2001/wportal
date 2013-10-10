<?php
include_once($ROOTDIR.$VERSIONDIR."includes/system/globals.php");
include_once('../../includes/system/kickstart.php');

$p=$_REQUEST['q'];

$r=$_REQUEST['p'];
$x = new SQLQuery();

echo $x->formStaticQuery($p,$r);
$db = new DBHelper();
$db->executeQuery($x->formStaticQuery($p,$r));
?>
