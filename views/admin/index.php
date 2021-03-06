<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php

include_once('../../includes/system/kickstart.php');
//Generate tables for users 
 
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

//call to soap API

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set("soap.wsdl_cache_enabled", "0");
$client = new soapClient("http://192.168.1.10/~anupssh/SOAP/requests/pullServiceList.wsdl");
$info = $client->__call('fetchServiceList', array('Individual','Product'));// Salesorder ID and Invoice No
$result= $QUERY->formStaticQuery("fetchCompanyDetail",1);
$company_detail =$DB->executeQuery($result);
$service_result= $QUERY->formStaticQuery("fetchServiceDetail",1);
$service_detail =$DB->executeQuery($service_result);
?>

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

           <!--Menu Ends here -->

           <div id="heading_content">

           Introducing Wealth Junction a professional <span class="red">INSURANCE & INVESTMENT</span> service providers for industries / business houses 

and individuals across the world. We deal with different Indian & Offshore Insurance and Investment companies to cater 

to the requirement of every need of our customer and provide them the best service at all times.

           </div>

            <!--Container starts here -->

 			<div id="tab_container">

           		<div id="list_container">

            		 <ul id="tabs">

                		<li><a href="#" title="tab1">Individual Plans</a></li>

                		<li><a href="#" title="tab2">Corporate Plans</a></li>              

            		</ul>

          			<div id="content"> 

   				 <div id="tab1" class="tab_contents">

				
                       		 <div id="product_disp">
				 <H1>PRODUCTS</H1>

		<?php

		    for($i =0 ; $i<$info['totalRecords'] ; $i++){

		//	print_r($info[$i]['pname']);

		?>
       			<div class="product_wrapper">
		    <div id="product_name">
				<?php print_r($info[$i]['pname']);?>
		    </div>

	            <div id="product_image">
             			<?php echo '<img src="../../includes/images/logo/product-logo/'.$info[$i]['pname'].'.jpg">'?> 
		   </div>

        	    <div id="product_des">
				<?php print_r (substr($info[$i]['desc'],0,50));?>
	           </div>

		    <div class="enq">
				<a href="productDetails.php?name=<?php echo ($info[$i]['pname']);?>&des=<?php echo ($info[$i]['desc']);?>&pid=<?php echo ($info[$i]['pid']);?>">Enquiry</a></span>
     	   </div></div>
                           
	  <?php } ?>
	                  
	</div>

	
	                <div id="service_disp">
                        <H1>SERVICES </H1>


		<?php
		
		$info = $client->__call('fetchServiceList', array('Individual','Service'));// Salesorder ID and Invoice No
		

		for($i=0 ; $i < $info['totalRecords']; $i++){

		
		?>

				<div class="service_wrapper">
				<div id="service_name">
				
				</div>
				
				<div id="service_image">
				</div>

				<div id="price">
					Price:<?php echo  $info[$i]['price'];?>
				</div>
                     
               			 <div id="service_des">
					<?php echo substr($info[$i]['desc'],0,50);?>
				</div>
		
				<span class="buy">
					<a href="serviceDetails.php?name=<?php echo $row['name'];?>&des=<?php echo $row['description'];?>&pid=<?php echo $row['serial'];?>&price=<?php echo $row['price']?>">Buy Now</a></span>
</div>	

<?php
	}?>
	
</div></div>


<div id="tab2" class="tab_contents">


		<div id="product_disp">
				 <H1>PRODUCTS</H1>

<?php
$info = $client->__call('fetchServiceList', array('Corporate','Product'));// Salesorder ID and Invoice No

		    for($i =0 ; $i<$info['totalRecords'] ; $i++){


		?>
		<div class="product_wrapper">
		    <div id="product_name">
				<?php print_r($info[$i]['pname']);?>
		    </div>

	            <div id="product_image">
             			<?php echo '<img src="../../includes/images/logo/product-logo/'.$info[$i]['pname'].'.jpg">'?> 
		   </div>

        	    <div id="product_des">
				<?php print_r (substr($info[$i]['desc'],0,50));?>
	           </div>

		    <div class="enq">
				<a href="productDetails.php?name=<?php echo ($info[$i]['pname']);?>&des=<?php echo ($info[$i]['desc']);?>&pid=<?php echo ($info[$i]['pid']);?>">Enquiry</a></span>
     	   </div></div>
                           
	  <?php } ?>
	                  
	</div>

		<div id="service_disp">
                        <H1>SERVICES </H1>


		<?php
		
		$info = $client->__call('fetchServiceList', array('Corporate','Service'));// Salesorder ID and Invoice No
		

		for($i=0 ; $i < $info['totalRecords']; $i++){

		
		?>

				<div class="service_wrapper">
				<div id="service_name">
				
				</div>
				
				<div id="service_image">
				</div>

				<div id="price">
					Price:<?php echo  $info[$i]['price'];?>
				</div>
                     
               			 <div id="service_des">
					<?php echo substr($info[$i]['desc'],0,50);?>
				</div>
		
				<span class="buy">
					<a href="serviceDetails.php?name=<?php echo $row['name'];?>&des=<?php echo $row['description'];?>&pid=<?php echo $row['serial'];?>&price=<?php echo $row['price']?>">Buy Now</a></span>
</div>	

<?php
	}?>
	
</div></div>



</div>
</div>
</div>
		

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

