<html>
<head></head>
<title>Wealthportal</title>
<body>
	<form method="post" action="../../actions/storeproducts.php" enctype="multipart/form-data">
        <table border="1" >
        <label>Name<input type="text" name="name" id="name"/></label><br>
        <label>Upload Logo<input type="file" name="image" id="image"/></label><br>
	<input name="MAX_FILE_SIZE" value="102400" type="hidden">
        <label>Description<input type="text" name="description" id="description"/></label><br>
	<select name="status">
		<option value="0">0</option>
		<option value="1">1</option>
	</select>
        <input type="submit" value="Submit" name="submit"/>
        </table>
</body>
</html>

