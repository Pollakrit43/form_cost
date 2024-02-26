function deleteRow(button) {
  var row = button.parentNode.parentNode;
  row.parentNode.removeChild(row);
}

function insertRow(button) {
  var tbody = document.getElementById("insertTbody");
  var newRow = tbody.insertRow();

  for (var i = 0; i < 5; i++) {
    var cell = newRow.insertCell(i);
    cell.contentEditable = true;
    cell.appendChild(document.createTextNode(""));
    cell.oninput = function () {
      calculate(this);
    };
  }

  var fabricCodesCell = newRow.insertCell();
  fabricCodesCell.contentEditable = true;
  fabricCodesCell.className = "fabric-codes-cell";

  var fabricCodesInput = document.createElement("input");
  fabricCodesInput.setAttribute("list", "fabricCode");
  fabricCodesInput.setAttribute("name", "fabricCodes");
  fabricCodesInput.className = "fabric-codes-input";

  var fabricCodeDatalist = document.createElement("datalist");
  fabricCodeDatalist.id = "fabricCode";

  var datalistOptions = ["A094", "A213", "ALML01"];
  datalistOptions.forEach(function (optionText) {
    var option = document.createElement("option");
    option.value = optionText;
    fabricCodeDatalist.appendChild(option);
  });

  fabricCodesCell.appendChild(fabricCodesInput);
  fabricCodesCell.appendChild(fabricCodeDatalist);

  var customFabricCodesCell = newRow.insertCell();
  customFabricCodesCell.contentEditable = true;
  customFabricCodesCell.className = "custom-fabric-codes-cell";

  var customFabricCodesInput = document.createElement("input");
  customFabricCodesInput.setAttribute("list", "customFabricCodeDetail");
  customFabricCodesInput.setAttribute("name", "customFabricCodeDetails");
  customFabricCodesInput.className = "custom-fabric-codes-input";

  var customFabricCodeDatalist = document.createElement("datalist");
  customFabricCodeDatalist.id = "customFabricCodeDetail";

  var customDatalistOptions = [
    "100%POLY SOLID INTERLOCK 70&quot;,135 GSM",
    "100%POLY AOP INTERLOCK 70&quot;,135 GSM",
    "100%POLY TRICOT 60&quot;,80 GSM",
    "100%MICRO POLY 72&quot;, 125 GSM",
  ];
  customDatalistOptions.forEach(function (optionText) {
    var option = document.createElement("option");
    option.value = optionText;
    customFabricCodeDatalist.appendChild(option);
  });

  customFabricCodesCell.appendChild(customFabricCodesInput);
  customFabricCodesCell.appendChild(customFabricCodeDatalist);

  var resultCell = newRow.insertCell();
  resultCell.className = "result";

  var deleteButtonCell = newRow.insertCell();
  var deleteButton = document.createElement("button");
  deleteButton.innerHTML = "ลบแถว";
  deleteButton.onclick = function () {
    deleteRow(this);
  };
  deleteButton.className = "delete-button";
  deleteButtonCell.appendChild(deleteButton);

  var addButtonCell = newRow.insertCell();
  var addButton = document.createElement("button");
  addButton.innerHTML = "เพิ่มแถว";
  addButton.onclick = function () {
    insertRow(this);
  };
  addButton.className = "add-button";
  addButtonCell.appendChild(addButton);

  button.closest('tr').insertAdjacentElement('afterend', newRow);
}

function previewImage(input) {
  // Get the image element and the selected file
  var image = document.getElementById("uploadedImage");
  var fileInput = input.files[0];

  if (fileInput) {
    var reader = new FileReader();

    // Set up a callback to display the image preview
    reader.onload = function (e) {
      image.src = e.target.result;
      image.style.display = "block";
      image.style.width = "200px"; // Set the desired width
      image.style.height = "150px"; // Set the desired height
    };

    // Read the selected file as a data URL
    reader.readAsDataURL(fileInput);
  }
}

