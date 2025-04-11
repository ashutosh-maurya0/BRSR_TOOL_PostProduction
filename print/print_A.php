<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>CRUS</title>
        <meta name="author" content="Rashu">
        <link rel="icon" type="image/jpg" href="../images/cusrrs.jpg">
        <!-- pdfmake files: -->
        <script src='https://cdn.jsdelivr.net/npm/pdfmake@latest/build/pdfmake.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/pdfmake@latest/build/vfs_fonts.min.js'></script>
        <!-- html-to-pdfmake file: -->
        <script src="https://cdn.jsdelivr.net/npm/html-to-pdfmake/browser.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>

        <link rel="stylesheet" href="../sec_C/sec_C.css">
        <title>Section A</title>

        <!--CSS for acknowledge message-->
        <style>
            body {
                background: url("../images/p4.jpg") no-repeat center center fixed;
                background-size: cover;
                background-color: #f1f9f4;
            }

            .policy {
                padding-bottom: 14px;
            }
        </style>
    </head>

    <!--Session Variable-->
    <?php
        session_start();
            if (isset($_SESSION['cin']))
                $cin = $_SESSION['cin'];
    ?>
    
    <body>
        <div class="container">
            <h1>THANK YOU!</h1>
            <div class="policy">
                <h1>Section A <?php if (isset($_SESSION['cin'])) echo("(CIN: $cin)"); else echo("")?> Successfully Printed.</h1>
            </div>
        </div>
        <script>
            /* ************************************************************************************************************************************ */
            /*                                                                                                                                      */
            /*                                                               PHP CODE                                                               */
            /*                                                                                                                                      */
            /* ************************************************************************************************************************************ */
            <?php
                // database connection file
                include('../connection.php');

                // Fetch data from the database
                $sql = "SELECT * FROM section_a_form WHERE cin = '$cin'";
                $stmt = $pdo->query($sql);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                // Function to fetch table data
                function fetchTableData($data, $numColumns) {
                    $tableData = array();
                    $rowData = array();

                    foreach ($data as $index => $value) {
                        $rowData[] = $value;

                        if (($index + 1) % $numColumns == 0) {
                            $tableData[] = $rowData;
                            $rowData = array();
                        }
                    }
                    return $tableData;
                }

                // Q1 to Q13
                echo "const cin = " . json_encode($row['cin']) . ";\n";
                echo "const name = " . json_encode($row['name']) . ";\n";
                if ($row) {
                    $incorp_date = explode('|', $row['incorp_date']);
                    // First part (before the first pipe)
                    $date = $incorp_date[0];
                    // Second part (everything after the first pipe)
                    $year = isset($incorp_date[1]) ? $incorp_date[1] : '';
                }
                echo "const date = " . json_encode($date) . ";\n";
                echo "const year = " . json_encode($year) . ";\n";

                echo "const office_address = " . json_encode($row['office_address']) . ";\n";
                echo "const corporate_address = " . json_encode($row['corporate_address']) . ";\n"; 
                echo "const email = " . json_encode($row['email']) . ";\n"; 
                echo "const telephone = " . json_encode($row['telephone']) . ";\n"; 
                echo "const website = " . json_encode($row['website']) . ";\n"; 
                echo "const reporting_fin_year = " . json_encode($row['reporting_fin_year']) . ";\n"; 
                echo "const stock_name = " . json_encode($row['stock_name']) . ";\n"; 
                echo "const puc = " . json_encode($row['puc']) . ";\n"; 
                echo "const poc_name = " . json_encode($row['poc_name']) . ";\n"; 
                echo "const poc_phone = " . json_encode($row['poc_phone']) . ";\n"; 
                echo "const poc_email = " . json_encode($row['poc_email']) . ";\n"; 
                echo "const rep_b = " . json_encode($row['rep_b']) . ";";
                echo "const rep_b_comments = " . json_encode($row['rep_b_comments']) . ";\n"; 

                //14-Details of Business activities
                if ($row) {
                    $doba = explode('|', $row['doba']);
                    $numColumns = 4;
                    $t_doba = fetchTableData($doba, $numColumns);
                }
                echo "const t_doba = " . json_encode($t_doba) . ";\n";
                //14-comments
                echo "const doba_comments = " . json_encode($row['doba_comments']) . ";\n";

                //15-Details of the products & services
                if ($row) {
                    $dops = explode('|', $row['dops']);
                    $numColumns = 4;
                    $t_dops = fetchTableData($dops, $numColumns);
                }
                echo "const t_dops = " . json_encode($t_dops) . ";\n";
                //15-comments
                echo "const dops_comments = " . json_encode($row['dops_comments']) . ";\n";

                //16-Number of locations
                if($row){
                    $nol = explode('|', $row['nol']);
                    $numColumns = 3;
                    $t_nol = fetchTableData($nol, $numColumns);
                }
                echo "const t_nol = " . json_encode($t_nol) . ";\n";
                //16-comments
                echo "const nol_comments = " . json_encode($row['nol_comments']) . ";\n";

                //17a Number of locations
                if($row){
                    $drm = explode('|', $row['drm']);
                    $numColumns = 1;
                    $t_drm = fetchTableData($drm, $numColumns);
                }
                echo "const t_drm = " . json_encode($t_drm) . ";\n";
                //17a-comments
                echo "const drm_comments = " . json_encode($row['drm_comments']) . ";\n";

                //17b What is the contribution of exports as a percentage of the total turnover of the entity? 
                echo "const drm_contribution_export = " . json_encode($row['drm_contribution_export']) . ";\n";
                //17c A brief on types of customers 
                echo "const drm_types_customers = " . json_encode($row['drm_types_customers']) . ";\n"; 

                // 18a Details of Employees & Workers
                if($row){
                    $dew = explode('|', $row['dew']);
                    $numColumns = 5;
                    $t_dew = fetchTableData($dew, $numColumns);
                }
                echo "const t_dew = " . json_encode($t_dew) . ";\n";
                //18a-comments
                echo "const dew_comments = " . json_encode($row['dew_comments']) . ";\n";

                //18b Differently abled employees and workers
                if($row){
                    $dewda = explode('|', $row['dewda']);
                    $numColumns = 5;
                    $t_dewda = fetchTableData($dewda, $numColumns);
                }
                echo "const t_dewda = " . json_encode($t_dewda) . ";\n";
                //18b-comments
                echo "const dewda_comments = " . json_encode($row['dewda_comments']) . ";\n";

                //19 Participation/Inclusion/Representation of Women
                if($row){
                    $pirw = explode('|', $row['pirw']);
                    $numColumns = 3;
                    $t_pirw = fetchTableData($pirw, $numColumns);
                }
                echo "const t_pirw = " . json_encode($t_pirw) . ";\n";
                //19-comments
                echo "const pirw_comments = " . json_encode($row['pirw_comments']) . ";\n";

                //20 Turnover rate for permanent employees & workers (For past 3 years)
                if($row){
                    $torpew = explode('|', $row['torpew']);
                    $numColumns = 9;
                    $t_torpew = fetchTableData($torpew, $numColumns);
                }
                echo "const t_torpew = " . json_encode($t_torpew) . ";\n";
                //20-comments
                echo "const torpew_comments = " . json_encode($row['torpew_comments']) . ";\n";

                //21-(a) Names of holding / subsidiary / associate companies / joint ventures Start
                if($row){
                    $holding = explode('|', $row['holding']);
                    $numColumns = 5;
                    $t_holding = fetchTableData($holding, $numColumns);
                }
                echo "const t_holding = " . json_encode($t_holding) . ";\n";
                //21(a)-comments
                echo "const holding_comments = " . json_encode($row['holding_comments']) . ";\n";

                //22-CSR Details
                echo "const csr_act = " . json_encode($row['csr_act']) . ";\n";
                echo "const csr_turnover = " . json_encode($row['csr_turnover']) . ";\n";
                echo "const csr_networth = " . json_encode($row['csr_networth']) . ";\n";
                
                //23-Grievance redressal
                if($row){
                    $gre = explode('|', $row['gre']);
                    $numColumns = 7;
                    $t_gre = fetchTableData($gre, $numColumns);
                }
                echo "const t_gre = " . json_encode($t_gre) . ";\n";
                //23-comments
                echo "const gre_comments = " . json_encode($row['gre_comments']) . ";\n";

                //24-overview
                if($row){
                    $overview = explode('|', $row['overview']);
                    $numColumns = 6;
                    $t_overview = fetchTableData($overview, $numColumns);
                }
                echo "const t_overview = " . json_encode($t_overview) . ";\n";
                //24-comments
                echo "const overview_comments = " . json_encode($row['overview_comments']) . ";\n";

                // Close the database connection
                $pdo = null;
            ?>


            /* ************************************************************************************************************************************ */
            /*                                                                                                                                      */
            /*                                                               PDF Generation CODE                                                    */
            /*                                                                                                                                      */
            /* ************************************************************************************************************************************ */
            function generatePDF() {
                // Use pdfmake to generate the PDF
                const pdfContent = [];

                // Name of the company
                pdfContent.push({ text: name, alignment: 'center', style: { header: true, fontSize: 30 } });
        
                // Add your content to pdfContent array using pdfmake syntax
                pdfContent.push({ text: 'SECTION A: GENERAL DISCLOSURES', style: 'header', margin: [10, 10, 0, 10], alignment: 'center' });

                /* ************************************************************************************************************************************ */
                /*                                                                                                                                      */
                /*                                                     I. DETAILS OF THE LISTED ENTITY                                                  */
                /*                                                                                                                                      */
                /* ************************************************************************************************************************************ */
                pdfContent.push({ text: 'I. Details Of Listed Entity', style: 'subheader' });    
                // Fetch data from PHP variables
                pdfContent.push({
                    ol: [
                        //1-Corporate Identity Number (CIN) of the Listed Entity
                        {
                            columns: [
                                { text: 'Corporate Identity Number (CIN) of the Listed Entity:', margin: [10, 0, 0, 10] },
                                { text: cin, alignment: 'left', margin: [10, 0, 10, 10] }
                            ]
                        },
                        //2-Name of the Listed Entity
                        {
                            columns: [
                                { text: 'Name of the Listed Entity:', margin: [10, 0, 0, 10] },
                                { text: name, alignment: 'left', margin: [10, 0, 10, 10] }
                            ]
                        },
                        //3-Year of incorporation
                        {
                            columns: [
                                { text: 'Year of Incorporation:', margin: [10, 0, 0, 10] },
                                { text: date+'-'+year, alignment: 'left', margin: [10, 0, 10, 10] }
                            ]
                        },
                        //4-Registered Office Address
                        {
                            columns: [
                                { text: 'Registered Office Address:', margin: [10, 0, 0, 10]},
                                { text: office_address, alignment: 'left',  margin: [10, 0, 10, 10] }
                            ]
                        },
                        //5-Corporate Address
                        {
                            columns: [
                                { text: 'Corporate Address:', margin: [10, 0, 0, 10]},
                                { text: corporate_address, alignment: 'left',  margin: [10, 0, 10, 10] }
                            ]
                        },
                        //6-Email Start
                        {
                            columns: [
                                { text: 'Email:', margin: [10, 0, 0, 10]},
                                { text: email, alignment: 'left',  margin: [10, 0, 10, 10] }
                            ]
                        },
                        //7-Telephone
                        {
                            columns: [
                                { text: 'Telephone:', margin: [10, 0, 0, 10]},
                                { text: telephone, alignment: 'left',  margin: [10, 0, 10, 10] }
                            ]
                        },
                        //8-Website Start
                        {
                            columns: [
                                { text: 'Website:', margin: [10, 0, 0, 10]},
                                { text: website, alignment: 'left',  margin: [10, 0, 10, 10] }
                            ]
                        },
                        //9-Reporting Financial year
                        {
                            columns: [
                                { text: 'Financial year for which reporting is being done:', margin: [10, 0, 0, 10]},
                                { text: reporting_fin_year, alignment: 'left',  margin: [10, 0, 10, 10] }
                            ]
                        },
                        //10-Name of the Stock Exchange(s) 
                        {
                            columns: [
                                { text: 'Name of the Stock Exchange(s) where shares are listed:', margin: [10, 0, 0, 10]},
                                { text: stock_name, alignment: 'left',  margin: [10, 0, 10, 10] }
                            ]
                        },
                        //11-Paid-up Capital
                        {
                            columns: [
                                { text: 'Paid-up Capital:', margin: [10, 0, 0, 10]},
                                { text: puc, alignment: 'left',  margin: [10, 0, 10, 10] }
                            ]
                        },
                        //12-Details of Point of Contact
                        {
                            columns: [
                                { text: 'Name and contact details (telephone, email address) of the person who may be contacted in case of any queries on the BRSR report:', margin: [10, 0, 0, 10] },
                                { text: '', alignment: 'left', margin: [9, 0, 10, 10] }
                            ],
                        },
                        {
                            ul: [
                                //Name of the Point of Contact
                                {
                                    columns: [
                                        { text: 'Point of Contact Name:', margin: [10, 0, 0, 10] },
                                        { text: poc_name, alignment: 'left', margin: [9, 0, 10, 10] }
                                    ]
                                },
                                //Phone number of the point of contact
                                {
                                    columns: [
                                        { text: 'Point of Contact Phone:', margin: [10, 0, 0, 10] },
                                        { text: poc_phone, alignment: 'left', margin: [9, 0, 10, 10] }
                                    ]
                                },
                                //Email of the point of contact
                                {
                                    columns: [
                                        { text: 'Point of Contact Email:', margin: [10, 0, 0, 10] },
                                        { text: poc_email, alignment: 'left', margin: [9, 0, 10, 10] }
                                    ]
                                },
                            ]
                        },
                        // Add new questions
                    ]
                });
                //13-Reporting boundary
                pdfContent.push({
                    ol: [
                        {
                            columns: [
                                { text: 'Reporting boundary - Are the disclosures under this report made on a standalone basis (i.e. only for the entity) or on a consolidated basis i.e. for the entity and all the entities which form a part of its consolidated financial statements, taken together).', margin: [10, 0, 0, 10] },
                                { text: `${rep_b}, ${rep_b_comments}`, alignment: 'left', margin: [10, 0, 10, 10] }
                            ]
                        },
                    ],
                    start: 13
                });
                
                /* ************************************************************************************************************************************ */
                /*                                                                                                                                      */
                /*                                                     II,III,IV,V,VI and VII                                                           */
                /*                                                                                                                                      */
                /* ************************************************************************************************************************************ */
                var sec_A = htmlToPdfmake(`
                    <!----------------------------------------------------------------------------------------------------------------------------------->
                    <!--                                                              II                                                               -->
                    <!----------------------------------------------------------------------------------------------------------------------------------->
                    <h5><label>II. Products/services</label></h5>
                    
                    <label style="margin-left: 15px;">14. Details of business activities (accounting for 90% of the turnover):</label>
                    <table style="margin-left: 30px;">
                        <tr>
                            <th style="text-align: center;">S.No.</th>
                            <th style="text-align: center;">Description of Main Activity</th>
                            <th style="text-align: center;">Description of Business Activity</th>
                            <th style="text-align: center;">% of Turnover of the entity</th>
                        </tr>
                        <?php
                            $columnCount = 0;
                            foreach ($t_doba as $index => $rowData) {
                                echo '<tr>';
                                // Fetch data starting from 3rd column onwards
                                foreach ($rowData as $columnData) {
                                    echo '<td>' . $columnData . '</td>';
                                    $columnCount++;
                                    // Check if it's the 5th column, then start a new line
                                    if ($columnCount % 4 == 0) {
                                        echo '</tr><tr>';
                                    }
                                }
                                echo '</tr>';
                            }
                        ?>
                    </table>
                    <textarea style="margin-left: 30px;"><?php echo isset($row['doba_comments']) ? $row['doba_comments'] : ''; ?></textarea>

                    <label style="margin-left: 15px;">15. Products/Services sold by the entity (accounting for 90% of the entity’s Turnover):</label>
                    <table style="margin-left: 30px;">
                        <tr>
                            <th style="text-align: center;">S.No.</th>
                            <th style="text-align: center;">Product/Service</th>
                            <th style="text-align: center;">NIC Code</th>
                            <th style="text-align: center;">% of total Turnover contributed</th>
                        </tr>
                        <?php
                            $columnCount = 0;

                            foreach ($t_dops as $index => $rowData) {
                                echo '<tr>';
        
                                // Fetch data starting from 3rd column onwards
                                foreach ($rowData as $columnData) {
                                    echo '<td>' . $columnData . '</td>';
                                    $columnCount++;

                                    // Check if it's the 5th column, then start a new line
                                    if ($columnCount % 4 == 0) {
                                        echo '</tr><tr>';
                                    }
                                }
                                echo '</tr>';
                            }
                        ?>
                    </table>
                    <textarea style="margin-left: 30px;"><?php echo isset($row['dops_comments']) ? $row['dops_comments'] : ''; ?></textarea>
                    
                    <!----------------------------------------------------------------------------------------------------------------------------------->
                    <!--                                                              III                                                              -->
                    <!----------------------------------------------------------------------------------------------------------------------------------->
                    <h5><label>III. OPERATIONS</label></h5>
                    
                    <label style="margin-left: 15px;">16. National + International  locations where plants and/or operations/offices of the entity are situated:</label>
                    <table style="margin-left: 30px;">
                        <tr>
                            <th>Location</th>
                            <th >Number of plants</th>
                            <th >Number of offices</th>
                            <th >Total</th>
                        </tr>
                        <?php
                            // Limit rows
                            $limited_t_nol = array_slice($t_nol, 0, 2);
                            foreach ($limited_t_nol as $index => $rowData) {
                                echo '<tr>';
                                // Add S. NO. column starting from 1
                                $index = $index+1;
                                // column based on index
                                if ($index == 1) {
                                    echo '<td>National</td>';
                                } else {
                                    echo '<td>International</td>';
                                }
                                // Fetch data
                                foreach ($rowData as $columnData) {
                                    echo '<td>' . $columnData . '</td>';
                                }
                                echo '</tr>';
                            }
                        ?>
                    </table>
                    <textarea style="margin-left: 30px;"><?php echo isset($row['nol_comments']) ? $row['nol_comments'] : ''; ?></textarea>
                    
                    <label style="margin-left: 15px;">17. Markets served by the entity:</label>
                    <label style="margin-left: 30px;">a. National + International locations:</label>
                    <table style="margin-left: 40px;">
                        <tr>
                            <th >Location</th>
                            <th >Number of plants</th>
                        </tr>
                        <?php
                            // Limit rows
                            $limited_t_drm = array_slice($t_drm, 0, 3);
                            foreach ($limited_t_drm as $index => $rowData) {
                                echo '<tr>';
                                // Add S. NO. column starting from 1
                                $index = $index+1;
                                // column based on index
                                if ($index == 1) {
                                    echo '<td>National (No. of States)</td>';
                                } elseif ($index == 2) {
                                    echo '<td>National (No. of Union Territories)</td>';
                                } else{
                                    echo '<td>International (No. of Countries)</td>';
                                }
                                // Fetch data
                                foreach ($rowData as $columnData) {
                                    echo '<td>' . $columnData . '</td>';
                                }
                                echo '</tr>';
                            }
                        ?>
                    </table>
                    <textarea style="margin-left: 30px;"><?php echo isset($row['drm_comments']) ? $row['drm_comments'] : ''; ?></textarea>

                    <label style="margin-left:30px;">b. What is the contribution of exports as a percentage of the total turnover of the entity?:</label>
                    <p style="margin-left: 40px;"><?php echo isset($row['drm_contribution_export']) ? $row['drm_contribution_export'] : ''; ?></p>
                    <label style="margin-left:30px;">c. A brief on types of customers:</label>
                    <p style="margin-left: 40px;"><?php echo isset($row['drm_types_customers']) ? $row['drm_types_customers'] : ''; ?></p>

                    <!----------------------------------------------------------------------------------------------------------------------------------->
                    <!--                                                              IV                                                               -->
                    <!----------------------------------------------------------------------------------------------------------------------------------->
                    </br></br><h5><label>IV. Operations</label></h5>

                    <label style="margin-left: 15px;">18. Details as at the end of Financial Year:</label>
                    <label style="margin-left: 30px;">a. Details of Employees & Workers:</label>
                    <table style="margin-left: 40px;">
                        <tr style="text-align: center;">
                            <th colspan="1" rowspan="2" style="text-align: center;"> S. NO.</th>
                            <th colspan="1" rowspan="2" style="text-align: center;">Particulars</th>
                            <th colspan="1" rowspan="2" style="text-align: center;">Total (A)</th>
                            <th colspan="2" style="text-align: center;">Male</th>
                            <th colspan="2" style="text-align: center;">Female</th>
                        </tr>
                        <tr>
                            <th>No. (B)</th>
                            <th>%(B/A)</th>
                            <th>No. (C)</th>
                            <th>%(C/A)</th>
                        </tr>
                        <tr>
                            <th colspan="7" style="text-align: center;"><u> EMPLOYEES </u></th>
                        </tr>
                        <?php
                                // Limit to the first three rows
                                $limited_t_dew = array_slice($t_dew, 0, 3);
                                foreach ($limited_t_dew as $index => $rowData) {
                                    echo '<tr>';
                                    // Add S. NO. column starting from 1
                                    echo '<td>' . ($index + 1) . '</td>';
                                    // Second column based on index
                                    if ($index == 1) {
                                        echo '<td>Permanent(D)</td>';
                                    } elseif ($index == 2) {
                                        echo '<td>Other Than Permanent(E)</td>';
                                    } else {
                                        echo '<td>Total employees(D + E)</td>';
                                    }
                                    // Fetch data starting from 3rd column onwards
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                    }
                                    echo '</tr>';
                                }
                        ?>
                        <tr>
                            <th colspan="7" style="text-align: center;"><u> WORKERS </u></th>
                        </tr>
                        <?php
                                // Limit to the rows from index 3 to 8
                                $limited_t_dew = array_slice($t_dew, 3, 6);
                                $index = 3; // Start index from 4
                    
                                foreach ($limited_t_dew as $rowData) {
                                    echo '<tr>';
                        
                                    // Add S. NO. column starting from 1
                                    echo '<td>' . ($index + 1) . '</td>';
                       
                                    // Second column based on index
                                    if ($index == 4) {
                                        echo '<td>Permanent(F)</td>';
                                    } elseif ($index == 5) {
                                        echo '<td>Other Than Permanent(G)</td>';
                                    } else {
                                        echo '<td>Total employees(F + G)</td>';
                                    }
            
                                    // Fetch data starting from 3rd column onwards
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                    }

                                    echo '</tr>';
                                    $index++; // Increment index for the next row
                                }
                        ?>
                    </table>
                    <textarea style="margin-left: 30px;"><?php echo isset($row['dew_comments']) ? $row['dew_comments'] : ''; ?></textarea>

                    <label style="margin-left: 30px;">b. Differntly abled Employees and workers:</label>
                    <table style="margin-left: 40px;">
                        <tr style="text-align: center;">
                            <th colspan="1" rowspan="2" style="text-align: center;"> S. NO.</th>
                            <th colspan="1" rowspan="2" style="text-align: center;">Particulars</th>
                            <th colspan="1" rowspan="2" style="text-align: center;">Total (A)</th>
                            <th colspan="2" style="text-align: center;">Male</th>
                            <th colspan="2" style="text-align: center;">Female</th>
                        </tr>
                        <tr>
                            <th>No. (B)</th>
                            <th>%(B/A)</th>
                            <th>No. (C)</th>
                            <th>%(C/A)</th>
                        </tr>
                            <tr>
                            <th colspan="7" style="text-align: center;"><u> DIFFERENTLY ABLED EMPLOYEES </u></th>
                        </tr>
                        <?php
                            // Limit to the rows from index 3 to 8
                            $limited_t_dewda = array_slice($t_dewda, 0, 3);
                            foreach ($limited_t_dewda as $index => $rowData) {
                                echo '<tr>';
                                // Add S. NO. column starting from 1
                                echo '<td>' . ($index + 1) . '</td>';
                                // column based on index
                                if ($index == 1) {
                                    echo '<td>Permanent(D)</td>';
                                } elseif ($index == 2) {
                                    echo '<td>Other Than Permanent(E)</td>';
                                } else {
                                    echo '<td>Total employees(D + E)</td>';
                                }
                                // Fetch data
                                foreach ($rowData as $columnData) {
                                    echo '<td>' . $columnData . '</td>';
                                }
                                echo '</tr>';
                            }
                        ?>
                        <tr>
                            <th colspan="7" style="text-align: center;"><u> DIFFERENTLY ABLED WORKERS </u></th>
                        </tr>
                        <?php
                            // Limit to the rows from index 3 to 8
                            $limited_t_dewda = array_slice($t_dewda, 3, 6);
                            $index = 3; // Start index from 4
                            foreach ($limited_t_dewda as $rowData) {
                                echo '<tr>';
                                // Add S. NO. column starting from 4
                                echo '<td>' . ($index + 1) . '</td>';
                                // Second column based on index
                                if ($index == 4) {
                                    echo '<td>Permanent(F)</td>';
                                } elseif ($index == 5) {
                                    echo '<td>Other Than Permanent(G)</td>';
                                } else {
                                    echo '<td>Total employees(F + G)</td>';
                                }
                                // Fetch data
                                foreach ($rowData as $columnData) {
                                    echo '<td>' . $columnData . '</td>';
                                }
                                echo '</tr>';
                                $index++; // Increment index for the next row
                            }
                        ?>
                    </table>
                    <textarea style="margin-left: 30px;"><?php echo isset($row['dewda_comments']) ? $row['dewda_comments'] : ''; ?></textarea>

                    <label style="margin-left: 15px;">19. Participation/Inclusion/Representation of women:</label>
                    <table style="margin-left: 30px;">
                        <tr>
                            <th colspan="1" rowspan="2"></th>
                            <th colspan="1" rowspan="2">Total (A)</th>
                            <th colspan="2" rowspan="1">No. and percentage of Females</th>
                        </tr>
                        <tr>
                            <th>No. (B)</th>
                            <th>%(B/A)</th>
                        </tr>
                        <?php
                            // Limit rows
                            $limited_t_pirw = array_slice($t_pirw, 0, 2);
                            foreach ($limited_t_pirw as $index => $rowData) {
                                echo '<tr>';
                                // Add S. NO. column starting from 1
                                $index = $index+1;
                                // column based on index
                                if ($index == 1) {
                                    echo '<td>Boards Of Directors</td>';
                                } else {
                                    echo '<td>Key Management Personnel</td>';
                                }
                                // Fetch data
                                foreach ($rowData as $columnData) {
                                    echo '<td>' . $columnData . '</td>';
                                }
                                echo '</tr>';
                            }
                        ?>
                    </table>
                    <textarea style="margin-left: 30px;"><?php echo isset($row['pirw_comments']) ? $row['pirw_comments'] : ''; ?></textarea>

                    <label style="margin-left: 15px;"> 20. Turnover rate for permanent employees and workers (Disclose trends for the past 3 years):</label>
                    <table style="margin-left: 30px;">
                        <tr>
                            <th rowspan="2" style="text-align: center;"></th>
                            <th colspan="3" style="text-align: center;"><?php echo isset($row['reporting_fin_year']) ? $row['reporting_fin_year'] : ''; ?><br>(Turnover rate in current<br> FY)</th>
                            <th colspan="3" style="text-align: center;"><?php echo isset($row['reporting_fin_year']) ? $row['reporting_fin_year'] : ''; ?><br>(Turnover rate in<br> previous FY)</th>
                            <th colspan="3" style="text-align: center;"><?php echo isset($row['reporting_fin_year']) ? $row['reporting_fin_year'] : ''; ?><br>(Turnover rate in the year prior to the<br> previous FY)</th>
                        </tr>
                        <tr>
                            <th>Male</th>
                            <th>Female</th>
                            <th>Total</th>
                            <th>Male</th>
                            <th>Female</th>
                            <th>Total</th>
                            <th>Male</th>
                            <th>Female</th>
                            <th>Total</th>
                        </tr>
                        <?php
                            // Limit rows
                            $limited_t_torpew = array_slice($t_torpew, 0, 8);
                            foreach ($limited_t_torpew as $index => $rowData) {
                                echo '<tr>';
                                // Add S. NO. column starting from 1
                                $index = $index+1;
                                // column based on index
                                if ($index == 1) {
                                    echo '<td>Permanent Employees</td>';
                                } else {
                                    echo '<td>Permanent Workers</td>';
                                }
                                // Fetch data
                                foreach ($rowData as $columnData) {
                                    echo '<td>' . $columnData . '</td>';
                                }
                                echo '</tr>';
                            }
                        ?>
                    </table>
                    <textarea style="margin-left: 30px;"><?php echo isset($row['torpew_comments']) ? $row['torpew_comments'] : ''; ?></textarea>

                    <!----------------------------------------------------------------------------------------------------------------------------------->
                    <!--                                                              V                                                                -->
                    <!----------------------------------------------------------------------------------------------------------------------------------->
                    </br><h5><label>V. Holding, Subsidiary and Associate Companies (including joint ventures)</label></h5>
                    
                    <label style="margin-left: 15px;">21. &nbsp;(a) Names of holding / subsidiary / associate companies / joint ventures:</label>
                    <table style="margin-left: 30px;">
                        <tr>
                            <th style="text-align: center;">S.No.</th>
                            <th style="text-align: center;">Name of the holding </br>/ subsidiary / </br>associate companies / </br>joint ventures (A)</th>
                            <th style="text-align: center;">Indicate whether </br>holding/ Subsidiary</br>/ Associate</br>/ Joint Venture</th>
                            <th style="text-align: center;">% of shares held</br> by listed entity</th>
                            <th style="text-align: center;">Does the entity</br> indicated at column A,</br> participate in the </br>Business Responsibility </br>initiatives of the </br>listed entity? (Yes/No) </th>
                        </tr>
                        <?php
                            $columnCount = 0;
                            foreach ($t_holding as $index => $rowData) {
                                echo '<tr>';
                                // Fetch data
                                foreach ($rowData as $columnData) {
                                    echo '<td>' . $columnData . '</td>';
                                    $columnCount++;
                                    // Check if it's the 5th column, then start populating the data from new row
                                    if ($columnCount % 5 == 0) {
                                        echo '</tr><tr>';
                                    }
                                }
                                echo '</tr>';
                            }
                        ?>
                    </table>
                    <textarea style="margin-left: 30px;"><?php echo isset($row['holding_comments']) ? $row['holding_comments'] : ''; ?></textarea>

                    <!----------------------------------------------------------------------------------------------------------------------------------->
                    <!--                                                              VI                                                               -->
                    <!----------------------------------------------------------------------------------------------------------------------------------->
                    <h5><label>VI. CSR Details</label></h5>

                    <label style="margin-left: 15px;">22. (i) Whether CSR is applicable as per section 135 of Companies Act, 2013:</label>
                    <p style="margin-left: 30px;">  <?php echo isset($row['csr_act']) ? $row['csr_act'] : ''; ?></p>
                    <label style="margin-left: 40px;">(ii) Turnover (in Rs.):</label>
                    <p style="margin-left: 50px;"><?php echo isset($row['csr_turnover']) ? $row['csr_turnover'] : ''; ?></p>
                    <label style="margin-left: 40px;">(iii) Net worth (in Rs.):</label>
                    <p style="margin-left: 50px;"><?php echo isset($row['csr_networth']) ? $row['csr_networth'] : ''; ?></p>

                    <!----------------------------------------------------------------------------------------------------------------------------------->
                    <!--                                                              VII                                                               -->
                    <!----------------------------------------------------------------------------------------------------------------------------------->
                    <h5><label>VII. Transparency and Disclosures Compliances</label></h5>

                    <label>23. Complaints/Grievances on any of the principles (Principles 1 to 9) under the National
                               Guidelines on Responsible Business Conduct:</label>
                    <table style="overflow: hidden;">
                        <tr>
                            <th colspan="1" rowspan="2" style="text-align: center;"> Stakeholder group</br>from whom </br>complaint</br>is received.</th>
                            <th colspan="1" rowspan="2" style="text-align: center;">Grievance</br>Redressal Mechanism </br> in Place (Yes/No)</br>(If Yes, then </br>provide web-link </br>for grievance redress policy)</th>
                            <th colspan="3" style="text-align: center;">FY _____ Current </br>Financial Year</th>
                            <th colspan="3" style="text-align: center;">FY _____ Previous </br>Financial Year</th>
                        </tr>
                        <tr>
                            <th style="text-align: center;">Number of</br>complaints filed</br>during the year</th>
                            <th style="text-align: center;">Number of</br>complaints pending</br>resolution at</br>close of</br>the year</th>
                            <th style="text-align: center;">Remarks</th>
                            <th style="text-align: center;">Number of</br>complaints filed</br>during the</br>year</th>
                            <th style="text-align: center;">plaints pending</br>resolution at</br>close of</br>the year</th>
                            <th style="text-align: center;">Remarks</th>
                        </tr>
                        <?php
                            // Limit rows
                            $limited_t_gre = array_slice($t_gre, 0, 7);
                            foreach ($limited_t_gre as $index => $rowData) {
                                echo '<tr>';
                                // Add S. NO. column starting from 1
                                $index = $index+1;
                                // column based on index
                                if ($index == 1) {
                                    echo '<td>Communities</td>';
                                } elseif ($index == 2) {
                                    echo '<td>Investors (other than shareholders)</td>';
                                } else if ($index == 3) {
                                    echo '<td>Shareholders</td>';
                                } elseif ($index == 4) {
                                    echo '<td >Employees and workers</td>';
                                } elseif ($index == 5) {
                                    echo '<td>Customers</td>';
                                } elseif ($index == 6) {
                                    echo '<td>Value Chain Partners</td>';
                                } else{
                                    echo '<td>Other (please specify)</td>';
                                }                                
                                // Fetch data
                                foreach ($rowData as $columnData) {
                                    echo '<td>' . $columnData . '</td>';
                                }
                                echo '</tr>';
                            }
                        ?>
                    </table>
                    <textarea style="margin-left: 30px;"><?php echo isset($row['gre_comments']) ? $row['gre_comments'] : ''; ?></textarea>

                    <label>24. Overview of the entity’s material responsible business conduct issues:</label>
                    <p>Please indicate material responsible business conduct and sustainability issues pertaining to
                         environmental and social matters that present a risk or an opportunity to your business,
                         rationale for identifying the same, approach to adapt or mitigate the risk along-with its
                         financial implications, as per the following format </p>   
                    <table>
                        <tr>
                            <th style="text-align: center;">S.No.</th>
                            <th style="text-align: center;">Material issue identified</th>
                            <th style="text-align: center;">identified Indicate whether risk or opportunity (R/O)</th>
                            <th style="text-align: center;">Rationale for identifying the risk / opportunity</th>
                            <th style="text-align: center;">identifying the risk / opportunity In case of risk, approach to adapt or mitigate</th>
                            <th style="text-align: center;">Financial implications of the risk or opportunity (Indicate positive or negative implications)</th>
                        </tr>
                        <?php
                            $columnCount = 0;
                            foreach ($t_overview as $index => $rowData) {
                                echo '<tr>';
                                // Fetch data
                                foreach ($rowData as $columnData) {
                                    echo '<td>' . $columnData . '</td>';
                                    $columnCount++;
                                    // Check if it's the 6th column, then start populating the data from new row
                                    if ($columnCount % 6 == 0) {
                                        echo '</tr><tr>';
                                    }
                                }
                                echo '</tr>';
                            }
                        ?>
                    </table>
                    <textarea style="margin-left: 30px;"><?php echo isset($row['overview_comments']) ? $row['overview_comments'] : ''; ?></textarea>
                `);

                /* ************************************************************************************************************************************ */
                /*                                                                                                                                      */
                /*                                                     pdfmake definition                                                               */
                /*                                                                                                                                      */
                /* ************************************************************************************************************************************ */
                // Construct the filename dynamically
                const filename = `A_Section_${name}_BRSR_${reporting_fin_year}.pdf`;
                const pdfDefinition = {
                    content: [pdfContent, sec_A],
                        styles: {
                            header: { fontSize: 18, bold: true, margin: [0, 0, 0, 10] },
                            subheader: { fontSize: 16, bold: true, margin: [0, 10, 0, 5] },
                            tableStyle: { margin: [0, 5, 0, 15] }
                            // Define your styles here if needed
                        },
                        pageSize: 'A4', 
                        pageOrientation: 'landscape', // Set the orientation to landscape
                        pageMargins: [10, 20, 40, 0], // Set page margins to 0
                        width: '100%', // Set the width to 90% of the page
                    };
                pdfMake.createPdf(pdfDefinition).download(filename);
            }
        </script>
        <script>
            // Call the generatePDF() function when the document is ready
            document.addEventListener('DOMContentLoaded', function() {
                generatePDF();
            });
        </script>
    </body>
</html>
