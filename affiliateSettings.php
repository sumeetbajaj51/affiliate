<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Affiliate System</title>
</head>

<body>
<? require ('adminSessionControl.php');?>
<? require ('dbConnection.php'); ?>
<? require ('aff_admin_top.php'); ?>
<?
	$sql = "select * from $percTable order by id";
	$result = mysql_query ($sql,$connect);
	$i = 6;
	if (mysql_error()) {
		print("Error in reading percentages!<br><a href='javascript:history.go(-1);'>Back</a>");
	}
	else {
?>
<form action="savePercentage.php" method="post">
<table border="1" cellpadding="2" cellspacing="0" width="500" align="center">
<tr><td colspan="3" align="center">Change the values to update the percentage settings of the affiliates</td></tr>
<tr><td>Starting Value</td><td>Ending Value</td><td>Percentage (%)</td></tr>
<?
		$i = 1;
		while ($row = mysql_fetch_row($result)) {
?>
<tr>
	<td><input type="hidden" name="id<?=$i?>" value="<?=$row[0]?>">
		<input type="text" name="s<?=$i?>" value="<?=$row[1]?>"></td>
	<td><input type="text" name="e<?=$i?>" value="<?=$row[2]?>"></td>
	<td><input type="text" name="p<?=$i?>" value="<?=$row[3]?>"></td>
</tr>
<?
			$i++;
		}
?>
<tr><td colspan="3" align="center"><input type="submit" value="Update"></td></tr>
</table>
</form>
<? }
	mysql_close($connect);
?>

</body>
</html>
