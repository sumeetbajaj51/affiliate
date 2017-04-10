<?
	$server = "localhost";
	$user = "root";
	$pass = "";
	$dbName = "affiliate_test";
	
	$connect = mysql_connect ($server,$user,$pass);
	if ($connect) {
		mysql_select_db ($dbName,$connect);
	}
	else {
		die ("database connection could not be established.");
	}
	require ('variables.php');
?>
