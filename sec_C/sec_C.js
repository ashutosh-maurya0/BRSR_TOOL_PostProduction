/* ************************************************************************************************************************************ */
/*                                                                                                                                      */
/*                                                           Yes/No based label visibility                                              */
/*                                                                                                                                      */
/* ************************************************************************************************************************************ */

//Principle 1

//LI 7
document.getElementById('conflictOfInterest').addEventListener('change', function () {
    var conflictDetails = document.getElementById('conflictDetails');
    if (this.value === 'Yes') {
        conflictDetails.classList.remove('hidden');
    } else {
        conflictDetails.classList.add('hidden');
    }
});

//Principle 2

//EI 4
document.getElementById('eprApplicable').addEventListener('change', function () {
    var eprCollectionPlan = document.getElementById('eprCollectionPlan');
    if (this.value === 'Yes' || this.value === 'No') {
        eprCollectionPlan.classList.remove('hidden');
    } else {
        eprCollectionPlan.classList.add('hidden');
    }
});

//LI 1
document.getElementById('lcaConducted2').addEventListener('change', function () {
    var lcaDetails = document.getElementById('lcaDetails');
    if (this.value === 'Yes') {
        lcaDetails.classList.remove('hidden');
    } else {
        lcaDetails.classList.add('hidden');
    }
});

//Principle 3

//EI 10a
document.getElementById('healthSafetyManagementSystemChoice').addEventListener('change', function () {
    var healthSafetyManagementSystemDetails = document.getElementById('healthSafetyManagementSystemDetails');
    if (this.value === 'Yes') {
        healthSafetyManagementSystemDetails.classList.remove('hidden');
    } else {
        healthSafetyManagementSystemDetails.classList.add('hidden');
    }
});

//LI 4
document.getElementById('transitionAssistanceProgram').addEventListener('change', function () {
    var transitionAssistanceProgramDetails = document.getElementById('transitionAssistanceProgramDetails');
    if (this.value === 'Yes') {
        transitionAssistanceProgramDetails.classList.remove('hidden');
    } else {
        transitionAssistanceProgramDetails.classList.add('hidden');
    }
});

//Principle 5

//EI 4
document.getElementById('humanRightsResponsible').addEventListener('change', function () {
    var humanRightsResponsibleDetails = document.getElementById('humanRightsResponsibleDetails');
    if (this.value === 'Yes') {
        humanRightsResponsibleDetails.classList.remove('hidden');
    } else {
        humanRightsResponsibleDetails.classList.add('hidden');
    }
});

//EI 8
document.getElementById('humanRightsInBusiness').addEventListener('change', function () {
    var humanRightsInBusinessDetails = document.getElementById('humanRightsInBusinessDetails');
    if (this.value === 'Yes') {
        humanRightsInBusinessDetails.classList.remove('hidden');
    } else {
        humanRightsInBusinessDetails.classList.add('hidden');
    }
});

//Principle 6

//EI 1.2
document.getElementById('energyExternalAgency').addEventListener('change', function () {
    var energyExternalAgencyName = document.getElementById('energyExternalAgencyName');
    if (this.value === 'Yes') {
        energyExternalAgencyName.classList.remove('hidden');
    } else {
        energyExternalAgencyName.classList.add('hidden');
    }
});

//EI 2
document.getElementById('designatedConsumers').addEventListener('change', function () {
    var designatedConsumersDetails = document.getElementById('designatedConsumersDetails');
    if (this.value === 'Yes') {
        designatedConsumersDetails.classList.remove('hidden');
    } else {
        designatedConsumersDetails.classList.add('hidden');
    }
});

//EI 3.2
document.getElementById('waterExternalAgency').addEventListener('change', function () {
    var waterExternalAgencyName = document.getElementById('waterExternalAgencyName');
    if (this.value === 'Yes') {
        waterExternalAgencyName.classList.remove('hidden');
    } else {
        waterExternalAgencyName.classList.add('hidden');
    }
});

//EI 4
document.getElementById('liquidDischarge').addEventListener('change', function () {
    var liquidDischargeDetails = document.getElementById('liquidDischargeDetails');
    if (this.value === 'Yes') {
        liquidDischargeDetails.classList.remove('hidden');
    } else {
        liquidDischargeDetails.classList.add('hidden');
    }
});

//EI 5.2
document.getElementById('airExternalAgency').addEventListener('change', function () {
    var airExternalAgencyName = document.getElementById('airExternalAgencyName');
    if (this.value === 'Yes') {
        airExternalAgencyName.classList.remove('hidden');
    } else {
        airExternalAgencyName.classList.add('hidden');
    }
});

//EI 6.2
document.getElementById('ghgExternalAgency').addEventListener('change', function () {
    var ghgExternalAgencyName = document.getElementById('ghgExternalAgencyName');
    if (this.value === 'Yes') {
        ghgExternalAgencyName.classList.remove('hidden');
    } else {
        ghgExternalAgencyName.classList.add('hidden');
    }
});

//EI 7
document.getElementById('ghgReductionProject').addEventListener('change', function () {
    var ghgReductionProjectDetails = document.getElementById('ghgReductionProjectDetails');
    if (this.value === 'Yes') {
        ghgReductionProjectDetails.classList.remove('hidden');
    } else {
        ghgReductionProjectDetails.classList.add('hidden');
    }
});

//EI 8.2
document.getElementById('wasteExternalAgency').addEventListener('change', function () {
    var wasteExternalAgencyName = document.getElementById('wasteExternalAgencyName');
    if (this.value === 'Yes') {
        wasteExternalAgencyName.classList.remove('hidden');
    } else {
        wasteExternalAgencyName.classList.add('hidden');
    }
});

//LI 1.2
document.getElementById('totalenergyconsumedAgency').addEventListener('change', function () {
    var totalenergyconsumedAgencyName = document.getElementById('totalenergyconsumedAgencyName');
    if (this.value === 'Yes') {
        totalenergyconsumedAgencyName.classList.remove('hidden');
    } else {
        totalenergyconsumedAgencyName.classList.add('hidden');
    }
});

