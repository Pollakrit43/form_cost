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
          resetForm();
        }
      });
    }
  };
  xhr.send(JSON.stringify(data));
}

function resetForm() {
  // var inputFields = document.querySelectorAll(
  //   'input[type="text"], input[type="date"]'
  // );
  // inputFields.forEach(function (input) {
  //   if (!input.hasAttribute("readonly")) {
  //     if (input.type === "date") {
  //       input.value = "";
  //     } else {
  //       input.value = "";
  //     }
  //   }
  // });
  // location.reload();
  window.location.href = window.location.href;
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
  var cm = parseFloat(document.querySelector("#cm").value) || 0;
  var overhead = parseFloat(document.querySelector("#overhead").value) || 0;

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

function calculatePercenValue() {
  var totalCosttotal = 0;
  var totalCostFinal = 0;
  var inputDocumentation_percen =
    parseFloat(document.getElementById("documentation_percen").value) || 0;
  var inputDocumentation_value =
    parseFloat(document.getElementById("documentation_value").value) || 0;
  var documentation_total =
    inputDocumentation_percen !== 0
      ? (inputDocumentation_percen * inputDocumentation_value) / 100
      : inputDocumentation_value;
  document.getElementById("documentation_total").value =
    documentation_total.toFixed(4);

  var inputGarment_percen =
    parseFloat(document.getElementById("garment_percen").value) || 0;
  var inputGarment_value =
    parseFloat(document.getElementById("garment_value").value) || 0;
  var garment_total =
    inputGarment_percen !== 0
      ? (inputGarment_percen * inputGarment_value) / 100
      : inputGarment_value;
  document.getElementById("garment_total").value = garment_total.toFixed(4);

  var inputFactory_percen =
    parseFloat(document.getElementById("factory_percen").value) || 0;
  var inputFactory_value =
    parseFloat(document.getElementById("factory_value").value) || 0;
  var factory_total =
    inputFactory_percen !== 0
      ? (inputFactory_percen * inputFactory_value) / 100
      : inputFactory_value;
  document.getElementById("factory_total").value = factory_total.toFixed(4);

  var inputGt_percen =
    parseFloat(document.getElementById("gt_percen").value) || 0;
  var inputGt_value =
    parseFloat(document.getElementById("gt_value").value) || 0;
  var gt_total =
    inputGt_percen !== 0
      ? (inputGt_percen * inputGt_value) / 100
      : inputGt_value;
  document.getElementById("gt_total").value = gt_total.toFixed(4);

  var inputProfit_percen =
    parseFloat(document.getElementById("profit_percen").value) || 0;
  var inputProfit_value =
    parseFloat(document.getElementById("profit_value").value) || 0;
  var profit_total =
    inputProfit_percen !== 0
      ? (inputProfit_percen * inputProfit_value) / 100
      : inputProfit_value;
  document.getElementById("profit_total").value = profit_total.toFixed(4);

  var inputMiscellaneous_percen =
    parseFloat(document.getElementById("miscellaneous_percen").value) || 0;
  var inputMiscellaneous_value =
    parseFloat(document.getElementById("miscellaneous_value").value) || 0;
  var miscellaneous_total =
    inputMiscellaneous_percen !== 0
      ? (inputMiscellaneous_percen * inputMiscellaneous_value) / 100
      : inputMiscellaneous_value;
  document.getElementById("miscellaneous_total").value =
    miscellaneous_total.toFixed(4);

  totalCosttotal =
    documentation_total +
    garment_total +
    gt_total +
    factory_total +
    profit_total +
    miscellaneous_total;

  document.getElementById("TotalCostTotal").value = totalCosttotal.toFixed(4);

  var totalCostInput = parseFloat(document.getElementById("TotalCost").value);
  var totalCostTotalInput = parseFloat(
    document.getElementById("TotalCostTotal").value
  );
  var totalCostFinal = totalCostInput + totalCostTotalInput;
  document.getElementById("TotalCostFinal").value = totalCostFinal.toFixed(4);
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

  var selectButton = document.querySelector(
    "#exampleModal .modal-footer .btn-primary"
  );
  selectButton.addEventListener("click", function () {
    var selectedValue = document.querySelector(
      "#exampleModal #quantityRange"
    ).value;
    var overheadInput = document.querySelector("tr input#overhead");
    overheadInput.value = selectedValue;
    calculateAndDisplay();
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

      // console.log(e.target.result)

      var img = new Image();
      img.src =  imageBinaryInput.value;
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
