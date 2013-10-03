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
			case "insertMenu":
				$sqlString = "insert into menu_table(id,menu_id,name,href,status) values('','$id','$name','$href','$status')";
				break;
			case "displayMenu":
				$sqlstring = "Select *from menu_table";
				break;	
			case "editMenu":
				$sqlString = "update menu_table set name='$name' and href='$href' and status='$status'";

	}
		return $sqlString;

	}

}

?>
