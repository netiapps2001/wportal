<?php

if(!extension_loaded("soap"))
{
	dl("php_soap.dll");
}

ini_set("soap.wsdl_cache_enabled","0");
$server = new SoapServer("../requests/fetchDetails.wsdl");

function fetchServiceList($fname,$lname,$org,$email,$phone,$type)
{
	//responseDoc = new DOMDocument();
        mysql_connect("localhost", "anup", "tripleseven7");
        mysql_select_db("wealthjunction");
        //$context=array();
	$createTime = date('Y-m-d h:i:s');
	$insSql = 'INSERT INTO vtiger_leaddetails(firstname, lastname, company, email, mobile, createdtime) VALUES("'.$fname.'", "'.$lname.'", "'.$org.'", "'.$email.'", "'.$phone.'", "'.$createTime.'")';
	mysql_query($insSql);
	$lid = mysql_insert_id();
	$insType = "INSERT INTO vtiger_leaddetails(leadid, cf_740) VALUES (".$lid.", '".$type."')";
	mysql_query($insType);
        //return $responseDoc->saveXML();
	return 1;
}
$server->AddFunction("fetchServiceList");
$server->handle();

?>
