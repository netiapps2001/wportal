<html>
<head>
        <title>Wealthportal</title>
</head>
<script type="text/javascript" src="../../includes/js/validateProducts.js">
</script>
<body>
<form action="../../actions/logindetails.php" method="post" onSubmit="return validateuser();">
        <table border=1>
                <tr><td>Username<input type="text" name="uname" id="uname"/><br></td></tr>
                <tr><td><div id="name"style="color: #CC0000"></div></td></tr>
                <tr><td>
                password<input type="password" name="password" id="password"/><br></td></tr>
                <tr><td><div id="pass" style="color: #CC0000"></div></td></tr>
                <tr><td><input type="submit" value="Login" name="submit"/>
		<input type="reset" value="Reset" name="reset"/></td></tr>
        </table>
        </form>
</body>
</html>
~            
