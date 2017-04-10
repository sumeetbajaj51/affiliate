<? require ('adminSessionControl.php');?>
<? require ('dbConnection.php'); ?>
<?
	$r_type = $HTTP_POST_VARS["a_report_type"];
	$mon = $HTTP_POST_VARS["a_month"];
	$year = $HTTP_POST_VARS["a_year"];
	$o_type = $HTTP_POST_VARS["a_output_type"];
	$first = "";
	$delim = "";
	$last = "";
	$title = "";
	$sql = "";
	if ($o_type == "html") {
		$first = "<tr><td>";
		$delim = "</td><td>";
		$last = "</td></tr>";
		header ('Content-type: text/html');
		header ('Content-Disposition: attachment; filename="report.html"');
	}
	else if ($o_type == "excell") {
		$first = "<tr><td>";
		$delim = "</td><td>";
		$last = "</td></tr>";
		header ('Content-type: application/vnd.ms-excel');
		header ('Content-Disposition: attachment; filename="report.xls"');
	}
	else if ($o_type == "csv") {
		$first = "";
		$delim = ";";
		$last = "\n";
		header ('Content-type: text/plain');
		header ('Content-Disposition: attachment; filename="report.csv"');
	}
	if ($r_type == "sold") {
		if ($o_type == "csv") {
			$title = "Affiliate ID;Sold Date;Sold Amount;Affiliate Amount\n";
		}
		else {
			$title = "<tr><td>Affiliate ID</td><td>Sold Date</td><td>Sold Amount</td><td>Affiliate Amount</td></tr>";
		}
		$sql = "select * from $itemTable where syear = $year";
		if ($mon != "0") {
			$sql .= " and smonth = $mon";
		}
	}
	else {
		if ($o_type == "csv") {
			$title = "Affiliate ID;Payment Date;Payment Amount\n";
		}
		else {
			$title = "<tr><td>Affiliate ID<td></td>Payment Date<td></td>Payment Amount</td></tr>";
		}
		$sql = "select * from $payTable where syear = $year";
		if ($mon != "0") {
			$sql .= " and smonth = $mon";
		}
	}
	$result = mysql_query ($sql, $connect);
	if ($o_type != "csv") {
?>
<html>
<head>
	<title>Affiliate System Report</title>
</head>

<body>
<table border="1">
<?
	}
	print ($title);
	while ($row = mysql_fetch_row ($result)) {
		print ($first);
		if ($r_type == "sold") {
			print ($row[1] . $delim . $row[4] . $delim . $row[2] . $delim . $row[3]);
		}
		else {
			print ($row[1] . $delim . $row[2] . $delim . $row[3]);
		}
		print ($last);
	}
	if ($o_type != "csv") {
?>
</table>
</body>
</html>
<?
	}
	mysql_close($connect);
?>
