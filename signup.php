<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Affiliate System</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<? require ('dbConnection.php'); ?>
<?
	$sql = "select * from terms_of_service";
	$result = mysql_query ($sql,$connect);
	$terms = mysql_fetch_row($result);
	$sql = "select * from options_list";
	$result = mysql_query ($sql,$connect);
?>
<form action="saveSignup.php" method="post" name="signupForm">
<table border="1" width="500" cellpadding="2" cellspacing="3" align="center">
<tr><td colspan="2" align="center">Enter the values to signup to the affiliate system</td></tr>
<tr><td align="right" width="200" style="color:red;">*First Name</td><td><input type="text" name="a_name" maxlength="100" size="50"></td></tr>
<tr><td align="right" style="color:red;">*Last Name</td><td><input type="text" name="a_surname" maxlength="100" size="50"></td></tr>
<tr><td align="right" style="color:red;">*Address</td><td><textarea name="a_address" cols="39" rows="5"></textarea></td></tr>
<tr><td align="right" style="color:red;">*City</td><td><input type="text" name="a_city" maxlength="100" size="50"></td></tr>
<tr><td align="right" style="color:red;">*Postal Code</td><td><input type="text" name="a_postal" maxlength="100" size="50"></td></tr>
<tr><td align="right" style="color:red;">*Country</td><td><input type="text" name="a_country" maxlength="100" size="50"></td></tr>
<tr><td align="right">Company Name</td><td><input type="text" name="a_company" maxlength="100" size="50"></td></tr>
<tr><td align="right" style="color:red;">*Email</td><td><input type="text" name="a_email" maxlength="100" size="50"></td></tr>
<tr><td align="right" style="color:red;">*Phone Number</td><td><input type="text" name="a_phone" maxlength="100" size="50"></td></tr>
<tr><td align="right">Web Site</td><td><input type="text" name="a_web_site" value="http://" maxlength="100" size="50"></td></tr>
<tr><td align="right">Recieve Special Offer</td><td><input type="radio" name="a_special" value="yes" checked>Yes 
		<input type="radio" name="a_special" value="no">No</td></tr>
<tr><td align="right">How did you hear about us</td><td><select name="how_did_you_hear">
<?
	while ($row = mysql_fetch_row($result)) {
		print ("<option value=\"$row[0]\">$row[0]</option>");
	} 
?>
</select></td></tr>
<tr><td align="right">Terms of Service</td><td><div style="width:330px;height:150px;overflow:auto;"><?=$terms[0]?></div></td></tr>
<tr><td align="right">Accept Terms</td><td><input type="radio" name="a_accept" value="yes">Accept the terms of service<br>
		<input type="radio" name="a_accept" value="no" checked>Do not accept the terms of service</td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="   Save   "></td></tr>
</table>
</form>
<? mysql_close($connect); ?>
</body>
</html>
