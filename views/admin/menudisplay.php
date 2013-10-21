<?php
include_once('../../includes/system/kickstart.php');

	
	$status=1;		
	$result= $QUERY->formStaticQuery("displayMenu",$status);
	$menus= $DB->executeQuery($result);


	// $menus =mysql_query("Select *from menu where status='1'");

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
	<td><?php echo $row['status'];?></td>
	<td><a href="editmenu.php?name=<?php echo $row['name'];?>&href=<?php echo $row['href'];?>&status=<?php echo $row['status'];?>">Edit</a></td>
	<td><a href="#" onclick="formStaticQuery('deleteMenu','$row['status']');return false;">delete</a></td></tr>
<?php
}
?>
</table>
</body>
</html>
