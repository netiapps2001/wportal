<?php
include_once('../includes/system/kickstart.php');
$name=$_POST['name'];
$description=$_POST['des'];
$status=$_POST['status'];
$arr=array($name,$description,$status);
$allowedExts = array("gif", "jpeg", "jpg", "png");
//echo $sql=$QUERY->formStaticQuery('uploadproduct',$arr);

$temp = explode(".", $_FILES["file"]["name"]);

$extension = end($temp);

if (($_FILES["file"]["size"] < 20000) && in_array($extension, $allowedExts))

  {

  if ($_FILES["file"]["error"] > 0)

    {

    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";

    }

  else

    {

  //  echo "Upload: " . $_FILES["file"]["name"] . "<br>";

    //echo "Type: " . $_FILES["file"]["type"] . "<br>";

   // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";

    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";



    if (file_exists("../includes/images/" . $_FILES["file"]["name"]))

      {

      echo $_FILES["file"]["name"] . " already exists. ";

      }

    else

      {
      move_uploaded_file($_FILES["file"]["tmp_name"],"../includes/images/" . $_FILES["file"]["name"]);

$con = mysql_connect("localhost","root","root");

if(!$con)
{
	echo "could not connect";
	exit;
}
/*mysql_select_db("wealthportal");
$query = "insert into upload values('','$name','$description','$status')";
mysql_query($query);
mysql_close($con);*/
echo $sql= $QUERY->formStaticQuery("upload",$arr);
$DB->executeQuery($sql);

//      echo "Stored in: " . "../includes/images/" . $_FILES["file"]["name"];
      }

    }
  }

else

  {

  echo "Invalid file";

  }



?>
