<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic HTML Table</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    if (isset($_GET['category']) && isset($_GET['customer'])) {
        $category = $_GET['category'];
        $customer = $_GET['customer'];
        echo "<h2 class='mt-3 mb-4'>Customer: $customer - Category: $category</h2>";
    } else {
        echo "<div class='alert alert-danger'>Category parameter not found in the URL.</div>";
    }
    ?>

    <div class="container-fluid mb-5">
        <h2 class="mb-4">Upload Image</h2>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="image" accept="image/png, image/jpeg" onchange="previewImage(event)">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
    </div>


    <div class="position-fixed bg-white p-3" style="top: 50%; left: 0; transform: translateY(-50%);">
        <label for="percenLose" class="mb-0" style="font-size: 1.2rem; margin-right: 2rem;">เปอร์เซ็นต์เผื่อสูญเสีย:%</label>
        <input type="number" id="percenLose" min="1" max="100" value="1" style="padding: 0.5rem; font-size: 1rem;" class="form-control">
    </div>


    <input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly>
    <input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly>


    <div class="container-fluid">
        <table id="data-table" class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Category</th>
                    <th>Customer</th>
                    <th>Column 1</th>
                    <th>Column 2</th>
                    <th>Column 3</th>
                    <th>Column 4</th>
                    <th>Column 5</th>
                    <th>Column 6</th>
                    <th>Column 7</th>
                    <th>Column 8</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="DATED" readonly></td>
                    <td><input type='date' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td>
                        <input type="hidden" id="imageBinary" name="imageBinary" readonly class="form-control">
                        <div id="preview"></div>
                    </td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="STYLE" readonly></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="CUSTOMER BRAND" readonly></td>
                    <td><input type='text' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="COUNTRY OF ORIGIN" readonly></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="FACTORY" readonly></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="DESCRIPTION" readonly></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="SEASON" readonly></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td></td>

                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="FABRIC" readonly></td>
                    <td><input type='text' class='form-control' value="CODE" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="UNIT" readonly></td>
                    <td><input type='text' class='form-control' value="CIF BKK" readonly></td>
                    <td><input type='text' class='form-control' value="CONSUMPTION/PC" readonly></td>
                    <td><input type='text' class='form-control' value="AMOUNT/USD" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="A) BODY, PALM POCKET"></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><button class='btn btn-danger' onclick="deleteRow(this)">Delete</button> <button class='btn btn-warning' onclick="insertRow(this)">Insert</button></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="B) KNUCKLE POCKET"></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><button class='btn btn-danger' onclick="deleteRow(this)">Delete</button> <button class='btn btn-warning' onclick="insertRow(this)">Insert</button></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="TRIMS" readonly></td>
                    <td><input type='text' class='form-control' value="CODE" readonly></td>
                    <td><input type='text' class='form-control' value="PLACEMENT" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="UNIT/PC" readonly></td>
                    <td><input type='text' class='form-control' value="QUANTITY" readonly></td>
                    <td><input type='text' class='form-control' value="AMOUNT/USD" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="B) KNUCKLE POCKET"></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><button class='btn btn-danger' onclick="deleteRow(this)">Delete</button> <button class='btn btn-warning' onclick="insertRow(this)">Insert</button></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="B) KNUCKLE POCKET"></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><button class='btn btn-danger' onclick="deleteRow(this)">Delete</button> <button class='btn btn-warning' onclick="insertRow(this)">Insert</button></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="LABELLING" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="UNIT/PC" readonly></td>
                    <td><input type='text' class='form-control' value="QUANTITY" readonly></td>
                    <td><input type='text' class='form-control' value="AMOUNT/USD" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="B) KNUCKLE POCKET"></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><button class='btn btn-danger' onclick="deleteRow(this)">Delete</button> <button class='btn btn-warning' onclick="insertRow(this)">Insert</button></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="B) KNUCKLE POCKET"></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><button class='btn btn-danger' onclick="deleteRow(this)">Delete</button> <button class='btn btn-warning' onclick="insertRow(this)">Insert</button></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="PACKING & FINISHING" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="UNIT/PC" readonly></td>
                    <td><input type='text' class='form-control' value="QUANTITY" readonly></td>
                    <td><input type='text' class='form-control' value="AMOUNT/USD" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="B) KNUCKLE POCKET"></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><button class='btn btn-danger' onclick="deleteRow(this)">Delete</button> <button class='btn btn-warning' onclick="insertRow(this)">Insert</button></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="B) KNUCKLE POCKET"></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><button class='btn btn-danger' onclick="deleteRow(this)">Delete</button> <button class='btn btn-warning' onclick="insertRow(this)">Insert</button></td>
                </tr>
                <tr class="bg-warning">
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="TOTAL MATERIAL COST" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="Total" readonly id="Total"></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="CUT & MAKE COST" readonly></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input id="cm" type='text' class='form-control'></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="OVERHEAD" readonly></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input id="overhead" type='text' class='form-control'></td>
                    <td></td>
                </tr>
                <tr class="bg-warning">
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input id="TotalCMOverhead" type='text' class='form-control' value="0" readonly></td>
                    <td></td>
                </tr>
                <tr class="bg-warning">
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="TOTAL COST" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input id="TotalCost" type='text' class='form-control' value="0" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="DOCUMENTATION COST" readonly></td>
                    <td><input id="documentation_percen" type='text' class='form-control' oninput="calculatePercenValue('documentation')"></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input id="documentation_value" type='text' class='form-control' oninput="calculatePercenValue('documentation')"></td>
                    <td><input id="documentation_total" type='text' class='form-control' readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="GARMENT TEST" readonly></td>
                    <td><input id="garment_percen" type='text' class='form-control' oninput="calculatePercenValue('garment')"></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input id="garment_value" type='text' class='form-control' oninput="calculatePercenValue('garment')"></td>
                    <td><input id="garment_total" type='text' class='form-control' readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="FACTORY AUDIT" readonly></td>
                    <td><input id="factory_percen" type='text' class='form-control' oninput="calculatePercenValue('factory')"></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input id="factory_value" type='text' class='form-control' oninput="calculatePercenValue('factory')"></td>
                    <td><input id="factory_total" type='text' class='form-control' readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="GT NEXUS" readonly></td>
                    <td><input id="gt_percen" type='text' class='form-control' oninput="calculatePercenValue('gt')"></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input id="gt_value" type='text' class='form-control' oninput="calculatePercenValue('gt')"></td>
                    <td><input id="gt_total" type='text' class='form-control' readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="PROFIT" readonly></td>
                    <td><input id="profit_percen" type='text' class='form-control' oninput="calculatePercenValue('profit')"></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input id="profit_value" type='text' class='form-control' oninput="calculatePercenValue('profit')"></td>
                    <td><input id="profit_total" type='text' class='form-control' readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="MISCELLANEOUS" readonly></td>
                    <td><input id="miscellaneous_percen" type='text' class='form-control' oninput="calculatePercenValue('miscellaneous')"></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input id="miscellaneous_value" type='text' class='form-control' oninput="calculatePercenValue('miscellaneous')"></td>
                    <td><input id="miscellaneous_total" type='text' class='form-control' readonly></td>
                    <td></td>
                </tr>
                <tr class="bg-warning">
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="TOTAL COST" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input id="TotalCostFinal" type='text' class='form-control' value="0" readonly></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='hidden' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="TOTAL FOB PRICE" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input id="TotalCostFinal" type='text' class='form-control' value="0" readonly></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <button class="btn btn-primary mr-2" onclick="addRow()">Add Row</button>
        <button class="btn btn-success mr-2" onclick="saveData()">Save Data</button>
        <button class="btn btn-danger" onclick="resetForm()">Reset</button>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="../js/form_test1.js"></script>


<script>
    // var total = document.querySelector("#Total"); 
    // console.log(total.value)
</script>

</html>