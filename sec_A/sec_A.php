<!DOCTYPE html>
<html>
    <head>
        <title>CRUS</title>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Rashu">
        <meta name="description" content="CRUS">
        <meta name="description" content="Christ">
        <meta name="description" content="Your page description">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <link rel="icon" type="image/jpg" href="../images/cusrrs.jpg"> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="sec_A.css">
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
    </head>

    <body>
        <header class="header" style="width:100%;">
            <h1 class="logo"><a href="#">CUSRS</a></h1>
            <ul class="main-nav">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </header>
      
        <div class="container">
            <form method="post" enctype="multipart/form-data">
                <h1>SECTION A: GENERAL DISCLOSURES</h1>
                <!-------------------------------------------------------------------------------------------------------------------------------------------------->
                <!--                                                                                                                                              -->
                <!--                                                             I. DETAILS OF THE LISTED ENTITY                                                  -->
                <!--                                                                                                                                              -->
                <!--------------------------------------------------------------------------------------------------------------------------------------------------> 
        
                <!-- DETAILS OF THE LISTED ENTITY START -->
                <div class="bold_border_container"> 
                    <!--Detail Of Listed Entity Start-->
                    <div class="mb-3">
                        <div class="policy">
                            <label class="form-header"><span class="roman-numeral-style">I</span>&nbsp;<u>Details of the Listed Entity</u></label>
                        </div>
                    </div>
                    <!--Detail Of Listed Entity END-->

                    <!--1-Corporate Identity Number (CIN) of the Listed Entity Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label for="cin" class="form-label">1. Corporate Identity Number (CIN)<span style="color: red;"> * </span></label>
                        </div>
                        <div class="policy1-val">
                            <input type="text" class="form-control" id="cin" name="cin"  placeholder="Enter CIN of Listed Entity" maxlength="21" required>
                            <div class="val-div">
                                <span id="cinValidationMessage" style="color: red;"></span>
                            </div>
                        </div>
                    </div>
                    <!--1-Corporate Identity Number (CIN) of the Listed Entity End -->

                    <!--2-Name of the Listed Entity Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label for="name" class="form-label">2. Name of the Listed Entity<span style="color: red;"> * </span></label>
                        </div>
                        <div class="policy1-val">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name of Listed Entity" required>
                            <div class="val-div">
                                <span id="nameValidationMessage" style="color: red;"></span>
                            </div>
                        </div>
                    </div>
                    <!--2-Name of the Listed Entity End -->

                   
                    <!--3-Year of incorporation Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label for="incorp_date" class="form-label">3. Year of incorporation<span style="color: red;"> * </span></label>
                        </div>
                        <div class="policy1-no-val">
                            <input class="form-control-drop" id="day_month" name="incorp_date[]" placeholder="Day and Month (optional)">
                            <select class="form-control-drop" id="incorp_date" name="incorp_date[]" required></select>
                        </div>
                    </div>
                    <!--3-Year of incorporation End -->

                    <!--4-Registered Office Address Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label for="office_address" class="form-label">4. Registered Office Address<span style="color: red;"> * </span></label>
                        </div>
                        <div class="policy1-no-val">
                            <input type="text" class="form-control" id="office_address" name="office_address" placeholder="Enter registered address" required>
                        </div>
                    </div>
                    <!--4-Registered Office Address End -->

                    <!--5-Corporate Address Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label for="corporate_address" class="form-label">5. Corporate Address<span style="color: red;"> * </span></label>
                        </div>
                        <div class="policy1-no-val">
                            <input type="text" class="form-control" id="corporate_address" name="corporate_address" placeholder="Enter corporate address" required>
                        </div>
                    </div>
                    <!--5-Corporate Address End -->

                    <!--6-Email Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label for="email1" class="form-label">6. Email Address (Enter only official email ID)<span style="color: red;"> * </span></label>
                        </div>
                        <div class="policy1-val">
                            <input type="text" class="form-control" id="email" name="email[]" placeholder="Enter email address" required>
                            <div class="val-div">
                                <span id="emailValidationMessage1" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="alt-container">
                            <details class="add_comment_detail-val">
                                <summary>Add email</summary>
                                <div class="policy1-val">
                                    <input type="text" class="form-control-alt" id="email" name="email[]" placeholder="Enter alternate email address (optional)">
                                    <div class="val-div">
                                        <span id="emailValidationMessage2" style="color: red;"></span>
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                    <!--6-Email End -->

                    <!--7-Telephone Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label for="telephone1" class="form-label">7. Telephone<span style="color: red;"> * </span></label>
                        </div>
                        <div class="policy1-val">
                            <input type="text" class="form-control" id="telephone" name="telephone[]" placeholder="Enter telephone number" required>
                            <div class="val-div">
                                <span id="telephoneValidationMessage1" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="alt-container">
                            <details class="add_comment_detail-val">
                                <summary>Add telephone</summary>
                                <div class="policy1-val">
                                    <input type="text" class="form-control-alt" id="telephone" name="telephone[]" placeholder="Enter alternate telephone number (optional)">
                                    <div class="val-div">
                                        <span id="telephoneValidationMessage2" style="color: red;"></span>
                                    </div>
                                </div>
                            </details>
                        </div>
                    </div>
                    <!--7-Telephone End -->

                    <!--8-Website Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label for="website" class="form-label">8. Website<span style="color: red;"> * </span></label>
                        </div>
                        <div class="policy1-val">
                            <input type="text" class="form-control" id="website" name="website" placeholder="Enter your website link" required>
                            <div class="val-div">
                                <span id="websiteValidationMessage" style="color: red;"></span>
                            </div>
                        </div>
                    </div>
                    <!--8-Website End -->

                    <!--9-Reporting Financial year Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label for="reporting_fin_year" class="form-label">9. Financial year for which reporting is being done:<span style="color: red;"> * </span></label>
                        </div>
                        <div class="policy1-no-val">
                            <select class="form-control" id="reporting_fin_year" name="reporting_fin_year" onchange="updateYearPlaceholders()" required></select>
                        </div>
                    </div>
                    <!--9-Reporting Financial year End -->

                    <!-- PDF UPLOAD Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label for="incorporation_certificate" class="form-label">Please provide your incorporation certificate as a PDF file (Max 5 MB):<span style="color: red;"> * </span></label>
                        </div>
                        <div class="policy1-val">
                            <input type="file" id="incorporation_certificate" name="uploadedFiles[]" accept=".pdf" required multiple>
                            <div class="val-div">
                                <span id="fileSizeMessage" style="color: red;"></span>
                            </div>
                        </div>
                    </div>
                    <!-- PDF UPLOAD End -->

                    <!--10-Name of the Stock Exchange(s) Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label class="form-label">10. Name of the Stock Exchange(s) where shares are listed:<span style="color: red;"> * </span></label>
                        </div>
                        <div class="policy1-no-val">
                            <div id="stock_name" class="form-exchange-check" required>
                                <input type="checkbox" id="BSE" name="stock_name[]" value="BSE">
                                <label for="BSE">Bombay Stock Exchange (BSE)</label><br>
                                <input type="checkbox" id="NSE" name="stock_name[]" value="NSE">
                                <label for="NSE">National Stock Exchange (NSE)</label><br>
                                <input type="checkbox" id="CSE" name="stock_name[]" value="CSE">
                                <label for="CSE">Calcutta Stock Exchange (CSE)</label><br>
                                <input type="checkbox" id="MSE" name="stock_name[]" value="MSE">
                                <label for="MSE">Madras Stock Exchange (MSE)</label><br>
                                <input type="checkbox" id="DSE" name="stock_name[]" value="DSE">
                                <label for="DSE">Delhi Stock Exchange (DSE)</label><br>
                                <input type="checkbox" id="INX" name="stock_name[]" value="INX">
                                <label for="INX">India International Exchange (INX)</label><br>
                                <input type="checkbox" id="LSE" name="stock_name[]" value="LSE">
                                <label for="LSE">London Stock Exchange (LSE)</label><br>
                                <input type="checkbox" id="SSE" name="stock_name[]" value="SSE">
                                <label for="SSE">Singapore Stock Exchange (SSE)</label>
                            </div>
                            <div class="policy">
                                <details class="add_comment_detail">
                                    <summary>Add comments   (Use symbol "|" to separate stock names.)</summary>
                                    <textarea class="detail-control" id="others" name="stock_name[]" placeholder="Enter additional information (if required)"></textarea>
                                </details>
                            </div>
                        </div>
                    </div>
                    <!--10-Name of the Stock Exchange(s) End -->

                    <!--11-Paid-up Capital Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label for="puc" class="form-label">11. Paid-up Capital<span style="color: red;"> * </span></label>
                        </div>
                        <div class="policy1-val">
                            <input type="text" class="form-control" id="puc" name="puc" placeholder="Enter the paid-up capital" required>
                            <div class="val-div">
                                <span id="pucValidationMessage" style="color: red;"></span>
                            </div>
                        </div>
                    </div>
                    <!--11-Paid-up Capital End -->

                    <!--12-Details of Point of Contact Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label for="details" class="form-label">12. Name and contact details (telephone, email address) of the person who may be contacted in case of any queries on the BRSR report:<span style="color: red;"> * </span></label>
                        </div>
                        <div class="invisible_container">
                            <!-- Name of the Point of Contact Start -->
                            <div class="mb-3-sub-val">
                                <div class="policy">
                                    <label for="poc-name" class="form-label">a. Name<span style="color: red;"> * </span></label>
                                </div>  
                                <input type="text" class="form-control" id="poc-name" name="poc_name" placeholder="Enter the name of the person to contact for queries" required>
                                <div class="val-div-sub">
                                    <span id="poc-name-validation" style="color: red;"></span>
                                </div>
                            </div>
                            <!-- Name of the Point of Contact End -->
            
                            <!-- Phone Number of Point of Contact Start -->
                            <div class="mb-3-sub-val">
                                <div class="policy">
                                    <label for="poc-phone" class="form-label">b. Phone Number<span style="color: red;"> * </span></label>
                                </div>
                                <input type="text" class="form-control" id="poc-phone" name="poc_phone" required placeholder="Enter the contact number"  maxlimit="10">
                                <div class="val-div-sub">
                                    <span id="poc-phone-validation" style="color: red;"></span>
                                </div>
                            </div> 
                            <!-- Phone Number of Point of Contact End -->

                            <!-- Email Address of Point of Contact Start -->
                            <div class="mb-3-sub-val">
                                <div class="policy">
                                    <label for="poc-email" class="form-label">c. Email Address (Enter only official email ID)<span style="color: red;"> * </span></label>
                                </div>
                                <input type="text" class="form-control" id="poc-email" name="poc_email" placeholder="Enter email address" required>
                                <div class="val-div-sub">
                                    <span id="poc-email-validation" style="color: red;"></span>
                                </div>
                            </div>
                            <!-- Email Address of Point of Contact End -->
                        </div>
                    </div>  
                    <!--12-Details of Point of Contact End -->
          
                    <!--13-Reporting boundary Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label for="rep_b" class="form-label">13. Reporting boundary - Are the disclosures under this report made on a standalone basis (i.e. only for the entity) or on a consolidated basis (i.e. for the entity and all the entities
                                                            which form a part of its consolidated financial statements, taken together)?</label>
                        </div>
                        <div class="policy">
                            <label class="form-label"> A reporting boundary identifies the entities within a group that need to be included in a reporting entity's reported metrics (that is, analogous to which entities are consolidated for financial reporting purposes).</label>
                        </div>
                        <div class="policy1-no-val">
                            <select class="form-control" id="rep_b" name="rep_b">
                                <option value="" disabled selected>Select reporting boundary</option>
                                <option value="Standalone">Standalone Basis</option>
                                <option value="Consolidated">Consolidated Basis</option>
                            </select>
                        </div>
                        <div class="policy">
                            <details class="add_comment_detail">
                                <summary>Add comments</summary>
                                <textarea class="detail-control" id="rep_b_comments" name="rep_b_comments" placeholder="Enter additional information (if required)"></textarea>
                            </details>
                        </div>
                    </div>
                    <!--13-Reporting boundary End -->
                </div>
                <!-- DETAILS OF THE LISTED ENTITY END -->

                <!-------------------------------------------------------------------------------------------------------------------------------------------------->
                <!--                                                                                                                                              -->
                <!--                                                              II-PRODUCT/SERVICE                                                              -->
                <!--                                                                                                                                              -->
                <!--------------------------------------------------------------------------------------------------------------------------------------------------> 
        
                <!-- PRODECT/SERVIC START -->
                <div class="bold_border_container">
                    <!--Products/services Start-->
                    <div class="mb-3">
                        <div class="policy">
                            <label class="form-header"><span class="roman-numeral-style">II</span>&nbsp;<u>Products/Services</u></label>
                        </div>
                    </div>
                    <!--Products/services END-->

                    <!--14-Details of Business activities Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label for="doba" class="form-label">14. Details of business activities (accounting for 90% of the turnover):</label>
                        </div>
                        <div id="doba" class="responsive-table">
                            <table id="p_doba">
                                <thead>
                                    <tr>
                                        <th class="form-label">S.No.</th>
                                        <th class="form-label">Description of Main Activity</th>
                                        <th class="form-label">Description of Business Activity</th>
                                        <th class="form-label">% of Turnover of the entity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width:5%;"><input type="number" id="doba" id="p_doba" name="doba[]" class="table-control" required value="1" readonly></td>
                                        <td><input type="text" id="doba" name="doba[]" class="form-control"></td>
                                        <td><input type="text" id="doba" name="doba[]" class="form-control"></td>
                                        <td><input type="text" id="doba" name="doba[]" class="form-control" value="0%" oninput="validateAndUpdatePercentage(this);" onfocus="removeZeroPercentage(this)" onblur="addZeroIfEmptyPercentage(this)"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div>
                                <input type="number" id="indexInput_doba" placeholder="Enter S.No.">
                                <button class="add-remove-row-btn" type="button" onclick="addRowAtIndex('doba')">Add S.No.</button>
                                <button class="add-remove-row-btn" type="button" onclick="removeSpecificRow('doba')">Remove S.No.</button>
                                <button class="add-remove-row-btn" type="button" onclick="addBottomRow('doba')">Add Row</button>
                                <button class="add-remove-row-btn" type="button" onclick="removeBottomRow('doba')">Remove Row</button>
                            </div>
                        </div>
                        <div class="policy">
                            <details class="add_comment_detail">
                                <summary>Add comments</summary>
                                <textarea class="detail-control" id="p_doba_comments" name="p_doba_comments" placeholder="Enter additional information (if required)"></textarea>
                            </details>
                        </div>
                    </div>
                    <!-- Details of Business activities End -->

                    <!--15-Details of the products & services Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label for="dops" class="form-label">15. Products/Services sold by the entity (accounting for 90% of the entity’s Turnover):</label>
                        </div>
                        <div id="dops" class="responsive-table">
                            <table id="p_dops">
                                <thead>
                                    <tr>
                                        <th class="form-label">S.No.</th>
                                        <th class="form-label">Product/Service</th>
                                        <th class="form-label">NIC Code</th>
                                        <th class="form-label">% of total Turnover contributed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width:5%;"><input type="number" id="dops" id="p_dops" name="dops[]" class="table-control" value="1" readonly required ></td>
                                        <td><input type="text" id="dops" name="dops[]" class="form-control"></td>
                                        <td><input type="text" id="dops" name="dops[]" class="form-control"></td>
                                        <td><input type="text" id="dops" name="dops[]" class="form-control" value="0%" oninput="validateAndUpdatePercentage(this);" onfocus="removeZeroPercentage(this)" onblur="addZeroIfEmptyPercentage(this)"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div>
                                <input type="number" id="indexInput_dops" placeholder="Enter S.No.">
                                <button class="add-remove-row-btn" type="button" onclick="addRowAtIndex('dops')">Add S.No.</button>
                                <button class="add-remove-row-btn" type="button" onclick="removeSpecificRow('dops')">Remove S.No.</button>
                                <button class="add-remove-row-btn" type="button" onclick="addBottomRow('dops')">Add Row</button>
                                <button class="add-remove-row-btn" type="button" onclick="removeBottomRow('dops')">Remove Row</button>
                            </div>
                        </div>
                        <div class="policy">
                            <details class="add_comment_detail">
                                <summary>Add comments</summary>
                                <textarea class="detail-control" id="p_dops_comments" name="p_dops_comments" placeholder="Enter additional information (if required)"></textarea>
                            </details>
                        </div>
                    </div>
                </div>
                <!-- PRODECT/SERVIC END -->

                <!-------------------------------------------------------------------------------------------------------------------------------------------------->
                <!--                                                                                                                                              -->
                <!--                                                              III-OPERATIONS                                                                  -->
                <!--                                                                                                                                              -->
                <!--------------------------------------------------------------------------------------------------------------------------------------------------> 
        
                <!-- OPERATIONS START -->
                <div class="bold_border_container">
                    <div class="mb-3">
                        <div class="policy">
                            <label class="form-header"><span class="roman-numeral-style">III</span>&nbsp;<u>Operations</u></label>
                        </div>
                    </div>

                    <!--16-Number of locations Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label for="nol" class="form-label">16. National + International  locations where plants and/or operations/offices of the entity are situated:</label>
                        </div>
                        <div id="nol" class="responsive-table">
                            <table id="p_nol">
                                <thead>
                                    <tr>
                                        <th class="form-label">Location</th>
                                        <th class="form-label">Number of plants</th>
                                        <th class="form-label">Number of offices</th>
                                        <th class="form-label">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="form-label" id="nol" id="p_nol" name="nol[]" class="form-control">National</th>
                                        <td><input type="number" name="nol[]" oninput="calculate16(this)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" class="form-control nol-input" value="0"></td>
                                        <td><input type="number" name="nol[]" oninput="calculate16(this)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" class="form-control nol-input" value="0"></td>
                                        <td><input type="number" name="nol[]" class="form-control nol-total" value="0" readonly></td>
                                    </tr>
                                    <tr>
                                        <th class="form-label" id="nol" id="p_nol" name="nol[]" class="form-control">International</th>
                                        <td><input type="number" id="nol" name="nol[]" oninput="calculate16(this)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" class="form-control nol-input" value="0"></td>
                                        <td><input type="number" id="nol" name="nol[]" oninput="calculate16(this)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" class="form-control nol-input" value="0"></td>
                                        <td><input type="number" id="nol" name="nol[]" class="form-control nol-total" value="0" readonly></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="policy">
                            <details class="add_comment_detail">
                                <summary>Add comments</summary>
                                <textarea class="detail-control" id="p_nol_comments" name="p_nol_comments" placeholder="Enter additional information (if required)"></textarea>
                            </details>
                        </div>
                    </div>
                    <!-- Number of locations End -->

                    <!--17-Details regarding markets served by the entity Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label for="drm" class="form-label">17. Markets served by the entity:</label>
                        </div>
                        <div class="invisible_container">
                            <!--17a Number of locations START -->
                            <div class="mb-3-sub-comment">
                                <div class="policy">
                                    <label for="drm" class="form-label">a. National + International locations:</label>
                                </div>
                                <div id="drm" class="responsive-table">
                                    <table id="p_drm">
                                        <thead>
                                            <tr>
                                                <th class="form-label">Location</th>
                                                <th class="form-label">Number of plants</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th class="form-label" id="drm" id="p_drm" name="drm[]" class="form-control">National (No. of States)</th>
                                                <td><input type="number" id="drm" name="drm[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            </tr>
                                            <tr>
                                                <th class="form-label" id="drm" id="p_drm" name="drm[]" class="form-control">National (No. of Union Territories)</th>
                                                <td><input type="number" id="drm" name="drm[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            </tr>
                                            <tr>
                                                <th class="form-label" id="drm" id="p_drm" name="drm[]" class="form-control">International (No. of Countries)</th>
                                                <td><input type="number" id="drm" name="drm[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <details class="add_comment_detail">
                                    <summary>Add comments</summary>
                                    <textarea class="detail-control" id="p_drm_comments" name="p_drm_comments" placeholder="Enter additional information (if required)"></textarea>
                                </details>
                            </div>
                            <!--17a Number of locations START -->
            
                            <!--17b What is the contribution of exports as a percentage of the total turnover of the entity? START -->
                            <div class="mb-3-sub">
                                <div class="policy">
                                    <label for="drm_contribution_export" class="form-label">b. What is the contribution of exports as a percentage of the total turnover of the entity?</label>
                                </div>
                                <input type="text" class="form-control" id="drm_contribution_export" name="drm_contribution_export" placeholder="What is the contribution of exports as a percentage of the total turnover of the entity?">
                            </div>
                            <!--17b What is the contribution of exports as a percentage of the total turnover of the entity? END -->
            
                            <!--17c A brief on types of customers START -->
                            <div class="mb-3-sub-last">
                                <div class="policy">
                                    <label for="drm_types_customers" class="form-label">c. A brief on types of customers:</label>
                                </div>
                                <textarea type="text" class="form-control" id="drm_types_customers" name="drm_types_customers" placeholder="A brief on types of customers"></textarea>
                            </div>
                            <!--17c A brief on types of customers END -->
                        </div>
                        <!-- Details regarding markets served by the entity End -->
                    </div>
                </div>    
                <!-- OPERATIONS END -->

                <!-------------------------------------------------------------------------------------------------------------------------------------------------->
                <!--                                                                                                                                              -->
                <!--                                                              IV-EMPLOYEES                                                                    -->
                <!--                                                                                                                                              -->
                <!-------------------------------------------------------------------------------------------------------------------------------------------------->
        
                <!-- EMPLOYEES SRART -->
                <div class="bold_border_container">
                    <div class="mb-3">
                        <div class="policy">
                            <label class="form-header"><span class="roman-numeral-style">IV</span>&nbsp;<u>Employees</u></label>
                        </div> 
                    </div>
                    <div class="mb-3">
                        <div class="policy">
                            <label class="form-label">18. Details as at the end of Financial Year:</label>
                        </div>
                        <div class="invisible_container">
                            <!-- 18a. Employees and workers (including differently abled) Start -->
                            <div class="mb-3-sub-comment">
                                <div class="policy">
                                    <label for="dew" class="form-label">a. Details of Employees & Workers:</label>
                                </div>
                                <div id="dew" class="responsive-table">
                                    <table id="p_dew">
                                        <tr>
                                            <th class="form-label" colspan="1" rowspan="2"> S. No.</th>
                                            <th class="form-label" colspan="1" rowspan="2">Particulars</th>
                                            <th class="form-label" colspan="1" rowspan="2">Total (A)</th>
                                            <th class="form-label" colspan="2">Male</th>
                                            <th class="form-label" colspan="2">Female</th>
                                        </tr>
                                        <tr>
                                            <th class="form-label">No. (B)</th>
                                            <th class="form-label">%(B/A)</th>
                                            <th class="form-label">No. (C)</th>
                                            <th class="form-label">%(C/A)</th>
                                        </tr>
                                        <tr>
                                            <th class="form-label" colspan="7"><u> EMPLOYEES </u></th>
                                        </tr>
                                        <tr>
                                            <th class="form-label">1.</th>
                                            <th class="form-label">Permanent (D)</th>
                                            <td><input type="number" step="0.01" id="dew" name="dew[]" class="form-control" oninput="calculatePercentages18a('p_dew', 3)" value="0" readonly></td>
                                            <td><input type="number" step="0.01" id="dew" name="dew[]" class="form-control" oninput="calculatePercentages18a('p_dew', 3)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dew" name="dew[]" class="form-control" value="0%" readonly></td>
                                            <td><input type="number" step="0.01" id="dew" name="dew[]" class="form-control" oninput="calculatePercentages18a('p_dew', 3)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dew" name="dew[]" class="form-control" value="0%" readonly></td>
                                        </tr>
                                        <tr>
                                            <th class="form-label">2.</th>
                                            <th class="form-label">Other than Permanent (E)</th>  
                                            <td><input type="number" step="0.01" id="dew" name="dew[]" class="form-control" oninput="calculatePercentages18a('p_dew', 4)" value="0" readonly></td>
                                            <td><input type="number" step="0.01" id="dew" name="dew[]" class="form-control" oninput="calculatePercentages18a('p_dew', 4)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dew" name="dew[]" class="form-control" value="0%" readonly></td>
                                            <td><input type="number" step="0.01" id="dew" name="dew[]" class="form-control" oninput="calculatePercentages18a('p_dew', 4)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dew" name="dew[]" class="form-control" value="0%" readonly></td>
                                        </tr>
                                        <tr>
                                            <th class="form-label">3.</th>
                                            <th class="form-label">Total employees (D + E)</th>
                                            <td><input type="number" step="0.01" id="dew" name="dew[]" class="form-control" oninput="calculatePercentages18a('p_dew', 5)" value="0" readonly></td>
                                            <td><input type="number" step="0.01" id="dew" name="dew[]" class="form-control" oninput="calculatePercentages18a('p_dew', 5)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dew" name="dew[]" class="form-control" value="0%" readonly></td>
                                            <td><input type="number" step="0.01" id="dew" name="dew[]" class="form-control" oninput="calculatePercentages18a('p_dew', 5)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dew" name="dew[]" class="form-control" value="0%" readonly></td>
                                        </tr>
                                        <tr>
                                            <th class="form-label" colspan="7"><u> WORKERS </u></th>
                                        </tr>
                                        <tr>
                                            <th class="form-label">4.</th>
                                            <th class="form-label">Permanent (F)</th>
                                            <td><input type="number" step="0.01" id="dew" name="dew[]" class="form-control" oninput="calculatePercentages18a('p_dew', 7)" value="0" readonly></td>
                                            <td><input type="number" step="0.01" id="dew" name="dew[]" class="form-control" oninput="calculatePercentages18a('p_dew', 7)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dew" name="dew[]" class="form-control" value="0%" readonly></td>
                                            <td><input type="number" step="0.01" id="dew" name="dew[]" class="form-control" oninput="calculatePercentages18a('p_dew', 7)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dew" name="dew[]" class="form-control" value="0%" readonly></td>
                                        </tr>
                                        <tr>
                                            <th class="form-label">5.</th>
                                            <th class="form-label">Other than Permanent (G)</th>
                                            <td><input type="number" step="0.01" id="dew" name="dew[]" class="form-control" oninput="calculatePercentages18a('p_dew', 8)" value="0" readonly></td>
                                            <td><input type="number" step="0.01" id="dew" name="dew[]" class="form-control" oninput="calculatePercentages18a('p_dew', 8)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dew" name="dew[]" class="form-control" value="0%" readonly></td>
                                            <td><input type="number" step="0.01" id="dew" name="dew[]" class="form-control" oninput="calculatePercentages18a('p_dew', 8)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dew" name="dew[]" class="form-control" value="0%" readonly></td>
                                        </tr>
                                        <tr>
                                            <th class="form-label">6.</th>
                                            <th class="form-label">Total workers (F + G)</th>
                                            <td><input type="number" step="0.01" id="dew" name="dew[]" class="form-control" oninput="calculatePercentages18a('p_dew', 9)" value="0" readonly></td>
                                            <td><input type="number" step="0.01" id="dew" name="dew[]" class="form-control" oninput="calculatePercentages18a('p_dew', 9)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dew" name="dew[]" class="form-control" value="0%" readonly></td>
                                            <td><input type="number" step="0.01" id="dew" name="dew[]" class="form-control" oninput="calculatePercentages18a('p_dew', 9)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dew" name="dew[]" class="form-control" value="0%" readonly></td>
                                        </tr>
                                    </table>
                                </div>
                                <details class="add_comment_detail">
                                    <summary>Add comments</summary>
                                    <textarea class="detail-control" id="p_dew_comments" name="p_dew_comments" placeholder="Enter additional information (if required)"></textarea>
                                </details>
                            </div>
                            <!-- 18a. Employees and workers (including differently abled) End -->

                            <!-- 18b. Differently abled employees and workers start -->
                            <div class="mb-3-sub-last">
                                <div class="policy">
                                    <label for="dewda" class="form-label">b. Differently abled employees and workers:</label>
                                </div>
                                <div id="dewda" class="responsive-table">
                                    <table id="p_dewda">
                                        <tr>
                                            <th class="form-label" colspan="1" rowspan="2">S. No.</th>
                                            <th class="form-label" colspan="1" rowspan="2">Particulars</th>
                                            <th class="form-label" colspan="1" rowspan="2">Total (A)</th>
                                            <th class="form-label" colspan="2">Male</th>
                                            <th class="form-label" colspan="2">Female</th>
                                        </tr>
                                        <tr>
                                            <th class="form-label">No. (B)</th>
                                            <th class="form-label">%(B/A)</th>
                                            <th class="form-label">No. (C)</th>
                                            <th class="form-label">%(C/A)</th>
                                        </tr>
                                        <tr>
                                            <th class="form-label" colspan="7"><u> DIFFERENTLY ABLED EMPLOYEES </u></th>
                                        </tr>
                                        <tr>
                                            <th class="form-label" id="dewda" name="dewda[]">1.</th>
                                            <th class="form-label" id="dewda" name="dewda[]">Permanent (D)</th>
                                            <td><input type="number" step="0.01" id="dewda" name="dewda[]" class="form-control" oninput="calculatePercentages18b('p_dewda', 3)" value="0" readonly></td>
                                            <td><input type="number" step="0.01" id="dewda" name="dewda[]" class="form-control" oninput="calculatePercentages18b('p_dewda', 3)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dewda" name="dewda[]" class="form-control" value="0%" readonly></td>
                                            <td><input type="number" step="0.01" id="dewda" name="dewda[]" class="form-control" oninput="calculatePercentages18b('p_dewda', 3)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dewda" name="dewda[]" class="form-control" value="0%" readonly></td>
                                        </tr>
                                        <tr>
                                            <th class="form-label" id="dewda" name="dewda[]">2.</th>
                                            <th class="form-label" id="dewda" name="dewda[]">Other than Permanent (E)</th>
                                            <td><input type="number" step="0.01" id="dewda" name="dewda[]" class="form-control" oninput="calculatePercentages18b('p_dewda', 4)" value="0" readonly></td>
                                            <td><input type="number" step="0.01" id="dewda" name="dewda[]" class="form-control" oninput="calculatePercentages18b('p_dewda', 4)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dewda" name="dewda[]" class="form-control" value="0%" readonly></td>
                                            <td><input type="number" step="0.01" id="dewda" name="dewda[]" class="form-control" oninput="calculatePercentages18b('p_dewda', 4)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dewda" name="dewda[]" class="form-control" value="0%" readonly></td>
                                        </tr>
                                        <tr>
                                            <th class="form-label" id="dewda" name="dewda[]">3.</th>
                                            <th class="form-label" id="dewda" name="dewda[]">Total differently abled employees (D + E)</th>
                                            <td><input type="number" step="0.01" id="dewda" name="dewda[]" class="form-control" oninput="calculatePercentages18b('p_dewda', 5)" value="0" readonly></td>
                                            <td><input type="number" step="0.01" id="dewda" name="dewda[]" class="form-control" oninput="calculatePercentages18b('p_dewda', 5)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dewda" name="dewda[]" class="form-control" value="0%" readonly></td>
                                            <td><input type="number" step="0.01" id="dewda" name="dewda[]" class="form-control" oninput="calculatePercentages18b('p_dewda', 5)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dewda" name="dewda[]" class="form-control" value="0%" readonly></td>
                                        </tr>
                                        <tr>
                                            <th class="form-label" colspan="7"><u> DIFFERENTLY ABLED WORKERS </u></th>
                                        </tr>
                                        <tr>
                                            <th class="form-label" id="dewda" name="dewda[]">4.</th>
                                            <th class="form-label" id="dewda" name="dewda[]">Permanent (F)</th>
                                            <td><input type="number" step="0.01" id="dewda" name="dewda[]" class="form-control" oninput="calculatePercentages18b('p_dewda', 7)" value="0" readonly></td>
                                            <td><input type="number" step="0.01" id="dewda" name="dewda[]" class="form-control" oninput="calculatePercentages18b('p_dewda', 7)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dewda" name="dewda[]" class="form-control" value="0%" readonly></td>
                                            <td><input type="number" step="0.01" id="dewda" name="dewda[]" class="form-control" oninput="calculatePercentages18b('p_dewda', 7)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dewda" name="dewda[]" class="form-control"  value="0%" readonly></td>
                                        </tr>
                                        <tr>
                                            <th class="form-label" id="dewda" name="dewda[]">5.</th>
                                            <th class="form-label" id="dewda" name="dewda[]">Other than Permanent (G)</th>
                                            <td><input type="number" step="0.01" id="dewda" name="dewda[]" class="form-control" oninput="calculatePercentages18b('p_dewda', 8)" value="0" readonly></td>
                                            <td><input type="number" step="0.01" id="dewda" name="dewda[]" class="form-control" oninput="calculatePercentages18b('p_dewda', 8)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dewda" name="dewda[]" class="form-control" value="0%" readonly></td>
                                            <td><input type="number" step="0.01" id="dewda" name="dewda[]" class="form-control" oninput="calculatePercentages18b('p_dewda', 8)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dewda" name="dewda[]" class="form-control" value="0%" readonly></td>
                                        </tr>
                                        <tr>
                                            <th class="form-label" id="dewda" name="dewda[]">6.</th>
                                            <th class="form-label" id="dewda" name="dewda[]">Total differently abled workers (F + G)</th>
                                            <td><input type="number" step="0.01" id="dewda" name="dewda[]" class="form-control" oninput="calculatePercentages18b('p_dewda', 9)" value="0" readonly></td>
                                            <td><input type="number" step="0.01" id="dewda" name="dewda[]" class="form-control" oninput="calculatePercentages18b('p_dewda', 9)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dewda" name="dewda[]" class="form-control" value="0%" readonly></td>
                                            <td><input type="number" step="0.01" id="dewda" name="dewda[]" class="form-control" oninput="calculatePercentages18b('p_dewda', 9)" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                            <td><input type="text" step="0.01" id="dewda" name="dewda[]" class="form-control" value="0%" readonly></td>
                                        </tr>
                                    </table>
                                </div>
                                <details class="add_comment_detail">
                                    <summary>Add comments</summary>
                                    <textarea class="detail-control" id="p_dewda_comments" name="p_dewda_comments" placeholder="Enter additional information (if required)"></textarea>
                                </details>
                            </div>
                            <!-- 18b. Differently abled employees and workers End -->
                        </div>
                    </div>
          
                    <!--19-Participation/Inclusion/Representation of Women Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label for="pirw" class="form-label">19. Participation/Inclusion/Representation of women:</label>
                        </div>
                        <div id="pirw" class="responsive-table">
                            <table id="p_pirw">
                                <tr>
                                    <th class="form-label" colspan="1" rowspan="2"></th>
                                    <th class="form-label" colspan="1" rowspan="2">Total (A)</th>
                                    <th class="form-label" colspan="2" rowspan="1">No. and percentage of Females</th>
                                </tr>
                                <tr>
                                    <th class="form-label">No. (B)</th>
                                    <th class="form-label">%(B/A)</th>
                                </tr>
                                <tr>
                                    <th class="form-label">Board of Directors</th>
                                    <td><input type="number" step="0.01" id="pirw" name="pirw[]" oninput="calculate19(this)" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><input type="number" step="0.01" id="pirw" name="pirw[]" oninput="calculate19(this)" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><input type="text" step="0.01" id="pirw" name="pirw[]" class="form-control" value="0%" readonly></td>
                                </tr>
                                <tr>
                                    <th class="form-label">Key Management <br> Personnel</th>
                                    <td><input type="number" step="0.01" id="pirw" name="pirw[]" oninput="calculate19(this)" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><input type="number" step="0.01" id="pirw" name="pirw[]" oninput="calculate19(this)" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><input type="text" step="0.01" id="pirw" name="pirw[]" class="form-control" value="0%" readonly></td>
                                </tr>
                            </table>
                        </div>
                        <div class="policy">
                            <details class="add_comment_detail">
                                <summary>Add comments</summary>
                                <textarea class="detail-control" id="p_pirw_comments" name="p_pirw_comments" placeholder="Enter additional information (if required)"></textarea>
                            </details>
                        </div>
                    </div>
                    <!--19-Participation/Inclusion/Representation of Women End -->

                    <!--20-Turnover rate for permanent employees & workers (For past 3 years) Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label for="torpew" class="form-label">20. Turnover rate for permanent employees and workers (Disclose trends for the past 3 years):</label>
                        </div>
                        <div id="torpew" class="responsive-table">
                            <table id="p_torpew">
                                <tr>
                                    <th class="form-label" rowspan="2"></th>
                                    <th class="form-label" colspan="3"> <span id="currentYearPlaceholder"></span><br>(Turnover rate in current<br> FY)</th>
                                    <th class="form-label" colspan="3">FY <span id="prevYearPlaceholder1"></span>-<span id="prevYearPlaceholder2"></span><br>(Turnover rate in<br> previous FY)</th>
                                    <th class="form-label" colspan="3">FY <span id="yearBeforePrevPlaceholder1"></span>-<span id="yearBeforePrevPlaceholder2"></span><br>(Turnover rate in the year prior to the<br> previous FY)</th>
                                </tr>
                                <tr>
                                    <th class="form-label">Male</th>
                                    <th class="form-label">Female</th>
                                    <th class="form-label">Total</th>
                                    <th class="form-label">Male</th>
                                    <th class="form-label">Female</th>
                                    <th class="form-label">Total</th>
                                    <th class="form-label">Male</th>
                                    <th class="form-label">Female</th>
                                    <th class="form-label">Total</th>
                                </tr>
                                <tr>
                                    <th class="form-label">Permanent Employees</th>
                                    <td><input type="text" step="0.01" id="torpew" name="torpew[]" class="form-control" value="0%" oninput="validateAndUpdatePercentage(this);" onfocus="removeZeroPercentage(this)" onblur="addZeroIfEmptyPercentage(this)"></td>
                                    <td><input type="text" step="0.01" id="torpew" name="torpew[]" class="form-control" value="0%" oninput="validateAndUpdatePercentage(this);" onfocus="removeZeroPercentage(this)" onblur="addZeroIfEmptyPercentage(this)"></td>
                                    <td><input type="text" step="0.01" id="torpew" name="torpew[]" class="form-control" value="0%" oninput="validateAndUpdatePercentage(this);" onfocus="removeZeroPercentage(this)" onblur="addZeroIfEmptyPercentage(this)"></td>
                                    <td><input type="text" step="0.01" id="torpew" name="torpew[]" class="form-control" value="0%" oninput="validateAndUpdatePercentage(this);" onfocus="removeZeroPercentage(this)" onblur="addZeroIfEmptyPercentage(this)"></td>
                                    <td><input type="text" step="0.01" id="torpew" name="torpew[]" class="form-control" value="0%" oninput="validateAndUpdatePercentage(this);" onfocus="removeZeroPercentage(this)" onblur="addZeroIfEmptyPercentage(this)"></td>
                                    <td><input type="text" step="0.01" id="torpew" name="torpew[]" class="form-control" value="0%" oninput="validateAndUpdatePercentage(this);" onfocus="removeZeroPercentage(this)" onblur="addZeroIfEmptyPercentage(this)"></td>
                                    <td><input type="text" step="0.01" id="torpew" name="torpew[]" class="form-control" value="0%" oninput="validateAndUpdatePercentage(this);" onfocus="removeZeroPercentage(this)" onblur="addZeroIfEmptyPercentage(this)"></td>
                                    <td><input type="text" step="0.01" id="torpew" name="torpew[]" class="form-control" value="0%" oninput="validateAndUpdatePercentage(this);" onfocus="removeZeroPercentage(this)" onblur="addZeroIfEmptyPercentage(this)"></td>
                                    <td><input type="text" step="0.01" id="torpew" name="torpew[]" class="form-control" value="0%" oninput="validateAndUpdatePercentage(this);" onfocus="removeZeroPercentage(this)" onblur="addZeroIfEmptyPercentage(this)"></td>
                                </tr>
                                <tr>
                                    <th class="form-label">Permanent Workers</th>
                                    <td><input type="text" step="0.01" id="torpew" name="torpew[]" class="form-control" value="0%" oninput="validateAndUpdatePercentage(this);" onfocus="removeZeroPercentage(this)" onblur="addZeroIfEmptyPercentage(this)"></td>
                                    <td><input type="text" step="0.01" id="torpew" name="torpew[]" class="form-control" value="0%" oninput="validateAndUpdatePercentage(this);" onfocus="removeZeroPercentage(this)" onblur="addZeroIfEmptyPercentage(this)"></td>
                                    <td><input type="text" step="0.01" id="torpew" name="torpew[]" class="form-control" value="0%" oninput="validateAndUpdatePercentage(this);" onfocus="removeZeroPercentage(this)" onblur="addZeroIfEmptyPercentage(this)"></td>
                                    <td><input type="text" step="0.01" id="torpew" name="torpew[]" class="form-control" value="0%" oninput="validateAndUpdatePercentage(this);" onfocus="removeZeroPercentage(this)" onblur="addZeroIfEmptyPercentage(this)"></td>
                                    <td><input type="text" step="0.01" id="torpew" name="torpew[]" class="form-control" value="0%" oninput="validateAndUpdatePercentage(this);" onfocus="removeZeroPercentage(this)" onblur="addZeroIfEmptyPercentage(this)"></td>
                                    <td><input type="text" step="0.01" id="torpew" name="torpew[]" class="form-control" value="0%" oninput="validateAndUpdatePercentage(this);" onfocus="removeZeroPercentage(this)" onblur="addZeroIfEmptyPercentage(this)"></td>
                                    <td><input type="text" step="0.01" id="torpew" name="torpew[]" class="form-control" value="0%" oninput="validateAndUpdatePercentage(this);" onfocus="removeZeroPercentage(this)" onblur="addZeroIfEmptyPercentage(this)"></td>
                                    <td><input type="text" step="0.01" id="torpew" name="torpew[]" class="form-control" value="0%" oninput="validateAndUpdatePercentage(this);" onfocus="removeZeroPercentage(this)" onblur="addZeroIfEmptyPercentage(this)"></td>
                                    <td><input type="text" step="0.01" id="torpew" name="torpew[]" class="form-control" value="0%" oninput="validateAndUpdatePercentage(this);" onfocus="removeZeroPercentage(this)" onblur="addZeroIfEmptyPercentage(this)"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="policy">
                            <details class="add_comment_detail">
                                <summary>Add comments</summary>
                                <textarea class="detail-control" id="p_torpew_comments" name="p_torpew_comments" placeholder="Enter additional information (if required)"></textarea>
                            </details>
                        </div>
                    </div>
                    <!--20 Turnover rate for permanent employees & workers (For past 3 years) End -->
                </div>
                <!-- EMPLOYEES END -->
        
                <!-------------------------------------------------------------------------------------------------------------------------------------------------->
                <!--                                                                                                                                              -->
                <!--                                    V. Holding, Subsidiary and Associate Companies (including joint ventures)                                 -->
                <!--                                                                                                                                              -->
                <!--------------------------------------------------------------------------------------------------------------------------------------------------> 
        
                <!-- Names of holding / subsidiary / associate companies / joint ventures START -->
                <div class="bold_border_container">
                    <div class="mb-3">
                        <div class="policy">
                            <label class="form-header"><span class="roman-numeral-style">V</span>&nbsp;<u>Holding, Subsidiary and Associate Companies (including joint ventures)</u></label>
                        </div> 
                    </div>
                    <!-- (a) Names of holding / subsidiary / associate companies / joint ventures Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label for="holding" class="form-label">21. (a) Names of holding / subsidiary / associate companies / joint ventures</label>
                        </div>
                        <div id="holding" class="responsive-table">
                            <table id="p_holding">
                                <thead>
                                    <tr>
                                        <th class="form-label">S.No.</th>
                                        <th class="form-label">Name of the holding &ensp;/ subsidiary / associate &emsp;companies / joint ventures (A)</th>
                                        <th class="form-label">Indicate whether holding/ Subsidiary/ Associate/ Joint Venture</th>
                                        <th class="form-label">% of shares held by listed entity</th>
                                        <th class="form-label">Does the entity indicated at column A, participate in the Business Responsibility initiatives of the listed entity? (Yes/No) </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width:5%;"><input type="number" id="holding" id="p_holding" name="holding[]" class="table-control" value="1" readonly></td>
                                        <td><input type="text" id="holding" name="holding[]" class="form-control"></td>
                                        <td><input type="text" id="holding" name="holding[]" class="form-control"></td>
                                        <td><input type="text" id="holding" name="holding[]" class="form-control" value="0%" oninput="validateAndUpdatePercentage(this);" onfocus="removeZeroPercentage(this)" onblur="addZeroIfEmptyPercentage(this)"></td>
                                        <td><input type="text" id="holding" name="holding[]" class="form-control"></td>
                                    </tr>
                                <tbody>
                            </table>
                            <div>
                                <input type="number" id="indexInput_holding" placeholder="Enter S.No.">
                                <button class="add-remove-row-btn" type="button" onclick="addRowAtIndex('holding')">Add S.No.</button>
                                <button class="add-remove-row-btn" type="button" onclick="removeSpecificRow('holding')">Remove S.No.</button>
                                <button class="add-remove-row-btn" type="button" onclick="addBottomRow('holding')">Add Row</button>
                                <button class="add-remove-row-btn" type="button" onclick="removeBottomRow('holding')">Remove Row</button>
                            </div>
                        </div>
                        <div class="policy">
                            <details class="add_comment_detail">
                                <summary>Add comments</summary>
                                <textarea class="detail-control" id="p_holding_comments" name="p_holding_comments" placeholder="Enter additional information (if required)"></textarea>
                            </details>
                        </div>
                    </div>
                    <!-- (a) Names of holding / subsidiary / associate companies / joint ventures End -->
                </div>
                <!-- Names of holding / subsidiary / associate companies / joint ventures END -->

                <!-------------------------------------------------------------------------------------------------------------------------------------------------->
                <!--                                                                                                                                              -->
                <!--                                                   VI. CSR Details                                                                            -->
                <!--                                                                                                                                              -->
                <!--------------------------------------------------------------------------------------------------------------------------------------------------> 

                <!-- CSR DETAILS START -->
                <div class="bold_border_container">
                    <div class="mb-3">
                        <div class="policy">
                            <label class="form-header"><span class="roman-numeral-style">VI</span>&nbsp;<u>CSR Details</u></label>
                        </div> 
                    </div>
                    <div class="mb-3">
                        <div class="policy">
                            <label for="csr_act" class="form-label">22. (i) Whether CSR is applicable as per section 135 of Companies Act, 2013:</label>
                        </div>
                        <div class="invisible_container-sub22">
                            <input type="text" class="form-control" id="csr_act" name="csr_act" placeholder="Enter CSR details as per section 135 of Companies Act, 2013" required>
                        </div>
                    </div>
                    <!-- (i) Whether CSR is applicable as per section 135 of Companies Act, 2013: (Yes/No) End -->

                    <div class="invisible_container-sub22">
                        <!-- (ii) Turnover (in Rs.) Start -->
                        <div class="mb-3-sub-val">
                            <div class="policy">
                                <label for="csr_turnover" class="form-label">(ii) Turnover (in Rs.)</label>
                            </div>
                            <input type="text" class="form-control" id="csr_turnover" name="csr_turnover" placeholder="Enter the turnover (in Rs.)" required>
                            <div class="val-div-sub">
                                <span id="csr_turnoverValidationMessage" style="color: red;"></span>
                            </div>
                        </div> 
                        <!-- (ii) Turnover (in Rs.) End -->

                        <!-- (iii) Net worth (in Rs.) Start -->
                        <div class="mb-3-sub-last-val">
                            <div class="policy">
                                <label for="csr_networth" class="form-label">(iii) Net worth (in Rs.)</label>
                            </div>
                            <input type="text" class="form-control" id="csr_networth" name="csr_networth" placeholder="Enter net worth (in Rs.)" required>
                            <div class="val-div-sub">
                                <span id="csr_networthValidationMessage" style="color: red;"></span>
                            </div>
                        </div>
                    <!-- (iii) Net worth (in Rs) End -->
                    </div>
                </div>
                <!-- CSR DETAILS END -->
        
                <!-------------------------------------------------------------------------------------------------------------------------------------------------->
                <!--                                                                                                                                              -->
                <!--                                                   VII. Transparency and Disclosures Compliances                                              -->
                <!--                                                                                                                                              -->
                <!--------------------------------------------------------------------------------------------------------------------------------------------------> 
        
                <!-- Transparency and Disclosures Compliances START -->
                <div class="bold_border_container">
                    <div class="mb-3">
                        <div class="policy">
                            <label class="form-header"><span class="roman-numeral-style">VII</span>&nbsp;<u>Transparency and Disclosures Compliances</u></label>
                        </div>
                    </div>

                    <!--23-Grievance redressal Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label for="gre" class="form-label">23. Complaints/Grievances on any of the principles (Principles 1 to 9) under the National Guidelines on Responsible Business Conduct:<span style="color: red;"> * </span></label>
                        </div>
                        <div id="gre" class="responsive-table">
                            <table id="p_gre">
                                <tr>
                                    <th class="form-label" colspan="1" rowspan="2"> Stakeholder group</br>from whom complaint</br>is received</th>
                                    <th class="form-label" colspan="1" rowspan="2">Grievance</br>Redressal Mechanism </br> in Place (Yes/No)</br>(If Yes, then </br>provide web-link </br>for grievance redress policy)</th>
                                    <th class="form-label" colspan="3"><span id="currentYearPlaceholder_23"></span> <br> Current Financial Year</th>
                                    <th class="form-label" colspan="3">FY <span id="prevYearPlaceholder1_23"></span>-<span id="prevYearPlaceholder2_23"></span> <br> Previous Financial Year</th>
                                </tr>
                                <tr>
                                    <th class="form-label">Number of</br>complaints filed</br>during the year</th>
                                    <th class="form-label">Number of</br>complaints pending</br>resolution at</br>close of</br>the year</th>
                                    <th class="form-label">Remarks</th>
                                    <th class="form-label">Number of</br>complaints filed</br>during the</br>year</th>
                                    <th class="form-label">Number of</br>complaints pending</br>resolution at</br>close of</br>the year</th>
                                    <th class="form-label">Remarks</th>
                                </tr>
                                <tr>
                                    <th class="form-label" id="gre" name="gre[]">Communities</th>
                                    <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <th class="form-label" id="gre" name="gre[]">Investors (other than shareholders)</th>
                                    <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <th class="form-label" id="gre" name="gre[]">Shareholders</th>
                                    <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <th class="form-label" id="gre" name="gre[]">Employees and workers</th>
                                    <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <th class="form-label" id="gre" name="gre[]">Customers</th>
                                    <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <th class="form-label" id="gre" name="gre[]">Value Chain Partners</th>
                                    <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                </tr>
                                <tr>
                                    <th class="form-label" id="gre" name="gre[]">Other (please specify)</th>
                                    <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><input type="number" id="gre" name="gre[]" class="form-control" onfocus="removeZero(this)" onblur="addZeroIfEmpty(this)" value="0"></td>
                                    <td><textarea id="gre" name="gre[]" class="form-control"></textarea></td>
                                </tr>
                            </table>
                        </div>
                        <div class="policy">
                            <details class="add_comment_detail">
                                <summary>Add comments</summary>
                                <textarea class="detail-control" id="p_gre_comments" name="p_gre_comments" placeholder="Enter additional information (if required)"></textarea>
                            </details>
                        </div>
                    </div>
                    <!-- Grievance redressal End -->

                    <!-- Overview of the entity’s material responsible business conduct issues Start -->
                    <div class="mb-3">
                        <div class="policy">
                            <label for="overview" class="form-label">24. Overview of the entity’s material responsible business conduct issues: <span style="color: red;"> * </span></label>
                        </div>
                        <div class="policy">
                            <label for="overview" class="form-label">Please indicate material responsible business conduct and sustainability issues pertaining to
                                    environmental and social matters that present a risk or an opportunity to your business,
                                    rationale for identifying the same, approach to adapt or mitigate the risk along-with its
                                    financial implications, as per the following format </label>
                        </div>
                        <div id="overview" class="responsive-table">
                            <table id="p_overview">
                                <thead>
                                    <tr>
                                        <th class="form-label">S.No.</th>
                                        <th class="form-label">Material issue identified</th>
                                        <th class="form-label">Identified Indicate whether risk or opportunity (R/O)</th>
                                        <th class="form-label">Rationale for identifying the risk / opportunity</th>
                                        <th class="form-label">Identifying the risk / opportunity In case of risk, approach to adapt or mitigate</th>
                                        <th class="form-label">Financial implications of the risk or opportunity (Indicate positive or negative implications)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width:5%;"><input type="number" id="overview" id="p_overview" name="overview[]" class="table-control" value="1" readonly ></th>
                                        <td><textarea type="text" id="overview" name="overview[]" class="form-control"></textarea>
                                        <td><textarea type="text" id="overview" name="overview[]" class="form-control"></textarea>
                                        <td><textarea type="text" id="overview" name="overview[]" class="form-control"></textarea>
                                        <td><textarea type="text" id="overview" name="overview[]" class="form-control"></textarea>
                                        <td><textarea type="text" id="overview" name="overview[]" class="form-control"></textarea>
                                    </tr>          
                                </tbody>
                            </table>
                            <div>
                                <input type="number" id="indexInput_overview" placeholder="Enter S.No.">
                                <button class="add-remove-row-btn" type="button" onclick="addRowAtIndex('overview')">Add S.No.</button>
                                <button class="add-remove-row-btn" type="button" onclick="removeSpecificRow('overview')">Remove S.No.</button>
                                <button class="add-remove-row-btn" type="button" onclick="addBottomRow('overview')">Add Row</button>
                                <button class="add-remove-row-btn" type="button" onclick="removeBottomRow('overview')">Remove Row</button>
                            </div>
                        </div>
                        <div class="policy">
                            <details class="add_comment_detail">
                                <summary>Add comments</summary>
                                <textarea class="detail-control" id="p_overview_comments" name="p_overview_comments" placeholder="Enter additional information (if required)"></textarea>
                            </details>
                        </div>
                    </div>
                    <!-- Overview of the entity’s material responsible business conduct issues End -->
                </div>
                <!-- Transparency and Disclosures Compliances END -->

                <!-- Add this part at the end of your form -->
                <div class="mb-3">
                    <!-- <button type="button" class="btn btn-primary" onclick="printReview()">Review Form</button> -->
                    <button type="submit" class="btn btn-primary" onclick="return confirmSubmission()">Submit</button>
                </div>

                <!-- Floating message for readonly fields -->
                <div id="floatingMessage" style="display: none; position: absolute; padding: 8px; background: #f0f0f0; border: 1px solid #ddd; border-radius: 4px; pointer-events: none; z-index: 100;">This field is auto-calculated and cannot be edited.</div>
            </form>
        </div>
 
        <script src="sec_A.js"></script>
        <script src="sec_A_form_submit_validation.js"></script>
  
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
