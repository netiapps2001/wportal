<?php
	mysql_connect('192.168.1.10','anup','tripleseven7');
	mysql_select_db('wealthportal');
	
	$checkQuery = 'SELECT * FROM menu_table';
	$queryRes = mysql_query($checkQuery);
	while($data = mysql_fetch_assoc($queryRes)){
		echo $data['name'];
	}
	


?>
