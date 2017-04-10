<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Affiliate System</title>
</head>

<body>
<? require ('adminSessionControl.php');?>
<? require ('aff_admin_top.php'); ?>
<br>
<form action="makeSearch.php" method="post">
<table border="1" align="center" width="500" cellspacing="0" cellpadding="2">
<tr><td colspan="2">Enter search criteria and press Search button</td></tr>
<tr><td>Affiliate ID</td><td><input type="text" name="a_id" maxlength="25" size="25"></td></tr>
<tr><td>Affiliate Name</td><td><input type="text" name="a_name" maxlength="100" size="25"></td></tr>
<tr><td>Affiliate Surname</td><td><input type="text" name="a_surname" maxlength="100" size="25"></td></tr>
<tr><td align="center" colspan="2"><input type="submit" value="   SEARCH   "></td></tr>
</table>
</form>
</body>
</html>