function calculate(cell) {
  var row = cell.parentNode;

  // Extract values from specified cells (6th and 7th cells) or default to 0
  var value1 = parseFloat(row.cells[6].innerText) || 0;
  var value2 = parseFloat(row.cells[5].innerText) || 0;

  // Get the percentage input value
  var percentLoss =
    parseFloat(document.getElementById("percenLose").value) || 1; // Default to 1 if no value is provided

  // Calculate the sum with percentage loss and display it in the 8th cell
  var result = value2 * value1 * percentLoss;
  row.cells[7].innerText = result.toFixed(4);

  updateSum();
}

function updateSum() {
  var sum = 0;

  // Get all elements with class "result"
  var resultCells = document.getElementsByClassName("result");

  // Loop through all elements and sum up their values
  for (var i = 0; i < resultCells.length; i++) {
    var value8 = parseFloat(resultCells[i].innerText) || 0;
    sum += value8;
  }

  // Display the sum in the specified <td> with id "sumCell"
  document.getElementById("sumCell").innerText = sum.toFixed(4);
}

function calculateTotal() {
  var sum = 0;
  var totalReCells = document.getElementsByClassName("totalRe");

  for (var i = 0; i < totalReCells.length; i++) {
    var value = parseFloat(totalReCells[i].innerText) || 0;
    sum += value;
  }

  // Display the sum in the totalResult cell
  var totalResultCell = document.querySelector(".totalResult");
  totalResultCell.innerText = sum.toFixed(4);
}

// Call calculateTotal when the page loads and whenever the totalRe cells are updated
document.addEventListener("DOMContentLoaded", function () {
  calculateTotal();
});

// Add event listeners to totalRe cells for auto-update
var totalReCells = document.getElementsByClassName("totalRe");
for (var i = 0; i < totalReCells.length; i++) {
  totalReCells[i].addEventListener("input", function () {
    calculateTotal();
  });
}

// Function to calculate the product of totalResult and totalCostPro
function calculateTotalCostProfit() {
  var totalResultCellProfit = document.querySelector(".totalResult");
  var totalCostProCellProfit = document.querySelector(".totalCostPro");
  var totalCostProfitCell = document.querySelector(".totalCostProfit");

  var totalResult = parseFloat(totalResultCellProfit.innerText) || 0;
  var totalCostPro = parseFloat(totalCostProCellProfit.innerText) || 0;

  // Calculate the product and display in totalCostProfit cell
  var resultProfit = totalResult * totalCostPro;
  totalCostProfitCell.innerText = resultProfit.toFixed(4);
  console.log(resultProfit);
}

// Call calculateTotalCostProfit when the page loads and whenever relevant cells are updated
document.addEventListener("DOMContentLoaded", function () {
  calculateTotalCostProfit();
});

// Add event listeners to relevant cells for auto-update
var totalResultCellProfit = document.querySelector(".totalResult");
var totalCostProCellProfit = document.querySelector(".totalCostPro");

totalResultCellProfit.addEventListener("input", function () {
  calculateTotalCostProfit();
});

totalCostProCellProfit.addEventListener("input", function () {
  calculateTotalCostProfit();
});

function calculateTotalFob() {
  var resultCellFob = document.querySelector(".totalResult");
  var costProfitCellFob = document.querySelector(".totalCostProfit");
  var fobCell = document.querySelector(".totalFob");

  var totalResultFob = parseFloat(resultCellFob.innerText) || 0;
  var totalCostProfitFob = parseFloat(costProfitCellFob.innerText) || 0;

  var sumFob = totalResultFob + totalCostProfitFob;
  fobCell.innerText = sumFob.toFixed(4);
}

document.addEventListener("DOMContentLoaded", function () {
  calculateTotalFob();
});

var resultCellFob = document.querySelector(".totalResult");
var costProfitCellFob = document.querySelector(".totalCostProfit");

resultCellFob.addEventListener("input", function () {
  calculateTotalFob();
});

costProfitCellFob.addEventListener("input", function () {
  calculateTotalFob();
});

var fabricCodesInputs = document.querySelectorAll(".fabric-codes-input");

fabricCodesInputs.forEach(function (input, index) {
  input.addEventListener("input", function () {
    console.log("Row " + (index + 1) + " Fabric Codes Value:", this.value);
  });
});
