<?php
//include_once('../../includes/system/kickstart.php');
if(!extension_loaded("soap"))
{
  dl("php_soap.dll");
}

ini_set("soap.wsdl_cache_enabled","0");
$server = new SoapServer("../requests/pullServiceList.wsdl");

function fetchServiceList($soid)
{
        //$responseDoc = new DOMDocument();
        $con = mysql_connect("localhost", "root", "root");
        $db_selected = mysql_select_db("wealthjunction", $con);
        $context=array();
        $result = mysql_query("SELECT vtiger_service.*, vtiger__crmentity.*, vtiger_servicecf.* FROM vtiger_service JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_service.serviceid JOIN vtiger_servicecf ON vtiger_service.serviceid=vtiger_servicecf.serviceid WHERE vtiger_service.servicecategory LIKE '".$soid." OR vtiger_service.servicecategory LIKE 'Both'");
        return $result;



        /*if(mysql_num_rows($result)==0){
                $responseString = "<xml><response><list><totalRecords>0</totalRecords><items></items></list></response></xml>";
        }
        else
        {
                $totalRecords = mysql_num_rows($result);
                $responseString = "<xml><response><list><totalRecords>".$totalRecords."</totalRecords><items>";
                $context=array();
                while($row=mysql_fetch_assoc($result))
                {
                        $a=$row['name'];
                        array_push($context,$a);
                //      $responseString .= "<item><name>".$a."</name></item>";
                }       
        /*      $responseString .= "</items></list></response></xml>";
                $responseDoc->loadXML($responseString);
                //$responseDoc->save('document.xml');
                return $responseDoc->saveXML();
                //mysql_close($con);*/

}
$server->AddFunction("fetchServiceList");
$server->handle();
?>
                 
