<?php

include_once("../includes/system/globals.php");
//DBHelper class contains all the function to help with database connectivity and data manipulation
class DBHelper{

	//Function to enable database for WSDL usage
	public function enableWSDL(){
		$this->disableDB();
		$this->connectWSDL();
	}
	
	//Function to disconnect from already connected database
	public function disableDB(){
		mysql_close();
	}

	//Function to connect to WSDL Database
	public function connectWSDL(){
		GLOBAL $WSDLHOST;
		GLOBAL $WSDLUSER;
		GLOBAL $WSDLPASS;
		GLOBAL $WSDLDB;
		mysql_connect($WSDLHOST,$WSDLUSER,$WSDLPASS);
		mysql_select_db($WSDLDB);
	}

	//Function to execute a parameterised query
	public function executeQuery($query){
		$this->connectPortal();
		$queryResponse = mysql_query($query);
		if($this->fetchNumRecords($queryResponse)==0){
			return 0;
		}
		else
			return $queryResponse;
	}

	//Function to fetch number of rows returned by parameterised query 
	public function fetchNumRecords($queryResponse){
		return mysql_num_rows($queryResponse);
	}

	//Function to disconnect WSDL db connection
	public function disableWSDL(){
		$this->disableDB();
		$this->connectPortal();
	}

	//Function to enable Portal Database Connection
	public function connectPortal(){
		GLOBAL $PORTALHOST;
		GLOBAL $PORTALUSER;
		GLOBAL $PORTALPASS;
		GLOBAL $PORTALDB;
		
		mysql_connect($PORTALHOST,$PORTALUSER,$PORTALPASS);
		mysql_select_db($PORTALDB);
	}
	
}

?>
