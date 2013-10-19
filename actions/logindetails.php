<?php
include_once('../includes/system/kickstart.php');
//login details for admin 
$username=$_POST['uname'];
$password=$_POST['password'];
$error=array();
$errflag=0;
if($errflag)
{

    $_SESSION['ERROR']=$error;

    session_write_close();

    header("location:../views/admin/login.php");

    exit();
}
$arr=array($username,$password);
$getResult = $QUERY->formStaticQuery("login",$arr);
$result=$DB->executeQuery($getResult);
$num=mysql_num_rows($result);
  if($num!="")

  {
    $_SEESION['timeout']=time();
    header("location:../admin/index.php");

    exit();

  }

  else

  {
       $_SESSION['ERROR']=$error;
	?>
	<script>alert("Invalid username or password");
	window.location="../views/admin/login.php";
	</script>
	<?

         session_write_close();
  }

?>

