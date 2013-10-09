<?php
//include_once('../../includes/system/kickstart.php');
if(!extension_loaded("soap"))
{
  dl("php_soap.dll");
}

ini_set("soap.wsdl_cache_enabled","0");
$server = new SoapServer("../requests/pullServiceList.wsdl");

function fetchServiceList($soid)
{
	include_once('../../includes/system/kickstart.php');
//	$DB->enableWSDL();
	$context = array();
	$result=$QUERY->formStaticQuery('getcompany',1);
	$res= $DB->executeQuery($result);
	while($row=mysql_fetch_assoc($res))
	{
		array_push($context,$row['name']);
	}
	return $res;
//	$DB->disableWSDL();

//	return 'foo bar';
}

$server->AddFunction("fetchServiceList");
$server->handle();
?>
