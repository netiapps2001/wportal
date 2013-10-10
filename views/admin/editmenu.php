<?php
include_once('../../includes/system/kickstart.php');

$name=$_GET['name'];
$href=$_GET['href'];
$status=$_GET['status'];
$arr=array($name,$href,$status);
?>
<html>
<head>
        <title>
                Wealthportal
        </title>
</head>
<body>

<form method="post" action="">
        <label>Name <input type="text" id="menuname" name="menuname"value="<?php echo $name;?>"/></label><br>
        <label>Logo <input type="file" id="file" name="file" />
	<img src="../../includes/images/logo/<?php echo $name?>.jpg"></label><br>
        <label><input type="text" id="status" name="status" value="<?php echo $status; ?>" />
        </label><br>
        <input type="submit" value="Submit" name="submit" onclick="return formStaticQuery('editMenu',$arr);"/>

</form>
</body>
</html>