//LI 2.2
document.getElementById('waterdischargedAgency').addEventListener('change', function () {
    var waterdischargedAgencyName = document.getElementById('waterdischargedAgencyName');
    if (this.value === 'Yes') {
        waterdischargedAgencyName.classList.remove('hidden');
    } else {
        waterdischargedAgencyName.classList.add('hidden');
    }
});

//LI 3.2
document.getElementById('waterstressAgency').addEventListener('change', function () {
    var waterstressAgencyName = document.getElementById('waterstressAgencyName');
    if (this.value === 'Yes') {
        waterstressAgencyName.classList.remove('hidden');
    } else {
        waterstressAgencyName.classList.add('hidden');
    }
});

//LI 4.2
document.getElementById('totalscopeAgency').addEventListener('change', function () {
    var totalscopeAgencyName = document.getElementById('totalscopeAgencyName');
    if (this.value === 'Yes') {
        totalscopeAgencyName.classList.remove('hidden');
    } else {
        totalscopeAgencyName.classList.add('hidden');
    }
});

//Principle 8

//LI 3a
document.getElementById('procurementPolicyMarginalizedChoice').addEventListener('change', function () {
    var procurementPolicyMarginalizedDetails = document.getElementById('procurementPolicyMarginalizedDetails');
    if (this.value === 'Yes') {
        procurementPolicyMarginalizedDetails.classList.remove('hidden');
    } else {
        procurementPolicyMarginalizedDetails.classList.add('hidden');
    }
});

//Principle 9

//EI 5
document.getElementById('cyberSecurityPolicy').addEventListener('change', function () {
    var cyberSecurityPolicyDetails = document.getElementById('cyberSecurityPolicyDetails');
    if (this.value === 'Yes') {
        cyberSecurityPolicyDetails.classList.remove('hidden');
    } else {
        cyberSecurityPolicyDetails.classList.add('hidden');
    }
});

//LI 4.1
document.getElementById('productInfoDisplay').addEventListener('change', function () {
    var productInfoDisplayDetails = document.getElementById('productInfoDisplayDetails');
    if (this.value === 'Yes') {
        productInfoDisplayDetails.classList.remove('hidden');
    } else {
        productInfoDisplayDetails.classList.add('hidden');
    }
});

//LI 4.2
document.getElementById('surveyInfo').addEventListener('change', function () {
    var surveyInfoDetails = document.getElementById('surveyInfoDetails');
    if (this.value === 'No') {
        surveyInfoDetails.classList.remove('hidden');
    } else {
        surveyInfoDetails.classList.add('hidden');
    }
});

/* ************************************************************************************************************************************ */
/*                                                                                                                                      */
/*                                                           Navigation button                                                          */
/*                                                                                                                                      */
/* ************************************************************************************************************************************ */

// Navigation button based Division visiblility
let currentDiv = 1;
let totalDivs = 9;

function navigate(direction) {
    if (direction === 1 && !areRequiredFieldsFilled('prin' + currentDiv)) {
        alert("Please fill out all required fields before proceeding!");
        triggerNativeValidation('prin' + currentDiv);
        return;
    }
    document.getElementById('prin' + currentDiv).style.display = 'none';
    currentDiv += direction;
    if (currentDiv > totalDivs) currentDiv = totalDivs;
    if (currentDiv < 1) currentDiv = 1;
    document.getElementById('prin' + currentDiv).style.display = 'block';
    window.scrollTo(0, 0);
}

/* ************************************************************************************************************************************ */
/*                                                                                                                                      */
/*                                                           Required fields                                                            */
/*                                                                                                                                      */
/* ************************************************************************************************************************************ */

// Enforce filling of required fields in each div
function areRequiredFieldsFilled(divId) {
    const currentDiv = document.getElementById(divId);
    const requiredInputs = currentDiv.querySelectorAll('input[required], textarea[required], select[required]');

    for (let input of requiredInputs) {
        if (!input.value.trim()) {
            return false;
        }
    }
    return true;
}

// Point to exact missing field with native HTML validation
function triggerNativeValidation(divId) {
    const currentDiv = document.getElementById(divId);
    const requiredInputs = currentDiv.querySelectorAll('input[required], textarea[required], select[required]');
    for (let input of requiredInputs) {
        if (!input.value.trim()) {
            input.reportValidity(); // This will trigger the native HTML highlighting for unfilled fields
            break; // Stop at the first invalid field
        }
    }
}

function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}


/* ************************************************************************************************************************************ */
/*                                                                                                                                      */
/*                                                           Validations                                                                */
/*                                                                                                                                      */
/* ************************************************************************************************************************************ */

//Principle 1
// coverage
document.getElementById("coverage").addEventListener("input", function () {
    var input = this.value;
    if (input < 0) {
        this.value = 0;
    } else if (input > 100) {
        this.value = 100;
    }
});

// disciplinaryAction
document.getElementById("disciplinaryAction").addEventListener("input", function () {
    var input = this.value;
    if (input < 0) {
        this.value = 0;
    } else if (input > 2300000) {
        this.value = 2300000;
    }
});

//Principle 2
//rdPercentage
document.getElementById("rdPercentage").addEventListener("input", function () {
    var input = this.value;
    if (input < 0) {
        this.value = 0;
    } else if (input > 100) {
        this.value = 100;
    }
});

//recycledPercentage2
document.getElementById("recycledPercentage2").addEventListener("input", function () {
    var input = this.value;
    if (input < 0) {
        this.value = 0;
    } else if (input > 100) {
        this.value = 100;
    }
});

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
/*                                                           Table calculations                                                         */
/*                                                                                                                                      */
/* ************************************************************************************************************************************ */

// Helper function to calculate percentage
function calculatePercentage(part, whole) {
    if (whole == 0)
        return '0%';
    else
        return (part / whole * 100).toFixed(2) + '%'; // Adjust the number of decimal places as needed
}

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

