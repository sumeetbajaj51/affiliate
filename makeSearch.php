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
	$id = $HTTP_POST_VARS["a_id"];
	$nm = $HTTP_POST_VARS["a_name"];
	$snm = $HTTP_POST_VARS["a_surname"];
	$sql = "select * from $affTable ";
	if (is_numeric($id)) {
		$sql .= "where id = $id ";
	}
	else {
		if ($nm != "" && $snm != "") {
			$sql .= "where name like '%$nm%' and surname like '%$snm%' ";
		}
		else if ($nm != "") {
			$sql .= "where name like '%$nm%' ";
		}
		else if ($snm != "") {
			$sql .= "where surname like '%$snm%' ";
		}
	}
	$sql .= "order by id";
	
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
