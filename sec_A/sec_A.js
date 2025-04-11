/* ************************************************************************************************************************************ */
/*                                                                                                                                      */
/*                                                     I. DETAILS OF THE LISTED ENTITY                                                  */
/*                                                                                                                                      */
/* ************************************************************************************************************************************ */

//1-cin validation
const cin = document.getElementById("cin").addEventListener("input", function () {
    const cinValidationMessage = document.getElementById("cinValidationMessage");
    var cinValue = this.value.toUpperCase();
    cinValue = cinValue.replace(/[^A-Z0-9]/g, '');
    // Check if the CIN is a valid format (e.g., U74140DL2014PTC272628)
    const cinRegex = /^[A-Z][0-9]{5}[A-Z]{2}[0-9]{4}[A-Z]{3}[0-9]{6}$/;
    const isValidLength = cinValue.length === 21;
    this.value = cinValue;
    if (cinRegex.test(cinValue) && isValidLength) {
        cinValidationMessage.textContent = "Valid CIN";
        cinValidationMessage.style.color = "green";
    } else {
        cinValidationMessage.textContent = "Invalid CIN format. Please enter a valid 21-character CIN(U74140DL2014PTC272628)";
        cinValidationMessage.style.color = "red";
    }
});

//2-name validation
const nameInput = document.getElementById("name");
const nameError = document.getElementById("nameValidationMessage");
nameInput.addEventListener("input", function () {
    this.value = this.value.replace(/[^A-Za-z\s.]/g, ''); // Remove characters that are NOT alphabets, spaces, or dots
    var name = nameInput.value;
    var regex = /^[A-Za-z\s.]+$/;

    if (!regex.test(name)) {
        nameError.textContent = "Only alphabets, dots, and spaces are allowed.";
        nameInput.setCustomValidity("Invalid input");
    } else {
        nameError.textContent = "";
        nameInput.setCustomValidity("");
    }
});


//3-incorporation date
var start = 1900;
var end = 2023;
var options = "";
for (var year = start; year <= end; year++) {
    options += "<option value='" + year + "'>" + year + "</option>";
}
document.getElementById("incorp_date").innerHTML = options;

//6-email validation
var emailInputs = document.querySelectorAll('input[name="email[]"]');
var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

emailInputs.forEach(function (input, index) {
    input.addEventListener("input", function () {
        var inputValue = input.value;
        var validationMessage = document.getElementById("emailValidationMessage" + (index + 1));

        if (emailRegex.test(inputValue)) {
            validationMessage.textContent = "Email address is valid.";
            validationMessage.style.color = "green";
        } else {
            validationMessage.textContent = "Please enter a valid email address.";
            validationMessage.style.color = "red";
        }
    });
});

//7-telephone validation
var telephoneInputs = document.querySelectorAll('input[name="telephone[]"]');
var telephoneRegex = /^[\d\s+\-\(\)]+$/;

telephoneInputs.forEach(function (input, index) {
    input.addEventListener("input", function () {
        var inputValue = input.value;
        var validationMessage = document.getElementById("telephoneValidationMessage" + (index + 1));

        if (telephoneRegex.test(inputValue)) {
            validationMessage.textContent = "Telephone number is valid.";
            validationMessage.style.color = "green";
        } else {
            validationMessage.textContent = "Please enter a valid telephone number.";
            validationMessage.style.color = "red";
        }
    });
});

//8-website validation
var websiteInput = document.getElementById("website");
var websiteValidationMessage = document.getElementById("websiteValidationMessage");

websiteInput.addEventListener("input", function () {
    var inputValue = websiteInput.value;

    if (isValidWebsite(inputValue)) {
        websiteValidationMessage.textContent = "Website link is valid.";
        websiteValidationMessage.style.color = "green";
    } else {
        websiteValidationMessage.textContent = "Please enter a valid website link.";
        websiteValidationMessage.style.color = "red";
    }
});
function isValidWebsite(url) {
    var pattern = /^(https?:\/\/)?[\w.-]+\.[a-zA-Z]{2,}(\/\S*)?$/;
    return pattern.test(url);
}

