<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Affiliate System</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<? require ('dbConnection.php'); ?>
<?
	//amount of purchase (sold item)
	$s_amount = $HTTP_POST_VARS["a_amount"];
	//default percentage, it will be changed after db is read
	$perc = 0.01;
	//find affiliate amount from database
	$sql = "select * from $percTable order by id";
	$result = mysql_query ($sql, $connect);
	while ($row = mysql_fetch_row($result)) {
		$s = $row[1];
		$e = $row[2];
		if ($s_amount >= $s && $s_amount <= $e) {
			$perc = 0.0 + $row[3] / 100;
			break;
		}
	}

	$aff_id = $HTTP_POST_VARS["a_aff_id"];
	$a_amount = $s_amount * $perc;
	$sold_dt = date("d/m/Y H:i:s",time());
	$smount = date("n",time());
	$syear = date("Y",time());
	$sql = "insert into $itemTable (aff_id,sold_amount,aff_amount,sold_date,smonth,syear) values (";
	$sql .= "$aff_id,$s_amount,$a_amount,'$sold_dt',$smount,$syear)";
	mysql_query ($sql,$connect);
	
	if (mysql_error()) {
		print ("An error occured please try again!<br><a href='javascript:history.go(-1);'>Back</a>");
	}
	else {
		$sql = "update $affTable set current_amount = current_amount + $a_amount, total_amount = total_amount + $a_amount where id = $aff_id";
		mysql_query ($sql, $connect);
		print ("New entry is successfully added!<br><a href='javascript:history.go(-1);'>Back</a>");
	}
	mysql_close($connect);
?>
</body>
</html>
