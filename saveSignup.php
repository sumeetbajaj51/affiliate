<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Affiliate System</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?
	$nm = $HTTP_POST_VARS["a_name"];
	$snm = $HTTP_POST_VARS["a_surname"];
	$add = $HTTP_POST_VARS["a_address"];
	$city = $HTTP_POST_VARS["a_city"];
	$p_code = $HTTP_POST_VARS["a_postal"];
	$country = $HTTP_POST_VARS["a_country"];
	$comp = $HTTP_POST_VARS["a_company"];
	$email = $HTTP_POST_VARS["a_email"];
	$phone = $HTTP_POST_VARS["a_phone"];
	$web = $HTTP_POST_VARS["a_web_site"];
	$spec = $HTTP_POST_VARS["a_special"];
	$howHear = $HTTP_POST_VARS["how_did_you_hear"];
	$accTerm = $HTTP_POST_VARS["a_accept"];
	$nm = trim($nm);
	$snm = trim($snm);
	$add = trim($add);
	$city = trim($city);
	$p_code = trim($p_code);
	$country = trim($country);
	$comp = trim($comp);
	$email = trim($email);
	$phone = trim($phone);
	$web = trim($web);
	if ($nm == "" || $snm == "" || $add == "" || $city == "" || $p_code == "" || $country == "" || $email == "" || $phone == "") {
		die ("<script>alert ('Mandatory fields should be provided'); history.go(-1);</script>");
	}
	if ($accTerm != "yes") {
		die ("<script>alert ('You should accept the terms of service to sign up'); history.go(-1);</script>");
	}
?>
<? require ('dbConnection.php'); ?>
<?
	$sql = "insert into $affTable values ((select last_num+1 from $seqTable),'$nm','$snm',0,0,'$add','$city',";
	$sql .= "'$p_code','$country','$comp','$email','$phone','$web','$spec','$howHear','$accTerm')";
	mysql_query ($sql,$connect);
	if (mysql_error()) {
		print ("An error occured please try again!<br><a href='javascript:history.go(-1);'>Back</a>");
	}
	else {
		$sql = "update $seqTable set last_num = last_num + 1";
		mysql_query ($sql, $connect);
		print ("New affiliate is successfully added!<br><a href='javascript:history.go(-1);'>Back</a>");
	}
	mysql_close($connect);
?>
</body>
</html>