//9-reporting financial year validation
var start = 2019;
var end = 2023;
var options = "";
for (var year = start; year <= end; year++) {
    var fiscalYear = "FY " + year + "-" + (year.toString().substr(2, 2) * 1 + 1).toString().padStart(2, "0");
    options += "<option value='" + fiscalYear + "'>" + fiscalYear + "</option>";
}
document.getElementById("reporting_fin_year").innerHTML = options;

//9-taking value for printing year in other tables
function updateYearPlaceholders() {
    // Get the selected fiscal year
    var selectedYear = document.getElementById("reporting_fin_year").value;
    var years = selectedYear.split(" ")[1].split("-");
    var fd_year1 = parseInt(years[0], 10); // The full year (e.g., 2022)
    var year2 = parseInt(years[1], 10); // The last two digits of the following year (e.g., 23)
    var fd_year2 = 0;

    if (year2 == 0) {
        var str_temp = years[0][0] + years[0][1];
        var int_temp = parseInt(str_temp, 10);
        int_temp = int_temp + 1;
        var str_fd_year2 = int_temp.toString() + years[1];
        fd_year2 = parseInt(str_fd_year2, 10);
    }
    else {
        var str_temp = years[0][0] + years[0][1];
        var int_temp = parseInt(str_temp, 10);
        var str_fd_year2 = int_temp.toString() + years[1];
        fd_year2 = parseInt(str_fd_year2, 10);
    }

    // Calculate the previous fiscal years
    var prevYear1 = fd_year1 - 1;
    var prevYear2 = fd_year2 - 1;

    // Calculate the year before the previous fiscal years
    var yearBeforePrev1 = prevYear1 - 1;
    var yearBeforePrev2 = prevYear2 - 1;

    // Set the placeholders in the table 20
    document.getElementById("currentYearPlaceholder").textContent = selectedYear;
    document.getElementById("prevYearPlaceholder1").textContent = prevYear1;
    document.getElementById("prevYearPlaceholder2").textContent = (prevYear2 % 100) > 9 ? prevYear2 % 100 : '0' + (prevYear2 % 100).toString();
    document.getElementById("yearBeforePrevPlaceholder1").textContent = yearBeforePrev1;
    document.getElementById("yearBeforePrevPlaceholder2").textContent = (yearBeforePrev2 % 100) > 9 ? yearBeforePrev2 % 100 : '0' + (yearBeforePrev2 % 100).toString();
    // Set the placeholders in the table 23
    document.getElementById("currentYearPlaceholder_23").textContent = selectedYear;
    document.getElementById("prevYearPlaceholder1_23").textContent = prevYear1;
    document.getElementById("prevYearPlaceholder2_23").textContent = (prevYear2 % 100) > 9 ? prevYear2 % 100 : '0' + (prevYear2 % 100).toString();
}


//pdf validation
document.getElementById('incorporation_certificate').addEventListener('change', function () {
    const fileInput = this;
    const maxFileSizeInBytes = 5 * 1024 * 1024; // 5 MB
    const fileSizeMessage = document.getElementById('fileSizeMessage');
    let invalidFile = false;
    for (let i = 0; i < fileInput.files.length; i++) {
        const file = fileInput.files[i];
        if (file.size > maxFileSizeInBytes) {
            invalidFile = true;
            fileSizeMessage.textContent = 'File size exceeds the maximum allowed size of 5 MB.';
            fileInput.value = ''; // Clear the file input
            break;
        }
    }
    if (!invalidFile) {
        fileSizeMessage.textContent = ''; // Clear the message if the file is valid
    }
});

//11-paid up captital validation
var pucInput = document.getElementById("puc");
var pucValidationMessage = document.getElementById("pucValidationMessage");

