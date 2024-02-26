<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple HTML Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_GET['category']) && isset($_GET['customer'])) {
        // Get the value of the "category" parameter
        $category = $_GET['category'];
        $customer = $_GET['customer'];

        echo "<h2>Customer: $customer - Category: $category</h2>";
    } else {
        // Handle the case when "category" parameter is not set
        echo "Category parameter not found in the URL.";
    }
    ?>

    <table id="data-table">
        <thead>
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
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type='text' name='category' value="<?php echo isset($category) ? htmlspecialchars($category) : ''; ?>" readonly></td>
                <td><input type='text' name='customer' value="<?php echo isset($customer) ? htmlspecialchars($customer) : ''; ?>" readonly></td>
                <td><input type='text'></td>
                <td><input type='text'></td>
                <td><input type='text'></td>
                <td><input type='text'></td>
                <td><input type='text'></td>
                <td><input type='text'></td>
                <td><input type='text'></td>
            </tr>
        </tbody>
    </table>
    <button onclick="addRow()">Add Row</button>
    <button onclick="saveData()">Save Data</button>

    <script>
        function addRow() {
            var table = document.getElementById("data-table").getElementsByTagName('tbody')[0];
            var newRow = table.insertRow(table.rows.length);
            var category = document.getElementsByName('category')[0].value;
            var customer = document.getElementsByName('customer')[0].value;
            for (var i = 0; i < 9; i++) { // Adjusted to 9 since there are 9 columns now
                var cell = newRow.insertCell(i);
                if (i === 0) {
                    cell.innerHTML = "<input type='text' value='" + category + "' readonly>";
                } else if (i === 1) {
                    cell.innerHTML = "<input type='text' value='" + customer + "' readonly>";
                } else {
                    cell.innerHTML = "<input type='text'>";
                }
            }
        }

        function saveData() {
            var data = [];
            var table = document.getElementById("data-table").getElementsByTagName('tbody')[0];
            for (var i = 0; i < table.rows.length; i++) {
                var row = table.rows[i];
                var rowData = [];
                for (var j = 0; j < row.cells.length; j++) {
                    var cell = row.cells[j];
                    rowData.push(cell.querySelector('input').value);
                }
                data.push(rowData);
            }
            // Send data to PHP script using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "save_data.php?category=<?php echo urlencode($category); ?>&customer=<?php echo urlencode($customer); ?>", true);
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                    // Optionally, do something with the response
                }
            };
            xhr.send(JSON.stringify(data));
        }
    </script>
</body>

</html>
