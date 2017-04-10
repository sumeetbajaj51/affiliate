<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Affiliate System</title>
</head>

<body>
<? require ('dbConnection.php'); ?>
<?
	$id = @$HTTP_GET_VARS["id"];
	if (isset($id) && is_numeric($id)) {
		$sql = "select * from $affTable where id = $id";
		$result = mysql_query ($sql,$connect);
		if ($row = mysql_fetch_row($result)) {
?>
<table border="1" width="500" cellpadding="2" cellspacing="0" align="center">
<tr><td colspan="2">Your current affiliate amount is: <?=$row[3]?></td></tr>
<tr><td colspan="2">Your total affiliate amount is: <?=$row[4]?></td></tr>
<tr><td colspan="2">Your payment details:</td></tr>
<tr style="font-weight:bold;"><td>Payment Date</td><td>Payment Amount</td></tr>
<?
			$sql = "select * from $payTable where aff_id = $id order by id desc";
			$result = mysql_query ($sql,$connect);
			while ($row = mysql_fetch_row($result)) {
?>
<tr><td><?=$row[2]?></td><td><?=$row[3]?></td></tr>
<?
			}
		}
		else {
			print ("Given affiliate ID is not found in the database!<br><a href='javascript:history.go(-1);'>Back</a>");
		}
	}
	mysql_close($connect);
?>
</table>
</body>
</html>
