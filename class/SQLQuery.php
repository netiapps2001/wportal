<?php
include_once($ROOTDIR.$VERSIONDIR."includes/system/globals.php");
//include_once($ROOTDIR.$VERSIONDIR.'includes/system/kickstart.php');
//SQLQuery class to help as a query gienerator
class SQLQuery{
	//Function to  generate appropriate SQL query	
	public function formStaticQuery($varient,$where){
		
		$sqlString = "";
		switch($varient){
			case "pullService" : 
				$sqlString = "SELECT * FROM vtiger_service,vtiger_crmentity,vtiger_servicecf JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_service.serviceid ON vtiger_service.serviceid=vtiger_servicecf.serviceid WHERE vtiger_service.servicecategory LIKE '".$where." OR vtiger_service.servicecategory LIKE 'Both'";
				break;
			case "insertMenu":
		
				echo $name=$where[0];
				echo $href=$where[1];
				echo $status=$where[2];
				
			echo $sqlString = "insert into menu(name,href,status) values('$name','$href','$status')";
				break;
			case "displayMenu":
				echo "hello";
				$sqlstring = "Select *from menu where status='1'";
				break;	
			case "editMenu":
				$sqlString = "update menu_table set name='$name' and href='$href' and status='$status'";

	}
		return $sqlString;

	}

}

?>
