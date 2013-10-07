<?php
include_once('../includes/system/kickstart.php');

$name=$_POST['name'];
$description=$_POST['description'];
$status=$_POST['status'];

  

$allow = array("jpg", "jpeg", "gif", "png");

$todir = '../includes/images';

if ( !!$_FILES['image']['tmp_name'] ) 
// is the file uploaded yet?
{
   $ext = explode('.', strtolower( $_FILES['image']['name']) ); // whats the extension of the file
    if ( in_array( $ext[1], $allow) ) // is this file allowed
    {
        if ( move_uploaded_file( $_FILES['image']['tmp_name'], $todir . basename($_FILES['image']['name'] ) ) )
        {
            // the file has been moved correctly
		echo "successful";
        }
    }
    else
    {
        // error this file ext is not allowed
		echo "could nt upload";
    }
$arr=array($name,$description,$status);
$getResult=$QUERY->formStaticQuery('insertProducts',$arr);
$result=$DB->executeQuery($getResult);
if($result)
{
	header("Location:../admin/index.php");
}
else
{
	echo "failed";
}
}
?>
