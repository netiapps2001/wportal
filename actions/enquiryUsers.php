<?php
include_once('../includes/system/kickstart.php');
$firstname=$IO->fetchSystemVar('fname','post');
$lastname=$IO->fetchSystemVar('lname','post');
$mobile=$IO->fetchSystemVar('mobile','post');
$email=$IO->fetchSystemVar('email','post');
$org=$IO->fetchSystemVar('org','post');
$customer= $IO->fetchSystemVar('custtype','post');
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set("soap.wsdl_cache_enabled", "0");
$client = new soapClient("http://192.168.1.10/~anupssh/SOAP/requests/pullServiceList.wsdl");
$info = $client->__call('fetchServiceList', array('$firstname','$lastname','$mobile','$email','$org','$customer'));// Salesorder ID and Invoice No
$IO->sendMail('newuser',$email);
header("Location:../views/index.php");
?>
