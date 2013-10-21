<?php

include_once('../includes/system/kickstart.php');
$name =$IO->fetchSystemVar('name','post');
$description =$IO->fetchSystemVar('des','post');
$status=1;
$arrParams  = array($name,$description,$status);

$allowedExts = array("gif", "jpeg", "jpg", "png");

$temp = explode(".", $_FILES["file"]["name"]);

$extension = end($temp);
$ext="jpg";
$filename= $name.".".$ext;


$max_upload_size = $IO->return_bytes(ini_get('upload_max_filesize'));

if(($_FILES["file"]["size"] < $max_upload_size) && in_array($extension, $allowedExts))
{     
        if($_FILES["file"]["error"] > 0)
        {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
//          $errorMsg = "Return Code: ".$_FILES["file"]["error"];
//          $IO->setErrorMessage($errorMsg);
        }
        else
        {       
		//echo $filename=$name;
                if (file_exists("../includes/images/logo/" . $filename))
                {
                        echo $filename."Already exists. ";
                        //$errorMsg =$_FILES["file"]["name"] . " already exists. ";
                        //$IO->setErrorMessage($errorMsg);

                }
                else
                {
                        move_uploaded_file($_FILES["file"]["tmp_name"],"../includes/images/logo/" . $filename);
                        $sql= $QUERY->formStaticQuery("upload",$arrParams);
													 $DB->executeQuery($sql);
                }
        }
}
else
{
        echo "Invalid file";
//      $errorMsg = "Invalid file ";
  //      $IO->setErrorMessage($errorMsg);

}



?>
          

