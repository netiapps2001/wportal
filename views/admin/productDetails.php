<?php
include("includes/db.php");
	include("functions.php");
	

	if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){

		$pid=$_REQUEST['productid'];

		addtocart($pid,1);

		header("location:shoppingcart.php");

		exit();

	}

	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Products</title>

<script language="javascript">

	function addtocart(pid){

		document.form1.productid.value=pid;

		document.form1.command.value='add';

		document.form1.submit();

	}

</script>

</head>


<body>

<form name="form1">

	<input type="hidden" name="productid" />

    <input type="hidden" name="command" />

</form>

	<?php
	
 $name=$_GET['name'];
 $description=$_GET['des'];
 $id = $_GET['pid'];
 $price= $_GET['price'];
	?>


        	  <b><?php echo $name?></b>
		<img src="../../includes/images/logo/product-logo/<?php echo $name?>.jpg">
        		<?php echo $description ?>

                    Price:<big style="color:green">

                    	$<?php echo $price ?></big>

			<input type="button" value="Add to Cart" onclick="addtocart(<?php echo $id?>)" />
</html>

<?php
$dir ='../../includes/images/logo/product-logo/';
$file_display = array('gif','jpg');

if(file_exists($dir)==false){
	
	echo "not found";
	}
else{
	$dir_contents = scandir($dir);
		
	foreach($dir_contents as $file){
		$file_type = end(explode('.',$file));
		
		
		if(in_array($file_type , $file_display)==true){
			
			echo '<img src ="'.$dir.''/''.$file.'"/>';
			}
			}
			}
			
?>

