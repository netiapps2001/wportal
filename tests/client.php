<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set("soap.wsdl_cache_enabled", "0");
$client = new soapClient("http://192.168.1.10/~anupssh/SOAP/requests/fetchDetails.wsdl");

$info = $client->__call('fetchServiceList', array(862,'Service'));// Salesorder ID and Invoice No
print_r($info);
?>
