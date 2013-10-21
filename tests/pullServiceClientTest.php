<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('soap.wsdl_cache_enabled', '0');

$soapClient = new soapClient("http://192.168.1.10/~anupssh/wealthportal/SOAP/requests/pullService.wsdl");
$info = $soapClient->__call('pullServiceList',array('Individual'));

print_r($info);

?>
