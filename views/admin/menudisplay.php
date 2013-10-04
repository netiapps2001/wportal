<?php
include_once('../../includes/system/kickstart.php');

	
		
	echo $result= $QUERY->formStaticQuery("displayMenu",1);
// echo    $menus= $DB->executeQuery($result);


	 $menus =mysql_query("Select *from menu where status='1'");

?>
<html>
<head></head>
<body>
<table border="1">
<?php 
while($row=mysql_fetch_assoc($menus))
{
?>
	<tr><td><?php echo $row['id'];?></td>
	<td><?php echo $row['name'];?></td>
	<td><?php echo $row['href'];?></td>
	<td><?php echo $row['status'];?></td></tr>
	<tr><td><a href="">Edit</a></td></tr>
	<tr><td><a href="">delete</a></td></tr>
<?php
}
?>
</table>
</body>
</html>
