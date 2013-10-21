<?php
if(!extension_loaded("soap"))
{
  dl("php_soap.dll");
}

ini_set("soap.wsdl_cache_enabled","0");
$server = new SoapServer("../requests/pullServiceList.wsdl");
include_once('../../includes/system/kickstart.php');
$responseDoc = new DOMDocument();
function fetchServiceList($category)
{
	$IO->validateWSDL();
	$IO->checkForSubmission();
	$DB->enableWSDL();
 	$wsdlQuery = $QUERY->formStaticQuery('pullService',$category);
	$list = $DB->executeQuery($wsdlQuery);
	$DB->sanitiseResult($list);
	if($list == "0"){
                $responseString = "<xml><response><list><totalRecords>0</totalRecords><items></items><list></response></xml>";
        }
        else{
		$totalRecords = $DB->fetchNumRecords($result);
                $responseString = "<xml><response><list><totalRecords>".$totalRecords."<items>";
                while($listData = mysql_fetch_assoc($result)){
                        $serviceId = $listData['serviceid'];
                        $serviceName = $listData['servicename'];
                        $serviceDesc = $listData['description'];
                        $serviceIndPrice = $listData['cf_736'];
                        $serviceCorPrice = $listData['cf_737'];
			$responseString .= "<item><id>".$serviceId."</id><name>".$serviceName."</name><desc>".$serviceDesc."</desc><price1>".$serviceIndPrice."</price1><price2>".$serviceCorPrice."</price2>";
                }
                $responseString .= "</items></list></response></xml>";
        }
	$responseDoc->loadXML($responseString);
	
	return $responseString->saveXML();
	//	return 'hi foo vnhf cx';
}

$server->AddFunction("fetchServiceList");
$server->handle();
?>
