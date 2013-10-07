<?php
if(!extension_loaded("soap"))
{
  dl("php_soap.dll");
}

ini_set("soap.wsdl_cache_enabled","0");
$server = new SoapServer("../requests/pullServiceList.wsdl");

function fetchServiceList($soid)
{
	return 'hi foo vnhf cx';
}

$server->AddFunction("fetchServiceList");
$server->handle();
?>
