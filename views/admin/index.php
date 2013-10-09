<?php
//echo "hello";

$dir = '../../includes/images';
if(file_exists($dir)==false){
echo "Directory not found";
}
else {
echo"dir";
$dir_contents = scandir($dir);
//print_r($dir_contents);}

foreach ($dir_contents as $file){
//echo "$file<br/>";
$file_type = end(explode('.',$file));

echo"<img src = '.$dir.' '/' '.$file.' '/' '.$file.' >";
}
}
?>
<?php
include_once('../../includes/system/kickstart.php');


        $status=1;
        $result= $QUERY->formStaticQuery("fetchCompanyDetail",$status);
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
        <tr><td><?php echo $row['uid'];?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['description'];?></td>
        <td><?php echo $row['status'];?></td>
        <td><a href="editmenu.php?name=<?php echo $row['name'];?>&href=<?php echo $row['href'];?>&status=<?php echo $row['status'];?>">Edit</a></td> 
        <td><a href="#" onclick="formStaticQuery('deleteMenu','$row['status']');return false;">delete</a></td></tr>
<?php
}
?>  
</table> 
</body>
</html>

