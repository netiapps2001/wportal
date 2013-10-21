<html>
<head>
	<title>WealthPortal</title>

<script type="text/javascript" src="../../includes/js/validateProducts.js">
</script>
</head>
<body>
	<form method="post" action="../../actions/enquiryUsers.php" onsubmit="return validateEnquiry()">
		<table border="1">
		<tr><td>Firstname<input type="text" name="fname" id="fname"/></td></tr>
		<tr><td><div id="firstname" style="color: #CC0000"></div></td></tr>
		<tr><td>Lastname<input type="text" name="lname" id="lname"/></td></tr>
		<tr><td><div id="lastname" style="color: #CC0000"></div></td></tr>

		<tr><td>Mobile No<input type="text" name="mobile" id="mobile"/></td></tr>
		<tr><td><div id="num" style="color: #CC0000"></div></td></tr>

		<td>Email Id<input type="text" name="email" id="email"/></td></tr>
		<tr><td><div id="mail" style="color: #CC0000"></div></td></tr>

		<tr><td><input type="submit" value="Submit" name="submit"/>
		<input type="reset" value="Reset" name="reset"/></td>
		</tr>	
		</table>
	</form>
</body>

</html>
