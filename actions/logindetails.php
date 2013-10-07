<?php
include_once('../includes/system/kickstart.php');

$username=$_POST['uname'];
$password=$_POST['password'];
$arr=array($username,$password);
$getResult = $QUERY->formStaticQuery("login",$arr);
$result=$DB->executeQuery($getResult);
if($result)
{

	header("Location:../admin/index.php");
}
else
{
	echo "Invalid Username or Password";
}

?>

