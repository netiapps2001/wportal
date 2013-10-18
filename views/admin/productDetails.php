<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Wealth Junction</title>

<link type="text/css" rel="stylesheet" href="../css/style.css" />

<script type="text/javascript" src="../../includes/js/chromejs/chrome.js"></script>

<SCRIPT src="../../includes/js/jquery-1.4.2.min.js" type=text/javascript></SCRIPT>

<SCRIPT src="../../includes/js/jquery.jcarousel.min.js" type=text/javascript></SCRIPT>

<SCRIPT type=text/javascript>



function mycarousel_initCallback(carousel)

{

    // Disable autoscrolling if the user clicks the prev or next button.

    carousel.buttonNext.bind('click', function() {

        carousel.startAuto(0);

    });



    carousel.buttonPrev.bind('click', function() {

        carousel.startAuto(0);

    });



    // Pause autoscrolling if the user moves with the cursor over the clip.

    carousel.clip.hover(function() {

        carousel.stopAuto();

    }, function() {

        carousel.startAuto();

    });

};



jQuery(document).ready(function() {

    jQuery('#mycarousel').jcarousel({

        auto: 2,

        wrap: 'last',

        initCallback: mycarousel_initCallback

    });

});



</SCRIPT>



</head>

<body>

<div id="container">

	<div id="main_container">

    	<!--Header starts here -->

    	<div id="header_block">

    		<div id="header_top">Need Help? <span class="red">Call Us 1800-254- 606060</span></div>

    		<div id="header_middle"><div id="logo"><img src="../../includes/images/index_images/logo.png" /></div></div>

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

                     	<li><img src="../../includes/images/index_images/banner1.jpg"  id=wows0 ></li>

                        <li><img src="../../includes/images/index_images/banner2.png" id=wows1 ></li>

                        <li><img src="../../includes/images/index_images/banner3.jpg" id=wows2 ></li>

                        <li><img src="../../includes/images/index_images/banner1.jpg" id=wows3 ></li>

                        <li><img src="../../includes/images/index_images/banner2.png" id=wows4 ></li>

                     </ul>

                  </div> 

               </div>

               <script src="../../includes/js/slider.js" type="text/javascript"></script>

               <script src="../../includes/js/script.js" type="text/javascript"></script>

			</div>



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
		
	<div class="prod_details">

        	  <div id="prod_name">
			<?php echo $name?>
		  </div>

		 <div id="prod_image">
			<img src="../../includes/images/logo/product-logo/<?php echo $name?>.jpg">
		</div>

		<div id="prod_desc">
        		<?php echo $description ?>
		</div>

		<div id="prod_price">
                    Price: $ <?php echo $price ?>
		</div>

		<input type="button" value="Add to Cart" onclick="addtocart(<?php echo $id?>)" />
	</div>


<script type="text/javascript" src="../../includes/js/validateProducts.js">
</script>
</head>
<body>
<div class="enq_form">
	<form method="post" action="../../actions/enquiryUsers.php" onsubmit="return validateEnquiry()">
		<table border="1">
		<tr><td>Firstname<input type="text" name="fname" id="fname"/></td></tr>
		<tr><td><div id="firstname" style="color: #CC0000"></div></td></tr>
		<tr><td>Lastname<input type="text" name="lname" id="lname"/></td></tr>
		<tr><td><div id="lastname" style="color: #CC0000"></div></td></tr>
		<tr><td>Organisation<input type="text" name="org" id="org"/></td></tr>
		<tr><td><div id="organisation" style="color: #CC0000"></div></td></tr>
		<tr><td>Phone No<input type="text" name="mobile" id="mobile"/></td></tr>
		<tr><td><div id="num" style="color: #CC0000"></div></td></tr>

		<td>Email Id<input type="text" name="email" id="email"/></td></tr>
		<tr><td><div id="mail" style="color: #CC0000"></div></td></tr>
		<tr><td>Customer Type<select name="custtype">
			<option value="individual">Individual</option>
			<option value="corporate">Corporate</option>
		</select>
		</td></tr>
		<tr><td><input type="submit" value="Submit" name="submit"/>
		<input type="reset" value="Reset" name="reset"/></td>
		</tr>	
		</table>
	</form>
</div>
</body>

<?php
echo"<br/>";

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




					<script>

                    $(document).ready(function() {

                        $(".tab_contents").hide(); // Initially hide all content

                        $("#tabs li:first").attr("id","current"); // Activate first tab

                        $("#content div:first").fadeIn(); // Show first tab content

                        

                        $('#tabs a').click(function(e) {

                            e.preventDefault();        

                            $(".tab_contents").hide(); //Hide all content

                            $("#tabs li").attr("id",""); //Reset id's

                            $(this).parent().attr("id","current"); // Activate this

                            $('#' + $(this).attr('title')).fadeIn(); // Show content for current tab

                        });

                    })();

                    </script>

        	</div>

			<script>

          $(document).ready(function() {

        $("#basic").click(function() { $(this).animate({textShadow: "#f0f 10px 10px 10px;"}); });

    });

    

    $("#glow").hover(function() { 

        $(this).animate({textShadow: "#f00 0 0 15px"});

    }, function() { 

        $(this).animate({textShadow: "#f00 0 0 0"});

    });

    		</script>

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
