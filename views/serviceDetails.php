<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd>
<html xmlns="http://www.w3.org/1999/xhtml">


<?php
session_start();
include_once("../includes/system/kickstart.php");
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
	
		include_once('../includes/system/kickstart.php');
		error_reporting(E_ALL);
		ini_set('display_errors', '1');
		ini_set("soap.wsdl_cache_enabled", "0");
		$client = new soapClient("http://192.168.1.10/~anupssh/SOAP/requests/fetchDetails.wsdl");

		
?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Wealth Junction</title>
		<link type="text/css" rel="stylesheet" href="css/style.css" />
		<script type="text/javascript" src="../includes/js/chromejs/chrome.js"></script>
		<SCRIPT src="../includes/js/jquery-1.4.2.min.js" type=text/javascript></SCRIPT>
		<SCRIPT src="../includes/js/jquery.jcarousel.min.js" type=text/javascript></SCRIPT>
		<SCRIPT src="../includes/js/banner.js" type=text/javascript></SCRIPT>
	</head>
	<body>
		<div id="container">
			<div id="main_container">
				<!--Header starts here -->
			<div id="header_block">
    		<div id="header_top">Need Help? <span class="red">Call Us 1800-254- 606060</span></div>
    		<div id="header_middle"><div id="logo"><img src="../includes/images/index_images/logo.png" /></div></div>
       		<div id="header_right">
            	<div id="login_block">
                	<ul>
                    	<li>LOGIN</li>
                        <li>REGISTER</li>
                        <li>FORGOT USER ID</li>
                    </ul>
                </div>
                <div id="crm_login"><a href="#">LOGIN TO CRM</a></div>
	        </div>
	        </div>

        <!--Header Ends here -->
        <!--Menu Starts here -->
        <div id="menu_block">
            <ul>
            	<li><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Associations</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>

        <!--Menu Ends here -->
         <!--banner Starts here -->
        <div id="banner_block">
		<div id=wowslider-container1>
            	<div class=ws_images>
                    <ul>
                     	<li><img src="../includes/images/index_images/banner1.jpg"  id=wows0 ></li>
                        <li><img src="../includes/images/index_images/banner2.png" id=wows1 ></li>
                        <li><img src="../includes/images/index_images/banner3.jpg" id=wows2 ></li>
                        <li><img src="../includes/images/index_images/banner1.jpg" id=wows3 ></li>
                        <li><img src="../includes/images/index_images/banner2.png" id=wows4 ></li>
                     </ul>
                 </div> 
               </div>
               <script src="../includes/js/slider.js" type="text/javascript"></script>
               <script src="../includes/js/script.js" type="text/javascript"></script>
	</div>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php     

if($_REQUEST['command']=='add' && $_REQUEST['productid']>0)
{
   	$pid=$_REQUEST['productid'];
	$item=$_REQUEST['item'];
	$price1=$_REQUEST['price'];
	$IO->addtocart($pid,1);
	$val=array($id,$pid);
	$arr=array($pid,$item,1,$price1,$id);
	$sql=$QUERY->formStaticQuery("addcart",$arr);
	$DB->executeQuery($sql);
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

function addtocart(pid,item,price)
{
	document.form1.productid.value=pid;
	document.form1.item.value=item;
	document.form1.price.value=price;
	document.form1.command.value='add';
	document.form1.submit();
}

</SCRIPT>

</head>
<body>

<form name="form1">
        <input type="hidden" name="productid" />
	<input type="hidden" name="item"/>
	<input type="hidden" name="price"/>
        <input type="hidden" name="command" />
</form>
<?php
 $value = $_GET['value'];
 $description=$_GET['des'];
 $sid = $_GET['sid'];

	$info = $client->__call('fetchServiceList', array($sid,'Service'));// Salesorder ID and Invoice No
?>
	<div class="serv_det_wrapper">
	<div class="serv_details">			
	<input type="hidden" id="userid" name="id" value="<?php echo $sid;?>">
	<div id="serv_image">
		<?php echo '<img src="../includes/images/logo/product-logo/Term Insurance.jpg">'?>
	</div>
        <div id="serv_name">
		<?php echo $name=$info['sname'];?>
	</div>        
        <div id="serv_desc">
		<?php echo" At Wealth Junction we have dedicated well-trained team";?>
        </div>
        <span class="price">PRICE:</span><?php echo $price=$info['price'];?>
		<div id="buy">
		<input type="button" value="Buy Now" onclick="addtocart('<?php echo $sid?>','<?php echo $name?>','<?php echo $price?>')" />	
	</div>
	</div>
	</div>
<?php

	$client = new soapClient("http://192.168.1.10/~anupssh/SOAP/requests/pullServiceList.wsdl");
        $info = $client->__call('fetchServiceList', array($value,'Service'));// Salesorder ID and Invoice No   
        for($i=0 ; $i < $info['totalRecords']; $i++)
	{   
            ?>

                <div class="service_details">
                <div id="service_name">
                    <?php echo $info[$i]['sname'];?>   
                </div>
               
                <div id="service_image">
                    <?php echo '<img src="../includes/images/logo/product-logo/Term Insurance.jpg">'?>
                </div>
               
                <div id="price">Price:
                     <?php echo  $info[$i]['price'];?>
                </div>
       
                <span class="buy">
                    <a href="serviceDetails.php?type=<?php echo "Individual";?>&sid=<?php echo $info[$i]['sid'];?>&price=<?php echo $info[$i]['price'];?>&value=<?php echo "$value";?>&des=<?php echo $info[$i]['desc'];?>">Buy Now</a></span>
                </div>   

        <?php
            }
        ?>

       <SCRIPT src="../includes/js/tab.js" type=text/javascript></SCRIPT>
        <!-- container Ends here -->
	<div id="footer">
	    	<div id="footer_block">
       			<div id="footer_left">Copyright (C) 2010. Wealth Junction Consultants Pvt. Ltd. All rights reserved </div>
	        	<div id="footer_right">Powered by Netiapps</div>
	        </div>
        </div>
</div>

</body>

</html>
