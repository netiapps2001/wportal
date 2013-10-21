<?php
include_once('../../includes/system/kickstart.php');

$name=$_GET['name'];
$description=$_GET['des'];
$id = $_GET['id'];
?>
<html>
<head>


        <title>
                Wealthportal
        </title>
</head>
<body>

<form method="post" action="fetchProduct.php">

	<input type="hidden" id="oldname" name="oldname" value="<?php echo $name;?>">
	<input type="hidden" id="userid" name="id" value="<?php echo $id;?>">
        <label>Name <input type="text" id="name" name="name"value="<?php echo $name;?>"/></label><br>
        <label>Logo <input type="file" id="file" name="file" />
        <img src="../../includes/images/logo/<?php echo $name?>.jpg"></label><br>
        <label>Description<input type="longtext" id="description" name="description" value="<?php echo $description;?>" />
        </label><br>
        <input type="submit" value="Submit" name="submit"/>
	
</form>
</body>
</html>

