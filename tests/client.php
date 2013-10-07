<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set("soap.wsdl_cache_enabled", "0");
$client = new soapClient("http://localhost/wealth07101146/test1/requests/createInvoice.wsdl");

$info = $client->__call('pushInv', array('68'));// Salesorder ID and Invoice No
print_r($info);
?>
