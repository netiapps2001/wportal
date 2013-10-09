<?php
include_once($ROOTDIR.$VERSIONDIR."includes/system/globals.php");

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
		
				 $name=$where[0];
				 $href=$where[1];
				 $status=$where[2];
				
				 $sqlString = "insert into menu(name,href,status) values('$name','$href','$status')";
				break;
			case "displayMenu":
				$sqlString="select *from menu where status='$where'";
				break;	
			case "editMenu":
				$name=$where[0];
				$href=$where[1];
				$status=$where[2];
				$sqlString = "update menu set name='$name' and href='$href' and status='$status'";
				break;
			case "deleteMenu":
				$sqlString ="update menu set status='0' where status='$where'";
				break;
			case "login":
				$username=$where[0];
				$password=$where[1];
				$sqlString="select *from login where username='$username' and password='$password'";
				break;
			case "upload":
				$name=$where[0];
				$des=$where[1];
				$status=$where[2];
				$sqlString="insert into upload values('','$name','$des','$status')";
		
			break;

	}
		return $sqlString;

	}

}

?>
