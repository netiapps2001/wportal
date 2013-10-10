
<?php
include_once('../../includes/system/kickstart.php');


      $result= $QUERY->formStaticQuery("fetchCompanyDetail",1);
      $company_detail =$DB->executeQuery($result);

?>
<html>
<head>
<script>
	function updateStatus(str,id)
		{	
			if (window.XMLHttpRequest)
 		       	 {// code for IE7+, Firefox, Chrome, Opera, Safari
 				 xmlhttp=new XMLHttpRequest();
  	          	}
		
			else
 			 {// code for IE6, IE5
 				 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 			 }
	
		xmlhttp.onreadystatechange=function()
 		 {
 			 if (xmlhttp.readyState==4 && xmlhttp.status==200)
   			 {
   				 alert(xmlhttp.responseText);
   			 }
 		 }
		xmlhttp.open("GET","http://localhost/wealthportal/wealth10101255/views/admin/test.php?q="+str+"&p="+id,true);
		xmlhttp.send();
		}	

</script>

</head>
<body>
<table border="1">
<tr><th>id</th><th>logo</th><th>Name</th><th>Description</th></tr>

<?php
while($row=mysql_fetch_assoc($company_detail))
{
?>


        <tr><td><?php echo $row['uid'];?></td>
            <td><?php echo '<img src="../../includes/images/logo/'.$row['name'].'.jpg">'?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['description'];?></td>
            <td><a href="editAssociations.php?name=<?php echo $row['name'];?>&des=<?php echo $row['description'];?>&id=<?php echo $row['uid'];?>">Edit</a></td> 
        <td><button href="#" onClick="updateStatus('deleteMenu','<?php echo $row['uid'];?>')">delete</button></td>
	</tr>
<?php
}
?>  
</table> 
</body>
</html>


