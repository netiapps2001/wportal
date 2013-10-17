<?php
//include_once('../../includes/system/kickstart.php');
if(!extension_loaded("soap"))
{
  dl("php_soap.dll");
}

ini_set("soap.wsdl_cache_enabled","0");
$server = new SoapServer("../requests/pullServiceList.wsdl");

function fetchServiceList($cat,$type)
{
        $responseDoc = new DOMDocument();
        mysql_connect("localhost", "root", "root");
        mysql_select_db("wealthjunction");
       	//$context=array();
	if($type=='Product')
	{
		$fetchSql = "SELECT vtiger_products.*, vtiger_crmentity.*, vtiger_productcf.* FROM vtiger_products JOIN vtiger_crmentity ON vtiger_products.productid=vtiger_crmentity.crmid JOIN vtiger_productcf ON vtiger_products.productid=vtiger_productcf.productid WHERE vtiger_productcf.cf_739 LIKE '".$cat."'";
		$resultSql = mysql_query($fetchSql);
		if(mysql_num_rows($resultSql)==0)
		{
			$responseString = "<xml><response><list><totalRecords>0</totalRecords><items></items></list></response></xml>";
		}
		else
		{
			$totalRecords = mysql_num_rows($resultSql);
			$responseString = "<xml><response><list><totalRecords>".$totalRecords."</totalRecords><items>";
			while($datafetch = mysql_fetch_assoc($resultSql))
			{
				$pid = $datafetch['productid'];
				$pname = $datafetch['productname'];
				$desc = $datafetch['description'];
				$responseString .= "<item><id>".$pid."</id><name>".$pname."</name><description>".$desc."</description></item>";
			}
			$responseString .= "</items></list></response></xml>";
		}
		
	}
	if($type=='Service')
	{
		$fetchSql = "SELECT vtiger_service.*, vtiger_crmentity.*, FROM vtiger_service JOIN vtiger_crmentity ON vtiger_service.serviceid=vtiger_crmentity.crmid WHERE vtiger_service.servicecategory LIKE '".$cat."'";
		$resultSql = mysql_query($fetchSql);
		if(mysql_num_rows($resultSql)==0)
		{
			$responseString = "<xml><response><list><totalRecords>0</totalRecords><items></items></list></response></xml>";
		}
		else
		{
			$totalRecords = mysql_num_rows($resultSql);
                        $responseString = "<xml><response><list><totalRecords>".$totalRecords."</totalRecords><items>";
                        while($datafetch = mysql_fetch_assoc($resultSql))
                        {
				$sid = $datafetch['serviceid'];
				$sname = $datafetch['servicename'];
				$desc = $datafetch['description'];
				$price = $datafetch['unit_price'];
				$responseString .= "<item><id>".$sid."</id><name>".$sname."</name><description>".$desc."</description><price>".$price."</price></item>";
			}
			$responseString .= "</items></list></response></xml>";
		}
	}
	$responseDoc->loadXML($responseString);
        return $responseDoc->saveXML();
}
$server->AddFunction("fetchServiceList");
$server->handle();
?>
                 
