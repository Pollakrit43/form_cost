<?php
date_default_timezone_set("Asia/Bangkok");
ini_set('display_errors', 1);
error_reporting(~0);

$serverName = "fwserver";
$userName = "sa";
$userPassword = "ua";
$dbName = "APSO";

try {
	$connAPSO = new PDO("sqlsrv:server=$serverName ; Database = $dbName", $userName, $userPassword);
	$connAPSO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$connAPSO->setAttribute(PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_UTF8);
	if ($connAPSO) {
		//echo "Database APSO connected.";
	} else {
		echo "Database APSO connect Failed.";
	}
} catch (PDOException $e) {
	echo $e->getMessage();
}
