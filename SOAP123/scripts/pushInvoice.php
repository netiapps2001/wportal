<?php
if(!extension_loaded("soap"))
{
  dl("php_soap.dll");
}

ini_set("soap.wsdl_cache_enabled","0");
$server = new SoapServer("createInvoice.wsdl");

function pushInv($soid)
{
			$xmlString = 'hello doc';

			//	$doc->loadXML($xmlString);
			//	return $doc->saveXML();
	
			//		return $doc;
	//return array($farquery);
	
	//}
	/*if($resultcontact)
	{
		 mysql_query("COMMIT");
		 return "1";
	}
	else
	{
		mysql_query("ROLLBACK");
		return "0";
	}*/
	return $xmlString;
}
//echo pushMagento("bandit","50");

$server->AddFunction("pushInv");
$server->handle();
?>