pucInput.addEventListener("input", function () {
    var inputValue = pucInput.value.trim();
    var uomRegex = /^(Rs\.?|Rs-?|Rs)?\s*((\d+(,\d{2})*(,\d{1,3})*(\.\d+)?|\d+(\.\d+)?))\s*(Hundred|Thousand|Lakh|Crore|Million|Billion|Trillion|Hundreds|Thousands|Lakhs|Crores|Millions|Billions|Trillions)$/i;

    if (uomRegex.test(inputValue)) {
        pucValidationMessage.textContent = "Paid-up capital format is valid.";
        pucValidationMessage.style.color = "green";
    } else {
        pucValidationMessage.textContent = "Please enter valid paid-up capital with units (e.g., 'Rs.100 Hundred', 'Rs 10,000 Thousand', '50,242,234 Lakh', '10,023,234.5645 Crore', '2.5 Billions').";
        pucValidationMessage.style.color = "red";
    }
});

//12-point of contact(poc) validation
//Name
document.addEventListener('DOMContentLoaded', function () {
    const pocNameInput = document.getElementById("poc-name");
    const pocNameValidation = document.getElementById("poc-name-validation");

    pocNameInput.addEventListener("input", function () {
        const name = pocNameInput.value;
        const nameRegex = /^[A-Za-z0-9\-.,&: ]+$/;
        if (nameRegex.test(name)) {
            pocNameValidation.textContent = "Valid name";
            pocNameValidation.style.color = "green";
        } else {
            pocNameValidation.textContent = "Invalid name";
            pocNameValidation.style.color = "red";
        }
    });
});
//Telephone Number
document.addEventListener('DOMContentLoaded', function () {
    const pocPhoneInput = document.getElementById("poc-phone");
    const pocPhoneValidation = document.getElementById("poc-phone-validation");

    pocPhoneInput.addEventListener("input", function () {
        const phoneNumber = pocPhoneInput.value;
        const phoneRegex = /^[\d\s()+,-]+$/;

        if (phoneRegex.test(phoneNumber) && phoneNumber.length >= 8 && phoneNumber.length <= 50) {
            pocPhoneValidation.textContent = "Valid phone number";
            pocPhoneValidation.style.color = "green";
        } else {
            pocPhoneValidation.textContent = "Invalid phone number (must be 8 to 50 digits including +,-,(,)) and can add multiple phone numbers seperated by comma(+9170928506,9812342143)";
            pocPhoneValidation.style.color = "red";
        }
    });
});
//Email Address
document.addEventListener('DOMContentLoaded', function () {
    const pocEmailInput = document.getElementById("poc-email");
    const pocEmailValidation = document.getElementById("poc-email-validation");
    pocEmailInput.addEventListener("input", function () {
        const email = pocEmailInput.value;
        const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (emailRegex.test(email)) {
            pocEmailValidation.textContent = "Valid email!";
            pocEmailValidation.style.color = "green";
        } else {
            pocEmailValidation.textContent = "Invalid email ID";
            pocEmailValidation.style.color = "red";
        }
    });
});

/* ************************************************************************************************************************************ *
/*                                                                                                                                      */
/*                                                      II-PRODUCTS/SERVICES                                                                 */
/*                                                                                                                                      */
/* ************************************************************************************************************************************ */

//Validate percentages
function validateAndUpdatePercentage(input) {
    // Remove all percentage symbols first
    let value = input.value.replace(/%/g, '');

    // Remove non-numeric characters except decimal points
    value = value.replace(/[^0-9.]/g, '');

    // Ensure only one decimal point
    const decimalCount = (value.match(/\./g) || []).length;
    if (decimalCount > 1) {
        value = value.replace(/\.(?=.*\.)/g, ''); // Remove all decimal points except the last
    }

    // Limit to 100%
    const numericValue = parseFloat(value);
    if (numericValue > 100) {
        value = '100';
    }

    // Append % if not present
    if (!value.endsWith('%')) {
        value += '%';
    }

    // Remember the original cursor position
    const prevCursorPosition = input.selectionStart;

    // Update input value
    input.value = value;

    // Calculate new cursor position
    let newPosition = prevCursorPosition;

    // If the cursor was beyond the last numeric character (immediately before the %),
    // adjust it to be immediately before the %
    if (prevCursorPosition > input.value.length - 1) {
        newPosition = input.value.length - 1; // Position before '%'
    } else {
        // Adjust cursor only if editing before the '%' sign
        newPosition = Math.min(newPosition, input.value.length - 1); // Ensure cursor is before '%'
    }

    input.setSelectionRange(newPosition, newPosition);
}

