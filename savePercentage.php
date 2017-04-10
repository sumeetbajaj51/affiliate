<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Affiliate System</title>
</head>

<body>
<? require ('adminSessionControl.php');?>
<? require ('dbConnection.php'); ?>
<? require ('aff_admin_top.php'); ?>
<script type="text/javascript">
<?
	$errControl = "0";
	for ($i=1;$i<6;$i++) {
		$id = $HTTP_POST_VARS["id$i"];
		$s = $HTTP_POST_VARS["s$i"];
		$e = $HTTP_POST_VARS["e$i"];
		$p = $HTTP_POST_VARS["p$i"];
		$sql = "update $percTable set start_amount = $s, end_amount = $e, percentage = $p where id = $id";
		mysql_query($sql,$connect);
		if (mysql_error ()) {
			$errControl = "1";
			print ("alert ('Error in saving percentage #$i');");
		}
	}
	if ($errControl == "0") {
		print ("alert ('updates successfully saved!');");
	}
	mysql_close($connect);
?>
	window.location = "affiliateSettings.php";
</script>

</body>
</html>
