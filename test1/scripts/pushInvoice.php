<?php
if(!extension_loaded("soap"))
{
  dl("php_soap.dll");
}

ini_set("soap.wsdl_cache_enabled","0");
$server = new SoapServer("../requests/createInvoice.wsdl");

function pushInv($soid, $invid)
{
	return 'hi foo test';
}

$server->AddFunction("pushInv");
$server->handle();
?>
