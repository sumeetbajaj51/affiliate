<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Affiliate System</title>
</head>

<body>
<? require ('adminSessionControl.php');?>
<? require ('aff_admin_top.php'); ?>
<br>
<form action="viewReport.php" method="post">
<table border="1" width="500" cellspacing="0" cellpadding="2" align="center">
<tr><td colspan="2" align="center">Select the report options and press Download</td></tr>
<tr>
	<td>Report Type</td><td><input type="Radio" id="a_sold" name="a_report_type" value="sold" checked>Items sold report 
		<input type="Radio" name="a_report_type" value="payment">Payment report</td></tr>
<tr>
	<td>Date Options</td><td>Month: 
	<select name="a_month">
	<option value="0">(All)</option>
	<option value="1">January</option>
	<option value="2">February</option>
	<option value="3">March</option>
	<option value="4">April</option>
	<option value="5">May</option>
	<option value="6">June</option>
	<option value="7">July</option>
	<option value="8">August</option>
	<option value="9">September</option>
	<option value="10">October</option>
	<option value="11">November</option>
	<option value="12">December</option>
	</select>
	Year: <input type="text" name="a_year" value="2007"></td></tr>
<tr>
	<td>Output Type</td><td><input type="Radio" name="a_output_type" value="html" checked>HTML 
		<input type="Radio" name="a_output_type" value="excell">EXCELL 
		<input type="Radio" name="a_output_type" value="csv">CSV</td></tr>
</tr>
<tr><td align="center" colspan="2"><input type="submit" value="Download"></td></tr>
</table>
</form>

</body>
</html>
