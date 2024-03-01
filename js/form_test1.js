function addRow() {
  var table = document
    .getElementById("data-table")
    .getElementsByTagName("tbody")[0];
  var newRow = table.insertRow(table.rows.length);
  var category = document.getElementsByName("category")[0].value;
  var customer = document.getElementsByName("customer")[0].value;
  for (var i = 0; i < 10; i++) {
    var cell = newRow.insertCell(i);
    if (i === 0) {
      cell.innerHTML =
        "<input type='text' value='" +
        category +
        "' readonly class='form-control'>";
    } else if (i === 1) {
      cell.innerHTML =
        "<input type='text' value='" +
        customer +
        "' readonly class='form-control'>";
    } else {
      cell.innerHTML = "<input type='text' class='form-control'>";
    }
  }
  var actionCell = newRow.insertCell(10);
  actionCell.innerHTML =
    "<button class='btn btn-danger' onclick='deleteRow(this)'>Delete</button> <button class='btn btn-warning' onclick='insertRow(this)'>Insert</button>";
}

function deleteRow(btn) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);
}

function insertRow(btn) {
  var row = btn.parentNode.parentNode;
  var newRow = row.parentNode.insertRow(row.rowIndex + 0);
  var category = document.getElementsByName("category")[0].value;
  var customer = document.getElementsByName("customer")[0].value;
  for (var i = 0; i < 10; i++) {
    var cell = newRow.insertCell(i);
    if (i === 0) {
      cell.innerHTML =
        "<input type='hidden' value='" +
        category +
        "' readonly class='form-control'>";
    } else if (i === 1) {
      cell.innerHTML =
        "<input type='hidden' value='" +
        customer +
        "' readonly class='form-control'>";
    } else {
      cell.innerHTML = "<input type='text' class='form-control'>";
    }
  }
  var actionCell = newRow.insertCell(10);
  actionCell.innerHTML =
    "<button class='btn btn-danger' onclick='deleteRow(this)'>Delete</button> <button class='btn btn-warning' onclick='insertRow(this)'>Insert</button>";
}

function saveData() {
  var data = [];
  var table = document
    .getElementById("data-table")
    .getElementsByTagName("tbody")[0];
  for (var i = 0; i < table.rows.length; i++) {
    var row = table.rows[i];
    var rowData = [];
    for (var j = 0; j < row.cells.length - 1; j++) {
      var cell = row.cells[j];
      rowData.push(cell.querySelector("input").value);
    }
    data.push(rowData);
  }
  var xhr = new XMLHttpRequest();
  xhr.open(
    "POST",
    "../save_data.php?category=<?php echo urlencode($category); ?>&customer=<?php echo urlencode($customer); ?>",
    true
  );
  xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  xhr.onload = function () {
    if (xhr.status === 200) {
      Swal.fire({
        title: "Success",
        text: "Data saved successfully!",
        icon: "success",
        confirmButtonText: "Ok",
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
  var inputFields = document.querySelectorAll(
    'input[type="text"], input[type="date"]'
  );
  inputFields.forEach(function (input) {
    if (!input.hasAttribute("readonly")) {
      if (input.type === "date") {
        input.value = ""; // Reset date input
      } else {
        input.value = ""; // Reset text input
      }
    }
  });
  location.reload();
}

function calculateAndDisplay() {
  var table = document
    .getElementById("data-table")
    .getElementsByTagName("tbody")[0];
  var total = 0;
  var TotalCMOverhead = 0;
  var TotalCost = 0;
  var percentLoss =
    parseFloat(document.getElementById("percenLose").value) || 1;
  var cm = parseFloat(document.querySelector("#cm").value);
  var overhead = parseFloat(document.querySelector("#overhead").value);

  for (var i = 0; i < table.rows.length; i++) {
    var row = table.rows[i];
    var cell6 = row.cells[7].querySelector("input");
    var cell7 = row.cells[8].querySelector("input");
    var cell8 = row.cells[9].querySelector("input");
    if (cell6 && cell7 && cell8) {
      var value6 = parseFloat(cell6.value);
      var value7 = parseFloat(cell7.value);

      if (!isNaN(value6) && !isNaN(value7)) {
        var result = value6 * value7 * percentLoss;
        cell8.value = result.toFixed(4);
        total += result;
      } else {
        cell8.value = cell8.value;
      }
    }
  }
  TotalCMOverhead = cm + overhead;
  TotalCost = total + TotalCMOverhead;

  document.querySelector("#Total").value = total.toFixed(4);
  document.querySelector("#TotalCMOverhead").value = isNaN(TotalCMOverhead)
    ? "0"
    : TotalCMOverhead.toFixed(4);

  document.querySelector("#TotalCost").value = isNaN(TotalCost)
    ? "0"
    : TotalCost.toFixed(4);
}

function calculatePercenValue(type) {
  var percenInput = document.getElementById(type + "_percen").value;
  var valueInput = document.getElementById(type + "_value").value;
  var totalInput = document.getElementById(type + "_total");

  var percen = parseFloat(percenInput);
  var value = parseFloat(valueInput);

  if (!isNaN(percen)) {
    var calculatedValue = (value * percen) / 100;
    totalInput.value = calculatedValue.toFixed(4);
  } else {
    totalInput.value = value.toFixed(4);
  }
}

document.addEventListener("DOMContentLoaded", function () {
  calculateAndDisplay();
  var inputs = document.querySelectorAll(
    '#data-table tbody input[type="text"]'
  );
  inputs.forEach(function (input) {
    input.addEventListener("input", calculateAndDisplay);
  });

  calculatePercenValue();
  var inputs = document.querySelectorAll(
    '#data-table tbody input[type="text"]'
  );
  inputs.forEach(function (input) {
    input.addEventListener("input", calculatePercenValue);
  });
});

function previewImage(event) {
  var file = event.target.files[0];
  var output = document.getElementById("preview");
  var imageBinaryInput = document.getElementById("imageBinary");

  if (file) {
    var reader = new FileReader();
    reader.onload = function (e) {
      var binaryData = e.target.result;
      imageBinaryInput.value = binaryData;

      var img = new Image();
      img.src = binaryData;
      img.style.maxWidth = "100%";
      img.style.maxHeight = "100%";
      output.innerHTML = "";
      output.appendChild(img);
    };
    reader.readAsDataURL(file);
  } else {
    imageBinaryInput.value = "";
    output.innerHTML = "";
  }
}
