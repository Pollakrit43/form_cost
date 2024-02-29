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
<script>
    function addRow() {
        var table = document.getElementById("data-table").getElementsByTagName('tbody')[0];
        var newRow = table.insertRow(table.rows.length);
        var category = document.getElementsByName('category')[0].value;
        var customer = document.getElementsByName('customer')[0].value;
        for (var i = 0; i < 10; i++) {
            var cell = newRow.insertCell(i);
            if (i === 0) {
                cell.innerHTML = "<input type='text' value='" + category + "' readonly class='form-control'>";
            } else if (i === 1) {
                cell.innerHTML = "<input type='text' value='" + customer + "' readonly class='form-control'>";
            } else {
                cell.innerHTML = "<input type='text' class='form-control'>";
            }
        }
        var actionCell = newRow.insertCell(10);
        actionCell.innerHTML = "<button class='btn btn-danger' onclick='deleteRow(this)'>Delete</button> <button class='btn btn-warning' onclick='insertRow(this)'>Insert</button>";
    }

    function deleteRow(btn) {
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    function insertRow(btn) {
        var row = btn.parentNode.parentNode;
        var newRow = row.parentNode.insertRow(row.rowIndex + 0);
        var category = document.getElementsByName('category')[0].value;
        var customer = document.getElementsByName('customer')[0].value;
        for (var i = 0; i < 10; i++) {
            var cell = newRow.insertCell(i);
            if (i === 0) {
                cell.innerHTML = "<input type='hidden' value='" + category + "' readonly class='form-control'>";
            } else if (i === 1) {
                cell.innerHTML = "<input type='hidden' value='" + customer + "' readonly class='form-control'>";
            } else {
                cell.innerHTML = "<input type='text' class='form-control'>";
            }
        }
        var actionCell = newRow.insertCell(10);
        actionCell.innerHTML = "<button class='btn btn-danger' onclick='deleteRow(this)'>Delete</button> <button class='btn btn-warning' onclick='insertRow(this)'>Insert</button>";
    }

    function saveData() {
        var data = [];
        var table = document.getElementById("data-table").getElementsByTagName('tbody')[0];
        for (var i = 0; i < table.rows.length; i++) {
            var row = table.rows[i];
            var rowData = [];
            for (var j = 0; j < row.cells.length - 1; j++) {
                var cell = row.cells[j];
                rowData.push(cell.querySelector('input').value);
            }
            data.push(rowData);
        }
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../save_data.php?category=<?php echo urlencode($category); ?>&customer=<?php echo urlencode($customer); ?>", true);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.onload = function() {
            if (xhr.status === 200) {
                Swal.fire({
                    title: 'Success',
                    text: 'Data saved successfully!',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        resetForm(); // Call resetForm function after user clicks "Ok"
                    }
                });
            }
        };
        xhr.send(JSON.stringify(data));
    }



    function resetForm() {
        var inputFields = document.querySelectorAll('input[type="text"]');
        inputFields.forEach(function(input) {
            if (!input.hasAttribute('readonly')) {
                input.value = '';
            }
        });
        location.reload();
    }

    function calculateAndDisplay() {
        var table = document.getElementById("data-table").getElementsByTagName('tbody')[0];
        for (var i = 0; i < table.rows.length; i++) {
            var row = table.rows[i];
            var cell6 = row.cells[7].querySelector('input');
            var cell7 = row.cells[8].querySelector('input');
            var cell8 = row.cells[9].querySelector('input');
            if (cell6 && cell7 && cell8) {
                var value6 = parseFloat(cell6.value);
                var value7 = parseFloat(cell7.value);
                if (!isNaN(value6) && !isNaN(value7)) {
                    cell8.value = (value6 * value7).toFixed(4);
                } else {
                    cell8.value = cell8.value;
                }
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        calculateAndDisplay();
        var inputs = document.querySelectorAll('#data-table tbody input[type="text"]');
        inputs.forEach(function(input) {
            input.addEventListener('input', calculateAndDisplay);
        });
    });


    function previewImage(event) {
        var file = event.target.files[0];
        var output = document.getElementById('preview');
        var imageBinaryInput = document.getElementById('imageBinary');

        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var binaryData = e.target.result;
                imageBinaryInput.value = binaryData;

                // Display the image
                var img = new Image();
                img.src = binaryData;
                img.style.maxWidth = '100%';
                img.style.maxHeight = '100%';
                output.innerHTML = '';
                output.appendChild(img);
            };
            reader.readAsDataURL(file);
        } else {
            imageBinaryInput.value = "";
            output.innerHTML = "";
        }
    }
</script>

</html>