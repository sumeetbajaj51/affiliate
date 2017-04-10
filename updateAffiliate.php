<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Affiliate System</title>
</head>

<body>
<? require ('adminSessionControl.php');?>
<? require ('dbConnection.php'); ?>
<? require ('aff_admin_top.php'); ?>
<center>
<?
	$id = $HTTP_POST_VARS["a_id"];
	$action = $HTTP_POST_VARS["action"];
	if (is_numeric($id)) {
		if ($action == "Update") {
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
			if ($nm == "" || $snm == "" || $add == "" || $city == "" || $p_code == "" || $country == "" || $email == "" || $phone == "") {
				mysql_close($connect);
				die ("<script>alert ('Mandatory fields should be provided'); history.go(-1);</script>");
			}
			$sql = "update $affTable set name = '$nm', surname = '$snm', address = '$add', city = '$city', postal_code = '$p_code', ";
			$sql .= "country = '$country', company_name = '$comp', email = '$email', phone_number = '$phone', web_site = '$web', ";
			$sql .= "recieve_special_offer = '$spec' where id = $id";
			mysql_query ($sql,$connect);
			if (mysql_error()) {
				print("Error in updating affiliate!<br><a href='javascript:history.go(-1);'>Back</a>");
			}
			else {
				print("Affiliate information updated successfully!<br><a href='javascript:history.go(-1);'>Back</a>");
			}
		}
		else if ($action == "Delete") {
			$sql = "delete from $affTable where id = $id";
			mysql_query ($sql,$connect);
			if (mysql_error()) {
				print("Error in deleting affiliate!<br><a href='javascript:history.go(-1);'>Back</a>");
			}
			else {
				print("Affiliate information deleted successfully!<br><a href='javascript:history.go(-1);'>Back</a>");
			}
		}
		else if ($action == "Make Payment") {
			$amount = $HTTP_POST_VARS["a_amount"];
			$payment_dt = date("d/m/Y H:i:s",time());
			$smonth = date("n",time());
			$syear = date("Y",time());
			$sql = "update $affTable set current_amount = 0 where id = $id";
			mysql_query ($sql, $connect);
			if (mysql_error()) {
				print("Error in updating affiliate payment!<br><a href='javascript:history.go(-1);'>Back</a>");
			}
			else {
				$sql = "insert into $payTable (aff_id,payment_date,payment_amount,smonth,syear) values($id,'$payment_dt','$amount',$smonth,$syear)";
				mysql_query($sql);
				if (mysql_error()) {
					print("Error in adding affiliate payment!<br><a href='javascript:history.go(-1);'>Back</a>");
				}
				else {
					print("Affiliate payment made successfully!<br><a href='javascript:history.go(-1);'>Back</a>");
				}
			}
		}
		else {
			print("Invalid action!<br><a href='javascript:history.go(-1);'>Back</a>");
		}
	}
	else {
		print("Invalid affiliate id!<br><a href='javascript:history.go(-1);'>Back</a>");
	}
	mysql_close($connect);
?>
</center>
</body>
</html>
