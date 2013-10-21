<?php
include_once('../../includes/system/kickstart.php');

$name = $_POST['name'];
$des = $_POST['description'];
$id = $_POST['id'];
$arr=array($name,$des,$id);
$getResult = $QUERY->formStaticQuery("editProduct",$arr);
$result=$DB->executeQuery($getResult);

$target = "../../includes/images/logo/a.jpg"; 
$newName = "../../includes/images/logo/b.jpg";
$renameResult= rename($target,$newName);



$allowedExts = array("gif", "jpeg", "jpg", "png");

$temp = explode(".", $_FILES["file"]["name"]);

$extension = end($temp);
$ext="jpg";
echo $filename= $name.".".$ext;


//echo $max_upload_size = $IO->return_bytes(ini_get('upload_max_filesize'));

if(($_FILES["file"]["size"] < 200000))
{
 
       
if($_FILES["file"]["error"] > 0)
        {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
        }
        else
        {
               
                if (file_exists("../includes/images/logo/" . $filename))
                {
                        echo $filename."Already exists. ";
                        
                }
                else
                {
		echo 'me here';
move_uploaded_file($_FILES["file"]["tmp_name"],"../../includes/images/logo/" . $filename);


       echo 'me not here';
               
                }
        }
}
else
{
        echo "Invalid file";

}

//header("Location:http://localhost/wealthportal/wealth10101255/views/admin/index.php");
?>
