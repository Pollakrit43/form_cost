<?php
if (isset($_GET['category']) && isset($_GET['customer'])) {
    // Get the value of the "category" parameter
    $category = $_GET['category'];
    $customer = $_GET['customer'];

    // Use the $category variable as needed
    //echo "ลูกค้า: " . $customer . "<br>" . "ประเภทที่เลือก: " . $category;
} else {
    // Handle the case when "category" parameter is not set
    echo "Category parameter not found in the URL.";
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Table Editor</title>
    <?php
    require '../style.php'
    ?>
</head>

<body>
    <div class="container">
        <p>ลูกค้า: <?php echo $customer ?></p>
        <p>ประเภทที่เลือก: <?php echo $category ?></p>
        <p><a href="index.php">ย้อนกลับหน้าแรก</a></p>
    </div>
    <table id="editableTable">
        <thead>
            <tr>
                <th style="text-align: center;" colspan="8">OPEN COSTING</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td contenteditable="false">DATE</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td style="text-align: center;" colspan="4">PICTURE</td>

            </tr>
            <tr>
                <td contenteditable="false">STYLE</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td rowspan="6" colspan="4" style="text-align: center; vertical-align: middle;">
                    <div style="position: relative; display: inline-block;">
                        <!-- Placeholder for the uploaded image -->
                        <img id="uploadedImage" src="" alt="Uploaded Image" style="max-width: 100%; max-height: 100%; display: none;">

                        <!-- Button to trigger file input -->
                        <button onclick="document.getElementById('fileInput').click();">Add Image</button>

                        <!-- Hidden file input -->
                        <input type="file" id="fileInput" style="display: none;" onchange="previewImage(this);">
                    </div>
                </td>
            </tr>
            <tr>
                <td contenteditable="false">CUSTOMER BRAND</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>

            </tr>
            <tr>
                <td contenteditable="false">COUNTRY OF ORIGIN</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>

            </tr>
            <tr>
                <td contenteditable="false">FACTORY</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>

            </tr>
            <tr>
                <td contenteditable="false">DESCRIPTION</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>

            </tr>
            <tr>
                <td contenteditable="false">SEASON</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
            </tr>
        </tbody>
        <tbody id="insertTbody">
            <tr>
                <td>FABRIC</td>
                <td>CODE</td>
                <td></td>
                <td></td>
                <td>UNIT</td>
                <td>CIF BKK</td>
                <td>CONSUMPTION/PC</td>
                <td>AMOUNT/USD</td>
            </tr>
            <tr>
                <td contenteditable="true">A) BODY</td>
                <td contenteditable="true" id="fabricCodesCell" class="fabric-codes-cell">
                    <input list="fabricCode" name="fabricCodes" id="fabricCodes" class="fabric-codes-input">
                    <datalist id="fabricCode">
                        <option value="A094">
                        <option value="A213">
                        <option value="ALML01">
                    </datalist>
                </td>
                <td contenteditable="true" id="customFabricCodesCell" class="custom-fabric-codes-cell">
                    <input list="customFabricCodeDetail" name="customFabricCodeDetails" id="customFabricCodeDetails" class="custom-fabric-codes-input">
                    <datalist id="customFabricCodeDetail">
                        <option value="100%POLY SOLID INTERLOCK 70&quot;,135 GSM">
                        <option value="100%POLY AOP INTERLOCK 70&quot;,135 GSM">
                        <option value="100%POLY TRICOT 60&quot;,80 GSM">
                        <option value="100%MICRO POLY 72&quot;, 125 GSM">
                    </datalist>
                </td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>
            </tr>
            <tr>
                <td contenteditable="true">B) SIDE PANEL</td>
                <td contenteditable="true" id="fabricCodesCell" class="fabric-codes-cell">
                    <input list="fabricCode" name="fabricCodes" id="fabricCodes" class="fabric-codes-input">
                    <datalist id="fabricCode">
                        <option value="A094">
                        <option value="A213">
                        <option value="ALML01">
                    </datalist>
                </td>
                <td contenteditable="true" id="customFabricCodesCell" class="custom-fabric-codes-cell">
                    <input list="customFabricCodeDetail" name="customFabricCodeDetails" id="customFabricCodeDetails" class="custom-fabric-codes-input">
                    <datalist id="customFabricCodeDetail">
                        <option value="100%POLY SOLID INTERLOCK 70&quot;,135 GSM">
                        <option value="100%POLY AOP INTERLOCK 70&quot;,135 GSM">
                        <option value="100%POLY TRICOT 60&quot;,80 GSM">
                        <option value="100%MICRO POLY 72&quot;, 125 GSM">
                    </datalist>
                </td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>

                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>

            </tr>
            <tr>
                <td contenteditable="true">C) STRIPES</td>
                <td contenteditable="true" id="fabricCodesCell" class="fabric-codes-cell">
                    <input list="fabricCode" name="fabricCodes" id="fabricCodes" class="fabric-codes-input">
                    <datalist id="fabricCode">
                        <option value="A094">
                        <option value="A213">
                        <option value="ALML01">
                    </datalist>
                </td>
                <td contenteditable="true" id="customFabricCodesCell" class="custom-fabric-codes-cell">
                    <input list="customFabricCodeDetail" name="customFabricCodeDetails" id="customFabricCodeDetails" class="custom-fabric-codes-input">
                    <datalist id="customFabricCodeDetail">
                        <option value="100%POLY SOLID INTERLOCK 70&quot;,135 GSM">
                        <option value="100%POLY AOP INTERLOCK 70&quot;,135 GSM">
                        <option value="100%POLY TRICOT 60&quot;,80 GSM">
                        <option value="100%MICRO POLY 72&quot;, 125 GSM">
                    </datalist>
                </td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>

            </tr>
            <tr>
                <td contenteditable="true">D) POCKET BACK</td>
                <td contenteditable="true" id="fabricCodesCell" class="fabric-codes-cell">
                    <input list="fabricCode" name="fabricCodes" id="fabricCodes" class="fabric-codes-input">
                    <datalist id="fabricCode">
                        <option value="A094">
                        <option value="A213">
                        <option value="ALML01">
                    </datalist>
                </td>
                <td contenteditable="true" id="customFabricCodesCell" class="custom-fabric-codes-cell">
                    <input list="customFabricCodeDetail" name="customFabricCodeDetails" id="customFabricCodeDetails" class="custom-fabric-codes-input">
                    <datalist id="customFabricCodeDetail">
                        <option value="100%POLY SOLID INTERLOCK 70&quot;,135 GSM">
                        <option value="100%POLY AOP INTERLOCK 70&quot;,135 GSM">
                        <option value="100%POLY TRICOT 60&quot;,80 GSM">
                        <option value="100%MICRO POLY 72&quot;, 125 GSM">
                    </datalist>
                </td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>

            </tr>
            <tr>
                <td>TRIMS</td>
                <td>CODE</td>
                <td>PLACEMENT</td>
                <td></td>
                <td></td>
                <td>UNIT/PC</td>
                <td>QUANITY</td>
                <td>AMOUNT/USD</td>
            </tr>
            <tr>
                <td contenteditable="true">EMB LOGO</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>

            </tr>
            <tr>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>

            </tr>
            <tr>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>

            </tr>
            <tr>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>

            </tr>
            <tr>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>

            </tr>
            <tr>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>
            </tr>
            <tr>
                <td>LABELLING</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>UNIT/PC</td>
                <td>QUANITY</td>
                <td>AMOUNT/USD</td>
            </tr>
            <tr>
                <td contenteditable="true">CARE LABEL</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>

            </tr>
            <tr>
                <td contenteditable="true">SECURITY ATACA</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>
            </tr>
            <tr>
                <td contenteditable="true">ELASTIC WAISTBAND</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>

            </tr>
            <tr>
                <td contenteditable="true">DRAWCORD</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>
            </tr>
            <tr>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>
            </tr>
            <tr>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>
            </tr>
            <tr>
                <td>PACKING & FINISHING</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>UNIT/PC</td>
                <td>QUANITY</td>
                <td>AMOUNT/USD</td>
            </tr>
            <tr>
                <td contenteditable="true">HANGTAG </td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>
            </tr>
            <tr>
                <td contenteditable="true">BARCODE STICKER FOR HANGTAG</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>
            </tr>
            <tr>
                <td contenteditable="true">POLYBAG</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>
            </tr>
            <tr>
                <td contenteditable="true">BARCODE STICKER FOR POLYBAG</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>
            </tr>
            <tr>
                <td contenteditable="true">EXPORT CARTON</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>
            </tr>
            <tr>
                <td contenteditable="true">BARCODE STICKER FOR CARTON</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>
            </tr>
            <tr>
                <td contenteditable="true">CARTON TAPE</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>
            </tr>
            <tr>
                <td contenteditable="true">DESCCANT</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>
            </tr>
            <tr>
                <td contenteditable="true">PLASTIC PIN</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>
            </tr>
            <tr>
                <td contenteditable="true">HANGER</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>
            </tr>
            <tr>
                <td contenteditable="true">SIZER</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>
            </tr>
            <tr>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td contenteditable="true" class="value" oninput="calculate(this)"></td>
                <td class="result"></td>
                <td>
                    <button onclick="deleteRow(this)" class="delete-button">ลบแถว</button>
                </td>
                <td>
                    <button onclick="insertRow(this)" class="add-button">เพิ่มแถว</button>
                </td>
            </tr>

        </tbody>
        <tbody>
            <tr>
                <td style="text-align: center;" colspan="5">Handing Charge</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
            </tr>
            <tr>
                <td>TOTAL MATERIAL COST</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td class="totalRe" id="sumCell" contenteditable="true"></td>
            </tr>
            <tr>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td class="totalRe" contenteditable="true"></td>
            </tr>
            <tr>
                <td>CUT & MAKE COST</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td class="totalRe" contenteditable="true"></td>
            </tr>
            <tr>
                <td>OVERHEAD</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td class="totalRe" contenteditable="true"></td>
            </tr>
            <tr>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td class="totalRe" contenteditable="true"></td>
            </tr>
            <tr>
                <td>DOCUMENTATION COST</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td class="totalRe" contenteditable="true"></td>
            </tr>
            <tr>
                <td>GARMENT TEST</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td class="totalRe" contenteditable="true"></td>
            </tr>
            <tr>
                <td>FACTORY AUDIT</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td class="totalRe" contenteditable="true"></td>
            </tr>
            <tr>
                <td>GT NEXUS</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td class="totalRe" contenteditable="true"></td>
            </tr>
            <tr>
                <td contenteditable="true">TOTAL COST</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td class="totalResult" contenteditable="true"></td>
            </tr>
            <tr>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
            </tr>
            <tr>
                <td>PROFIT</td>
                <td class="totalCostPro" contenteditable="true"></td>
                <td contenteditable="true">%</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td class="totalCostProfit" contenteditable="true">0</td>
            </tr>
            <tr>
                <td></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
            </tr>
            <tr>
                <td>TOTAL FOB PRICE</td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td contenteditable="true"></td>
                <td class="totalFob" contenteditable="true">0</td>
            </tr>
        </tbody>
    </table>

    <div style="position: fixed; top: 0; left: 0; padding: 10px; background-color: white; z-index: 1;">
        <!-- <label for="insertIndex" style="font-size: 1.2rem; margin-right: 10px;">เพิ่มแถวในช่องที่:</label>
        <input type="number" id="insertIndex" min="1" max="100" value="1" style="padding: 8px; font-size: 1rem;"> -->

        <label for="percenLose" style="font-size: 1.2rem; margin-right: 10px;">เปอร์เซ็นต์เผื่อสูญเสีย:</label>
        <input type="number" id="percenLose" min="1" max="100" value="1" style="padding: 8px; font-size: 1rem;">
        <!-- <button onclick="insertRow()" style="padding: 10px; font-size: 1rem; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">เพิ่มแถว</button> -->
    </div>


    <script src="../js/script.js"></script>
</body>

</html>