function removeZero(element) {
    if (element.value === '0') {
        element.value = '';
    }
}

function addZeroIfEmpty(element) {
    if (element.value === '') {
        element.value = '0';
    }
}

function removeZeroPercentage(element) {
    if (element.value === '0%') {
        element.value = '%';
        setTimeout(function () {
            element.setSelectionRange(0, 0);
        }, 50);
    }
    else {
        const newPosition = element.value.length - 1;
        setTimeout(function () {
            element.setSelectionRange(newPosition, newPosition);
        }, 50);
    }
}

function addZeroIfEmptyPercentage(element) {
    if (element.value === '%') {
        element.value = '0%';
    }
}

function limitInputsToPositiveOrOverwriteDash() {
    // Find all input fields of type number in the document
    const numberInputs = document.querySelectorAll('input[type="number"]');

    numberInputs.forEach(input => {
        input.addEventListener('input', function () {
            let value = this.value;

            // If the value starts with a dash and has more characters, check further
            if (value.startsWith('-')) {
                // If there's any digit after a dash, remove the dash
                if (value.length > 1) {
                    this.value = value.substring(1);
                }
            }
        });
    });
}


document.addEventListener('DOMContentLoaded', function () {
    limitInputsToPositiveOrOverwriteDash();
});

/* ************************************************************************************************************************************ *
/*                                                                                                                                      */
/*                                                      III-OPERATIONS                                                                  */
/*                                                                                                                                      */
/* ************************************************************************************************************************************ */

//16-Number of locations
function calculate16(input) {
    var row = input.parentNode.parentNode; // Get the parent row
    var inputs = row.querySelectorAll('.nol-input');
    var totalInput = row.querySelector('.nol-total');

    var total = 0;
    for (var i = 0; i < inputs.length; i++) {
        total += parseInt(inputs[i].value) || 0;
    }
    totalInput.value = total;
}

/* ************************************************************************************************************************************ *
/*                                                                                                                                      */
/*                                                      IV-Employees                                                                    */
/*                                                                                                                                      */
/* ************************************************************************************************************************************ */

//18a-Details of Employees & Workers

// Function to calculate column totals for a specific section of the table
function calculateColumnTotalsForSection18a(tableId, startRowIndex, endRowIndex, totalRowIndex) {
    var table = document.getElementById(tableId);

    // Object to hold the sum of each column
    var columnSums = {};

    // Initialize column sums
    for (var i = 1; i < table.rows[startRowIndex].cells.length; i++) {
        columnSums[i] = 0;
    }

    // Calculate sums for each column
    for (var rowIndex = startRowIndex; rowIndex <= endRowIndex; rowIndex++) {
        var cells = table.rows[rowIndex].cells;
        for (var colIndex = 2; colIndex < cells.length; colIndex++) {
            var input = cells[colIndex].querySelector('input');
            if (input && !input.hasAttribute('readonly')) { // Sum only the input fields that are not readonly
                var value = parseFloat(input.value) || 0;
                columnSums[colIndex] += value;
            }
        }
    }

    // Update the totals in the 'Total' row
    var totalCells = table.rows[totalRowIndex].cells;
    for (var colIndex = 2; colIndex < totalCells.length; colIndex++) {
        if (columnSums[colIndex] !== undefined) { // Update only if a sum has been calculated
            var totalInput = totalCells[colIndex].querySelector('input');
            if (totalInput) { // If there's an input field, update it
                totalInput.value = columnSums[colIndex];
            }
        }
    }
    var row = table.rows[totalRowIndex];

    // var totalA = parseFloat(row.cells[2].querySelector('input').value) || 0;
    var noB = parseFloat(row.cells[3].querySelector('input').value) || 0;
    var noC = parseFloat(row.cells[5].querySelector('input').value) || 0;
    var totalA = noB + noC;
    row.cells[2].querySelector('input').value = totalA;

    // Calculate percentages and update the respective cells
    row.cells[4].querySelector('input').value = calculatePercentage(noB, totalA);
    row.cells[6].querySelector('input').value = calculatePercentage(noC, totalA);
}

