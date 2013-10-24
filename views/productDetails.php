<?php
session_start();
        if(isset($_SESSION['id']))
        {
            $id=$_SESSION['id'];
            mysql_query("create table `$id`(id int(3)primary key auto_increment,pid varchar(5) not null,item varchar(20) not null,quantity varchar(3) not null,price float not null)");
        }
        else
        {
                $id=$_SESSION['id'];
                $unique_key = substr(md5(rand(0, 1000000)), 0, 10);
                $sessionid=$unique_key;
                $_SESSION['id']=$sessionid;
                mysql_query("create table `$id`(id int(3)primary key auto_increment,pid varchar(5) not null,item varchar(20) not null,quantity varchar(3) not null,price float not null)");
        }

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set("soap.wsdl_cache_enabled", "0");
$client = new soapClient("http://192.168.1.10/~anupssh/SOAP/requests/fetchDetails.wsdl");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

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

		<?php
		
			$id = $_GET['pid'];
			 
		
		$info = $client->__call('fetchServiceList', array($id,'Product'));// Salesorder ID and Invoice No
					
		?>
		
		<div class="prod_det_wrapper">
		<div class="prod_details">


			<div id="prod_image">
                      <?php echo '<img src="../includes/images/logo/product-logo/Term Insurance.jpg">'?>
            </div>
        	
        	<div id="prod_name">
				<?php echo $info['pname'];?>
		    </div>

			<div id="prod_desc">
					<?php echo "At Wealth Junction we have dedicated well-trained team to give you the most personal attention at every level. We understand your requirements and goals better than anyone else." ?>
			</div>

			<div id="prod_price">
					 
			</div>

		</div>


	<script type="text/javascript" src="../includes/js/validateProducts.js">
	</script>
</head>


	<body>
	 <div class="download_form">
		<form id="form" method="post" action="../actions/enquiryUsers.php" onsubmit="return validateEnquiry()">
			<table>
			<tr>
			<td>First Name</td>
			<td><input id="fname" type="text" name="fname" />
			<div id="firstname" style="color: #CC0000"></div>
			</td>
			</tr>

			<tr>
			<td>Last Name</td>
			<td><input type="text" name="lname" id="lname" />
			<div id="lastname" style="color: #CC0000"></div>
			</td>
			</tr>

			<tr>
			<td>Organization</td>
			<td><input type="text" name="org" id="org" />
			<div id="organisation" style="color: #CC0000"></div>
			</td>
			</tr>

			<tr>
			<td>Phone No.</td>
			<td><input id="mobile" type="text" name="mobile" />
			<div id="num" style="color: #CC0000"></div>
			</td>
			</tr>

			<tr>
			<td>Email Id.</td>
			<td><input type="text" name="email" id="email" />
			<div id="mail" style="color: #CC0000"></div>
			</td>
			</tr>

			<tr>
				<td>Customer Type<select name="custtype">
				<option value="individual">Individual</option>
				<option value="corporate">Corporate</option>
				</select>
				</td>
			</tr>

			<tr>
			<td>
				<input id="send" type="submit" name="send" value="Submit" class="submit_button"/> 
				<input type="reset" class="reset_button" id="reset" name="reset" value="Reset">
			</td>
			</tr>
		</tbody>
	</table>
	</form>
</body>
</div>


		<SCRIPT src="../includes/js/tab.js" type=text/javascript></SCRIPT>

			</div>

        <!-- container Ends here -->

		</div>

		<div id="footer">

    	<div id="footer_block">

        	<div id="footer_left">Copyright (C) 2010. Wealth Junction Consultants Pvt. Ltd. All rights reserved </div>

            <div id="footer_right">Powered by Netiapps</div>

        

        </div>

    

    </div>

</div>

</body>

</html>
