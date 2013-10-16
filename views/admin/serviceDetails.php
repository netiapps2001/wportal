<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include_once("../../actions/functions.php");
//include_once('../../includes/system/kickstart.php');
$service_result= $QUERY->formStaticQuery("fetchServiceDetail",1);
      $service_detail =$DB->executeQuery($service_result);

include_once("../../actions/functions.php");

	if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){

	   	$pid=$_REQUEST['productid'];

		addtocart($pid,1);

		header("location:shoppingcart.php");

		exit();

	}

?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wealth Junction</title>
<link type="text/css" rel="stylesheet" href="style.css" />
<script type="text/javascript" src="chromejs/chrome.js"></script>
<SCRIPT src="jquery-1.4.2.min.js" type=text/javascript></SCRIPT>
<SCRIPT src="jquery.jcarousel.min.js" type=text/javascript></SCRIPT>
<SCRIPT type=text/javascript>

function addtocart(pid){
		document.form1.productid.value=pid;

		document.form1.command.value='add';

		document.form1.submit();

	}

</SCRIPT>

</head>
<body>

<form name="form1">

     <input type="hidden" name="productid" />

    <input type="hidden" name="command" />

</form>


<?php

echo $name=$_GET['name'];
echo $description=$_GET['des'];
echo $pid = $_GET['id'];
echo $price = $_GET['price'];
?>

<html>
<head>
<script type="text/javascript" src="../../includes/js/validateProducts.js">
</script>
</head>
<body>

	<input type="hidden" id="userid" name="id" value="<?php echo $id;?>">
        <label><?php echo $name;?></label><br>
        <img src="../../includes/images/logo/service-logo/<?php echo $name?>.jpg"></label><br>
	<span class="price">PRICE:</span><?php echo $price;?>
        <label><?php echo $description;?></label>
	<input type="button" value="Buy Now" onclick="addtocart(<?php echo $pid?>)" />	
       
	<div class="download_form">
	 <form method="post" action="../../actions/enquiryUsers.php" onsubmit="return validateEnquiry()">
	<table>
<tr>
<td>First Name</td>
<td><input id="fname" type="text" name="fname" /></td>
<td><div id="firstname" style="color: #CC0000"></div></td>
</tr>

<tr>
<td>Last Name</td>
<td><input type="text" name="lname" id="lname" /></td>
<td><div id="lastname" style="color: #CC0000"></div></td>
</tr>

<tr>
<td>Mobile No.</td>
<td><input id="mobile" type="text" name="mobile" /></td>
<td><div id="num" style="color: #CC0000"></div></td>
</tr>

<tr>
<td>Email</td>
<td><input type="text" name="email" id="email" /></td>
<td><div id="mail" style="color: #CC0000"></div></td>
</tr>

<td><input id="send" type="submit" name="send" value="Submit" class="submit_button"/> 
<input type="reset" class="reset_button" id="reset" name="reset" value="Reset"></td>
</tr>
</tbody>
</table>
	</form>
</div>
</body>

</html>
<?php
while($row=mysql_fetch_assoc($service_detail))
{
?>


<table id="service_disp">

                            <tr>
                            <td id="service" colspan="2"><h1><?php echo $row['name'];?></h1></td>
                           
                        <td id="service"><?php echo '<img src="../../includes/images/logo/service-logo/'.$row['name'].'.jpg">'?><span class="price">PRICE:</span><?php echo $row['price'];?></td>
                      <td></p><span class="buy"><a href="serviceDetails.php?name=<?php echo $row['name'];?>&des=<?php echo $row['description'];?>&id=<?php echo $row['serial'];?>&price="<?php echo $row['price']; ?>>Buy Now</a></span></td>
<?php
}?>

            </table>                  

