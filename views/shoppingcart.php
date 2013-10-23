<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
	include_once('../includes/system/kickstart.php');
	session_start();
        if(isset($_SESSION['id']))
        {
            $id=$_SESSION['id'];
            mysql_query("create table `$id`(id int(3)primary key auto_increment,pid varchar(5) not null,item varchar(20) not null,quantity varchar(3) not null,price float not null)");
        }
        else
        {
                $unique_key = substr(md5(rand(0, 1000000)), 0, 10);
                $sessionid=$unique_key;
                $_SESSION['id']=$sessionid;
		$id=$_SESSION['id'];
                mysql_query("create table `$id`(id int(3)primary key auto_increment,pid varchar(5) not null,item varchar(20) not null,quantity varchar(3) not null,price float not null)");
        }

	if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0)
	{
		$pid=$_REQUEST['pid'];
		$arr=array($id,$pid);
		$sql= $QUERY->formStaticQuery("removeproduct",$arr);
		$DB->executeQuery($sql);

	}
	else if($_REQUEST['command']=='clear')
	{
		unset($_SESSION['cart']);
		$clear=$QUERY->formStaticQuery("cleardata",$id);
		$DB->executeQuery($clear);
	}
	else if($_REQUEST['command']=='update')
	{

		for($i=0;$i<$max;$i++)
		{
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=intval($_REQUEST['product'.$pid]);
			if($q>0 && $q<=999)
			{
				$_SESSION['cart'][$i]['qty']=$q;
			}
			else
			{
				$msg='Some proudcts not updated!, quantity must be a number between 1 and 999';
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart</title>
<script language="javascript">
	function del(pid)
	{
		if(confirm('Do you really mean to delete this item'))
		{
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart()
	{
		if(confirm('This will empty your shopping cart, continue?'))
		{
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart()
	{
		document.form1.command.value='update';
		document.form1.submit();
	}
</script>
</head>
<body style="background-color: rgb(186, 207, 243);">
<form name="form1" method="post">
<input type="hidden" name="pid" />
<input type="hidden" name="command" />
	<div style="margin:0px auto; width:600px;" >
	  <div style="padding-bottom:10px">
	    	<h1 align="center">Your Shopping Cart</h1>
	    <input type="button" value="Continue Shopping" onclick="window.location='index.php'" />
	  </div>
    	<div style="color:#F00"><?php echo $msg?></div>
    	<table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1" width="100%">

    	<?php
			if(is_array($_SESSION['cart']))
			{
		            	echo '<tr bgcolor="#FFFFFF" style="font-weight:bold"><td>Serial</td><td>Name</td><td>Price</td><td>Qty</td><td>Amount</td><td>Options</td></tr>';
				$max=count($_SESSION['cart']);
				//for($i=0;$i<$max;$i++)
				//{
					$i=0;
					$pid=$_SESSION['cart'][$i]['productid'];
					$q=$_SESSION['cart'][$i]['qty'];
					$arr=array($id,$pid);
					$getname=$QUERY->formStaticQuery("productname",$arr);
					$pname=$DB->executeQuery($getname);
					$item=$pname;
					if($q==0) continue;
	$amt=0;
 	while($row=mysql_fetch_assoc($item))
	{
	?>
		<tr bgcolor="#FFFFFF">
			<td><?php echo ++$i;?></td>
			<td><?php echo $row['item'];?></td>
			<td>$ <?php echo $row['price'];?></td>
			<td><?php echo $q?></td> 
		        <td>$ <?php $pr=$row['price'];$cost=$pr*$q;echo $cost;?></td>
		        <td><a href="javascript:del(<?php echo $row['pid'];?>)">Remove</a></td></tr>
			
	<?php
	 $amt+=$cost;
	}		
	
	?>
	<tr><td><b>Order Total: $<?php echo $amt;?></b></td>
	<td colspan="5" align="right">
	<input type="button" value="Clear Cart" onclick="clear_cart()">
<!--	<input type="button" value="Update Cart" onclick="update_cart()">-->
	<input type="button" value="Place Order" onclick="window.location='billing.php'">
	</td></tr>
	<?php
		           }
	else
	{
		echo "<tr bgColor='#FFFFFF'><td>There are no items in your shopping cart!</td>";
	}
	?>
        </table>
    </div>
</form>
</body>
</html>


