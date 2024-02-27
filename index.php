<?php
require('./config/config.php');
$cusName = "SELECT CusID, CusName, CusContact, CusAddress, CusProvince, CusCountry, CusZip, CusTel, CusFax, CusEmail, CusWebsite, CusCity, Currency_Code, PATCODE, ShipMark, SideMark, PackingInst, Term_Con, CountryID, 
CusCode, CusMainID, Rate, Credit
FROM Tbl_Customer
ORDER BY CusName";
$show_cusname = $connAPSO->query($cusName);

// while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
//     echo "ลูกค้า: " . $row["CusName"] . "<br>";
// }

$styleType = "SELECT StyleTypeCode, StyleType
FROM Tbl_StyleType
ORDER BY StyleType";

$show_styletype = $connAPSO->query($styleType);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Cost</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="./pages/form_test1.php" class="custom-form" id="myForm">
        <label style="font-size: 2rem;" for="customer" class="form-label">เลือกลูกค้า</label>
        <?php
        echo '<select name="customer" id="customer" class="form-select">';
        while ($cus_name = $show_cusname->fetch(PDO::FETCH_ASSOC)) {
            $customerName = $cus_name['CusName'];
            echo '<option value="' .  $customerName . '">' . $customerName . '</option>';
        }
        echo '</select>';
        ?>
        <label style="font-size: 2rem;" for="category" class="form-label">เลือกประเภท</label>
        <?php
        echo ' <select name="category" id="category" class="form-select">';
        while ($style_type = $show_styletype->fetch(PDO::FETCH_ASSOC)) {
            $styleTypeName = $style_type['StyleType'];
            echo '<option value="' .  $styleTypeName . '">' . $styleTypeName . '</option>';
        }
        echo '</select>';
        ?>
        <input style="font-size: 1.2rem;" type="submit" value="Submit" class="form-submit" />
    </form>
</body>

</html>