// Principle 3 EI 1a
// Function to calculate column totals for a specific section of the table
function calculateColumnTotalsForSection1a(tableId, startRowIndex, endRowIndex, totalRowIndex) {
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
        for (var colIndex = 1; colIndex < cells.length; colIndex++) {
            var input = cells[colIndex].querySelector('input');
            if (input && !input.hasAttribute('readonly')) { // Sum only the input fields that are not readonly
                var value = parseFloat(input.value) || 0;
                columnSums[colIndex] += value;
            }
        }
    }

    // Update the totals in the 'Total' row
    var totalCells = table.rows[totalRowIndex].cells;
    for (var colIndex = 1; colIndex < totalCells.length; colIndex++) {
        if (columnSums[colIndex] !== undefined) { // Update only if a sum has been calculated
            var totalInput = totalCells[colIndex].querySelector('input');
            if (totalInput) { // If there's an input field, update it
                totalInput.value = columnSums[colIndex];
            }
        }
    }
    var row = table.rows[totalRowIndex];

    var total = parseFloat(row.cells[1].querySelector('input').value) || 0;
    var noB = parseFloat(row.cells[2].querySelector('input').value) || 0;
    var noC = parseFloat(row.cells[4].querySelector('input').value) || 0;
    var noD = parseFloat(row.cells[6].querySelector('input').value) || 0;
    var noE = parseFloat(row.cells[8].querySelector('input').value) || 0;
    var noF = parseFloat(row.cells[10].querySelector('input').value) || 0;

    // Calculate percentages and update the respective cells
    row.cells[3].querySelector('input').value = calculatePercentage(noB, total);
    row.cells[5].querySelector('input').value = calculatePercentage(noC, total);
    row.cells[7].querySelector('input').value = calculatePercentage(noD, total);
    row.cells[9].querySelector('input').value = calculatePercentage(noE, total);
    row.cells[11].querySelector('input').value = calculatePercentage(noF, total);
}

// Calculate totals for each section when the page loads and when values change
window.onload = function () {
    calculateSectionTotals1a();
};

function calculateSectionTotals1a() {
    // 'Permanent employees' section is from row 4 to 5, and its 'Total' is at row 6
    calculateColumnTotalsForSection1a('p_employeeWellbeingDetails', 4, 5, 6);
    // 'Other than Permanent employees' section is from row 8 to 9, and its 'Total' is at row 10
    calculateColumnTotalsForSection1a('p_employeeWellbeingDetails', 8, 9, 10);
}

// Function to calculate percentages
function calculatePercentages1a(tableId, rowIndex) {
    var table = document.getElementById(tableId);
    var row = table.rows[rowIndex];

    var total = parseFloat(row.cells[1].querySelector('input').value) || 0;
    var noB = parseFloat(row.cells[2].querySelector('input').value) || 0;
    var noC = parseFloat(row.cells[4].querySelector('input').value) || 0;
    var noD = parseFloat(row.cells[6].querySelector('input').value) || 0;
    var noE = parseFloat(row.cells[8].querySelector('input').value) || 0;
    var noF = parseFloat(row.cells[10].querySelector('input').value) || 0;

    // Calculate percentages and update the respective cells
    row.cells[3].querySelector('input').value = calculatePercentage(noB, total);
    row.cells[5].querySelector('input').value = calculatePercentage(noC, total);
    row.cells[7].querySelector('input').value = calculatePercentage(noD, total);
    row.cells[9].querySelector('input').value = calculatePercentage(noE, total);
    row.cells[11].querySelector('input').value = calculatePercentage(noF, total);
    calculateSectionTotals1a();
}
// End of Principle 3 EI 1a

// Principle 3 EI 1b
// Function to calculate column totals for a specific section of the table
function calculateColumnTotalsForSection1b(tableId, startRowIndex, endRowIndex, totalRowIndex) {
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
        for (var colIndex = 1; colIndex < cells.length; colIndex++) {
            var input = cells[colIndex].querySelector('input');
            if (input && !input.hasAttribute('readonly')) { // Sum only the input fields that are not readonly
                var value = parseFloat(input.value) || 0;
                columnSums[colIndex] += value;
            }
        }
    }

    // Update the totals in the 'Total' row
    var totalCells = table.rows[totalRowIndex].cells;
    for (var colIndex = 1; colIndex < totalCells.length; colIndex++) {
        if (columnSums[colIndex] !== undefined) { // Update only if a sum has been calculated
            var totalInput = totalCells[colIndex].querySelector('input');
            if (totalInput) { // If there's an input field, update it
                totalInput.value = columnSums[colIndex];
            }
        }
    }
    var row = table.rows[totalRowIndex];

    var total = parseFloat(row.cells[1].querySelector('input').value) || 0;
    var noB = parseFloat(row.cells[2].querySelector('input').value) || 0;
    var noC = parseFloat(row.cells[4].querySelector('input').value) || 0;
    var noD = parseFloat(row.cells[6].querySelector('input').value) || 0;
    var noE = parseFloat(row.cells[8].querySelector('input').value) || 0;
    var noF = parseFloat(row.cells[10].querySelector('input').value) || 0;

    // Calculate percentages and update the respective cells
    row.cells[3].querySelector('input').value = calculatePercentage(noB, total);
    row.cells[5].querySelector('input').value = calculatePercentage(noC, total);
    row.cells[7].querySelector('input').value = calculatePercentage(noD, total);
    row.cells[9].querySelector('input').value = calculatePercentage(noE, total);
    row.cells[11].querySelector('input').value = calculatePercentage(noF, total);
}

// Calculate totals for each section when the page loads and when values change
window.onload = function () {
    calculateSectionTotals1b();
};

function calculateSectionTotals1b() {
    // 'Permanent employees' section is from row 4 to 5, and its 'Total' is at row 6
    calculateColumnTotalsForSection1b('p_workerWellbeingDetails', 4, 5, 6);
    // 'Other than Permanent employees' section is from row 8 to 9, and its 'Total' is at row 10
    calculateColumnTotalsForSection1b('p_workerWellbeingDetails', 8, 9, 10);
}

