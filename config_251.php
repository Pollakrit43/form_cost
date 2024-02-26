<?php
date_default_timezone_set("Asia/Bangkok");
ini_set('display_errors', 1);
error_reporting(~0);

$serverName = "192.168.1.221";
$userName = "sa";
$userPassword = "ua";
$dbName = "APSO";

try {
    $conn251APSO = new PDO("sqlsrv:server=$serverName;Database=$dbName", $userName, $userPassword);
    $conn251APSO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn251APSO->setAttribute(PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_UTF8);

    if (!$conn251APSO) {
        die("Connection failed: " . print_r(sqlsrv_errors(), true));
    }

    // Rest of your code goes here

    // Close the database connection
    $conn251APSO = null; // or use $conn251APSO = null; to close the connection explicitly

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
