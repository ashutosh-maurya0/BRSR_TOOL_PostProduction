<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/jpg" href="../images/cusrrs.jpg"> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Entity NGRBC Policy Form</title>
        <link rel="stylesheet" href="sec_B.css">
        <style>
            .hidden {
                display: none;
            }
            /* Add this CSS */
            @media screen and (max-width: 800px) {
                #cinDiv {
                    display: none;
                }
            }
        </style>

<script>
        function printXBRL() {
            // Use AJAX to call the PHP script that runs the Node.js script
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "run_nodejs.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        alert("XBRL document has been generated.");
                        console.log("Response:", xhr.responseText);
                    } else {
                        alert("Failed to generate XBRL document.");
                        console.error("Error:", xhr.status, xhr.statusText);
                    }
                }
            };
            xhr.send();
        }
    </script>
    </head>

    <?php
        session_start(); // Start the session to access session variables
        // Check if CIN is set in the session
        if (!isset($_SESSION['cin'])) {
            // Output JavaScript to prompt for CIN and validate it on the client side
            echo "<script>
                    function checkSession() {
                        fetch('../session_checker.php', {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.new_session) {
                                promptForCIN();
                            }
                        })
                        .catch(error => console.error('Error:', error));
                    }

                    function promptForCIN() {
                        var cin = prompt('Session expired. Please enter your CIN to confirm:');
                        if (cin != null && cin.trim() !== '') {
                            if (validCINCheck(cin)) {
                                setSessionCIN(cin);
                            } else {
                                alert('Invalid CIN. Please enter a valid CIN.');
                                promptForCIN();
                            }
                        }
                    }

                    function validCINCheck(cin) {
                        var cinValue = cin.toUpperCase();
                        const cinRegex = /^[A-Z][0-9]{5}[A-Z]{2}[0-9]{4}[A-Z]{3}[0-9]{6}$/;
                        const isValidLength = cin.length === 21;
                        return (cinRegex.test(cinValue) && isValidLength);
                    }

                    function setSessionCIN(cin) {
                        fetch('../session_checker.php', {
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
                    checkSession();
                  </script>";
            exit(); // Stop further execution after outputting the JavaScript
        } else {
            $cin = $_SESSION['cin'];
        }
    ?>
    <body>
        <header class="header">
            <h1 class="logo"><a href="#">CUSRS</a></h1>
            <div style="padding-left:20%;" id="cinDiv">
            <?php
            // Display the CIN if it's set
            if (!empty($cin)) {
                echo '<div class="form-label" style="text-align: center; margin-top:1%"><h4>CIN: ' . $cin . '</h4></div>';
            }
            ?>
        </div>
            <ul class="main-nav">
                <li><a href="../print/print_A.php" target="_blank">Print Section A</a></li>
                <li><a href="javascript:printXBRL()">Print XBRL</a></li>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </header>
        <!-------------------------------------------------------------------------------------------------------------------------------------------------->
        <!--                                                                                                                                              -->
        <!--                                                                 main container                                                               -->
        <!--                                                                                                                                              -->
        <!-------------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="container">
            <form method="post"  id="myForm" action="" enctype="multipart/form-data" novalidate>
                <h1>SECTION B: MANAGEMENT AND PROCESS DISCLOSURES</h1>
                <p class="form-label" style="text-align:center;font: size 18px;px;">This section is aimed at helping businesses demonstrate the structures,
                                                                        policies and processes put in place towards adopting the NGRBC Principles and Core Elements.</p>
                <!-------------------------------------------------------------------------------------------------------------------------------------------------->
                <!--                                                                                                                                              -->
                <!--                                                                 Q1 to Q11                                                                    -->
                <!--                                                                                                                                              -->
                <!-------------------------------------------------------------------------------------------------------------------------------------------------->
            
                <!--  Q1 to Q9 START -->
                <div class="bold_border_container">
                    <div class="mb-3">
                        <div class="policy">
                        </div>
                        <div id="dew" class="responsive-table"></br>
                            <table id="p_dew">    
                                <thead>
                                    <th class="form-label" colspan="1" rowspan="2" style="width: 450px;">Disclosure Questions</th>
                                    <th class="form-label" colspan="1" rowspan="2">P1</th>
                                    <th class="form-label" colspan="1" rowspan="2">P2</th>
                                    <th class="form-label" colspan="1" rowspan="2">P3</th>
                                    <th class="form-label" colspan="1" rowspan="2">P4</th>
                                    <th class="form-label" colspan="1" rowspan="2">P5</th>
                                    <th class="form-label" colspan="1" rowspan="2">P6</th>
                                    <th class="form-label" colspan="1" rowspan="2">P7</th>
                                    <th class="form-label" colspan="1" rowspan="2">P8</th>
                                    <th class="form-label" colspan="1" rowspan="2">P9</th>
                                </thead>
                                <tbody>
                                    <th style="text-align: center;" class="form-label" colspan="10">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Policy and management <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;processes </th>
                                </tbody>
                                <!-- Policy and management processes Start -->
                                <tr>
                                    <th class="form-label" style="text-align: left;">1. &nbsp;&nbsp; a. Whether your entity’s policy/policies cover each &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;principle and its core elements of the NGRBCs. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Yes/No)</th>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <th class="form-label" style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b. Has the policy been approved by the Board? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Yes/No)</th>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <th class="form-label" style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c. Web Link of the Policies, if available</th>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <th class="form-label" style="text-align: left;">2. &nbsp;&nbsp;&nbsp;Whether the entity has translated the policy into &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;procedures. (Yes / No) </th>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <th class="form-label" style="text-align: left;">3. &nbsp;&nbsp; Do the enlisted policies extend to your value chain &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;partners? (Yes/No)</th>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <th class="form-label" style="text-align: left;">4. &nbsp;&nbsp; Name of the national and international &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;codes/certifications/labels/ standards (e.g. Forest &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Stewardship Council, Fairtrade, Rainforest Alliance, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trustea) standards (e.g. SA 8000, OHSAS, ISO, BIS) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;adopted by your entity and mapped to each principle</th>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <th class="form-label" style="text-align: left;">5. &nbsp;&nbsp;&nbsp;Specific commitments, goals and targets set by the &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;entity with defined timelines, if any.</th>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <th class="form-label" style="text-align: left;">6. &nbsp;&nbsp; Performance of the entity against the specific &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;commitments, goals and targets along-with reasons &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;in case the same are not met</th>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                    <td><textarea id="dew" name="dew[]" class="form-control"></textarea></td>
                                </tr>
                                <!-- Policy and management processes End -->
                        
                                <!-- Governance, leadership and oversight Start -->
                                <tbody>
                                    <th class="form-label" colspan="10" style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Governance, leadership <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; and oversight </th>
                                </tbody>
                                <tr>
                                    <th style="text-align: left;" class="form-label" >7. &nbsp;&nbsp; Statement by director responsible for the business &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;responsibility report, highlighting ESG related &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;challenges, targets and achievements (listed entity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;has flexibility regarding the placement of this &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;disclosure)</th>
                                    <td colspan="9"><textarea id="stmtdir" name="stmtdir" class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <th style="text-align: left;" class="form-label" >8. &nbsp;&nbsp; Details of the highest authority responsible for &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;implementation and oversight of the Business &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Responsibility policy (ies).</th>
                                    <td colspan="9"><textarea id="dthi" name="dthi" class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <th style="text-align: left;" class="form-label" >9. &nbsp;&nbsp; Does the entity have a specified Committee of the &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Board/ Director responsible for decision making on &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sustainability related issues? (Yes / No). If yes, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;provide details.</th>
                                    <td colspan="9"><textarea id="enspec" name="enspec" class="form-control"></textarea></td>
                                </tr>
                                <!-- Governance, leadership and oversight End -->
                            </table>
                            <div class="policy">
                                <details class="add_comment_detail">
                                    <summary>Add comments</summary>
                                    <textarea class="detail-control" id="p_dew_comments" name="p_dew_comments" placeholder="Enter additional information (if required)"></textarea>
                                </details>
                            </div>
                        </div>
                    </div></br></br>

                    <!--10-Details of Review of NGRBCs by the Company Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label for="gre" class="form-label">10. Details of Review of NGRBCs by the Company: </label>
                        </div>
                            <div id="gre" class="responsive-table">
                                <table id="p_gre">
                                    <tr>
                                        <th style="width: 427px;" class="form-label" colspan="1" rowspan="2"> Subject for Review </th>
                                        <th class="form-label" colspan="9" rowspan="2">Indicate whether review was undertaken by Director / Committee of the Board/ Any other Committee</th>
                                        <th class="form-label" colspan="9" rowspan="2">Frequency(Annually/ Half yearly/ Quarterly/ Any other – please specify)</th>
                                    </tr>
                                    <tbody>
                                        <th class="form-label" colspan="1" rowspan="2"></th>
                                        <th class="form-label" colspan="1" rowspan="2">P1</th>
                                        <th class="form-label" colspan="1" rowspan="2">P2</th>
                                        <th class="form-label" colspan="1" rowspan="2">P3</th>
                                        <th class="form-label" colspan="1" rowspan="2">P4</th>
                                        <th class="form-label" colspan="1" rowspan="2">P5</th>
                                        <th class="form-label" colspan="1" rowspan="2">P6</th>
                                        <th class="form-label" colspan="1" rowspan="2">P7</th>
                                        <th class="form-label" colspan="1" rowspan="2">P8</th>
                                        <th class="form-label" colspan="1" rowspan="2">P9</th>
                                        <th class="form-label" colspan="1" rowspan="2">P1</th>
                                        <th class="form-label" colspan="1" rowspan="2">P2</th>
                                        <th class="form-label" colspan="1" rowspan="2">P3</th>
                                        <th class="form-label" colspan="1" rowspan="2">P4</th>
                                        <th class="form-label" colspan="1" rowspan="2">P5</th>
                                        <th class="form-label" colspan="1" rowspan="2">P6</th>
                                        <th class="form-label" colspan="1" rowspan="2">P7</th>
                                        <th class="form-label" colspan="1" rowspan="2">P8</th>
                                        <th class="form-label" colspan="1" rowspan="2">P9</th>
                                    </tbody>
                                    <tr>
                                        <th style="text-align: left;" class="form-label" id="gre" name="gre[]">Performance against above policies and follow up action</th>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left;" class="form-label" id="gre" name="gre[]">Compliance with statutory requirements of relevance to the principles, and, rectification of any non-compliances</th>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                        <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                    </tr>
                                </table>
                            </div>
                        <details class="add_comment_detail">
                            <summary>Add comments</summary>
                            <textarea class="detail-control" id="p_gre_comments" name="p_gre_comments" placeholder="Enter additional information (if required)"></textarea>
                        </details>
                    </div>
                    <!--10-Details of Review of NGRBCs by the Company End -->

                    <!--11-Has the entity carried out independent assessment/ evaluation of the working of its policies by an external agency? (Yes/No). If yes, provide name of the agency. Start -->
                    <div class="mb-3">
                        <div class="policy">
                        </div> 
                        <div id="question11" class="responsive-table"> 
                            <table id="p_question11">
                                <tr>
                                    <th style="width: 450px; text-align: left;" class="form-label" colspan="1" rowspan="2">11. Has the entity carried out independent assessment/ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;evaluation of the working of its policies by an external &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;agency? (Yes/No). If yes, provide name of the agency</th>
                                    <th class="form-label" colspan="1" rowspan="1">P1</th>
                                    <th class="form-label" colspan="1" rowspan="1">P2</th>
                                    <th class="form-label" colspan="1" rowspan="1">P3</th>
                                    <th class="form-label" colspan="1" rowspan="1">P4</th>
                                    <th class="form-label" colspan="1" rowspan="1">P5</th>
                                    <th class="form-label" colspan="1" rowspan="1">P6</th>
                                    <th class="form-label" colspan="1" rowspan="1">P7</th>
                                    <th class="form-label" colspan="1" rowspan="1">P8</th>
                                    <th class="form-label" colspan="1" rowspan="1">P9</th>
                                </tr>
                                <tr>
                                    <td><textarea id="question11" name="question11[]" class="form-control"></textarea></td>
                                    <td><textarea id="question11" name="question11[]" class="form-control"></textarea></td>
                                    <td><textarea id="question11" name="question11[]" class="form-control"></textarea></td>
                                    <td><textarea id="question11" name="question11[]" class="form-control"></textarea></td>
                                    <td><textarea id="question11" name="question11[]" class="form-control"></textarea></td>
                                    <td><textarea id="question11" name="question11[]" class="form-control"></textarea></td>
                                    <td><textarea id="question11" name="question11[]" class="form-control"></textarea></td>
                                    <td><textarea id="question11" name="question11[]" class="form-control"></textarea></td>
                                    <td><textarea id="question11" name="question11[]" class="form-control"></textarea></td>
                                </tr>
                            </table>
                        </div>
                        <details class="add_comment_detail">
                            <summary>Add comments</summary>
                            <textarea class="detail-control" id="p_question11_comments" name="p_question11_comments" placeholder="Enter additional information (if required)"></textarea>
                        </details>
                    </div>
                    <!-- Has the entity carried out independent assessment/ evaluation of the working of its policies by an external agency? (Yes/No). If yes, provide name of the agency End -->
                </div>
                <!--  Q1 to Q11 END -->          

                <!-------------------------------------------------------------------------------------------------------------------------------------------------->
                <!--                                                                                                                                              -->
                <!--                                                                   Q12                                                                        -->
                <!--                                                                                                                                              -->
                <!--------------------------------------------------------------------------------------------------------------------------------------------------> 

                <!-- If answer to question (1) above is “No” i.e. not all Principles are covered by a policy, reasons to be stated: Start -->
                <div class="bold_border_container">
                    <div class="mb-3">
                        <div class="policy">
                            <label for="gre" class="form-label">12. If answer to question (1) above is “No” i.e. not all Principles are covered by a policy, reasons to be stated:</label>
                        </div>
                        <div id="question12" class="responsive-table">
                           <table id="p_question12">
                                <thead>
                                    <th class="form-label" colspan="1" rowspan="2" style="width: 450px;">Questions</th>
                                    <th class="form-label" colspan="1" rowspan="2">P1</th>
                                    <th class="form-label" colspan="1" rowspan="2">P2</th>
                                    <th class="form-label" colspan="1" rowspan="2">P3</th>
                                    <th class="form-label" colspan="1" rowspan="2">P4</th>
                                    <th class="form-label" colspan="1" rowspan="2">P5</th>
                                    <th class="form-label" colspan="1" rowspan="2">P6</th>
                                    <th class="form-label" colspan="1" rowspan="2">P7</th>
                                    <th class="form-label" colspan="1" rowspan="2">P8</th>
                                    <th class="form-label" colspan="1" rowspan="2">P9</th>
                                </thead>
                                <tr>
                                    <th class="form-label" style="text-align: left;">The entity does not consider the Principles smaterial to its business (Yes/No) </th>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <th class="form-label" style="text-align: left;">The entity is not at a stage where it is in a position to formulate and implement the policies on specified principles (Yes/No)</th>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <th class="form-label" style="text-align: left;">The entity does not have the financial or/human and technical resources available for the task (Yes/No) </th>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <th class="form-label" style="text-align: left;">It is planned to be done in the next financial year (Yes/No)</th>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <th class="form-label" style="text-align: left;">Any other reason (please specify) </th>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                    <td><textarea type="text" id="question12" name="question12[]" class="form-control"></textarea></td>
                                </tr>
                            </table>
                        </div>
                        <div class="policy">
                            <details class="add_comment_detail">
                                <summary>Add comments</summary>
                                <textarea class="detail-control" id="p_question12_comments" name="p_question12_comments" placeholder="Enter additional information (if required)"></textarea>
                            </details>
                        </div>
                    </div>
                </div>
                <!-- If answer to question (1) above is “No” i.e. not all Principles are covered by a policy, reasons to be stated: End -->
                <button type="submit" class="btn btn-primary" onclick="return confirmSubmission()">Submit</button>
            </form>
        </div>

        <script src="sec_B.js"></script>
        <script src="sec_B_form_submit_validation.js"></script>

        <!-------------------------------------------------------------------------------------------------------------------------------------------------->
        <!--                                                                                                                                              -->
        <!--                                                              FOOTER-START                                                                    -->
        <!--                                                                                                                                              -->
        <!--------------------------------------------------------------------------------------------------------------------------------------------------> 
    
        <!-- FOOTER START -->
        <footer class="footer">
            <div class="row">
                <div class="column">
                    <h4>About Us</h4>
                    <p> Christ University Sustainable development and Research group</p>
                </div>
                <div class="column">
                    <h4>Quick Links</h4>
                    <ul>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Sustainable Goals</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i> Contact us</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i> About us</a></li>
                        </ul>
                </div>
                <div class="column">
                    <h4>Connect with Us</h4>
                    <ul class="social-icons">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
            <p class="copyright">© 2023 All Rights Reserved</p>
        </footer>
        <!-- FOOTER END -->

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
