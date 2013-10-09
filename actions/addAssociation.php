<?php
include_once('../includes/system/kickstart.php');
$name = fetchSystemVar('name','post');
$description = fetchSystemVar('description','post');

$arrParams  = array($name,$description,1);
$allowedExts = array("gif", "jpeg", "jpg", "png");

$temp = explode(".", $_FILES["file"]["name"]);

$extension = end($temp);
$max_upload_size = return_bytes(ini_get('upload_max_filesize'));

if(($_FILES["file"]["size"] < $max_upload_size) && in_array($extension, $allowedExts))
{
	if($_FILES["file"]["error"] > 0)
	{
	    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
	    $errorMsg = "Return Code: ".$_FILES["file"]["error"];
	    $IO->setErrorMessage($errorMsg);
	}
	else
	{
		echo $filename= $name.$extension;
    		if (file_exists("../includes/images/" . $_FILES["file"]["name"]))
		{
			echo $_FILES["file"]["name"] . " already exists. ";
			$errorMsg =$_FILES["file"]["name"] . " already exists. ";
		        $IO->setErrorMessage($errorMsg);

      		}		
		else
		{
      			move_uploaded_file($_FILES["file"]["tmp_name"],"../includes/images/" . $_FILES["file"]["name"]);
			echo $sql= $QUERY->formStaticQuery("upload",$arr);
			$DB->executeQuery($sql);
      		}	
	}
}
else
{
	echo "Invalid file";
	$errorMsg = "Invalid file ";
        $IO->setErrorMessage($errorMsg);

}



?>