// Function to calculate percentages
function calculatePercentages1b(tableId, rowIndex) {
    var table = document.getElementById(tableId);
    var row = table.rows[rowIndex];

    var total = parseFloat(row.cells[1].querySelector('input').value) || 0;
    var noB = parseFloat(row.cells[2].querySelector('input').value) || 0;
    var noC = parseFloat(row.cells[4].querySelector('input').value) || 0;
    var noD = parseFloat(row.cells[6].querySelector('input').value) || 0;
    var noE = parseFloat(row.cells[8].querySelector('input').value) || 0;
    var noF = parseFloat(row.cells[10].querySelector('input').value) || 0;

    // Calculate percentages and update the respective cells
    row.cells[3].querySelector('input').value = calculatePercentage(noB, total);
    row.cells[5].querySelector('input').value = calculatePercentage(noC, total);
    row.cells[7].querySelector('input').value = calculatePercentage(noD, total);
    row.cells[9].querySelector('input').value = calculatePercentage(noE, total);
    row.cells[11].querySelector('input').value = calculatePercentage(noF, total);
    calculateSectionTotals1b();
}
// End of Principle 3 EI 1b

// Principle 3 EI 7
// Function to calculate column totals for a specific section of the table
function calculateColumnTotalsForSection7(tableId, startRowIndex, endRowIndex, totalRowIndex) {
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
        for (var colIndex = 1; colIndex < cells.length; colIndex++) {
            var input = cells[colIndex].querySelector('input');
            if (input && !input.hasAttribute('readonly')) { // Sum only the input fields that are not readonly
                var value = parseFloat(input.value) || 0;
                columnSums[colIndex] += value;
            }
        }
    }

    // Update the totals in the 'Total' row
    var totalCells = table.rows[totalRowIndex].cells;
    for (var colIndex = 1; colIndex < totalCells.length; colIndex++) {
        if (columnSums[colIndex] !== undefined) { // Update only if a sum has been calculated
            var totalInput = totalCells[colIndex].querySelector('input');
            if (totalInput) { // If there's an input field, update it
                totalInput.value = columnSums[colIndex];
            }
        }
    }
    var row = table.rows[totalRowIndex];

    var A = parseFloat(row.cells[1].querySelector('input').value) || 0;
    var B = parseFloat(row.cells[2].querySelector('input').value) || 0;
    var C = parseFloat(row.cells[4].querySelector('input').value) || 0;
    var D = parseFloat(row.cells[5].querySelector('input').value) || 0;

    // Calculate percentages and update the respective cells
    row.cells[3].querySelector('input').value = calculatePercentage(B, A);
    row.cells[6].querySelector('input').value = calculatePercentage(D, C);
}

// Calculate totals for each section when the page loads and when values change
window.onload = function () {
    calculateSectionTotals7();
};

function calculateSectionTotals7() {
    // 'Permanent employees' section is from row 4 to 5, and its 'Total' is at row 6
    calculateColumnTotalsForSection7('p_unionMembershipPercentage', 3, 4, 2);
    // 'Other than Permanent employees' section is from row 8 to 9, and its 'Total' is at row 10
    calculateColumnTotalsForSection7('p_unionMembershipPercentage', 6, 7, 5);
}
// Function to calculate percentages
function calculatePercentages7(tableId, rowIndex) {
    var table = document.getElementById(tableId);
    var row = table.rows[rowIndex];

    var A = parseFloat(row.cells[1].querySelector('input').value) || 0;
    var B = parseFloat(row.cells[2].querySelector('input').value) || 0;
    var C = parseFloat(row.cells[4].querySelector('input').value) || 0;
    var D = parseFloat(row.cells[5].querySelector('input').value) || 0;

    // Calculate percentages and update the respective cells
    row.cells[3].querySelector('input').value = calculatePercentage(B, A);
    row.cells[6].querySelector('input').value = calculatePercentage(D, C);
    calculateSectionTotals7();
}
// End of Principle 3 EI 7

// Principle 3 EI 8
// Function to calculate column totals for a specific section of the table
function calculateColumnTotalsForSection8(tableId, startRowIndex, endRowIndex, totalRowIndex) {
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
        for (var colIndex = 1; colIndex < cells.length; colIndex++) {
            var input = cells[colIndex].querySelector('input');
            if (input && !input.hasAttribute('readonly')) { // Sum only the input fields that are not readonly
                var value = parseFloat(input.value) || 0;
                columnSums[colIndex] += value;
            }
        }
    }

    // Update the totals in the 'Total' row
    var totalCells = table.rows[totalRowIndex].cells;
    for (var colIndex = 1; colIndex < totalCells.length; colIndex++) {
        if (columnSums[colIndex] !== undefined) { // Update only if a sum has been calculated
            var totalInput = totalCells[colIndex].querySelector('input');
            if (totalInput) { // If there's an input field, update it
                totalInput.value = columnSums[colIndex];
            }
        }
    }
    var row = table.rows[totalRowIndex];

    var totalA = parseFloat(row.cells[1].querySelector('input').value) || 0;
    var noB = parseFloat(row.cells[2].querySelector('input').value) || 0;
    var noC = parseFloat(row.cells[4].querySelector('input').value) || 0;
    var totalD = parseFloat(row.cells[6].querySelector('input').value) || 0;
    var noE = parseFloat(row.cells[7].querySelector('input').value) || 0;
    var noF = parseFloat(row.cells[9].querySelector('input').value) || 0;

    // Calculate percentages and update the respective cells
    row.cells[3].querySelector('input').value = calculatePercentage(noB, totalA);
    row.cells[5].querySelector('input').value = calculatePercentage(noC, totalA);
    row.cells[8].querySelector('input').value = calculatePercentage(noE, totalD);
    row.cells[10].querySelector('input').value = calculatePercentage(noF, totalD);
}

// Calculate totals for each section when the page loads and when values change
window.onload = function () {
    calculateSectionTotals8();
};

