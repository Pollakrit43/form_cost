<?php
date_default_timezone_set("Asia/Bangkok");
ini_set('display_errors', 1);
error_reporting(~0);

$serverName = "192.168.1.221";
$userName = "sa";
$userPassword = "ua";
$dbName = "IE";



// Display category and customer information received from JavaScript
if (isset($_GET['category']) && isset($_GET['customer'])) {
    // Get the value of the "category" and "customer" parameters
    $category = $_GET['category'];
    $customer = $_GET['customer'];

    // Display the category and customer information
    echo "ลูกค้า: " . $customer . " " . "ประเภทที่เลือก: " . $category;
} else {
    // Handle the case when "category" parameter is not set
    echo "Category parameter not found in the URL.";
}
try {
    $conn = new PDO("sqlsrv:server=$serverName;Database=$dbName", $userName, $userPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_UTF8);

    if (!$conn) {
        die("Connection failed: " . print_r(sqlsrv_errors(), true));
    }

    $data = json_decode(file_get_contents('php://input'), true);


    $numColumnsExpected = 7;

    // Insert each row of data into the database
    foreach ($data as $row) {
        // Prepare the SQL statement
        $sql = "INSERT INTO MyTable (Category, Customer, Column1, Column2, Column3, Column4, Column5, Column6, Column7) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare the parameters for the SQL query
        $stmt = $conn->prepare($sql);
        $stmt->execute($row);
        if ($stmt === false) {
            die("Error inserting data: " . print_r($conn->errorInfo(), true));
        }
    }

    // Close the database connection
    $conn = null; // or use $conn = null; to close the connection explicitly

    echo " Data saved successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