// Calculate totals for each section when the page loads and when values change
window.onload = function () {
    calculateSectionTotals18a();
};

function calculateSectionTotals18a() {
    // 'Permanent employees' section is from row 4 to 5, and its 'Total' is at row 6
    calculateColumnTotalsForSection18a('p_dew', 3, 4, 5);
    // 'Other than Permanent employees' section is from row 7 to 8, and its 'Total' is at row 9
    calculateColumnTotalsForSection18a('p_dew', 7, 8, 9);
}

// Function to calculate percentages
function calculatePercentages18a(tableId, rowIndex) {
    var table = document.getElementById(tableId);
    var row = table.rows[rowIndex];

    // var totalA = parseFloat(row.cells[2].querySelector('input').value) || 0;
    var noB = parseFloat(row.cells[3].querySelector('input').value) || 0;
    var noC = parseFloat(row.cells[5].querySelector('input').value) || 0;
    var totalA = noB + noC;
    row.cells[2].querySelector('input').value = totalA;

    // Calculate percentages and update the respective cells
    row.cells[4].querySelector('input').value = calculatePercentage(noB, totalA);
    row.cells[6].querySelector('input').value = calculatePercentage(noC, totalA);
    calculateSectionTotals18a();
}

// Function to calculate percentages
function calculatePercentage(a, b) {
    if (b === 0) {
        return '0%';
    }
    var percentage = (a / b) * 100;
    return percentage.toFixed(2) + '%';
}
/*************************************************************************************************************************************/

//18b-Differently abled employees and workers
// Function to calculate column totals for a specific section of the table
function calculateColumnTotalsForSection18b(tableId, startRowIndex, endRowIndex, totalRowIndex) {
    var table = document.getElementById(tableId);

    // Object to hold the sum of each column
    var columnSums = {};

    // Initialize column sums
    for (var i = 1; i < table.rows[startRowIndex].cells.length; i++) {
        columnSums[i] = 0;
    }

    // Calculate sums for each column
    for (var rowIndex = startRowIndex; rowIndex <= endRowIndex; rowIndex++) {
        var cells = table.rows[rowIndex].cells;
        for (var colIndex = 2; colIndex < cells.length; colIndex++) {
            var input = cells[colIndex].querySelector('input');
            if (input && !input.hasAttribute('readonly')) { // Sum only the input fields that are not readonly
                var value = parseFloat(input.value) || 0;
                columnSums[colIndex] += value;
            }
        }
    }

    // Update the totals in the 'Total' row
    var totalCells = table.rows[totalRowIndex].cells;
    for (var colIndex = 2; colIndex < totalCells.length; colIndex++) {
        if (columnSums[colIndex] !== undefined) { // Update only if a sum has been calculated
            var totalInput = totalCells[colIndex].querySelector('input');
            if (totalInput) { // If there's an input field, update it
                totalInput.value = columnSums[colIndex];
            }
        }
    }
    var row = table.rows[totalRowIndex];

    // var totalA = parseFloat(row.cells[2].querySelector('input').value) || 0;
    var noB = parseFloat(row.cells[3].querySelector('input').value) || 0;
    var noC = parseFloat(row.cells[5].querySelector('input').value) || 0;
    var totalA = noB + noC;
    row.cells[2].querySelector('input').value = totalA;

    // Calculate percentages and update the respective cells
    row.cells[4].querySelector('input').value = calculatePercentage(noB, totalA);
    row.cells[6].querySelector('input').value = calculatePercentage(noC, totalA);
}

