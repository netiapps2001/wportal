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
				echo $name=$where[0];
				echo $href=$where[1];
				echo $status=$where[2];
				$sqlString = "update menu set name='$name' and href='$href' and status='$status'";
				break;
			case "deleteMenu":
				$sqlString ="update upload set status=0 where uid='$where'";
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
			
			case "fetchCompanyDetail":
				$sqlString = "select *from products where status='$where'";
				break;
			
			case "fetchServiceDetail":
                                $sqlString = "select * from services where status='$where'";
                                break;
				

  			case "editProduct":
                                 $name=$where[0];
                                 $des=$where[1];
                                 $id = $where[2];
                                 $sqlString = "UPDATE upload SET name = '$name' , description = '$des' where uid= '$id'";
                                break;

			case "getcompany":
				$sqlString="select name from upload where status='1'";
				break;
			
			case "addcart":
				$pid=$where[0];
				$item=$where[1];
				$qty=$where[2];
				$price=$where[3];
				$uid=$where[4];
				$sqlString="insert into `$uid`(id,pid,item,quantity,price) select *from(select '','$pid','$item','$qty','$price') as tmp where not exists(select pid from `$uid` where pid='$pid')limit 1";
				break;
				
			case "removeproduct":
					$uid=$where[0];
					$pid=$where[1];
			echo $sqlString="delete from `$uid` where pid='$pid'";
				break;

			case "productname":
					$id=$where[0];
					$pid=$where[1];
					$sqlString="select * from `$id` ";
					break;

			case "getamount":
				$sqlString="select quantity,price from `$where`";
				break;

			case "pidExist":
				$uid=$where[0];
				$pid=$where[1];
				$sqlString="select *from `$uid` where pid='$pid'";
				break;

			case "cleardata":
				$sqlString="TRUNCATE TABLE `$where`";
				break;

			case "updateQty";
				$uid=$where[0];
				$pid=$where[1];
				$qty=$where[2];
				$sqlString="update `$uid` set quantity='$qty' where pid='$pid'";
				break; 
	}
		return $sqlString;

	}

}

?>
