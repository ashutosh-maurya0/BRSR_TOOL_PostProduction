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
                <h1>Section B <?php if (isset($_SESSION['cin'])) echo("(CIN: $cin)"); else echo("")?> Successfully Printed.</h1>
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

                //Fetch data from the section_a_form table
                $sql_a = "SELECT * FROM section_a_form WHERE cin = '$cin'";
                $stmt_a = $pdo->query($sql_a);
                $row_a = $stmt_a->fetch(PDO::FETCH_ASSOC);

                // Fetch data from the section_a_form table
                $sql_b = "SELECT * FROM section_b_form WHERE cin = '$cin'";
                $stmt_b = $pdo->query($sql_b);
                $row_b = $stmt_b->fetch(PDO::FETCH_ASSOC);

                // section A: fetching the cin,name and financial year
                echo "const cin = " . json_encode($row_a['cin']) . ";\n";
                echo "const name = " . json_encode($row_a['name']) . ";\n";
                echo "const reporting_fin_year = " . json_encode($row_a['reporting_fin_year']) . ";\n";

                // section B: fetching
                echo "const stmtdir = " . json_encode($row_b['stmtdir']) . ";\n";
                echo "const dthi = " . json_encode($row_b['dthi']) . ";\n";
                 echo "const enspec = " . json_encode($row_b['enspec']) . ";\n";

                /* $cin, $dew, $stmtdir, $dthi, $enspec,
                    $dew_comments, $gre, $gre_comments, $question11, $question11_comments,
                    $question12, $question12_comments */

                //Function to fetch table data
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

                //Q1to6
                if ($row_b) {
                    $dew = explode('| ', $row_b['dew']);
                    $numColumns = 9;
                    $t_dew = fetchTableData($dew, $numColumns);
                }
                echo "const t_dew = " . json_encode($t_dew) . ";\n";
                //1to9-comments
                echo "const dew_comments = " . json_encode($row_b['dew_comments']) . ";\n";

                //Q10
                if ($row_b) {
                    $gre = explode('| ', $row_b['gre']);
                    $numColumns = 18;
                    $t_gre = fetchTableData($gre, $numColumns);
                }
                echo "const t_gre = " . json_encode($t_gre) . ";\n";
                //Q10-comments
                echo "const gre_comments = " . json_encode($row_b['gre_comments']) . ";\n";

                //Q11
                if ($row_b) {
                    $question11 = explode('| ', $row_b['question11']);
                    $numColumns = 9;
                    $t_question11 = fetchTableData($question11, $numColumns);
                }
                echo "const t_question11 = " . json_encode($t_question11) . ";\n";
                //Q11-comments
                echo "const question11_comments = " . json_encode($row_b['question11_comments']) . ";\n";

                //Q12
                if ($row_b) {
                    $question12 = explode('| ', $row_b['question12']);
                    $numColumns = 9;
                    $t_question12 = fetchTableData($question12, $numColumns);
                }
                echo "const t_question12 = " . json_encode($t_question12) . ";\n";
                //Q12-comments
                echo "const question12_comments = " . json_encode($row_b['question12_comments']) . ";\n";

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
                //pdfContent.push({ text: name, alignment: 'center', style: { header: true, fontSize: 30 } });
        
                // Add your content to pdfContent array using pdfmake syntax
                pdfContent.push({ text: 'SECTION B: MANAGEMENT AND PROCESS DISCLOSURES', style: 'header', margin: [10, 10, 0, 10], alignment: 'center' });

                pdfContent.push({ text: 'This section is aimed at helping businesses demonstrate the structures, policies and processes put in place towards adopting the NGRBC Principles and Core Elements.' });

                /* ************************************************************************************************************************************ */
                /*                                                                                                                                      */
                /*                                                                  1to12                                                               */
                /*                                                                                                                                      */
                /* ************************************************************************************************************************************ */
                var sec_B = htmlToPdfmake(`
                    <table>
                        <tr>
                            <th>Disclosure Questions</th>
                            <th colspan="1">P1</th>
                            <th colspan="1">P2</th>
                            <th colspan="1">P3</th>
                            <th colspan="1">P4</th>
                            <th colspan="1">P5</th>
                            <th colspan="1">P6</th>
                            <th colspan="1">P7</th>
                            <th colspan="1">P8</th>
                            <th colspan="1">P9</th>
                        </tr>
                        <tr>
                            <td style="text-align: center;" colspan="10"> Policy and management <br> processes </td>
                        </tr>
                        <?php
                            // Limit to the first three rows
                            $limited_t_dew = array_slice($t_dew, 0, 8);
                            foreach ($limited_t_dew as $index => $rowData) {
                                echo '<tr>';
                                // Add S. NO. column starting from 1
                                $index = $index+1;
                                // Second column based on index
                                if ($index == 1) {
                                    echo '<td style="text-align: left;">1. a. Whether your entity’s policy/policies<br>cover each principle and <br>its core elements of the NGRBCs.(Yes/No)</td>';
                                } elseif ($index == 2) {
                                    echo '<td style="text-align: left;">b. Has the policy been approved by the Board? (Yes/No)</td>';
                                } elseif ($index == 3) {
                                    echo '<td style="text-align: left;">c. Web Link of the Policies, if available</td>';
                                } elseif ($index == 4) {
                                    echo '<td style="text-align: left;">2. Whether the entity has translated the<br>policy into procedures. (Yes / No) </td>';
                                } elseif ($index == 5) {
                                    echo '<td style="text-align: left;">3. Do the enlisted policies extend to<br> your value chain partners? (Yes/No)</td>'; 
                                }  elseif ($index == 6) {
                                    echo '<td style="text-align: left;">4. Name of the national and international<br>codes/certifications /labels/ standards<br>(e.g. Forest Stewardship Council, Fairtrade,<br>Rainforest Alliance, Trustea) standards (e.g. SA<br>8000, OHSAS, ISO, BIS) adopted by your entity and <br>mapped to each principle</td>';
                                } elseif ($index == 7) {
                                    echo '<td style="text-align: left;">5. Specific commitments, goals and targets<br> set by the entity with defined timelines, if any.</td>';
                                } elseif ($index == 8) {
                                    echo '<td style="text-align: left;">6. Performance of the entity against the<br> specific commitments, goals and targets along-with reasons<br> in case the same are not met</td>';                
                                }  
                                // Fetch data starting from 1st column onwards
                                foreach ($rowData as $columnData) {
                                    echo '<td>' . $columnData . '</td>';
                                }
                                echo '</tr>';
                            }
                        ?>
                        <!-- Governance, leadership and oversight Start -->
                        <tr>
                            <td colspan="10" style="text-align: center;">Governance, leadership and oversight </td>
                        </tr>
                        <tr>
                            <td colspan="1" style="text-align: left;">7. Statement by director responsible for the<br>business responsibility report, highlighting ESG related challenges,<br>targets and achievements (listed entity has flexibility regarding the<br> placement of this disclosure)</td>;
                            <td colspan="9"><?php echo isset($row_b['stmtdir']) ? $row_b['stmtdir'] : ''; ?></td>
                        </tr>
                        <tr>
                            <td colspan="1" style="text-align: left;">8. &nbsp;&nbsp; Details of the highest authority<br> responsible for implementation and oversight of the <br>Business Responsibility policy (ies).</td>
                            <td colspan="9"><?php echo isset($row_b['dthi']) ? $row_b['dthi'] : ''; ?></td>
                        </tr>
                        <tr>
                            <td colspan="1" style="text-align: left;">9. Does the entity have a specified Committee of<br> the Board/ Director responsible for decision making on <br>sustainability related issues? (Yes / No). If yes, provide details.</td>
                            <td colspan="9"><?php echo isset($row_b['enspec']) ? $row_b['enspec'] : ''; ?></td>
                        </tr>
                    </table>
                    <textarea style="margin-left: 10px;"><?php echo isset($row_b['dew_comments']) ? $row_b['dew_comments'] : ''; ?></textarea>
                    <!-- Q1 to Q9 END -->

                    <!-- Q10 -->
                    <label>10. Details of Review of NGRBCs by the Company: </label>
                    <table>
                        <tr>
                            <th colspan="1" rowspan="2">Subject for Review </th>
                            <th colspan="9">Indicate whether review<br>was undertaken<br>by Director /<br>Committee of<br>the Board/<br>Any other<br>Committee</th>
                            <th colspan="9">Frequency(Annually/<br>Half yearly/<br>Quarterly/<br>Any other –please<br>specify)</th>
                        </tr>
                        </tr>
                        <tr>
                            <th>P1</th>
                            <th>P2</th>
                            <th>P3</th>
                            <th>P4</th>

                            <th>P5</th>
                            <th>P6</th>
                            <th>P7</th>
                            <th>P8</th>
                            <th>P9</th>

                            <th>P1</th>
                            <th>P2</th>
                            <th>P3</th>
                            <th>P4</th>
                            <th>P5</th>

                            <th>P6</th>
                            <th>P7</th>
                            <th>P8</th>
                            <th>P9</th>
                        </tr>
                        <?php
                            // Limit rows
                            $limited_t_gre = array_slice($t_gre, 0, 2);
                            foreach ($limited_t_gre as $index => $rowData) {
                                echo '<tr>';
                                // Add S. NO. column starting from 1
                                $index = $index+1;
                                // column based on index
                                if ($index == 1) {
                                    echo '<td style="text-align: left;">Performance against<br>above policies and<br>follow up action</td>';
                                } else{
                                    echo '<td style="text-align: left;">Compliance with<br>statutory requirements<br>of relevance to<br>the principles, and<br>, rectification of<br>any non-compliances</td>';
                                }                                
                                // Fetch data
                                foreach ($rowData as $columnData) {
                                    echo '<td>' . $columnData . '</td>';
                                }
                                echo '</tr>';
                            }
                        ?>
                    </table>
                    <textarea style="margin-left: 10px;"><?php echo isset($row_b['gre_comments']) ? $row_b['gre_comments'] : ''; ?></textarea>
                    <!-- Q10 -->

                    <!-- Q11 -->
                    <table>
                        <tr>
                            <th>11. Has the entity carried out <br>independent assessment/<br>evaluation of the<br>working of its policies by an external <br>agency? (Yes/No).<br>If yes, provide name of the agency</th>
                            <th>P1</th>
                            <th>P2</th>
                            <th>P3</th>
                            <th>P4</th>
                            <th>P5</th>
                            <th>P6</th>
                            <th>P7</th>
                            <th>P8</th>
                            <th>P9</th>
                        </tr>
                        <?php
                            // Limit rows
                            $limited_t_question11 = array_slice($t_question11, 0, 1);
                            foreach ($limited_t_question11 as $index => $rowData) {
                                echo '<tr>';
                                // Add S. NO. column starting from 1
                                $index = $index+1;
                                // column based on index
                                if ($index == 1) {
                                    echo '<td></td>';
                                }
                                // Fetch data
                                foreach ($rowData as $columnData) {
                                    echo '<td>' . $columnData . '</td>';
                                }
                                echo '</tr>';
                            }
                        ?>
                    </table>
                    <textarea style="margin-left: 10px;"><?php echo isset($row_b['question11_comments']) ? $row_b['question11_comments'] : ''; ?></textarea>

                    <!-- Q12 -->
                    <label>12. If answer to question (1) above is “No” i.e. not all Principles are covered by a policy, reasons to be stated:</label>
                    <table>
                        <tr>
                            <th colspan="1" rowspan="1" style="width: 450px;">Questions</th>
                            <th colspan="1" rowspan="1">P1</th>
                            <th colspan="1" rowspan="1">P2</th>
                            <th colspan="1" rowspan="1">P3</th>
                            <th colspan="1" rowspan="1">P4</th>
                            <th colspan="1" rowspan="1">P5</th>
                            <th colspan="1" rowspan="1">P6</th>
                            <th colspan="1" rowspan="1">P7</th>
                            <th colspan="1" rowspan="1">P8</th>
                            <th colspan="1" rowspan="1">P9</th>
                        </tr>
                        <?php
                            // Limit to the first three rows
                            $limited_t_question12 = array_slice($t_question12, 0, 5);
                            foreach ($limited_t_question12 as $index => $rowData) {
                                echo '<tr>';
                                // Add S. NO. column starting from 1
                                $index = $index+1;
                                // Second column based on index
                                if ($index == 1) {
                                    echo '<td style="text-align: left;">The entity does not consider<br>the Principles smaterial to its business (Yes/No)</td>';
                                } elseif ($index == 2) {
                                    echo '<td style="text-align: left;">The entity is not at a stage<br>where it is in a position to formulate and<br>implement the policies on specified<br>principles (Yes/No)</td>';
                                } elseif ($index == 3) {
                                    echo '<td style="text-align: left;">The entity does not have the<br>financial or/human and technical resources<br>available for the task (Yes/No)</td>';
                                } elseif ($index == 4) {
                                    echo '<td style="text-align: left;">It is planned to be done in<br>the next financial year (Yes/No)';
                                } else {
                                    echo '<td style="text-align: left;">Any other reason (please specify)'; 
                                }
                                // Fetch data starting from 1st column onwards
                                foreach ($rowData as $columnData) {
                                    echo '<td>' . $columnData . '</td>';
                                }
                                echo '</tr>';
                            }
                        ?>
                    </table>
                    <textarea style="margin-left: 10px;"><?php echo isset($row_b['question12_comments']) ? $row_b['question12_comments'] : ''; ?></textarea>
                `);
                console.log("cin",cin);

                /* ************************************************************************************************************************************ */
                /*                                                                                                                                      */
                /*                                                     pdfmake definition                                                               */
                /*                                                                                                                                      */
                /* ************************************************************************************************************************************ */
                // Construct the filename dynamically
                const filename = `B_Section_${name}_BRSR_${reporting_fin_year}.pdf`;
                const pdfDefinition = {
                    content: [pdfContent, sec_B],
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
