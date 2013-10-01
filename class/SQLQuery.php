<?php

include_once("../includes/system/globals.php");
//SQLQuery class to help as a query generator
public class SQLQuery(){

	//Function to  generate appropriate SQL query	
	public function formStaticQuery($varient,$where){
		$sqlString = "";
		switch($varient){
			case "pullService" : 
				$sqlString = "SELECT * FROM vtiger_service,vtiger_crmentity,vtiger_servicecf JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_service.serviceid ON vtiger_service.serviceid=vtiger_servicecf.serviceid WHERE vtiger_service.servicecategory LIKE '".$where." OR vtiger_service.servicecategory LIKE 'Both'";
				break;
		}
	}

}

?>
