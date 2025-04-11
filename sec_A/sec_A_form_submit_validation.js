// Show warning on close or reload of tab before submission
var isFormSubmitted = false;

window.addEventListener('beforeunload', function (event) {
    if (!isFormSubmitted) {
        event.preventDefault();
        event.returnValue = 'You have unsaved changes. Are you sure you want to leave?';
    }
});

document.querySelector('form').addEventListener('submit', function (event) {
    event.preventDefault();

    // Check if all required fields are filled using our custom function
    if (!areRequiredFieldsFilled()) {
        alert('Please fill out all required fields before proceeding!');
        this.reportValidity(); // This will trigger the native HTML highlighting for unfilled fields
        return;
    }

    submitForm(); // Call your AJAX submission function
});

function areRequiredFieldsFilled() {
    const requiredInputs = document.querySelectorAll('form input[required], form textarea[required], form select[required]');
    for (let input of requiredInputs) {
        if (!input.value.trim()) {
            return false;
        }
    }
    return true;
}

//check whether the form is successfully submited or not
// This file contain the form submission logic.
function submitForm() {
//You can perform any form validation here before submission.
// Make an AJAX request to submit the form
    isFormSubmitted = true;
    var formData = new FormData(document.querySelector('form'));
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                var response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    alert(response.message);
                    window.location.href = "../sec_B/sec_B.php";
                } else {
                    alert(response.message);
                    // Optionally, you can stay on the current page on failure:
                    window.location.href = "../sec_B/sec_B.php";
                } 
            } catch (e) {
                alert("Could not establish connection with database. Contact support or try again later.");
            }
        } else {
            alert("Server error occurred. Please try again later.");
        }
    };
    xhr.open('POST', 'sec_A_response.php', true);
    xhr.send(formData);
    // Return false to prevent the form from actually submitting.
    return false;
}