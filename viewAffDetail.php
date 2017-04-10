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
	$id = @$HTTP_GET_VARS["aff_id"];
	if (is_numeric($id)) {
		$sql = "select * from $affTable where id = $id";
		$result = mysql_query($sql,$connect);
		if ($row = mysql_fetch_row($result)) {
?>
<form action="updateAffiliate.php" method="post">
<input type="hidden" name="a_id" value="<?=$row[0]?>">
<input type="hidden" name="a_amount" value="<?=$row[3]?>">
<table border="1" cellspacing="0" cellpadding="2" width="500" align="center">
	<tr><td colspan="2">Details of the affiliate</td></tr>
	<tr><td width="200">ID</td><td><?=$row[0]?></td></tr>
	<tr><td width="200" style="color:red;">*First Name</td><td><input type="text" name="a_name" value="<?=$row[1]?>" maxlength="100" size="50"></td></tr>
	<tr><td style="color:red;">*Last Name</td><td><input type="text" name="a_surname" value="<?=$row[2]?>" maxlength="100" size="50"></td></tr>
	<tr><td style="color:red;">*Address</td><td><textarea name="a_address" cols="39" rows="5"><?=$row[5]?></textarea></td></tr>
	<tr><td style="color:red;">*City</td><td><input type="text" name="a_city" value="<?=$row[6]?>" maxlength="100" size="50"></td></tr>
	<tr><td style="color:red;">*Postal Code</td><td><input type="text" name="a_postal" value="<?=$row[7]?>" maxlength="100" size="50"></td></tr>
	<tr><td style="color:red;">*Country</td><td><input type="text" name="a_country" value="<?=$row[8]?>" maxlength="100" size="50"></td></tr>
	<tr><td>Company Name</td><td><input type="text" name="a_company" maxlength="100" value="<?=$row[9]?>" size="50"></td></tr>
	<tr><td style="color:red;">*Email</td><td><input type="text" name="a_email" value="<?=$row[10]?>" maxlength="100" size="50"></td></tr>
	<tr><td style="color:red;">*Phone Number</td><td><input type="text" name="a_phone" value="<?=$row[11]?>" maxlength="100" size="50"></td></tr>
	<tr><td>Web Site</td><td><input type="text" name="a_web_site" value="<?=$row[12]?>" maxlength="100" size="50"></td></tr>
	<tr><td>Recieve Special Offer</td><td><input type="radio" name="a_special" value="yes" <? if($row[13] == "yes") print ("checked");?>>Yes 
		<input type="radio" name="a_special" value="no" <? if($row[13] == "no") print ("checked");?>>No</td></tr>
	<tr><td>Current Amount</td><td><?=$row[3]?></td></tr>
	<tr><td>Total Amount</td><td><?=$row[4]?></td></tr>
	<tr><td colspan="2" align="center"><input type="submit" name="action" value="Update"> <input type="submit" name="action" value="Delete"> 
	<input type="submit" name="action" value="Make Payment"></td></tr>
</table>
</form>
<?
		}
		else {
			mysql_close($connect);
			die("Given affiliate id could not found in the database!<br><a href='javascript:history.go(-1);'>Back</a>");
		}
	}
	else {
		mysql_close($connect);
		die("Invalid affiliate id!<br><a href='javascript:history.go(-1);'>Back</a>");
	}
?>


</body>
</html>