function calculateSectionTotals8() {
    // 'Permanent employees' section is from row 4 to 5, and its 'Total' is at row 6
    calculateColumnTotalsForSection8('p_trainingDetails', 4, 5, 6);
    // 'Other than Permanent employees' section is from row 8 to 9, and its 'Total' is at row 10
    calculateColumnTotalsForSection8('p_trainingDetails', 8, 9, 10);
}

// Function to calculate percentages
function calculatePercentages8(tableId, rowIndex) {
    var table = document.getElementById(tableId);
    var row = table.rows[rowIndex];

    var totalA = parseFloat(row.cells[1].querySelector('input').value) || 0;
    var noB = parseFloat(row.cells[2].querySelector('input').value) || 0;
    var noC = parseFloat(row.cells[4].querySelector('input').value) || 0;
    var totalD = parseFloat(row.cells[6].querySelector('input').value) || 0;
    var noE = parseFloat(row.cells[7].querySelector('input').value) || 0;
    var noF = parseFloat(row.cells[9].querySelector('input').value) || 0;

    // Calculate percentages and update the respective cells
    row.cells[3].querySelector('input').value = calculatePercentage(noB, totalA);
    row.cells[5].querySelector('input').value = calculatePercentage(noC, totalA);
    row.cells[8].querySelector('input').value = calculatePercentage(noE, totalD);
    row.cells[10].querySelector('input').value = calculatePercentage(noF, totalD);
    calculateSectionTotals8();
}
// End of Principle 3 EI 8

// Principle 3 EI 9
// Function to calculate column totals for a specific section of the table
function calculateColumnTotalsForSection9(tableId, startRowIndex, endRowIndex, totalRowIndex) {
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
        for (var colIndex = 1; colIndex < cells.length; colIndex++) {
            var input = cells[colIndex].querySelector('input');
            if (input && !input.hasAttribute('readonly')) { // Sum only the input fields that are not readonly
                var value = parseFloat(input.value) || 0;
                columnSums[colIndex] += value;
            }
        }
    }

    // Update the totals in the 'Total' row
    var totalCells = table.rows[totalRowIndex].cells;
    for (var colIndex = 1; colIndex < totalCells.length; colIndex++) {
        if (columnSums[colIndex] !== undefined) { // Update only if a sum has been calculated
            var totalInput = totalCells[colIndex].querySelector('input');
            if (totalInput) { // If there's an input field, update it
                totalInput.value = columnSums[colIndex];
            }
        }
    }
    var row = table.rows[totalRowIndex];

    var totalA = parseFloat(row.cells[1].querySelector('input').value) || 0;
    var noB = parseFloat(row.cells[2].querySelector('input').value) || 0;
    var totalC = parseFloat(row.cells[4].querySelector('input').value) || 0;
    var noD = parseFloat(row.cells[5].querySelector('input').value) || 0;


    // Calculate percentages and update the respective cells
    row.cells[3].querySelector('input').value = calculatePercentage(noB, totalA);
    row.cells[6].querySelector('input').value = calculatePercentage(noD, totalC);
}

// Calculate totals for each section when the page loads and when values change
window.onload = function () {
    calculateSectionTotals9();
};

function calculateSectionTotals9() {
    // 'Permanent employees' section is from row 4 to 5, and its 'Total' is at row 6
    calculateColumnTotalsForSection9('p_performanceReviewDetails', 3, 4, 5);
    // 'Other than Permanent employees' section is from row 8 to 9, and its 'Total' is at row 10
    calculateColumnTotalsForSection9('p_performanceReviewDetails', 7, 8, 9);
}

// Function to calculate percentages
function calculatePercentages9(tableId, rowIndex) {
    var table = document.getElementById(tableId);
    var row = table.rows[rowIndex];

    var totalA = parseFloat(row.cells[1].querySelector('input').value) || 0;
    var noB = parseFloat(row.cells[2].querySelector('input').value) || 0;
    var totalC = parseFloat(row.cells[4].querySelector('input').value) || 0;
    var noD = parseFloat(row.cells[5].querySelector('input').value) || 0;


    // Calculate percentages and update the respective cells
    row.cells[3].querySelector('input').value = calculatePercentage(noB, totalA);
    row.cells[6].querySelector('input').value = calculatePercentage(noD, totalC);
    calculateSectionTotals9();
}
// End of Principle 3 EI 9

// Principle 5 EI 1
// Function to calculate column totals for a specific section of the table
function calculateColumnTotalsForSection1(tableId, startRowIndex, endRowIndex, totalRowIndex) {
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
        for (var colIndex = 1; colIndex < cells.length; colIndex++) {
            var input = cells[colIndex].querySelector('input');
            if (input && !input.hasAttribute('readonly')) { // Sum only the input fields that are not readonly
                var value = parseFloat(input.value) || 0;
                columnSums[colIndex] += value;
            }
        }
    }

    // Update the totals in the 'Total' row
    var totalCells = table.rows[totalRowIndex].cells;
    for (var colIndex = 1; colIndex < totalCells.length; colIndex++) {
        if (columnSums[colIndex] !== undefined) { // Update only if a sum has been calculated
            var totalInput = totalCells[colIndex].querySelector('input');
            if (totalInput) { // If there's an input field, update it
                totalInput.value = columnSums[colIndex];
            }
        }
    }
    var row = table.rows[totalRowIndex];

    var totalA = parseFloat(row.cells[1].querySelector('input').value) || 0;
    var noB = parseFloat(row.cells[2].querySelector('input').value) || 0;
    var totalC = parseFloat(row.cells[4].querySelector('input').value) || 0;
    var noD = parseFloat(row.cells[5].querySelector('input').value) || 0;


    // Calculate percentages and update the respective cells
    row.cells[3].querySelector('input').value = calculatePercentage(noB, totalA);
    row.cells[6].querySelector('input').value = calculatePercentage(noD, totalC);
}

// Calculate totals for each section when the page loads and when values change
window.onload = function () {
    calculateSectionTotals1();
};

