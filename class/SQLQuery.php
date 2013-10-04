<?php
include_once($ROOTDIR.$VERSIONDIR."includes/system/globals.php");
//include_once($ROOTDIR.$VERSIONDIR.'includes/system/kickstart.php');
//SQLQuery class to help as a query gienerator
class SQLQuery{
	//Function to  generate appropriate SQL query	
	public function formStaticQuery($varient,$where){
		echo 'gbvrfhmn';
		
		$sqlString = "";
		switch($varient){
			case "pullService" : 
				$sqlString = "SELECT * FROM vtiger_service,vtiger_crmentity,vtiger_servicecf JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_service.serviceid ON vtiger_service.serviceid=vtiger_servicecf.serviceid WHERE vtiger_service.servicecategory LIKE '".$where." OR vtiger_service.servicecategory LIKE 'Both'";
				break;
			case "insertMenu":
				echo "hello";
				echo $name=$where[0];
				echo $href=$where[1];
				echo $status=$where[2];
				
				$sqlString = "insert into menu_table(id,name,href,status) values('','$name','$href','$status')";
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
