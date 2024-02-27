<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic HTML Table</title>
    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php
    if (isset($_GET['category']) && isset($_GET['customer'])) {
        // Get the value of the "category" parameter
        $category = $_GET['category'];
        $customer = $_GET['customer'];

        echo "<h2 class='mt-3 mb-4'>Customer: $customer - Category: $category</h2>";
    } else {
        // Handle the case when "category" parameter is not set
        echo "<div class='alert alert-danger'>Category parameter not found in the URL.</div>";
    }
    ?>
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
                    <td><input type='text' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="DATED" readonly></td>
                    <td><input type='date' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><button class='btn btn-danger' onclick="deleteRow(this)">Delete</button> <button class='btn btn-warning' onclick="insertRow(this)">Insert</button></td>
                </tr>
                <tr>
                    <td><input type='text' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="STYLE" readonly></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><button class='btn btn-danger' onclick="deleteRow(this)">Delete</button> <button class='btn btn-warning' onclick="insertRow(this)">Insert</button></td>
                </tr>
                <tr>
                    <td><input type='text' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="CUSTOMER BRAND" readonly></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><button class='btn btn-danger' onclick="deleteRow(this)">Delete</button> <button class='btn btn-warning' onclick="insertRow(this)">Insert</button></td>
                </tr>
                <tr>
                    <td><input type='text' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="COUNTRY OF ORIGIN" readonly></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><button class='btn btn-danger' onclick="deleteRow(this)">Delete</button> <button class='btn btn-warning' onclick="insertRow(this)">Insert</button></td>
                </tr>
                <tr>
                    <td><input type='text' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="FACTORY" readonly></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><button class='btn btn-danger' onclick="deleteRow(this)">Delete</button> <button class='btn btn-warning' onclick="insertRow(this)">Insert</button></td>
                </tr>
                <tr>
                    <td><input type='text' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="DESCRIPTION" readonly></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><button class='btn btn-danger' onclick="deleteRow(this)">Delete</button> <button class='btn btn-warning' onclick="insertRow(this)">Insert</button></td>
                </tr>
                <tr>
                    <td><input type='text' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="SEASON" readonly></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control'></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><input type='text' class='form-control' readonly></td>
                    <td><button class='btn btn-danger' onclick="deleteRow(this)">Delete</button> <button class='btn btn-warning' onclick="insertRow(this)">Insert</button></td>
                </tr>
                <tr>
                    <td><input type='text' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' class='form-control' value="FABRIC" readonly></td>
                    <td><input type='text' class='form-control' value="CODE" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="" readonly></td>
                    <td><input type='text' class='form-control' value="UNIT" readonly></td>
                    <td><input type='text' class='form-control' value="CIF BKK" readonly></td>
                    <td><input type='text' class='form-control' value="CONSUMPTION/PC" readonly></td>
                    <td><input type='text' class='form-control' value="AMOUNT/USD" readonly></td>
                    <td><button class='btn btn-danger' onclick="deleteRow(this)">Delete</button> <button class='btn btn-warning' onclick="insertRow(this)">Insert</button></td>
                </tr>
                <tr>
                    <td><input type='text' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
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
                    <td><input type='text' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly class="form-control"></td>
                    <td><input type='text' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly class="form-control"></td>
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
        <button class="btn btn-success" onclick="saveData()">Save Data</button>
    </div>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap JS -->
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
            var actionCell = newRow.insertCell(10); // Updated to index 10 for the new column
            actionCell.innerHTML = "<button class='btn btn-danger' onclick='deleteRow(this)'>Delete</button> <button class='btn btn-warning' onclick='insertRow(this)'>Insert</button>";
        }

        function deleteRow(btn) {
            var row = btn.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

        function insertRow(btn) {
            var row = btn.parentNode.parentNode;
            var newRow = row.parentNode.insertRow(row.rowIndex + 0); // Insert below the current row
            var category = document.getElementsByName('category')[0].value;
            var customer = document.getElementsByName('customer')[0].value;
            for (var i = 0; i < 10; i++) { // Updated loop limit to 10
                var cell = newRow.insertCell(i);
                if (i === 0) {
                    cell.innerHTML = "<input type='text' value='" + category + "' readonly class='form-control'>";
                } else if (i === 1) {
                    cell.innerHTML = "<input type='text' value='" + customer + "' readonly class='form-control'>";
                } else {
                    cell.innerHTML = "<input type='text' class='form-control'>";
                }
            }
            var actionCell = newRow.insertCell(10); // Updated to index 10 for the new column
            actionCell.innerHTML = "<button class='btn btn-danger' onclick='deleteRow(this)'>Delete</button> <button class='btn btn-warning' onclick='insertRow(this)'>Insert</button>";
        }

        function saveData() {
            var data = [];
            var table = document.getElementById("data-table").getElementsByTagName('tbody')[0];
            for (var i = 0; i < table.rows.length; i++) {
                var row = table.rows[i];
                var rowData = [];
                for (var j = 0; j < row.cells.length - 1; j++) { // Exclude the last cell (action cell)
                    var cell = row.cells[j];
                    rowData.push(cell.querySelector('input').value);
                }
                data.push(rowData);
            }
            // Send data to PHP script using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../save_data.php?category=<?php echo urlencode($category); ?>&customer=<?php echo urlencode($customer); ?>", true);
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                    // Optionally, do something with the response
                }
            };
            xhr.send(JSON.stringify(data));
        }


        function calculateAndDisplay() {
            var table = document.getElementById("data-table").getElementsByTagName('tbody')[0];
            for (var i = 0; i < table.rows.length; i++) {
                var row = table.rows[i];
                var cell6 = row.cells[7].querySelector('input'); // Column 5
                var cell7 = row.cells[8].querySelector('input'); // Column 6
                var cell8 = row.cells[9].querySelector('input'); // Column 7
                if (cell6 && cell7 && cell8) {
                    var value6 = parseFloat(cell6.value);
                    var value7 = parseFloat(cell7.value);
                    if (!isNaN(value6) && !isNaN(value7)) {
                        cell8.value = (value6 * value7).toFixed(4); // Display the result with two decimal places
                    } else {
                        cell8.value = cell8.value;
                    }
                }
            }
        }

        // Call calculateAndDisplay function when the page loads and whenever there is a change in Column 5 or Column 6
        document.addEventListener('DOMContentLoaded', function() {
            calculateAndDisplay();
            var inputs = document.querySelectorAll('#data-table tbody input[type="text"]');
            inputs.forEach(function(input) {
                input.addEventListener('input', calculateAndDisplay);
            });
        });
    </script>
</body>

</html>