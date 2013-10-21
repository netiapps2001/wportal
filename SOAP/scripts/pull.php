<?php
if(!extension_loaded("soap")){
        dl("php_soap.dll");
}

ini_set("soap.wsdl_cache_enabled", "0");
include_once("../../includes/system/kickstart.php");
$responseDoc = new DOMDocument();
$server = new SoapServer($PORTALHOST."pullService.wsdl");
$DB->enableWSDL();
function pullServiceList($category){
        $query = $QUERY->formStaticQuery('getcompany',1);
        $result = $DB->executeQuery($query);
        if($result == "0"){
                $responseString = "<xml><response><list><totalRecords>0</totalRecords><items></items><list></response></xml>";
        }
        else{
                $totalRecords = $DB->fetchNumRecords($result);
                $responseString = "<xml><response><list><totalRecords>".$totalRecords."<items>";
                while($listData = mysql_fetch_assoc($result)){
                        $serviceId = $listData['name'];
                   
                        $responseString .= "<item><name>".$serviceId."</name>";
                }
                $responseString .= "</items></list></response></xml>";
        }
        $DB->disableWSDL();
        $responseDoc->loadXML($responseString);
        return $responseDoc->saveXML();
}

?>