// Calculate totals for each section when the page loads and when values change
window.onload = function () {
    calculateSectionTotals18b();
};

function calculateSectionTotals18b() {
    // 'Permanent employees' section is from row 4 to 5, and its 'Total' is at row 6
    calculateColumnTotalsForSection18b('p_dewda', 3, 4, 5);
    // 'Other than Permanent employees' section is from row 7 to 8, and its 'Total' is at row 9
    calculateColumnTotalsForSection18b('p_dewda', 7, 8, 9);
}

// Function to calculate percentages
function calculatePercentages18b(tableId, rowIndex) {
    var table = document.getElementById(tableId);
    var row = table.rows[rowIndex];

    // var totalA = parseFloat(row.cells[2].querySelector('input').value) || 0;
    var noB = parseFloat(row.cells[3].querySelector('input').value) || 0;
    var noC = parseFloat(row.cells[5].querySelector('input').value) || 0;
    var totalA = noB + noC;
    row.cells[2].querySelector('input').value = totalA;

    // Calculate percentages and update the respective cells
    row.cells[4].querySelector('input').value = calculatePercentage(noB, totalA);
    row.cells[6].querySelector('input').value = calculatePercentage(noC, totalA);
    calculateSectionTotals18b();
}

//19-Participation/Inclusion/Representation of Women
function calculate19(input) {
    var row = input.closest('tr'); // Get the closest parent row
    var A = parseInt(row.cells[1].querySelector('input').value) || 0;
    var B = parseInt(row.cells[2].querySelector('input').value) || 0;
    var per = calculatePercentage(B, A);

    row.cells[3].querySelector('input').value = per;
}

//20 - Validate numbers
function validateInput(input) {
    // Get the current value of the input field
    let value = input.value;

    // Remove any non-numeric characters except decimals and asterisks from the input value
    value = value.replace(/[^0-9.*]/g, '');

    // Ensure that there is only one decimal point
    const decimalCount = (value.match(/\./g) || []).length;
    if (decimalCount > 1) {
        value = value.substr(0, value.lastIndexOf('.'));
    }
    // If there is an asterisk in the value, remove any characters after the first asterisk
    if (value.includes('*')) {
        value = value.substring(0, value.indexOf('*') + 1); // +1 to include the asterisk
    }

    // Update the value of the input field
    input.value = value;
}


/* ************************************************************************************************************************************ *
/*                                                                                                                                      */
/*                                                      VI. CSR Details                                                                 */
/*                                                                                                                                      */
/* ************************************************************************************************************************************ */

//turnover validation
function validateTurnoverById(inputId, validationMessageId) {
    var input = document.getElementById(inputId);
    var validationMessage = document.getElementById(validationMessageId);

    input.addEventListener("input", function () {
        var inputValue = input.value.trim();
        var uomRegex = /^(Rs\.?|Rs-?|Rs)?\s*((\d+(,\d{2})*(,\d{1,3})*(\.\d+)?))\s*(Hundred|Thousand|Lakh|Crore|Million|Billion|Trillion|Hundreds|Thousands|Lakhs|Crores|Millions|Billions|Trillions)?$/i;

        //internation system
        //var uomRegex = /^(Rs\.?|Rs-?|Rs)?\s*\d{1,3}(,\d{3})*(\.\d+)? (Hundred|Thousand|Lakh|Crore|Million|Billion|Trillion|Hundreds|Thousands|Lakhs|Crores|Millions|Billions|Trillions)$/i;
        if (uomRegex.test(inputValue)) {
            validationMessage.textContent = "Format is valid.";
            validationMessage.style.color = "green";
        } else {
            validationMessage.textContent = "Please enter valid turnover with units (e.g., 'Rs.100 Hundred', 'Rs 10,000 Thousand', '50,22,234 Lakh', '10,03,234.5645 Crore', '2.5 Billions').";
            validationMessage.style.color = "red";
        }
    });
}

