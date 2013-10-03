<?php
public class Connection
{
	$hostname="localhost";
	$username="root";
	$password="root";
	$database="wealthportal";
	public function connect()
	{
		mysql_connect('$hostname','$username','$password');
		mysql_select_db('$database') or die("connection error");		
	}
}
?>