function calculateSectionTotals1() {
    // 'Permanent employees' section is from row 4 to 5, and its 'Total' is at row 6
    calculateColumnTotalsForSection1('p_humanRightsTrainingDetails', 3, 4, 5);
    // 'Other than Permanent employees' section is from row 8 to 9, and its 'Total' is at row 10
    calculateColumnTotalsForSection1('p_humanRightsTrainingDetails', 7, 8, 9);
}

// Function to calculate percentages
function calculatePercentages1(tableId, rowIndex) {
    var table = document.getElementById(tableId);
    var row = table.rows[rowIndex];

    var totalA = parseFloat(row.cells[1].querySelector('input').value) || 0;
    var noB = parseFloat(row.cells[2].querySelector('input').value) || 0;
    var totalC = parseFloat(row.cells[4].querySelector('input').value) || 0;
    var noD = parseFloat(row.cells[5].querySelector('input').value) || 0;


    // Calculate percentages and update the respective cells
    row.cells[3].querySelector('input').value = calculatePercentage(noB, totalA);
    row.cells[6].querySelector('input').value = calculatePercentage(noD, totalC);
    calculateSectionTotals1()
}
// End of Principle 5 EI 1

// Principle 5 EI 2
// Function to calculate column totals for a specific section of the table
function calculateColumnTotalsForSection2(tableId, startRowIndex, endRowIndex, totalRowIndex) {
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
        for (var colIndex = 1; colIndex < cells.length; colIndex++) {
            var input = cells[colIndex].querySelector('input');
            if (input && !input.hasAttribute('readonly')) { // Sum only the input fields that are not readonly
                var value = parseFloat(input.value) || 0;
                columnSums[colIndex] += value;
            }
        }
    }

    // Update the totals in the 'Total' row
    var totalCells = table.rows[totalRowIndex].cells;
    for (var colIndex = 1; colIndex < totalCells.length; colIndex++) {
        if (columnSums[colIndex] !== undefined) { // Update only if a sum has been calculated
            var totalInput = totalCells[colIndex].querySelector('input');
            if (totalInput) { // If there's an input field, update it
                totalInput.value = columnSums[colIndex];
            }
        }
    }
    var row = table.rows[totalRowIndex];

    var totalA = parseFloat(row.cells[1].querySelector('input').value) || 0;
    var noB = parseFloat(row.cells[2].querySelector('input').value) || 0;
    var noC = parseFloat(row.cells[4].querySelector('input').value) || 0;
    var totalD = parseFloat(row.cells[6].querySelector('input').value) || 0;
    var noE = parseFloat(row.cells[7].querySelector('input').value) || 0;
    var noF = parseFloat(row.cells[9].querySelector('input').value) || 0;


    // Calculate percentages and update the respective cells
    row.cells[3].querySelector('input').value = calculatePercentage(noB, totalA);
    row.cells[5].querySelector('input').value = calculatePercentage(noC, totalA);
    row.cells[8].querySelector('input').value = calculatePercentage(noE, totalD);
    row.cells[10].querySelector('input').value = calculatePercentage(noF, totalD);
}

// Calculate totals for each section when the page loads and when values change
window.onload = function () {
    calculateSectionTotals2();
};

function calculateSectionTotals2() {
    calculateColumnTotalsForSection2('p_wageDetails', 4, 5, 6);
    calculateColumnTotalsForSection2('p_wageDetails', 8, 9, 10);
    calculateColumnTotalsForSection2('p_wageDetails', 12, 13, 14);
    calculateColumnTotalsForSection2('p_wageDetails', 16, 17, 18);
}

// Function to calculate percentages
function calculatePercentages2(tableId, rowIndex) {
    var table = document.getElementById(tableId);
    var row = table.rows[rowIndex];

    var totalA = parseFloat(row.cells[1].querySelector('input').value) || 0;
    var noB = parseFloat(row.cells[2].querySelector('input').value) || 0;
    var noC = parseFloat(row.cells[4].querySelector('input').value) || 0;
    var totalD = parseFloat(row.cells[6].querySelector('input').value) || 0;
    var noE = parseFloat(row.cells[7].querySelector('input').value) || 0;
    var noF = parseFloat(row.cells[9].querySelector('input').value) || 0;


    // Calculate percentages and update the respective cells
    row.cells[3].querySelector('input').value = calculatePercentage(noB, totalA);
    row.cells[5].querySelector('input').value = calculatePercentage(noC, totalA);
    row.cells[8].querySelector('input').value = calculatePercentage(noE, totalD);
    row.cells[10].querySelector('input').value = calculatePercentage(noF, totalD);
    calculateSectionTotals2();
}
// End of Principle 5 EI 2

// Principle 6 EI 1.1
// Function to calculate column totals for a specific section of the table
function calculateColumnTotalsForSection1_1(tableId, startRowIndex, endRowIndex, totalRowIndex) {
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
        for (var colIndex = 1; colIndex < cells.length; colIndex++) {
            var input = cells[colIndex].querySelector('input');
            if (input && !input.hasAttribute('readonly')) { // Sum only the input fields that are not readonly
                var value = parseFloat(input.value) || 0;
                columnSums[colIndex] += value;
            }
        }
    }

    // Update the totals in the 'Total' row
    var totalCells = table.rows[totalRowIndex].cells;
    for (var colIndex = 1; colIndex < totalCells.length; colIndex++) {
        if (columnSums[colIndex] !== undefined) { // Update only if a sum has been calculated
            var totalInput = totalCells[colIndex].querySelector('input');
            if (totalInput) { // If there's an input field, update it
                totalInput.value = columnSums[colIndex];
            }
        }
    }
}

// Calculate totals for each section when the page loads and when values change
window.onload = function () {
    calculateSectionTotals1_1();
};

function calculateSectionTotals1_1() {
    calculateColumnTotalsForSection1_1('p_energyConsumptionDetails', 1, 3, 4);
}
// End of Principle 6 EI 1.1