// Example usage:
validateTurnoverById("csr_turnover", "csr_turnoverValidationMessage");
validateTurnoverById("csr_networth", "csr_networthValidationMessage");


/* ************************************************************************************************************************************ *
/*                                                                                                                                      */
/*                                             VII. Transparency and Disclosures Compliances                                            */
/*                                                                                                                                      */
/* ************************************************************************************************************************************ */  


/* ************************************************************************************************************************************ */
/*                                                                                                                                      */
/*                                                           Table row addition-START                                                   */
/*                                                                                                                                      */
/* ************************************************************************************************************************************ */

// Function to add a new row at the bottom of the table
function addBottomRow(Id) {
    const table = document.querySelector(`#${Id} table tbody`);
    const rows = table.getElementsByTagName("tr");
    const lastRow = rows[rows.length - 1].cloneNode(true);

    // Increment the S.No. in the new row
    const lastSNo = parseInt(rows[rows.length - 1].cells[0].getElementsByTagName("input")[0].value);
    lastRow.cells[0].getElementsByTagName("input")[0].value = lastSNo + 1;

    // Clear other input fields in the new row
    const clearFields = (row) => {
        const inputs = row.getElementsByTagName("input");
        const textareas = row.getElementsByTagName("textarea");

        for (let i = 1; i < inputs.length; i++) {
            if (inputs[i].value.endsWith("%")) {
                inputs[i].value = "0%";
            }
            else if (inputs[i].value.endsWith("0")) {
                inputs[i].value = "0";
            }
            else {
                inputs[i].value = "";
            }
        }

        for (let i = 0; i < textareas.length; i++) { // Modified to start from 0 for textareas
            if (textareas[i].value.endsWith("%")) {
                textareas[i].value = "0%";
            }
            else if (textareas[i].value.endsWith("0")) {
                textareas[i].value = "0";
            }
            else {
                textareas[i].value = "";
            }
        }
    };

    // Clear the fields in the new row
    clearFields(lastRow);

    // Add the new row at the bottom
    table.appendChild(lastRow);

    updateSNoValues(Id);
}

// Function to remove a specific row from the table with confirmation
function removeSpecificRow(Id) {
    const indexInput = document.getElementById(`indexInput_${Id}`);
    const parsedIndex = parseInt(indexInput.value);

    if (!isNaN(parsedIndex) && parsedIndex > 1) {
        const table = document.querySelector(`#${Id} table tbody`);
        const rows = table.getElementsByTagName("tr");

        if (parsedIndex <= rows.length) {
            // Ask for confirmation before removing the row
            if (confirm("Are you sure you want to remove this row?")) {
                table.removeChild(rows[parsedIndex - 1]);

                // Update the S.No. values in the table
                updateSNoValues(Id);
            }
        } else {
            alert("Invalid S.No. The specified row does not exist.");
        }
    } else if (parsedIndex === 1) {
        alert("Cannot remove the first row. Please enter a valid S.No. greater than 1.");
    } else {
        alert("Invalid S.No. Please enter a valid S.No.");
    }

    // Clear the input value after removing the row
    indexInput.value = "";
}

// Function to remove the last row from the table with confirmation
function removeBottomRow(Id) {
    const table = document.querySelector(`#${Id} table tbody`);
    const rows = table.getElementsByTagName("tr");

    if (rows.length > 1) { // Ensure there is more than one row
        // Ask for confirmation before removing the row
        if (confirm("Are you sure you want to remove the last row?")) {
            table.removeChild(rows[rows.length - 1]);

            // Update the S.No. values in the table
            updateSNoValues(Id);
        }
    }
}

