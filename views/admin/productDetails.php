<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Wealth Junction</title>
<link type="text/css" rel="stylesheet" href="style.css" />
<script type="text/javascript" src="chromejs/chrome.js"></script>
<SCRIPT src="jquery-1.4.2.min.js" type=text/javascript></SCRIPT>
<SCRIPT src="jquery.jcarousel.min.js" type=text/javascript></SCRIPT>
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
    		<div id="header_middle"><div id="logo"><img src="images/logo.png" /></div></div>
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
                     	<li><img src="images/banner1.jpg"  id=wows0 ></li>
                        <li><img src="images/banner2.png" id=wows1 ></li>
                        <li><img src="images/banner3.jpg" id=wows2 ></li>
                        <li><img src="images/banner1.jpg" id=wows3 ></li>
                        <li><img src="images/banner2.png" id=wows4 ></li>
                     </ul>
                  </div> 
               </div>
               <script src="slider.js" type="text/javascript"></script>
               <script src="script.js" type="text/javascript"></script>
			</div>
           <!--Menu Ends here -->
           <div id="heading_content">
           Introducing Wealth Junction a professional <span class="red">INSURANCE & INVESTMENT</span> service providers for industries / business houses 
and individuals across the world. We deal with different Indian & Offshore Insurance and Investment companies to cater 
to the requirement of every need of our customer and provide them the best service at all times.
           </div>


<?php
include_once('../../includes/system/kickstart.php');
include("functions.php");
$result= $QUERY->formStaticQuery("fetchCompanyDetail",1);
      $company_detail =$DB->executeQuery($result);

if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){

		$pid=$_REQUEST['productid'];

		addtocart($pid,1);

		header("location:shoppingcart.php");

		exit();

	}




$name=$_GET['name'];
$description=$_GET['des'];
$id = $_GET['id'];

?>

<html>
<head>
<script type="text/javascript" src="../../includes/js/validateProducts.js">
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


       <label><?php echo $name;?></label><br>
        <img src="../../includes/images/logo/product-logo/<?php echo $name?>.jpg"></label><br>
        <label><?php echo $description;?></label>
	<?php echo $row['serial']?>
	<input type="button" value="Add to Cart" onclick="addtocart(<?php echo $row['serial']?>)" />

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
                        $("#content div").hide(); // Initially hide all content
                        $("#tabs li:first").attr("id","current"); // Activate first tab
                        $("#content div:first").fadeIn(); // Show first tab content
                        
                        $('#tabs a').click(function(e) {
                            e.preventDefault();        
                            $("#content div").hide(); //Hide all content
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