// Principle 6 EI 3.1
// Function to calculate column totals for a specific section of the table
function calculateColumnTotalsForSection3_1(tableId, startRowIndex, endRowIndex, totalRowIndex) {
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
        for (var colIndex = 1; colIndex < cells.length; colIndex++) {
            var input = cells[colIndex].querySelector('input');
            if (input && !input.hasAttribute('readonly')) { // Sum only the input fields that are not readonly
                var value = parseFloat(input.value) || 0;
                columnSums[colIndex] += value;
            }
        }
    }

    // Update the totals in the 'Total' row
    var totalCells = table.rows[totalRowIndex].cells;
    for (var colIndex = 1; colIndex < totalCells.length; colIndex++) {
        if (columnSums[colIndex] !== undefined) { // Update only if a sum has been calculated
            var totalInput = totalCells[colIndex].querySelector('input');
            if (totalInput) { // If there's an input field, update it
                totalInput.value = columnSums[colIndex];
            }
        }
    }
}

// Calculate totals for each section when the page loads and when values change
window.onload = function () {
    calculateSectionTotals3_1();
};

function calculateSectionTotals3_1() {
    calculateColumnTotalsForSection3_1('p_waterWithdrawalDetails', 2, 6, 7);
}
// End of Principle 6 EI 3.1

// Principle 6 EI 8.1
// Function to calculate column totals for a specific section of the table
function calculateColumnTotalsForSection8_1(tableId, startRowIndex, endRowIndex, totalRowIndex) {
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
        for (var colIndex = 1; colIndex < cells.length; colIndex++) {
            var input = cells[colIndex].querySelector('input');
            if (input && !input.hasAttribute('readonly')) { // Sum only the input fields that are not readonly
                var value = parseFloat(input.value) || 0;
                columnSums[colIndex] += value;
            }
        }
    }

    // Update the totals in the 'Total' row
    var totalCells = table.rows[totalRowIndex].cells;
    for (var colIndex = 1; colIndex < totalCells.length; colIndex++) {
        if (columnSums[colIndex] !== undefined) { // Update only if a sum has been calculated
            var totalInput = totalCells[colIndex].querySelector('input');
            if (totalInput) { // If there's an input field, update it
                totalInput.value = columnSums[colIndex];
            }
        }
    }
}

// Calculate totals for each section when the page loads and when values change
window.onload = function () {
    calculateSectionTotals8_1();
};

function calculateSectionTotals8_1() {
    calculateColumnTotalsForSection8_1('p_wasteDetails', 2, 9, 10);
    calculateColumnTotalsForSection8_1('p_wasteDetails', 13, 15, 16);
    calculateColumnTotalsForSection8_1('p_wasteDetails', 19, 21, 22);
}
// End of Principle 6 EI 8.1

// Principle 6 LI 1.1
// Function to calculate column totals for a specific section of the table
function calculateColumnTotalsForSectionL1_1(tableId, startRowIndex, endRowIndex, totalRowIndex) {
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
        for (var colIndex = 1; colIndex < cells.length; colIndex++) {
            var input = cells[colIndex].querySelector('input');
            if (input && !input.hasAttribute('readonly')) { // Sum only the input fields that are not readonly
                var value = parseFloat(input.value) || 0;
                columnSums[colIndex] += value;
            }
        }
    }

    // Update the totals in the 'Total' row
    var totalCells = table.rows[totalRowIndex].cells;
    for (var colIndex = 1; colIndex < totalCells.length; colIndex++) {
        if (columnSums[colIndex] !== undefined) { // Update only if a sum has been calculated
            var totalInput = totalCells[colIndex].querySelector('input');
            if (totalInput) { // If there's an input field, update it
                totalInput.value = columnSums[colIndex];
            }
        }
    }
}

// Calculate totals for each section when the page loads and when values change
window.onload = function () {
    calculateSectionTotalsL1_1();
};

function calculateSectionTotalsL1_1() {
    calculateColumnTotalsForSectionL1_1('p_totalenergyconsumed', 2, 4, 5);
    calculateColumnTotalsForSectionL1_1('p_totalenergyconsumed', 7, 9, 10);
}
// End of Principle 6 LI 1.1

// Principle 6 LI 2.1
// Function to calculate column totals for a specific section of the table
function calculateColumnTotalsForSectionL2_1(tableId, startRowIndex, endRowIndex, totalRowIndex) {
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
        for (var colIndex = 1; colIndex < cells.length; colIndex++) {
            var input = cells[colIndex].querySelector('input');
            if (input && !input.hasAttribute('readonly')) { // Sum only the input fields that are not readonly
                var value = parseFloat(input.value) || 0;
                columnSums[colIndex] += value;
            }
        }
    }

    // Update the totals in the 'Total' row
    var totalCells = table.rows[totalRowIndex].cells;
    for (var colIndex = 1; colIndex < totalCells.length; colIndex++) {
        if (columnSums[colIndex] !== undefined) { // Update only if a sum has been calculated
            var totalInput = totalCells[colIndex].querySelector('input');
            if (totalInput) { // If there's an input field, update it
                totalInput.value = columnSums[colIndex];
            }
        }
    }

    var row1 = table.rows[2];
    var row2 = table.rows[5];
    var row3 = table.rows[8];
    var row4 = table.rows[11];
    var row5 = table.rows[14];
    var total_row = table.rows[17];

    var cy_row1 = parseFloat(row1.cells[1].querySelector('input').value) || 0;
    var py_row1 = parseFloat(row1.cells[2].querySelector('input').value) || 0;
    var cy_row2 = parseFloat(row2.cells[1].querySelector('input').value) || 0;
    var py_row2 = parseFloat(row2.cells[2].querySelector('input').value) || 0;
    var cy_row3 = parseFloat(row3.cells[1].querySelector('input').value) || 0;
    var py_row3 = parseFloat(row3.cells[2].querySelector('input').value) || 0;
    var cy_row4 = parseFloat(row4.cells[1].querySelector('input').value) || 0;
    var py_row4 = parseFloat(row4.cells[2].querySelector('input').value) || 0;
    var cy_row5 = parseFloat(row5.cells[1].querySelector('input').value) || 0;
    var py_row5 = parseFloat(row5.cells[2].querySelector('input').value) || 0;

    var total_cy = cy_row1 + cy_row2 + cy_row3 + cy_row4 + cy_row5;
    var total_py = py_row1 + py_row2 + py_row3 + py_row4 + py_row5;

    total_row.cells[1].querySelector('input').value = total_cy;
    total_row.cells[2].querySelector('input').value = total_py;
}