// Function to add a new row at a specific index
function addRowAtIndex(Id) {
    const indexInput = document.getElementById(`indexInput_${Id}`);
    const parsedIndex = parseInt(indexInput.value);

    if (!isNaN(parsedIndex) && parsedIndex >= 1) {
        const table = document.querySelector(`#${Id} table tbody`);
        const rows = table.getElementsByTagName("tr");
        const newRow = rows[rows.length - 1].cloneNode(true);

        // Clear other input fields in the new row
        const clearFields = (row) => {
            const inputs = row.getElementsByTagName("input");
            const textareas = row.getElementsByTagName("textarea");

            for (let i = 1; i < inputs.length; i++) {
                if (inputs[i].value.endsWith("%")) {
                    inputs[i].value = "0%";
                }
                else if (inputs[i].value.endsWith("0")) {
                    inputs[i].value = "0";
                }
                else {
                    inputs[i].value = "";
                }
            }

            for (let i = 0; i < textareas.length; i++) { // Modified to start from 0 for textareas
                if (textareas[i].value.endsWith("%")) {
                    textareas[i].value = "0%";
                }
                else if (textareas[i].value.endsWith("0")) {
                    textareas[i].value = "0";
                }
                else {
                    textareas[i].value = "";
                }
            }
        };

        // Clear the fields in the new row
        clearFields(newRow);

        // Add the new row at the specified index
        if (parsedIndex === 1) {
            // Insert at the beginning
            table.insertBefore(newRow, rows[0]);
        } else if (parsedIndex <= rows.length) {
            // Insert at the specified index (parsedIndex - 1 for 0-based index)
            table.insertBefore(newRow, rows[parsedIndex - 1]);
        } else {
            // Insert at the end
            table.appendChild(newRow);
        }

        // Update the S.No. for all rows in the table
        updateSNoValues(Id);
    } else {
        alert("Invalid S.No. Please enter a valid S.No. greater than or equal to 1.");
    }

    // Clear the input value after adding the row
    indexInput.value = "";
}


// Function to update S.No. values in the table
function updateSNoValues(Id) {
    const table = document.querySelector(`#${Id} table tbody`);
    const rows = table.getElementsByTagName("tr");

    // Update S.No. values for all rows in the table
    for (let i = 0; i < rows.length; i++) {
        rows[i].cells[0].getElementsByTagName("input")[0].value = i + 1;
    }
}

/* ************************************************************************************************************************************ */
/*                                                                                                                                      */
/*                                         Function to display floating readonly fields                                                 */
/*                                                                                                                                      */
/* ************************************************************************************************************************************ */
document.addEventListener('DOMContentLoaded', function () {
    const floatingMessage = document.getElementById('floatingMessage');
    const readOnlyFields = document.querySelectorAll('input[readonly]');

    // Function to position the floating message near the mouse
    function positionMessageNearMouse(event) {
        floatingMessage.style.left = event.pageX + 10 + 'px'; // Offset by 10px from mouse
        floatingMessage.style.top = event.pageY + 10 + 'px';
        floatingMessage.style.display = 'block';
    }

    // Show floating message near readonly input fields on focus
    readOnlyFields.forEach(field => {
        field.addEventListener('focus', (event) => {
            const rect = event.target.getBoundingClientRect();
            floatingMessage.style.left = rect.left + window.scrollX + 'px';
            floatingMessage.style.top = rect.bottom + window.scrollY + 10 + 'px'; // Offset by 10px
            floatingMessage.style.display = 'block';
        });

        field.addEventListener('blur', () => {
            floatingMessage.style.display = 'none';
        });
    });

    // Optional: Show floating message near the mouse when it moves over the readonly input fields
    readOnlyFields.forEach(field => {
        field.addEventListener('mousemove', positionMessageNearMouse);
        field.addEventListener('mouseleave', () => {
            floatingMessage.style.display = 'none';
        });
    });
});


/* ************************************************************************************************************************************ */
/*                                                                                                                                      */
/*                                         Function to make sure you really want to submit the form                                     */
/*                                                                                                                                      */
/* ************************************************************************************************************************************ */
function confirmSubmission() {
    // You can add additional validation or actions before final submission
    return confirm('Are you sure you want to submit the form?');
}