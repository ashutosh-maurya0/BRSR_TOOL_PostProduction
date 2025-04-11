// Show warning on close or reload of tab before submission
var isFormSubmitted = false;

window.addEventListener('beforeunload', function (event) {
    if (!isFormSubmitted) {
        event.preventDefault();
        event.returnValue = 'Are you sure you want to leave this page? If you have already submitted the form please click OK.';
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

async function checkSession() {
    try {
        const response = await fetch('../session_checker.php', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        });
        const data = await response.json();
        if (data.new_session) {
            await promptForCIN(); // Make sure to wait for user input
        }
    } catch (error) {
        console.error('Error:', error);
    }
}

function promptForCIN() {
    return new Promise((resolve) => {
        let cin = prompt('Session expired. Please enter your CIN to confirm:');
        if (cin != null && cin.trim() !== '') {
            if (validCINCheck(cin)) {
                setSessionCIN(cin).then(resolve); // Ensure setSessionCIN completes before resolving
            } else {
                alert('Invalid CIN. Please enter a valid CIN.');
                promptForCIN().then(resolve); // Recursive call and wait
            }
        } else {
            resolve(); // Resolve if no CIN entered
        }
    });
}

function validCINCheck(cin) {
    const cinValue = cin.toUpperCase();
    const cinRegex = /^[A-Z][0-9]{5}[A-Z]{2}[0-9]{4}[A-Z]{3}[0-9]{6}$/;
    const isValidLength = cin.length === 21;
    return cinRegex.test(cinValue) && isValidLength;
}

function setSessionCIN(cin) {
    return fetch('../session_checker.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'cin': cin
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data.message);
        setTimeout(() => {
            location.reload();
        }, 500);
    })
    .catch(error => console.error('Error:', error));
}

function areRequiredFieldsFilled() {
    const requiredInputs = document.querySelectorAll('form input[required], form textarea[required], form select[required]');
    for (let input of requiredInputs) {
        if (!input.value.trim()) {
            return false;
        }
    }
    return true;
}

async function submitForm() {
    await checkSession(); // Wait for checkSession to complete
    console.log("This message is displayed after the session check completes.");
    
    // Check if form is already submitted
    if (isFormSubmitted) {
        return false;
    }

    isFormSubmitted = true;

    // Make an AJAX request to submit the form
    const formData = new FormData(document.querySelector('form'));
    const xhr = new XMLHttpRequest();
    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                var response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    alert(response.message);
                    window.location.href = "../sec_C/sec_C.php";
                } else if(response.status === 'failure1') {
                    alert(response.message);
                    // Optionally, you can stay on the current page on failure:
                    window.location.href = "../sec_C/sec_C.php";
                } else{
                    alert(response.message);
                    // Optionally, you can stay on the current page on failure:
                    window.location.href = "../sec_A/sec_A.php";
                }
            } catch (e) {
                alert("Could not establish connection with database. Contact support or try again later.");
            }
        } else {
            alert("Server error occurred. Please try again later.");
        }
    };
    xhr.open('POST', 'sec_B_response.php', true);
    xhr.send(formData);
    // Return false to prevent the form from actually submitting.
    return false;
}