// Calculate totals for each section when the page loads and when values change
window.onload = function () {
    calculateSectionTotalsL2_1();
};

function calculateSectionTotalsL2_1() {
    calculateColumnTotalsForSectionL2_1('p_waterdischarged', 3, 4, 2);
    calculateColumnTotalsForSectionL2_1('p_waterdischarged', 6, 7, 5);
    calculateColumnTotalsForSectionL2_1('p_waterdischarged', 9, 10, 8);
    calculateColumnTotalsForSectionL2_1('p_waterdischarged', 12, 13, 11);
    calculateColumnTotalsForSectionL2_1('p_waterdischarged', 15, 16, 14);
}
// End of Principle 6 LI 2.1

// Principle 6 LI 3.1c
// Function to calculate column totals for a specific section of the table
function calculateColumnTotalsForSectionL3_1(tableId, startRowIndex, endRowIndex, totalRowIndex) {
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
        for (var colIndex = 1; colIndex < cells.length; colIndex++) {
            var input = cells[colIndex].querySelector('input');
            if (input && !input.hasAttribute('readonly')) { // Sum only the input fields that are not readonly
                var value = parseFloat(input.value) || 0;
                columnSums[colIndex] += value;
            }
        }
    }

    // Update the totals in the 'Total' row
    var totalCells = table.rows[totalRowIndex].cells;
    for (var colIndex = 1; colIndex < totalCells.length; colIndex++) {
        if (columnSums[colIndex] !== undefined) { // Update only if a sum has been calculated
            var totalInput = totalCells[colIndex].querySelector('input');
            if (totalInput) { // If there's an input field, update it
                totalInput.value = columnSums[colIndex];
            }
        }
    }

    var row1 = table.rows[12];
    var row2 = table.rows[15];
    var row3 = table.rows[18];
    var row4 = table.rows[21];
    var row5 = table.rows[24];
    var total_row = table.rows[27];

    var cy_row1 = parseFloat(row1.cells[1].querySelector('input').value) || 0;
    var py_row1 = parseFloat(row1.cells[2].querySelector('input').value) || 0;
    var cy_row2 = parseFloat(row2.cells[1].querySelector('input').value) || 0;
    var py_row2 = parseFloat(row2.cells[2].querySelector('input').value) || 0;
    var cy_row3 = parseFloat(row3.cells[1].querySelector('input').value) || 0;
    var py_row3 = parseFloat(row3.cells[2].querySelector('input').value) || 0;
    var cy_row4 = parseFloat(row4.cells[1].querySelector('input').value) || 0;
    var py_row4 = parseFloat(row4.cells[2].querySelector('input').value) || 0;
    var cy_row5 = parseFloat(row5.cells[1].querySelector('input').value) || 0;
    var py_row5 = parseFloat(row5.cells[2].querySelector('input').value) || 0;

    var total_cy = cy_row1 + cy_row2 + cy_row3 + cy_row4 + cy_row5;
    var total_py = py_row1 + py_row2 + py_row3 + py_row4 + py_row5;

    total_row.cells[1].querySelector('input').value = total_cy;
    total_row.cells[2].querySelector('input').value = total_py;
}

// Calculate totals for each section when the page loads and when values change
window.onload = function () {
    calculateSectionTotalsL3_1();
};

function calculateSectionTotalsL3_1() {
    calculateColumnTotalsForSectionL3_1('p_waterstress', 2, 6, 7);
    calculateColumnTotalsForSectionL3_1('p_waterstress', 13, 14, 12);
    calculateColumnTotalsForSectionL3_1('p_waterstress', 16, 17, 15);
    calculateColumnTotalsForSectionL3_1('p_waterstress', 19, 20, 18);
    calculateColumnTotalsForSectionL3_1('p_waterstress', 22, 23, 21);
    calculateColumnTotalsForSectionL3_1('p_waterstress', 25, 26, 24);
}
// End of Principle 6 LI 3.1c

// Principle 8 LI 2
function calculateAmount() {
    var total = 0;
    var amountInputs = document.querySelectorAll('.amount-input');
    
    amountInputs.forEach(function(input) {
        total += parseFloat(input.value) || 0;
    });
    
    document.getElementById('totalAmount').textContent = total;
}
// End Principle 8 LI 2


/* ************************************************************************************************************************************ */
/*                                                                                                                                      */
/*                                                           Table row addition                                                         */
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


// Function to add a new row at the bottom of the table for tables without serial number
function addBottomRowNoSno(Id) {
    const table = document.querySelector(`#${Id} table tbody`);
    const rows = table.getElementsByTagName("tr");
    const lastRow = rows[rows.length - 1].cloneNode(true);

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

// Function to remove the last row from the table with confirmation for tables without serial number
function removeBottomRowNoSno(Id, limit) {
    const table = document.querySelector(`#${Id} table tbody`);
    const rows = table.getElementsByTagName("tr");

    if (rows.length > limit) { // Ensure there is more than one row
        // Ask for confirmation before removing the row
        if (confirm("Are you sure you want to remove the last row?")) {
            table.removeChild(rows[rows.length - 1]);
        }
    }
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

    if (!isNaN(parsedIndex) && parsedIndex >= -1) {
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
        } else if (parsedIndex <= rows.length - 1) {
            table.insertBefore(newRow, rows[parsedIndex - 2].nextSibling);
        } else {
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
/*                                         Function to make sure you really want to submit the form                                     */
/*                                                                                                                                      */
/* ************************************************************************************************************************************ */
function confirmSubmission() {
    // You can add additional validation or actions before final submission
    return confirm('Are you sure you want to submit the form?');
}

    