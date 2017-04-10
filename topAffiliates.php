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
	$pageNum = @$HTTP_GET_VARS["page"];
	if (!isset($pageNum)) {
		$pageNum = 0;
	}
	else {
		// convert pageNum value from text to number
		$pageNum = $pageNum + 0;
	}
	$sql = "select * from $affTable order by total_amount desc";
	$result = mysql_query ($sql,$connect);
	if (mysql_error()) {
		mysql_close($connect);
		die ("There is an error, please try again!<br><a href='javascript:history.go(-1);'>Back</a>");
	}
?>
	<br>
	<table border="1" cellspacing="0" cellpadding="2" width="500" align="center">
	<tr><td>Order#</td><td>Name</td><td>Surname</td><td>Current Amount</td><td>Total Amount</td><td>Action</td></tr>
<?
	$i = 1;
	while ($row = mysql_fetch_row ($result)) {
		if ($i > 20)
			break;
?>
	<tr><td><?=$i?></td><td><?=$row[1]?></td><td><?=$row[2]?></td><td><?=$row[3]?></td><td><?=$row[4]?></td><td><a href="viewAffDetail.php?aff_id=<?=$row[0]?>">Detail</a></td></tr>
<?
	$i ++;
	}
	mysql_close($connect);
?>
	</table>

</body>
</html>
