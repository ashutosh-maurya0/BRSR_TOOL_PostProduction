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
                <h1>Section C <?php if (isset($_SESSION['cin'])) echo("(CIN: $cin)"); else echo("")?> Successfully Printed.</h1>
            </div>
        </div>
        <script>
            //style="text-align: center;"><?//php echo $row_a['reporting_fin_year']?>
            //style="text-align: center;">FY<?//php echo calculatePreviousFY($row_a['reporting_fin_year']); ?>


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

                // Fetch data from the section_c_form table
                $sql_c = "SELECT * FROM section_c_form WHERE cin = '$cin'";
                $stmt_c = $pdo->query($sql_c);
                $row_c = $stmt_c->fetch(PDO::FETCH_ASSOC);

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

                //Function to calculate the FY
                function calculatePreviousFY($finYear) {
                    // Extract the period using regular expression
                    preg_match('/\d{4}-\d{2}/', $finYear, $matches);
                    $currentFY = $matches[0];
                    // Split the current FY to get the start and end years
                    list($startYear, $endYearSuffix) = explode('-', $currentFY);
                    // Convert the end year suffix to a full year for comparison
                    $endYear = ($endYearSuffix <= substr($startYear, -2)) ? substr($startYear, 0, 2) . $endYearSuffix : (substr($startYear, 0, 2) + 1) . $endYearSuffix;
                    // Calculate the previous FY start year
                    $previousStartYear = $startYear - 1;
                    // Determine the correct century for the previous FY end year
                    $previousEndYear = $previousStartYear + 1;
                    $previousEndYearSuffix = substr($previousEndYear, -2);
                    // Format the previous FY
                    $previousFY = $previousStartYear . "-" . $previousEndYearSuffix;

                    return $previousFY;
                }
                $dateString = $row_a['reporting_fin_year'];
                $previousFY = calculatePreviousFY($dateString);

                /* ************************************************************************************************************************************ */
                /*                                                                                                                                      */
                /*                                                            Principle 1                                                               */
                /*                                                                                                                                      */
                /* ************************************************************************************************************************************ */
                //EI
                    //E1
                    if ($row_c) {
                        $coverage = explode('| ', $row_c['1_1_coverage']);
                        $numColumns = 3;
                        $t_coverage = fetchTableData($coverage, $numColumns);
                    }
               
                    //E2
                    if ($row_c) {
                        $details = explode('| ', $row_c['1_2_details']);
                        $numColumns = 5;
                        $t_details = fetchTableData($details, $numColumns);
                    }
               
                    //E3
                    if ($row_c) {
                        $appeal = explode('| ', $row_c['1_3_appeal']);
                        $numColumns = 3;
                        $t_appeal = fetchTableData($appeal, $numColumns);
                    }

                    //E5
                    if ($row_c) {
                        $disciplinaryAction = explode('| ', $row_c['1_5_disciplinaryAction']);
                        $numColumns = 2;
                        $t_disciplinaryAction = fetchTableData($disciplinaryAction, $numColumns);
                    }

                    //E6
                    if ($row_c) {
                        $conflictComplaints = explode('| ', $row_c['1_6_conflictComplaints']);
                        $numColumns = 4;
                        $t_conflictComplaints = fetchTableData($conflictComplaints, $numColumns);
                    }
                //LI
                    //L8
                    if ($row_c) {
                        $awarenessProgrammes = explode('| ', $row_c['1_8_awarenessProgrammes']);
                        $numColumns = 4;
                        $t_awarenessProgrammes = fetchTableData($awarenessProgrammes, $numColumns);
                    }

                /* ************************************************************************************************************************************ */
                /*                                                                                                                                      */
                /*                                                            Principle 2                                                               */
                /*                                                                                                                                      */
                /* ************************************************************************************************************************************ */
                //EI
                    //E1
                    if ($row_c) {
                        $rdPercentage = explode('| ', $row_c['2_1_rdPercentage']);
                        $numColumns = 3;
                        $t_rdPercentage = fetchTableData($rdPercentage, $numColumns);
                    }

                    //E2
                    if ($row_c) {
                        $sustainableSourcingPercentage = explode('| ', $row_c['2_3_sustainableSourcingPercentage']);
                        $numColumns = 3;
                        $t_sustainableSourcingPercentage = fetchTableData($sustainableSourcingPercentage, $numColumns);
                    }

                    //E2
                    if ($row_c) {
                        $sustainableSourcingPercentage = explode('| ', $row_c['2_3_sustainableSourcingPercentage']);
                        $numColumns = 3;
                        $t_sustainableSourcingPercentage = fetchTableData($sustainableSourcingPercentage, $numColumns);
                    }
                //LI
                    //L1 
                    if ($row_c) {
                        $lcaConducted2 = explode('| ', $row_c['2_7_lcaConducted2']);
                        $numColumns = 7;
                        $t_lcaConducted2 = fetchTableData($lcaConducted2, $numColumns);
                    }

                    //L2 
                    if ($row_c) {
                        $concernsMitigation2 = explode('| ', $row_c['2_8_concernsMitigation2']);
                        $numColumns = 4;
                        $t_concernsMitigation2 = fetchTableData($concernsMitigation2, $numColumns);
                    }

                    //L3 
                    if ($row_c) {
                        $recycledPercentage2 = explode('| ', $row_c['2_9_recycledPercentage2']);
                        $numColumns = 4;
                        $t_recycledPercentage2 = fetchTableData($recycledPercentage2, $numColumns);
                    }

                    //L4 
                    if ($row_c) {
                        $reclaimedProducts2 = explode('| ', $row_c['2_10_reclaimedProducts2']);
                        $numColumns = 6;
                        $t_reclaimedProducts2 = fetchTableData($reclaimedProducts2, $numColumns);
                    }

                    //L5 
                    if ($row_c) {
                        $reclaimedPercentages2 = explode('| ', $row_c['2_11_reclaimedPercentages2']);
                        $numColumns = 3;
                        $t_reclaimedPercentages2 = fetchTableData($reclaimedPercentages2, $numColumns);
                    }

                /* ************************************************************************************************************************************ */
                /*                                                                                                                                      */
                /*                                                            Principle 3                                                               */
                /*                                                                                                                                      */
                /* ************************************************************************************************************************************ */
                //EI
                    //E1.a
                    if ($row_c) {
                        $employeeWellbeingDetails = explode('| ', $row_c['3_1_employeeWellbeingDetails']);
                        $numColumns = 11;
                        $t_employeeWellbeingDetails = fetchTableData($employeeWellbeingDetails, $numColumns);
                    }

                    //E1.b
                    if ($row_c) {
                        $workerWellbeingDetails = explode('| ', $row_c['3_2_workerWellbeingDetails']);
                        $numColumns = 11;
                        $t_workerWellbeingDetails = fetchTableData($workerWellbeingDetails, $numColumns);
                    }

                    //E2
                    if ($row_c) {
                        $retirementBenefitsDetails = explode('| ', $row_c['3_3_retirementBenefitsDetails']);
                        $numColumns = 6;
                        $t_retirementBenefitsDetails = fetchTableData($retirementBenefitsDetails, $numColumns);
                    }

                    //E5
                    if ($row_c) {
                        $returnRetentionRates = explode('| ', $row_c['3_7_returnRetentionRates']);
                        $numColumns = 4;
                        $t_returnRetentionRates = fetchTableData($returnRetentionRates, $numColumns);
                    }

                    //E6
                    if ($row_c) {
                        $grievanceMechanismDetails = explode('| ', $row_c['3_8_grievanceMechanismDetails']);
                        $numColumns = 1;
                        $t_grievanceMechanismDetails = fetchTableData($grievanceMechanismDetails, $numColumns);
                    }

                    //E7
                    if ($row_c) {
                        $unionMembershipPercentage = explode('| ', $row_c['3_9_unionMembershipPercentage']);
                        $numColumns = 6;
                        $t_unionMembershipPercentage = fetchTableData($unionMembershipPercentage, $numColumns);
                    }

                    //E8
                    if ($row_c) {
                        $trainingDetails = explode('| ', $row_c['3_10_trainingDetails']);
                        $numColumns = 10;
                        $t_trainingDetails = fetchTableData($trainingDetails, $numColumns);
                    }

                    //E9
                    if ($row_c) {
                        $performanceReviewDetails = explode('| ', $row_c['3_11_performanceReviewDetails']);
                        $numColumns = 6;
                        $t_performanceReviewDetails = fetchTableData($performanceReviewDetails, $numColumns);
                    }

                    //E11
                    if ($row_c) {
                        $workplaceSafetyMeasures = explode('| ', $row_c['3_15_workplaceSafetyMeasures']);
                        $numColumns = 2;
                        $t_workplaceSafetyMeasures = fetchTableData($workplaceSafetyMeasures, $numColumns);
                    }

                    //E13
                    if ($row_c) {
                        $complaintsemployees = explode('| ', $row_c['3_20_complaintsemployees']);
                        $numColumns = 6;
                        $t_complaintsemployees = fetchTableData($complaintsemployees, $numColumns);
                    }

                    //E14
                    if ($row_c) {
                        $assesmentyr = explode('| ', $row_c['3_21_assesmentyr']);
                        $numColumns = 1;
                        $t_assesmentyr = fetchTableData($assesmentyr, $numColumns);
                    }
                //LI
                    //L3
                    if ($row_c) {
                        $workRelatedInjuryRehabilitation = explode('| ', $row_c['3_27_workRelatedInjuryRehabilitation']);
                        $numColumns = 4;
                        $t_workRelatedInjuryRehabilitation = fetchTableData($workRelatedInjuryRehabilitation, $numColumns);
                    }

                    //L5
                    if ($row_c) {
                        $rdPercentageassesment = explode('| ', $row_c['3_30_rdPercentageassesment']);
                        $numColumns = 1;
                        $t_rdPercentageassesment = fetchTableData($rdPercentageassesment, $numColumns);
                    }

                /* ************************************************************************************************************************************ */
                /*                                                                                                                                      */
                /*                                                            Principle 4                                                               */
                /*                                                                                                                                      */
                /* ************************************************************************************************************************************ */
                //EI
                    //E1
                    if ($row_c) {
                        $stakeholderEngagementDetails = explode('| ', $row_c['4_2_stakeholderEngagementDetails']);
                        $numColumns = 6;
                        $t_stakeholderEngagementDetails = fetchTableData($stakeholderEngagementDetails, $numColumns);
                    }

                /* ************************************************************************************************************************************ */
                /*                                                                                                                                      */
                /*                                                            Principle 5                                                               */
                /*                                                                                                                                      */
                /* ************************************************************************************************************************************ */
                //EI
                    //E1
                    if ($row_c) {
                        $humanRightsTrainingDetails = explode('| ', $row_c['5_1_humanRightsTrainingDetails']);
                        $numColumns = 6;
                        $t_humanRightsTrainingDetails = fetchTableData($humanRightsTrainingDetails, $numColumns);
                    }

                    //E2
                    if ($row_c) {
                        $wageDetails = explode('| ', $row_c['5_2_wageDetails']);
                        $numColumns = 10;
                        $t_wageDetails = fetchTableData($wageDetails, $numColumns);
                    }

                    //E3
                    if ($row_c) {
                        $remunerationDetails = explode('| ', $row_c['5_3_remunerationDetails']);
                        $numColumns = 4;
                        $t_remunerationDetails = fetchTableData($remunerationDetails, $numColumns);
                    }
                
                    //E6
                    if ($row_c) {
                        $complaintsDetails = explode('| ', $row_c['5_7_complaintsDetails']);
                        $numColumns = 6;
                        $t_complaintsDetails = fetchTableData($complaintsDetails, $numColumns);
                    }

                    //E9
                    if ($row_c) {
                        $assessedPlantPercentage = explode('| ', $row_c['5_11_assessedPlantPercentage']);
                        $numColumns = 1;
                        $t_assessedPlantPercentage = fetchTableData($assessedPlantPercentage, $numColumns);
                    }

                    //E9 others
                    if ($row_c) {
                        $assessedPlantPercentageOthers = explode('| ', $row_c['5_11_assessedPlantPercentageOthers']);
                        $numColumns = 2;
                        $t_assessedPlantPercentageOthers = fetchTableData($assessedPlantPercentageOthers, $numColumns);
                    }

                //LI
                    //L4
                    if ($row_c) {
                        $valueChainAssessment = explode('| ', $row_c['5_16_valueChainAssessment']);
                        $numColumns = 1;
                        $t_valueChainAssessment = fetchTableData($valueChainAssessment, $numColumns);
                    }

                    //L4 others
                    if ($row_c) {
                        $valueChainAssessmentOthers = explode('| ', $row_c['5_16_valueChainAssessmentOthers']);
                        $numColumns = 2;
                        $t_valueChainAssessmentOthers = fetchTableData($valueChainAssessmentOthers, $numColumns);
                    }

                /* ************************************************************************************************************************************ */
                /*                                                                                                                                      */
                /*                                                            Principle 6                                                               */
                /*                                                                                                                                      */
                /* ************************************************************************************************************************************ */
                //EI
                    //E1
                    if ($row_c) {
                        $energyConsumptionDetails = explode('| ', $row_c['6_1_energyConsumptionDetails']);
                        $numColumns = 2;
                        $t_energyConsumptionDetails = fetchTableData($energyConsumptionDetails, $numColumns);
                    }

                    //E3.1
                    if ($row_c) {
                        $waterWithdrawalDetails = explode('| ', $row_c['6_6_waterWithdrawalDetails']);
                        $numColumns = 2;
                        $t_waterWithdrawalDetails = fetchTableData($waterWithdrawalDetails, $numColumns);
                    }

                    //E5.1
                    if ($row_c) {
                        $airEmissionDetails = explode('| ', $row_c['6_11_airEmissionDetails']);
                        $numColumns = 3;
                        $t_airEmissionDetails = fetchTableData($airEmissionDetails, $numColumns);
                    }

                    //E6.1
                    if ($row_c) {
                        $greenhouseGasEmissionDetails = explode('| ', $row_c['6_14_greenhouseGasEmissionDetails']);
                        $numColumns = 3;
                        $t_greenhouseGasEmissionDetails = fetchTableData($greenhouseGasEmissionDetails, $numColumns);
                    }

                    //E8.1
                    if ($row_c) {
                        $wasteDetails = explode('| ', $row_c['6_19_wasteDetails']);
                        $numColumns = 2;
                        $t_wasteDetails = fetchTableData($wasteDetails, $numColumns);
                    }

                    //E10
                    if ($row_c) {
                        $ecologicalAreaOperations = explode('| ', $row_c['6_23_ecologicalAreaOperations']);
                        $numColumns = 4;
                        $t_ecologicalAreaOperations = fetchTableData($ecologicalAreaOperations, $numColumns);
                    }

                    //E11
                    if ($row_c) {
                        $eiaExternalAgency = explode('| ', $row_c['6_26_eiaExternalAgency']);
                        $numColumns = 7;
                        $t_eiaExternalAgency = fetchTableData($eiaExternalAgency, $numColumns);
                    }

                    //E12
                    if ($row_c) {
                        $environmentalComplianceStatus = explode('| ', $row_c['6_30_environmentalComplianceStatus']);
                        $numColumns = 5;
                        $t_environmentalComplianceStatus = fetchTableData($environmentalComplianceStatus, $numColumns);
                    }
                //LI
                    //L1
                    if ($row_c) {
                        $totalenergyconsumed = explode('| ', $row_c['6_31_totalenergyconsumed']);
                        $numColumns = 2;
                        $t_totalenergyconsumed = fetchTableData($totalenergyconsumed, $numColumns);
                    }

                    //L2
                    if ($row_c) {
                        $waterdischarged = explode('| ', $row_c['6_34_waterdischarged']);
                        $numColumns = 2;
                        $t_waterdischarged = fetchTableData($waterdischarged, $numColumns);
                    }

                    //L3.1c
                    if ($row_c) {
                        $waterstress = explode('| ', $row_c['6_37_waterstress']);
                        $numColumns = 2;
                        $t_waterstress = fetchTableData($waterstress, $numColumns);
                    }

                    //L4.1
                    if ($row_c) {
                        $totalscope = explode('| ', $row_c['6_40_totalscope']);
                        $numColumns = 3;
                        $t_totalscope = fetchTableData($totalscope, $numColumns);
                    }

                    //L6
                    if ($row_c) {
                        $resourceefficiency = explode('| ', $row_c['6_44_resourceefficiency']);
                        $numColumns = 4;
                        $t_resourceefficiency = fetchTableData($resourceefficiency, $numColumns);
                    }

                /* ************************************************************************************************************************************ */
                /*                                                                                                                                      */
                /*                                                            Principle 7                                                               */
                /*                                                                                                                                      */
                /* ************************************************************************************************************************************ */
                //EI
                    //E1.b
                    if ($row_c) {
                        $tradeAffiliations = explode('| ', $row_c['7_2_tradeAffiliations']);
                        $numColumns = 3;
                        $t_tradeAffiliations = fetchTableData($tradeAffiliations, $numColumns);
                    }

                    //E3
                    if ($row_c) {
                        $antiCompetitiveActions = explode('| ', $row_c['7_3_antiCompetitiveActions']);
                        $numColumns = 4;
                        $t_antiCompetitiveActions = fetchTableData($antiCompetitiveActions, $numColumns);
                    }
                //LI
                    //L1
                    if ($row_c) {
                        $publicPolicyAdvocacy = explode('| ', $row_c['7_4_publicPolicyAdvocacy']);
                        $numColumns = 6;
                        $t_publicPolicyAdvocacy = fetchTableData($publicPolicyAdvocacy, $numColumns);
                    }

                /* ************************************************************************************************************************************ */
                /*                                                                                                                                      */
                /*                                                            Principle 8                                                               */
                /*                                                                                                                                      */
                /* ************************************************************************************************************************************ */
                //EI
                    //E1
                    if ($row_c) {
                        $socialImpactAssessments = explode('| ', $row_c['8_1_socialImpactAssessments']);
                        $numColumns = 7;
                        $t_socialImpactAssessments = fetchTableData($socialImpactAssessments, $numColumns);
                    }

                    //E2
                    if ($row_c) {
                        $rehabilitationProjects = explode('| ', $row_c['8_2_rehabilitationProjects']);
                        $numColumns = 7;
                        $t_rehabilitationProjects = fetchTableData($rehabilitationProjects, $numColumns);
                    }

                    //E4
                    if ($row_c) {
                        $inputMaterialPercentage = explode('| ', $row_c['8_4_inputMaterialPercentage']);
                        $numColumns = 2;
                        $t_inputMaterialPercentage = fetchTableData($inputMaterialPercentage, $numColumns);
                    }
                //LI
                    //L1
                    if ($row_c) {
                        $socialImpactActions = explode('| ', $row_c['8_5_socialImpactActions']);
                        $numColumns = 3;
                        $t_socialImpactActions = fetchTableData($socialImpactActions, $numColumns);
                    }

                    //L2
                    if ($row_c) {
                        $csrAspirationalDistricts = explode('| ', $row_c['8_6_csrAspirationalDistricts']);
                        $numColumns = 5;
                        $t_csrAspirationalDistricts = fetchTableData($csrAspirationalDistricts, $numColumns);
                    }

                    //L4
                    if ($row_c) {
                        $intellectualPropertiesBenefits = explode('| ', $row_c['8_9_intellectualPropertiesBenefits']);
                        $numColumns = 5;
                        $t_intellectualPropertiesBenefits = fetchTableData($intellectualPropertiesBenefits, $numColumns);
                    }

                    //L5
                    if ($row_c) {
                        $correctiveActionsIntellectualProperty = explode('| ', $row_c['8_10_correctiveActionsIntellectualProperty']);
                        $numColumns = 4;
                        $t_correctiveActionsIntellectualProperty = fetchTableData($correctiveActionsIntellectualProperty, $numColumns);
                    }

                    //L6
                    if ($row_c) {
                        $csrProjectBeneficiaries = explode('| ', $row_c['8_11_csrProjectBeneficiaries']);
                        $numColumns = 4;
                        $t_csrProjectBeneficiaries = fetchTableData($csrProjectBeneficiaries, $numColumns);
                    }

                /* ************************************************************************************************************************************ */
                /*                                                                                                                                      */
                /*                                                            Principle 9                                                               */
                /*                                                                                                                                      */
                /* ************************************************************************************************************************************ */
                //EI
                    //E2
                    if ($row_c) {
                        $productTrunover = explode('| ', $row_c['9_2_productTrunover']);
                        $numColumns = 1;
                        $t_productTrunover = fetchTableData($productTrunover, $numColumns);
                    }

                    //E3
                    if ($row_c) {
                        $consumerComplaints = explode('| ', $row_c['9_3_consumerComplaints']);
                        $numColumns = 6;
                        $t_consumerComplaints = fetchTableData($consumerComplaints, $numColumns);
                    }

                    //E4
                    if ($row_c) {
                        $productRecallInstances = explode('| ', $row_c['9_4_productRecallInstances']);
                        $numColumns = 2;
                        $t_productRecallInstances = fetchTableData($productRecallInstances, $numColumns);
                    }

             ?>

            /* ************************************************************************************************************************************ */
            /*                                                                                                                                      */
            /*                                                               PDF Generation CODE                                                    */
            /*                                                                                                                                      */
            /* ************************************************************************************************************************************ */
            function generatePDF() {
                /* ************************************************************************************************************************************ */
                /*                                                                                                                                      */
                /*                                                                  Principle 1                                                         */
                /*                                                                                                                                      */
                /* ************************************************************************************************************************************ */
                var sec_C = htmlToPdfmake(`<br>
                    <h1 style="text-align: center;">SECTION C: PRINCIPLE WISE PERFORMANCE DISCLOSURE<h1>
                    
                    <h5> PRINCIPLE 1: BUSINESSES SHOULD CONDUCT & GOVERN THEMSELVES WITH INTEGRITY, & IN A MANNER THAT IS ETHICAL, TRANSPARENT & ACCOUNTABLE.</h5>
                    <h6 style="text-align: center; border-bottom: 2px solid #2d6a4f; padding-bottom: 15px;">Essential Indicators</h6>

                    <label>1. Percentage coverage by training & awareness programmes on any of the Principles during the financial year:</label>
                        <table>
                            <tr>
                                <th>Segment</th>
                                <th>Total number of<br>training and awareness<br>programmes held</th>
                                <th>Topics/Principles<br>covered under<br>the training and<br>its impact</th>
                                <th>% of persons in<br>respective category<br>covered by the<br>awareness programmes</th>
                            </tr>
                            <tr>
                                <th>Location</th>
                                <th >Number of plants</th>
                                <th >Number of offices</th>
                                <th >Total</th>
                            </tr>
                            <?php
                                // Limit rows
                                $limited_t_coverage = array_slice($t_coverage, 0, 4);
                                foreach ($limited_t_coverage as $index => $rowData) {
                                    echo '<tr>';
                                    // Add S. NO. column starting from 1
                                    $index = $index+1;
                                    // column based on index
                                    if ($index == 1) {
                                        echo '<th>Board of Directors</th>';
                                    } elseif($index == 2) {
                                        echo '<th>Key Managerial Personnel</th>';
                                    } elseif($index == 3) {
                                        echo '<th>Employees other than BoD and KMPs</th>';
                                    } else {
                                        echo '<th>Workers</th>';
                                    }
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['1_1_coverage_comments']) ? $row_c['1_1_coverage_comments'] : ''; ?></textarea>
                    <!--Percentage coverage by training and awareness programmes end-->

                    <label>2. Details of fines/penalties/punishment/award/compounding fees/settlement amount paid in proceedings (by the entity or by directors/KMPs) with regulators/law enforcement agencies/judicial institutions, in the financial year:</label>
                        <table>
                            <tr>
                                <th style="text-align: center;" colspan="6">Monetary</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>NGRBC Principle</th>
                                <th>Name of the<br>regulatory/enforcement<br>agencies judicial<br>institutions</th>
                                <th>Amount (In INR)</th>
                                <th>Brief of the case</th>
                                <th>Has an appeal been preferred?(Yes/No)</th>
                            </tr>
                            <?php
                                // Limit rows
                                $limited_t_details = array_slice($t_details, 0, 3);
                                foreach ($limited_t_details as $index => $rowData) {
                                    echo '<tr>';
                                        $index++; // Increment index for the next row
                                        // column based on index
                                        if ($index == 1) {
                                            echo '<th>Penalty/fine</th>';
                                        } elseif($index == 2) {
                                            echo '<th>Settlement</th>';
                                        } else {
                                            echo '<th>Compounding fee</th>';
                                        } 
                                        // Fetch data
                                        foreach ($rowData as $columnData) {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                    echo '</tr>';
                                }
                            ?>
                            <tr>
                                <th style="text-align: center;" colspan="6">Non-Monetary</th>
                            </tr>
                            <?php
                                // Limit rows
                                $limited_t_details = array_slice($t_details, 3, 5);
                                $index = 3; // Start index from 4
                                foreach ($limited_t_details as $rowData) {
                                    echo '<tr>';
                                        $index++; // Increment index for the next row
                                        // column based on index
                                        if ($index == 4) {
                                            echo '<th>Imprisonment</th>';
                                        } else {
                                            echo '<th>Punishment</th>';
                                        } 
                                        // Fetch data
                                        foreach ($rowData as $columnData) {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                    echo '</tr>';                              
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['1_2_details_comments']) ? $row_c['1_2_details_comments'] : ''; ?></textarea>
                    <!--Details of fines/penalties/punishment/award/compounding fees/settlement amount paid end-->

                    <label>3. Of the instances disclosed in Question 2 above, details of the Appeal/Revision preferred in cases where monetary or non-monetary action has been appealed.</label>
                        <table>
                            <tr>
                                <th>S.No.</th>
                                <th>Case Details</th>
                                <th>Name of the regulatory/enforcement agencies/judicial instutions</th>
                            </tr>
                            <?php
                                $columnCount = 0;
                                foreach ($t_appeal as $index => $rowData) {
                                    echo '<tr>';
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                        $columnCount++;
                                        // Check if it's the 2nd column, then start a new line
                                        if ($columnCount % 3 == 0) {
                                            echo '</tr><tr>';
                                        }
                                        
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['1_3_appeal_comments']) ? $row_c['1_3_appeal_comments'] : ''; ?></textarea>
                    <!--Details of appeal/revision preferred in cases where monetary or non-monetary actions has been appealed end-->

                    <label>4. Does the entity have an anti-corruption or anti-bribery policy? If yes, provide details in brief & if available, provide a web-link to the policy:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['1_4_antiCorruptionPolicy']) ? $row_c['1_4_antiCorruptionPolicy'] : ''; ?></textarea>
                    <!--Does the entity have an anti-corruption or anti-bribery policy - details end-->

                    <label>5. Number of Directors/KMPs/employees/workers against whom disciplinary action was taken by any law enforcement agency for the charges of bribery/corruption:</label>
                        <table>
                            <tr>
                                <th></th>
                                <th style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                <th style="text-align: center;">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']); ?><br>(Previous Financial Year)</th>
                            </tr>
                            <?php
                                // Limit rows
                                $limited_t_disciplinaryAction = array_slice($t_disciplinaryAction, 0, 4);
                                foreach ($limited_t_disciplinaryAction as $index => $rowData) {
                                    echo '<tr>';
                                    // Add S. NO. column starting from 1
                                    $index = $index+1;
                                    // column based on index
                                    if ($index == 1) {
                                        echo '<th>Directors</th>';
                                    } elseif($index == 2) {
                                        echo '<th>KMPs</th>';
                                    } elseif($index == 3) {
                                        echo '<th>Employees</th>';
                                    } else {
                                        echo '<th>Workers</th>';
                                    }
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['1_5_disciplinaryAction_comments']) ? $row_c['1_5_disciplinaryAction_comments'] : ''; ?></textarea>
                    <!--Number of Directors/KMPs/employees/workers against whom disciplinary action was taken end-->

                    <label>6. Details of complaints with regard to conflict of interest:</label>
                        <table>
                            <tr>
                                <th rowspan="2"></th>
                                <th colspan="2" style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                <th colspan="2" style="text-align: center;">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']); ?><br>(Previous Financial Year)</th>
                            </tr>
                            <tr>
                                <th>Number</th>
                                <th>Remarks</th>
                                <th>Number</th>
                                <th>Remarks</th>
                            </tr>
                            <?php
                                // Limit rows
                                $limited_t_conflictComplaints = array_slice($t_conflictComplaints, 0, 2);
                                foreach ($limited_t_conflictComplaints as $index => $rowData) {
                                    echo '<tr>';
                                        // Add S. NO. column starting from 1
                                        $index++;
                                        // column based on index
                                        if ($index == 1) {
                                            echo '<th>Number of<br>Complaints received<br>in relation to<br>issues of Conflfict<br>of intrest of the<br>Directors</th>';
                                        } else {
                                            echo '<th>Number of<br>Complaints received<br>in relation to<br>issues of Conflect<br>to Intrest of<br>the KMPs</th>';
                                        }
                                        // Fetch data
                                        foreach ($rowData as $columnData) {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['1_6_conflictComplaints_comments']) ? $row_c['1_6_conflictComplaints_comments'] : ''; ?></textarea>
                    <!--Details of complaints with regard to conflict of interest end-->
                    
                    <label>7. Provide details of any corrective action taken or underway on issues related to fines/penalties/action taken by regulators/law enforcement agencies/judicial institutions, on cases of corruption & conflicts of interest:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['1_7_correctiveAction']) ? $row_c['1_7_correctiveAction'] : ''; ?></textarea>
                    <!--Details of corrective action taken or underway on issues related to fines/penalties/action taken by regulators end-->

                    <!------------------------------------------------------------------------------------------------------------------------->
                    <!--                                     LEADERSHIP INDICATORS -START                                                    -->
                    <!------------------------------------------------------------------------------------------------------------------------->
                    <h6 style="text-align: center; border-bottom: 2px solid #2d6a4f; padding-bottom: 15px;">Leadership Indicators</h6>

                    <label>1. Awareness programmes conducted for value chain partners on any of the Principles during the financial year:</label>
                        <table>
                            <tr>
                                <th>S.No</th>
                                <th>Total number of awareness programes held</th>
                                <th>Topics/Principles Covered Under the training</th>
                                <th>% of value chain partners covered (by value of business done with such partners)under the awareness programmes</th>
                            </tr>
                            <?php
                                $columnCount = 0;
                                foreach ($t_awarenessProgrammes as $index => $rowData) {
                                    echo '<tr>';
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                        $columnCount++;
                                        // Check if it's the 2nd column, then start a new line
                                        if ($columnCount % 4 == 0) {
                                            echo '</tr><tr>';
                                        }
                                          
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['1_8_awarenessProgrammes_comments']) ? $row_c['1_8_awarenessProgrammes_comments'] : ''; ?></textarea>
                    <!--Awareness programmes conducted for value chain partners on any of the Principles end-->

                    <label>2. Does the entity have processes in place to avoid/manage conflict of interests involving members of the Board?(Yes/No). If yes, provide details of the same:</label>
                        <?php
                            // Check the value of 'conflict_of_interest'
                            $conflictOfInterest = $row_c['1_9_conflictOfInterest'];

                            //based on yes and no
                            if ($conflictOfInterest == 'No') {
                                echo "No";
                            } elseif($conflictOfInterest == 'Yes') {
                                echo '<label>Specify the relevant details:</label>';
                                echo $row_c['1_10_conflictDetails'];
                            }
                        ?>
                    <!--Does the entity have processes in place to avoid/manage conflict of interests involving members of the Board? end-->

                    <!------------------------------------------------------------------------------------------------------------------------->
                    <!--                                                      Principle 2                                                    -->
                    <!------------------------------------------------------------------------------------------------------------------------->
                    <h5>PRINCIPLE 2: BUSINESSES SHOULD PROVIDE GOODS AND SERVICES IN A MANNER THAT IS SUSTAINABLE AND SAFE.</h5>
                    <h6 style="text-align: center; border-bottom: 2px solid #2d6a4f; padding-bottom: 15px;">Essential Indicators</h6>
                    
                    <label>1. Percentage of R&D & capital expenditure (capex) investments in specific technologies to improve the environmental & social impacts of product & processes to total R&D & capex investments made by the entity in current & previous FY:</label>
                        <table>
                            <tr>
                                <th></th>
                                <th style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                <th style="text-align: center;">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']); ?><br>(Previous Financial Year)</th>
                                <th>Details of improvements in environmental and social impacts</th>
                            </tr>
                            <?php
                                // Limit rows
                                $limited_t_rdPercentage = array_slice($t_rdPercentage, 0, 2);
                                foreach ($limited_t_rdPercentage as $index => $rowData) {
                                    echo '<tr>';
                                    // Add S. NO. column starting from 1
                                    $index = $index+1;
                                    // column based on index
                                    if ($index == 1) {
                                        echo '<th>R&D</th>';
                                    } else {
                                        echo '<th>capex</th>';
                                    }
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['2_1_rdPercentage_comments']) ? $row_c['2_1_rdPercentage_comments'] : ''; ?></textarea>
                    <!--Percentage of R&D and CAPEX investments end-->
                    
                    <label>2. Sustainably sourced input details:</label>
                        <label>a. Does the entity have procedures in place for sustainable sourcing? (Yes/No). Enter the details:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['2_2_sustainableSourcing2']) ? $row_c['2_2_sustainableSourcing2'] : ''; ?></textarea>           
                        <label for="sustainableSourcingPercentage">b. If yes, what percentage of inputs were sourced sustainably?</label>
                        <table>
                            <tr>
                                <th>S.No.</th>
                                <th>Input</th>
                                <th>% of input sourced sustainably</th>
                            </tr>
                            <?php
                                $columnCount = 0;
                                foreach ($t_sustainableSourcingPercentage as $index => $rowData) {
                                    echo '<tr>';
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                        $columnCount++;
                                        // Check if it's the 2nd column, then start a new line
                                        if ($columnCount % 3 == 0) {
                                            echo '</tr><tr>';
                                        }
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['2_3_sustainableSourcingPercentage_comments']) ? $row_c['2_3_sustainableSourcingPercentage_comments'] : ''; ?></textarea>  
                    <!--Sustainable sourced input details end-->

                    <label>3. Describe the processes in place to safely reclaim your products for reusing, recycling & disposing at the end of life, for (a) Plastics (including packaging) (b) E-waste (c) Hazardous waste & (d) Other waste:</label>
                         <textarea style="margin-left: 10px;"><?php echo isset($row_c['reclaimProcesses2']) ? $row_c['reclaimProcesses2'] : ''; ?></textarea>    
                    <!--Processes to safely reclaim products for reusing, recycling and disposing at the end of life end-->

                    <label>4. Whether Extended Producer Responsibility (EPR) is applicable to the entitys activities (Yes/No). If yes, whether the waste collection plan is in line with the Extended Producer Responsibility (EPR) plan submitted to Pollution Control Boards? If not, provide steps taken to address the same:</label>
                        <?php
                            // Check the value of 'conflict_of_interest'
                            $eprApplicable = $row_c['2_5_eprApplicable'];

                            //based on yes and no
                            if ($eprApplicable == 'No') {
                                echo "No";
                            } elseif('Yes'){
                                echo '<label>Specify the relevant details:</label>';
                                echo $row_c['2_6_eprCollectionPlan'];
                            } else {
                                echo "Not Applicable";
                            }
                        ?>
                    <!--Whether Extended Producer Responsibility (EPR) is applicable to the entitys activities end-->

                    <!------------------------------------------------------------------------------------------------------------------------->
                    <!--                                     LEADERSHIP INDICATORS -START                                                    -->
                    <!------------------------------------------------------------------------------------------------------------------------->
                    <h6 style="text-align: center; border-bottom: 2px solid #2d6a4f; padding-bottom: 15px;">Leadership Indicators</h6>

                    <label>1. Has the entity conducted Life Cycle Perspective/Assessments (LCA) for any of its products or for its services If yes, provide details, i.e. Name of Product/Service, % of total Turnover contributed, Boundary for which the Life Cycle Perspective/Assessment was conducted, whether conducted by external agency:</label>
                        <table>
                            <tr>
                                <th>S.No.</th>
                                <th>NIC code</th>
                                <th>Name of Product/Service</th>
                                <th>% of total Turnover contributed</th>
                                <th>Boundary for which the life Cycle Perspective/Assessment was conducted</th>
                                <th>Whether conducted by independent external agency(Yes/No)</th>
                                <th>Results communicated in public domain(yes/no) if yes, provide the web-link</th>
                            </tr>
                            <?php
                                $columnCount = 0;
                                foreach ($t_lcaConducted2 as $index => $rowData) {
                                    echo '<tr>';
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                        $columnCount++;
                                        // Check if it's the 2nd column, then start a new line
                                        if ($columnCount % 7 == 0) {
                                            echo '</tr><tr>';
                                        }
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['2_7_lcaConducted2_comments']) ? $row_c['2_7_lcaConducted2_comments'] : ''; ?></textarea>
                    <!--Life Cycle Perspective/Assessments (LCA) for any of the products or for its services end-->

                    <label>2. If there are any significant social or environmental concerns &/or risks arising from production or disposal of your products/services, as identified in the Life Cycle Perspective/Assessments (LCA) or through any other means, briefly describe the same along-with action taken to mitigate the same:</label>
                        <table>
                            <tr>
                                <th>S.No.</th>
                                <th>Name of Product/service</th>
                                <th>Description of the risk/concern</th>
                                <th>Action Taken</th>
                            </tr>
                            <?php
                                $columnCount = 0;
                                foreach ($t_concernsMitigation2 as $index => $rowData) {
                                    echo '<tr>';
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                        $columnCount++;
                                        // Check if it's the 2nd column, then start a new line
                                        if ($columnCount % 4 == 0) {
                                            echo '</tr><tr>';
                                        }
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['2_8_concernsMitigation2_comments']) ? $row_c['2_8_concernsMitigation2_comments'] : ''; ?></textarea>
                    <!--Significant social or environmental concerns as identified in the Life Cycle Perspective/Assessments (LCA) end-->

                    <label>3. Percentage of recycled or reused input material to total material (by value) used in production or providing services in current & previous FY:</label>
                        <table>
                            <tr>
                                <th rowspan="2">S.No.</th>
                                <th rowspan="2">Indicate input material</th>
                                <th colspan="2">Recycled or re-used input material to total material </th>
                            </tr>
                            <tr>
                                <th style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                <th style="text-align: center;">FY <?php echo calculatePreviousFY($row_a['reporting_fin_year']);?><br>(Previous Financial Year)</th>
                            </tr> 
                            <?php
                                $columnCount = 0;
                                foreach ($t_recycledPercentage2 as $index => $rowData) {
                                    echo '<tr>';
                                        // Fetch data
                                        foreach ($rowData as $columnData) {
                                            echo '<td>' . $columnData . '</td>';
                                            $columnCount++;
                                            // Check if it's the 2nd column, then start a new line
                                            if ($columnCount % 4 == 0) {
                                                echo '</tr><tr>';
                                            }
                                        }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['2_9_recycledPercentage2_comments']) ? $row_c['2_9_recycledPercentage2_comments'] : ''; ?></textarea>
                    <!--Percentage of recycled or reused input material to total material used in production end-->
                    
                    <label>4. Products & packaging reclaimed at end of life of products, amount (in metric tonnes) reused, recycled, & safely disposed in the current & previous FY:</label>
                        <table>
                            <tr>
                                <th rowspan="2"></th>
                                <th colspan="3" style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                <th colspan="3" style="text-align: center;">FY <?php echo calculatePreviousFY($row_a['reporting_fin_year']); ?><br>(Previous Financial Year)</th>
                            </tr>
                            <tr>
                                <th>Re-used</th>
                                <th>Recycled</th>
                                <th>Safely Disposed</th>
                                <th>Re-used</th>
                                <th>Recycled</th>
                                <th>Safely Disposed</th>
                            </tr>
                            <?php
                                // Limit rows
                                $limited_t_reclaimedProducts2 = array_slice($t_reclaimedProducts2, 0, 4);
                                foreach ($limited_t_reclaimedProducts2 as $index => $rowData) {
                                    echo '<tr>';
                                    // Add S. NO. column starting from 1
                                    $index = $index+1;
                                    // column based on index
                                    if ($index == 1) {
                                        echo '<th>Plastics(including packaging)</th>';
                                    } elseif ($index == 2) {
                                        echo '<th>E-waste</th>';
                                    } elseif ($index == 3) {
                                        echo '<th>Hazardous waste</th>';
                                    } else { 
                                        echo '<th>Other waste</th>';
                                    }
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['2_10_reclaimedProducts2_comments']) ? $row_c['2_10_reclaimedProducts2_comments'] : ''; ?></textarea>
                    <!--Products and packaging reclaimed at end of life of products, amount reused, recycled, and safely disposed end-->
                
                    <label>5. Reclaimed products & their packaging materials (as percentage of products sold) for each product category:</label>
                        <table>
                            <tr>
                                <th>S.No.</th>
                                <th>Indicate product category</th>
                                <th>Reclaimed products and their packaging materials as % of total products sold in respective category</th>
                            </tr>
                            <?php
                                $columnCount = 0;
                                foreach ($t_reclaimedPercentages2 as $index => $rowData) {
                                    echo '<tr>';
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                        $columnCount++;
                                        // Check if it's the 2nd column, then start a new line
                                        if ($columnCount % 3 == 0) {
                                            echo '</tr><tr>';
                                        }
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['2_11_reclaimedPercentages2_comments']) ? $row_c['2_11_reclaimedPercentages2_comments'] : ''; ?></textarea>
                    <!--Reclaimed products and their packaging materials for each product category end-->

                    <!------------------------------------------------------------------------------------------------------------------------->
                    <!--                                                      Principle 3                                                    -->
                    <!------------------------------------------------------------------------------------------------------------------------->
                    <h5>PRINCIPLE 3: BUSINESSES SHOULD RESPECT & PROMOTE THE WELL-BEING OF ALL EMPLOYEES, INCLUDING THOSE IN THEIR VALUE CHAINS.</h5>
                    <h6 style="text-align: center; border-bottom: 2px solid #2d6a4f; padding-bottom: 15px;">Essential Indicators</h6>

                    <label>1. Employee/Worker well-being details:</label>
                        <label>a. Details of measures for the well-being of employees:</label>
                            <table>
                                <tr>
                                    <th rowspan="3">Category</th>
                                    <th colspan="11" style="text-align: center;">% of employees covered by</th>
                                </tr>
                                <tr>
                                    <th colspan="1" rowspan="2">Total employees</th>
                                    <th colspan="2">Health insurance</th>
                                    <th colspan="2">Accident insurance</th>
                                    <th colspan="2">Maternity Benefits</th>
                                    <th colspan="2">Paternity Benefits</th>
                                    <th colspan="2">Day-care facilities</th>
                                </tr>
                                <tr>
                                    <th>Number (B)</th>
                                    <th>%(B/A)</th>
                                    <th>Number (C)</th>
                                    <th>%(C/A)</th>
                                    <th>Number (D)</th>
                                    <th>%(D/A)</th>
                                    <th>Number (E)</th>
                                    <th>%(E/A)</th>
                                    <th>Number (F)</th>
                                    <th>%(F/A)</th>
                                </tr>
                                <tr>
                                    <th colspan="12" style="text-align: center;">Permanent employees</th>
                                </tr>
                                <?php
                                    // Limit to the first three rows
                                    $limited_t_employeeWellbeingDetails = array_slice($t_employeeWellbeingDetails, 0, 3);
                                    foreach ($limited_t_employeeWellbeingDetails as $index => $rowData) {
                                        echo '<tr>';
                                            $index++; // Increment index for the next row
                                            // Second column based on index
                                            if ($index == 1) {
                                                echo '<th>Male</th>';
                                            } elseif ($index == 2) {
                                                echo '<th>Female</th>';
                                            } else {
                                                echo '<th>Total</th>';
                                            }
                                            // Fetch data starting from 3rd column onwards
                                            foreach ($rowData as $columnData) {
                                                echo '<td>' . $columnData . '</td>';
                                            }
                                        echo '</tr>';
                                    }
                                ?>
                                <tr>
                                    <th colspan="12" style="text-align: center;">Other than Permanent employees</th>
                                </tr>
                                <?php
                                    // Limit to the rows from index 3 to 8
                                    $limited_t_employeeWellbeingDetails = array_slice($t_employeeWellbeingDetails, 3, 6);
                                    $index = 3; // Start index from 4
                                    foreach ($limited_t_employeeWellbeingDetails as $rowData) {
                                        echo '<tr>';
                                            $index++; // Increment index for the next row
                                            // Second column based on index
                                            if ($index == 4) {
                                                echo '<th>Male</th>';
                                            } elseif ($index == 5) {
                                                echo '<th>Female</th>';
                                            } else {
                                                echo '<th>Total</th>';
                                            }
                                            // Fetch data starting from 3rd column onwards
                                            foreach ($rowData as $columnData) {
                                                echo '<td>' . $columnData . '</td>';
                                            }
                                        echo '</tr>';                                       
                                    }
                                ?>
                            </table>
                            <textarea style="margin-left: 10px;"><?php echo isset($row_c['3_1_employeeWellbeingDetails_comments']) ? $row_c['3_1_employeeWellbeingDetails_comments'] : ''; ?></textarea>
                        <!--Employee well-being details end-->

                        <label>b. Details of measures for the well-being of workers:</label>
                            <table>
                                <tr>
                                    <th rowspan="3">Category</th>
                                    <th colspan="11" style="text-align: center;">% of workers covered by</th>
                                </tr>
                                <tr>
                                    <th colspan="1" rowspan="2">Total employees</th>
                                    <th colspan="2">Health insurance</th>
                                    <th colspan="2">Accident insurance</th>
                                    <th colspan="2">Maternity Benefits</th>
                                    <th colspan="2">Paternity Benefits</th>
                                    <th colspan="2">Day-care facilities</th>
                                </tr>
                                <tr>
                                    <th>Number (B)</th>
                                    <th>%(B/A)</th>
                                    <th>Number (C)</th>
                                    <th>%(C/A)</th>
                                    <th>Number (D)</th>
                                    <th>%(D/A)</th>
                                    <th>Number (E)</th>
                                    <th>%(E/A)</th>
                                    <th>Number (F)</th>
                                    <th>%(F/A)</th>
                                </tr>
                                <tr>
                                    <th colspan="12" style="text-align: center;">Permanent workers</th>
                                </tr>
                                <?php
                                    // Limit to the first three rows
                                    $limited_t_workerWellbeingDetails = array_slice($t_workerWellbeingDetails, 0, 3);
                                    foreach ($limited_t_workerWellbeingDetails as $index => $rowData) {
                                        echo '<tr>';
                                            $index++; // Increment index for the next row
                                            // Second column based on index
                                            if ($index == 1) {
                                                echo '<th>Male</th>';
                                            } elseif ($index == 2) {
                                                echo '<th>Female</th>';
                                            } else {
                                                echo '<th>Total</th>';
                                            }
                                            // Fetch data starting from 3rd column onwards
                                            foreach ($rowData as $columnData) {
                                                echo '<td>' . $columnData . '</td>';
                                            }
                                        echo '</tr>';
                                    }
                                ?>
                                <tr>
                                    <th colspan="12" style="text-align: center;">Other than Permanent workers</th>
                                </tr>
                                <?php
                                    // Limit to the rows from index 3 to 8
                                    $limited_t_workerWellbeingDetails = array_slice($t_workerWellbeingDetails, 3, 6);
                                    $index = 3; // Start index from 4
                                    foreach ($limited_t_workerWellbeingDetails as $rowData) {
                                        echo '<tr>';
                                            $index++; // Increment index for the next row
                                            // Second column based on index
                                            if ($index == 4) {
                                                echo '<th>Male</th>';
                                            } elseif ($index == 5) {
                                                echo '<th>Female</th>';
                                            } else {
                                                echo '<th>Total</th>';
                                            }
                                            // Fetch data starting from 3rd column onwards
                                            foreach ($rowData as $columnData) {
                                                echo '<td>' . $columnData . '</td>';
                                            }
                                        echo '</tr>';                                      
                                    }
                                ?>
                            </table>
                            <textarea style="margin-left: 10px;"><?php echo isset($row_c['3_2_workerWellbeingDetails_comments']) ? $row_c['3_2_workerWellbeingDetails_comments'] : ''; ?></textarea>
                        <!--Worker well-being details end-->
                    <!--Employee/Worker well-being details END-->

                    <label>2. Details of retirement benefits offered to workers & employees, for Current FY & Previous Financial Year:</label>
                        <table>
                            <tr>
                                <th rowspan="2">Benefits</th>
                                <th colspan="3" style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                <th colspan="3" style="text-align: center;">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']); ?><br>(Previous Financial Year)</th>
                            </tr>
                            <tr>
                                <th>No. of employees covered as a % of total employees</th>
                                <th>No. of employees covered as a % of total workers</th>
                                <th>Deducted and deposited with the authority(Y/N/N.A.)</th>
                                <th>No. of employees covered as a % of total employees</th>
                                <th>No. of employees covered as a % of total workers</th>
                                <th>Deducted and deposited with the authority(Y/N/N.A.)</th>
                            </tr>
                            <?php
                                // Limit rows
                                $limited_t_retirementBenefitsDetails = array_slice($t_retirementBenefitsDetails, 0, 4);
                                foreach ($limited_t_retirementBenefitsDetails as $index => $rowData) {
                                    echo '<tr>';
                                    // Add S. NO. column starting from 1
                                    $index = $index+1;
                                    // column based on index
                                    if ($index == 1) {
                                        echo '<th>PF</th>';
                                    } elseif ($index == 2) {
                                        echo '<th>Gratuity</th>';
                                    } elseif ($index == 3) {
                                        echo '<th>ESI</th>';
                                    } else { 
                                        echo '<th>Please Specify</th>';
                                    }
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['3_3_retirementBenefitsDetails_comments']) ? $row_c['3_3_retirementBenefitsDetails_comments'] : ''; ?></textarea>
                    <!--Details of retirement benefits end-->

                    <label>3. Are the premises/offices of the entity accessible to differently-abled employees & workers, as per the requirements of the Rights of Persons with Disabilities Act, 2016? If not, whether any steps are being taken by the entity in this regard:</label>
                         <textarea style="margin-left: 10px;"><?php echo isset($row_c['3_5_accessibilitySteps']) ? $row_c['3_5_accessibilitySteps'] : ''; ?></textarea>
                    <!--Accessibility of workplaces end-->

                    <label>4. Does the entity have an equal opportunity policy as per the Rights of Persons with Disabilities Act, 2016? If yes, provide a web link to the policy:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['3_6_equalOpportunityLink']) ? $row_c['3_6_equalOpportunityLink'] : ''; ?></textarea>            
                    <!--Does the entity have an equal opportunity policy as per the Rights of Persons with Disabilities Act, 2016? end-->

                    <label>5. Return to work & Retention rates of permanent employees & workers that took parental leave based on gender-male & female & in totality:</label>
                        <table>
                            <tr>
                                <th></th>
                                <th colspan="2" style="text-align: center;">Permanent Employees</th>
                                <th colspan="2" style="text-align: center;">Permanent Workers</th>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <th>Return to work rate</th>
                                <th>Retention rate</th>
                                <th>Return to work rate</th>
                                <th>Retention rate</th>
                            </tr>
                            <?php
                                // Limit rows
                                $limited_t_returnRetentionRates = array_slice($t_returnRetentionRates, 0, 4);
                                foreach ($limited_t_returnRetentionRates as $index => $rowData) {
                                    echo '<tr>';
                                    // Add S. NO. column starting from 1
                                    $index = $index+1;
                                    // column based on index
                                    if ($index == 1) {
                                        echo '<th>Male</th>';
                                    } elseif($index == 2) {
                                        echo '<th>Female</th>';
                                    } else {
                                        echo '<th>Total</th>';
                                    }
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                    }
                                    echo '</tr>';
                                }
                            ?>
                         </table>
                         <textarea style="margin-left: 10px;"><?php echo isset($row_c['3_7_returnRetentionRates_comments']) ? $row_c['3_7_returnRetentionRates_comments'] : ''; ?></textarea>
                    <!--Return to work and Retention rates of permanent employees and workers that took parental leave end-->

                    <label>6. Is there a mechanism available to receive & redress grievances for the following  categories of employees and worker? if yes give details of the mechanism in brief</label>
                        <table>
                            <tr>
                                <th></th>
                                <th style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                            </tr>
                            <?php
                                // Limit rows
                                $limited_t_grievanceMechanismDetails = array_slice($t_grievanceMechanismDetails, 0, 4);
                                foreach ($limited_t_grievanceMechanismDetails as $index => $rowData) {
                                    echo '<tr>';
                                        // Add S. NO. column starting from 1
                                        $index = $index+1;
                                        // column based on index
                                        if ($index == 1) {
                                            echo '<th>Permanent Workers</th>';
                                        } elseif($index == 2) {
                                            echo '<th>Other than Permanent Workers</th>';
                                        } elseif($index == 3) {
                                            echo '<th>Permanent Employees</th>';
                                        } else {
                                            echo '<th>Other than Permanent Employees</th>';
                                        }
                                        // Fetch data
                                        foreach ($rowData as $columnData) {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['3_8_grievanceMechanismDetails_comments']) ? $row_c['3_8_grievanceMechanismDetails_comments'] : ''; ?></textarea>
                    <!--Is there a mechanism available to receive and redress grievances end-->

                    <label>7. Disclose No. & percentage of Membership of total permanent male & female both categories employees & workers in association(s) or Unions recognized by the listed entity for both current & previous Financial Years:</label>
                        <table>
                            <tr>
                                <th rowspan="2">Category</th>
                                <th colspan="3" style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                <th colspan="3" style="text-align: center;">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']); ?><br>(Previous Financial Year)</th>
                            </tr>
                            <tr>
                                <th>Total employees/workers in respective category (A)</th>
                                <th>No. of employees/workers in respective category, who are part of association(s) or Union(B)</th>
                                <th>%(B/A)</th>
                                <th>Total employees/workers in respective category (C)</th>
                                <th>No. of employees/workers in respective category, who are part of association(s) or Union(D)</th>
                                <th>%(D/C)</th>
                            </tr>
                            <?php
                                // Limit rows
                                $limited_t_unionMembershipPercentage = array_slice($t_unionMembershipPercentage, 0, 6);
                                foreach ($limited_t_unionMembershipPercentage as $index => $rowData) {
                                    echo '<tr>';
                                    // Add S. NO. column starting from 1
                                    $index = $index+1;
                                    // column based on index
                                    if ($index == 1) {
                                        echo '<th>Total Permanent Employees</th>';
                                    } elseif($index == 2) {
                                        echo '<th>Male</th>';
                                    } elseif($index == 3) {
                                        echo '<th>Female</th>';
                                    } elseif($index == 4) {
                                        echo'<th>Total Permanent Workers</th>';
                                    } elseif($index == 5) {
                                        echo'<th>Male</th>';
                                    } else {
                                        echo'<th>Female</th>';
                                    }
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['3_9_unionMembershipPercentage_comments']) ? $row_c['3_9_unionMembershipPercentage_comments'] : ''; ?></textarea>
                    <!--Membership of employees and worker in association(s) or Unions recognised by the listed entity end-->

                    <label>8. Details of training on Health & safety measures & on skill up-gradation, given to employees & workers based on gender-male & female, & in totality for both current & previous financial years:</label>
                        <table>
                            <tr>
                                <th rowspan="3">Category</th>
                                <th colspan="5" style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                <th colspan="5" style="text-align: center;">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']); ?> <br>(Previous Financial Year)</th>
                            </tr>
                            <tr>
                                <th rowspan="2">Total(A)</th>
                                <th colspan="2">On Health and safety measures</th>
                                <th colspan="2">On skill upgradation</th>
                                <th rowspan="2">Total(D)</th>
                                <th colspan="2">On Health and safety measures</th>
                                <th colspan="2">On skill upgradation</th>
                            </tr>
                            <tr>
                                <th>No.(B)</th>
                                <th>%(B/A)</th>
                                <th>No.(C)</th>
                                <th>%(C/A)</th>
                                <th>No.(E)</th>
                                <th>%(E/D)</th>
                                <th>No.(F)</th>
                                <th>%(F/D)</th>
                            </tr>
                            <tr>
                                <th colspan="11" style="text-align: center;">Employees</th>
                            </tr>
                            <?php
                                // Limit to the first three rows
                                $limited_t_trainingDetails = array_slice($t_trainingDetails, 0, 3);
                                foreach ($limited_t_trainingDetails as $index => $rowData) {
                                    echo '<tr>';
                                        $index++; // Increment index for the next row
                                        // Second column based on index
                                        if ($index == 1) {
                                            echo '<th>Male</th>';
                                        } elseif ($index == 2) {
                                            echo '<th>Female</th>';
                                        } else {
                                            echo '<th>Total</th>';
                                        }
                                        // Fetch data starting from 3rd column onwards
                                        foreach ($rowData as $columnData) {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                    echo '</tr>';
                                }
                            ?>
                            <tr>
                                 <th colspan="11" style="text-align: center;">Workers</th>
                            </tr>
                            <?php
                                // Limit to the rows from index 3 to 8
                                $limited_t_trainingDetails = array_slice($t_trainingDetails, 3, 6);
                                $index = 3; // Start index from 4
                                foreach ($limited_t_trainingDetails as  $rowData) {
                                    echo '<tr>';
                                        $index++; // Increment index for the next row
                                        // Second column based on index
                                        if ($index == 4) {
                                            echo '<th>Male</th>';
                                        } elseif ($index == 5) {
                                            echo '<th>Female</th>';
                                        } else {
                                            echo '<th>Total</th>';
                                        }
                                        // Fetch data starting from 3rd column onwards
                                        foreach ($rowData as $columnData) {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['3_10_trainingDetails_comments']) ? $row_c['3_10_trainingDetails_comments'] : ''; ?></textarea>
                    <!--Details of training given to employees and workers end-->

                    <label>9. Details of performance & career development reviews of employees & workers on a gender-male & female & in totality for both current & previous financial years:</label>
                        <table>
                            <tr>
                                 <th rowspan="2">Category</th>
                                 <th colspan="3" style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                 <th colspan="3" style="text-align: center;">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']); ?><br>(Previous Financial Year)</th>
                            </tr>
                            <tr>
                                <th>Total(A)</th>
                                <th>No.(B)</th>  
                                <th>%(B/A)</th> 
                                <th>Total(C)</th>
                                <th>No.(D)</th>
                                <th>%(D/C)</th> 
                            </tr>
                            <tr>
                                <th colspan="7" style="text-align: center;">Employees</th>
                            </tr>
                            <?php
                                // Limit to the first three rows
                                $limited_t_performanceReviewDetails = array_slice($t_performanceReviewDetails, 0, 3);
                                foreach ($limited_t_performanceReviewDetails as $index => $rowData) {
                                    echo '<tr>';
                                    $index++; // Increment index for the next row
                                    // Second column based on index
                                    if ($index == 1) {
                                        echo '<th>Male</th>';
                                    } elseif ($index == 2) {
                                        echo '<th>Female</th>';
                                    } else {
                                        echo '<th>Total</th>';
                                    }
                                    // Fetch data starting from 3rd column onwards
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                    }
                                    echo '</tr>';
                                }
                            ?>
                            <tr>
                                 <th colspan="7" style="text-align: center;">Workers</th>
                            </tr>
                            <?php
                                // Limit to the rows from index 3 to 8
                                $limited_t_performanceReviewDetails = array_slice($t_performanceReviewDetails, 3, 6);
                                $index = 3; // Start index from 4
                                foreach ($limited_t_performanceReviewDetails as $rowData) {
                                    echo '<tr>';
                                    $index++; // Increment index for the next row
                                    // Second column based on index
                                    if ($index == 4) {
                                        echo '<th>Male</th>';
                                    } elseif ($index == 5) {
                                        echo '<th>Female</th>';
                                    } else {
                                        echo '<th>Total</th>';
                                    }
                                    // Fetch data starting from 3rd column onwards
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['3_11_performanceReviewDetails_comments']) ? $row_c['3_11_performanceReviewDetails_comments'] : ''; ?></textarea>
                    <!--Details of performance and career development reviews of employees and workers end-->

                    <label>10. Health and safety management system:</label>
                        <label>a. Whether an occupational health & safety management system has been implemented by the entity? (Yes/No). If yes, the coverage of such system?</label>
                        <?php
                            // Check the value of 'conflict_of_interest'
                            $conflictOfInterest = $row_c['3_12_healthSafetyManagementSystemChoice'];

                            //based on yes and no
                            if ($conflictOfInterest == 'No') {
                                echo "No";
                            }  elseif('Yes') {
                                echo '<label>Specify the coverage of occupational health and safety management systems:</label>';
                                echo $row_c['3_13_healthSafetyManagementSystemDetails'];
                            }
                        ?>
                
                        <label>b. What are the processes used to identify work-related harzards and assess risks on a routine and non-routine basis by the entity? </label>   
                            <textarea style="margin-left: 10px;"><?php echo isset($row_c['3_14_workplaceSafetyMeasures2']) ? $row_c['3_14_workplaceSafetyMeasures2'] : ''; ?></textarea>   
                         
                        <label>c. Whether you have processes for workers to report the work related hazards and to remove themselves from such risks</label> 
                            <textarea style="margin-left: 10px;"><?php echo isset($row_c['3_16_healthSafetyManagementSystem3']) ? $row_c['3_16_healthSafetyManagementSystem3'] : ''; ?></textarea>     
                            
                        <label for="healthSafetyManagementSystem4" class="form-label">d. Do the employees/workers of the entity have access to non-occupational medical and healthcare services?</label>    
                            <textarea style="margin-left: 10px;"><?php echo isset($row_c['3_17_healthSafetyManagementSystem4']) ? $row_c['3_17_healthSafetyManagementSystem4'] : ''; ?></textarea>
                    <!--Health and safety management system end-->
                    
                    <label>11. Details of safety related incidents, in the following format:</label><br>
                        <?php
                            // Function to generate table cells with rowspan
                            function generateRowspanCell($content, $rowspan) {
                                return "<th rowspan=\"$rowspan\">$content</th>";
                            }
                            
                            // Function to generate table cells without rowspan
                            function generateCell($content) {
                                return "<td align=\"center\">$content</td>";
                            }

                            echo '<table>';
                                echo '<tr>';
                                    echo '<th> Safety Incident/Number</th>';
                                    echo '<th> Category</th>';
                                    echo '<th style="text-align: center;">' . $row_a['reporting_fin_year'] . '<br>(Current Financial Year)</th>';
                                    echo '<th style="text-align: center;">FY ' . calculatePreviousFY($row_a['reporting_fin_year']) . '<br>(Previous Financial Year)</th>';
                                echo '</tr>';

                                // Lost Time Injury Frequency Rate(LTIFR)
                                echo '<tr>';
                                    echo generateRowspanCell('Lost Time Injury Frequency Rate(LTIFR)(per one million-person hours worked)', 2);
                                    echo generateCell('Employees');
                                    echo generateCell($t_workplaceSafetyMeasures[0][0]);
                                    echo generateCell($t_workplaceSafetyMeasures[0][1]);
                                echo '</tr>';
                                echo '<tr>';
                                    echo generateCell('Workers');
                                    echo generateCell($t_workplaceSafetyMeasures[1][0]);
                                    echo generateCell($t_workplaceSafetyMeasures[1][1]);
                                echo '</tr>';

                                // Total recordable work-related injuries
                                echo '<tr>';
                                    echo generateRowspanCell('Total recordable work-related injuries', 2);
                                    echo generateCell('Employees');
                                    echo generateCell($t_workplaceSafetyMeasures[2][0]);
                                    echo generateCell($t_workplaceSafetyMeasures[2][1]);
                                echo '</tr>';
                                echo '<tr>';
                                    echo generateCell('Workers');
                                    echo generateCell($t_workplaceSafetyMeasures[3][0]);
                                    echo generateCell($t_workplaceSafetyMeasures[3][1]);
                                echo '</tr>';

                                // No.of fatalities
                                echo '<tr>';
                                    echo generateRowspanCell('No.of fatalities', 2);
                                    echo generateCell('Employees');
                                    echo generateCell($t_workplaceSafetyMeasures[4][0]);
                                    echo generateCell($t_workplaceSafetyMeasures[4][1]);
                                echo '</tr>';
                                echo '<tr>';
                                    echo generateCell('Workers');
                                    echo generateCell($t_workplaceSafetyMeasures[5][0]);
                                    echo generateCell($t_workplaceSafetyMeasures[5][1]);
                                echo '</tr>';

                                // High consequence work-related injury or ill-health(excluding fatalities)
                                echo '<tr>';
                                    echo generateRowspanCell('High consequence work-related injury or ill-health(excluding fatalities)', 2);
                                    echo generateCell('Employees');
                                    echo generateCell($t_workplaceSafetyMeasures[6][0]);
                                    echo generateCell($t_workplaceSafetyMeasures[6][1]);
                                echo '</tr>';
                                echo '<tr>';
                                    echo generateCell('Workers');
                                    echo generateCell($t_workplaceSafetyMeasures[7][0]);
                                    echo generateCell($t_workplaceSafetyMeasures[7][1]);
                                echo '</tr>';

                            echo '</table>';
                        ?>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['3_15_workplaceSafetyMeasures_comments']) ? $row_c['3_15_workplaceSafetyMeasures_comments'] : ''; ?></textarea>
                    <!--Details of safety related incidents end-->
                    
                    <label>12. Describe the measures taken by the entity to ensure a safe & healthy workplace:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['3_18_workplaceSafetyMeasures12']) ? $row_c['3_18_workplaceSafetyMeasures12'] : ''; ?></textarea>   
                    <!--Describe the measures taken by the entity to ensure safe and healthy work place end-->
                            
                    <label>13. Number of Complaints on the following made by employees and workers:</label>
                        <table id="p_complaintsemployees">
                            <tr>
                                <th rowspan="2"></th>
                                <th colspan="3" style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                <th colspan="3" style="text-align: center;">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']); ?><br>(Previous Financial Year)</th>
                            </tr>
                            <tr>
                                <th>Filed during the year</th>
                                <th>Pending resolution at the end of year</th>
                                <th>Remarks</th>
                                <th>Filed during the year</th>
                                <th>Pending resolution at the end of year</th>
                                <th>Remarks</th>
                            </tr>
                            <?php
                                // Limit rows
                                $limited_t_complaintsemployees = array_slice($t_complaintsemployees, 0, 2);
                                foreach ($limited_t_complaintsemployees as $index => $rowData) {
                                    echo '<tr>';
                                    // Add S. NO. column starting from 1
                                    $index = $index+1;
                                    // column based on index
                                    if ($index == 1) {
                                        echo '<th>Working Conditions</th>';
                                    } else {
                                        echo'<th>Health and Safety</th>';
                                    }
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>    
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['3_20_complaintsemployees_comments']) ? $row_c['3_20_complaintsemployees_comments'] : ''; ?></textarea>
                    <!--Number of Complaints end-->
                    
                    <label>14. Assessments for the year:</label>
                        <table>
                            <tr>
                                <th></th>
                                <th>% of your plants and offices that were assessed(by entity or statutory authorities or third parties)</th>
                            </tr>   
                            <?php
                                // Limit rows
                                $limited_t_assesmentyr = array_slice($t_assesmentyr, 0, 2);
                                foreach ($limited_t_assesmentyr as $index => $rowData) {
                                    echo '<tr>';
                                    // Add S. NO. column starting from 1
                                    $index = $index+1;
                                    // column based on index
                                    if ($index == 1) {
                                        echo '<th>Health and safety practices</th>';
                                    } else {
                                        echo '<th>>Working conditions</th>';
                                    }
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['3_21_assesmentyr_comments']) ? $row_c['3_21_assesmentyr_comments'] : ''; ?></textarea>   
                    <!--Assessments for the year end-->

                    <label>15. Provide details of any corrective action taken or underway to address safety-related incidents(if any) and on significant risks/concerns arising from assessments of health & safety practices and working conditions</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['3_19_workplaceSafetyMeasures15']) ? $row_c['3_19_workplaceSafetyMeasures15'] : ''; ?></textarea>   
                    <!--Corrective action taken or underway to address safety-related incidents end-->

                    <!------------------------------------------------------------------------------------------------------------------------->
                    <!--                                     LEADERSHIP INDICATORS -START                                                    -->
                    <!------------------------------------------------------------------------------------------------------------------------->
                    <h6 style="text-align: center; border-bottom: 2px solid #2d6a4f; padding-bottom: 15px;">Leadership Indicators</h6>

                    <label>1. Does the entity extend any life insurance or any compensatory package in the event of death of (A) Employees  (B) Workers ?</label>
                        <label>a. Employees</label>
                            <?php
                                // Check the value of 'conflict_of_interest'
                                $lifeInsuranceCompensationa = $row_c['3_22_lifeInsuranceCompensationa'];
                                //based on yes and no
                                if ($lifeInsuranceCompensationa == 'No') {
                                    echo "No";
                                } elseif ($lifeInsuranceCompensationa == 'Yes') {
                                    echo '<label >Enter employee life insurance or compensatory package details:</label>';
                                }
                            ?><br>
                        <label>b. Workers</label>
                            <?php
                                // Check the value of 'conflict_of_interest'
                                $lifeInsuranceCompensationb = $row_c['3_24_lifeInsuranceCompensationb'];
                                //based on yes and no
                                if ($lifeInsuranceCompensationb == 'No') {
                                    echo "No";
                                } elseif ($lifeInsuranceCompensationb == 'Yes') {
                                    echo '<label>Enter worker life insurance or compensatory package details:</label>';
                                }
                            ?>
                    <!--Does the entity extend any life insurance or any compensatory package in the event of death End-->

                    <label>2. Provide the measures undertaken by the entity to ensure that statutory dues have been deducted & deposited by the value chain partners:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['3_26_statutoryDuesMeasures']) ? $row_c['3_26_statutoryDuesMeasures'] : ''; ?></textarea>   
                    <!--Measures undertaken by the entity to ensure that statutory dues have been deducted and deposited by the value chain partners end-->

                    <label>3. Provide the number of employees/workers having suffered high consequence work-related injury/ill-health/fatalities (as reported in Q11 of Essential Indicators above), who have been rehabilitated & placed in suitable employment or whose family members have been placed in suitable employment for both employee & workers categories for current & previous FYs:</label>
                        <table id="p_workRelatedInjuryRehabilitation">
                            <tr>
                                <th></th>
                                <th colspan="2">Total no of affected employees/workers</th>
                                <th colspan="2">No.of employees/workers that rae rehiabilitated and placed in suitable employment or whose family members have been placed in suitable employmen</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                <th style="text-align: center;">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']); ?><br>(Previous Financial Year)</th>
                                <th style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                <th style="text-align: center;">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']); ?><br>(Previous Financial Year)</th>
                            </tr>
                            <?php
                                // Limit rows
                                $limited_t_workRelatedInjuryRehabilitation = array_slice($t_workRelatedInjuryRehabilitation, 0, 2);
                                foreach ($limited_t_workRelatedInjuryRehabilitation as $index => $rowData) {
                                    echo '<tr>';
                                    // Add S. NO. column starting from 1
                                    $index = $index+1;
                                    // column based on index
                                    if ($index == 1) {
                                        echo '<th>Employees</th>';
                                    } else {
                                        echo'<th>Workers</th>';
                                    }
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['3_27_workRelatedInjuryRehabilitation_comments']) ? $row_c['3_27_workRelatedInjuryRehabilitation_comments'] : ''; ?></textarea>   
                    <!--Number of employees/workers having suffered high consequence work-related injury/ill-health/fatalities end-->
                    
                    <label>4. Does the entity provide transition assistance programs to facilitate continued employability & the management of career endings resulting from retirement or termination of employment?</label>
                        <label>a. Employees</label>
                            <?php
                                // Check the value of 'conflict_of_interest'
                                $transitionAssistanceProgram = $row_c['3_28_transitionAssistanceProgram'];
                                //based on yes and no
                                if ($transitionAssistanceProgram == 'No') {
                                    echo "No";
                                } elseif ($transitionAssistanceProgram == 'Yes') {
                                    echo '<label>Specify the relevant details:</label>';
                                    echo $row_c['3_29_transitionAssistanceProgramDetails'];
                                }
                            ?>
                    <!--Does the entity provide transition assistance programs to facilitate continued employability end-->

                    <label>5.Details on assessment of value chain partners</label>
                        <table>
                            <tr>
                                <th></th>
                                <th>% of value chain partners(by value of business done with such partners)that were assessed</th>
                            </tr>   
                            <?php
                                // Limit rows
                                $limited_t_rdPercentageassesment = array_slice($t_rdPercentageassesment, 0, 2);
                                foreach ($limited_t_rdPercentageassesment as $index => $rowData) {
                                    echo '<tr>';
                                    // Add S. NO. column starting from 1
                                    $index = $index+1;
                                    // column based on index
                                    if ($index == 1) {
                                        echo '<th>Health and safety practices</th>';
                                    } else {
                                        echo '<th>Working conditions</th>';
                                    }
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['3_30_rdPercentageassesment_comments']) ? $row_c['3_30_rdPercentageassesment_comments'] : ''; ?></textarea>   
                    <!--Details on assessment of value chain partners end-->

                    <label>6. Provide details of any corrective actions taken or underway to adderss significant risks/concerns arising from assignments of health and saftey parctices and working conditions of value chain partners</label>
                       <textarea style="margin-left: 10px;"><?php echo isset($row_c['3_31_correctiveactions']) ? $row_c['3_31_correctiveactions'] : ''; ?></textarea>
                    <!--Details of any corrective actions taken or underway to address significant risks/concerns arising from assessments of health and safety practices end-->  
              
                    <!------------------------------------------------------------------------------------------------------------------------->
                    <!--                                                      Principle 4                                                    -->
                    <!------------------------------------------------------------------------------------------------------------------------->
                    <h5>PRINCIPLE 4: BUSINESSES SHOULD RESPECT THE INTERESTS OF & BE RESPONSIVE TO ALL THEIR STAKEHOLDERS.</h5>
                    <h6 style="text-align: center; border-bottom: 2px solid #2d6a4f; padding-bottom: 15px;">Essential Indicators</h6>

                    <label>1. Describe the processes for identifying key stakeholder groups of the entity:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['4_1_stakeholderIdentificationDetails']) ? $row_c['4_1_stakeholderIdentificationDetails'] : ''; ?></textarea>
                    <!--Processes for identifying key stakeholder groups end-->
                    
                    <label>2. List stakeholder groups identified as key for your entity & the method, frequency & purpose of engagement with each stakeholder group:</label>
                        <table>
                            <tr>
                                <th>S.No</th>
                                <th>Stakeholder Group</th>
                                <th>Whether identified as Vulnerable & Marginalized group (Yes/No)</th>
                                <th>Channels of communication</th>
                                <th>Frequency of engagement(Anually/Half yearly/Quarterly/others-please specify)</th>
                                <th>Purpose and scope of engagement including key topics and concerns raised during such engagement</th>
                            </tr>
                            <?php
                                $columnCount = 0;
                                foreach ($t_stakeholderEngagementDetails as $index => $rowData) {
                                    echo '<tr>';
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                        $columnCount++;
                                        // Check if it's the 2nd column, then start a new line
                                        if ($columnCount % 6 == 0) {
                                            echo '</tr><tr>';
                                        }
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['4_2_stakeholderEngagementDetails_comments']) ? $row_c['4_2_stakeholderEngagementDetails_comments'] : ''; ?></textarea>
                    <!--List stakeholder groups end-->

                    <!------------------------------------------------------------------------------------------------------------------------->
                    <!--                                     LEADERSHIP INDICATORS -START                                                    -->
                    <!------------------------------------------------------------------------------------------------------------------------->
                    <h6 style="text-align: center; border-bottom: 2px solid #2d6a4f; padding-bottom: 15px;">Leadership Indicators</h6>

                    <label for="boardConsultationDetails" class="form-label">1. Provide the processes for consultation between stakeholders & the Board on economic, environmental, & social topics or if consultation is delegated, how is feedback from such consultations provided to the Board:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['4_3_boardConsultationDetails']) ? $row_c['4_3_boardConsultationDetails'] : ''; ?></textarea>
                    <!--Processes for consultation between stakeholders and the Board end-->

                    <label for="stakeholderConsultationPolicy" class="form-label">2. Whether stakeholder consultation is used to support the identification and management of environmental, and social topics (Yes/No). If so, provide details of instances as to how the inputs received from stakeholders on these topics were incorporated into policies and activities of the entity. :</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['4_4_stakeholderConsultationPolicy']) ? $row_c['4_4_stakeholderConsultationPolicy'] : ''; ?></textarea>
                    <!--Is stakeholder consultation used to support the identification and management of environmental and social topics end-->
                    
                    <label for="vulnerableEngagementDetails" class="form-label">3. Provide details of instances of engagement with, & actions taken to, address the concerns of vulnerable/marginalized stakeholder groups:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['4_5_vulnerableEngagementDetails']) ? $row_c['4_5_vulnerableEngagementDetails'] : ''; ?></textarea>
                    <!--Details of instances of engagement with, and actions taken to, address the concerns stakeholder groups end-->

                    <!------------------------------------------------------------------------------------------------------------------------->
                    <!--                                                      Principle 5                                                    -->
                    <!------------------------------------------------------------------------------------------------------------------------->
                    <h3>PRINCIPLE 5: BUSINESSES SHOULD RESPECT & PROMOTE HUMAN RIGHTS.</h3>
                    <h6 style="text-align: center; border-bottom: 2px solid #2d6a4f; padding-bottom: 15px;">Essential Indicators</h6>

                    <label>1. Details of training provided to employees & workers (Permanent & Temporary) on human rights issues for current & previous years:</label>
                        <table>
                            <tr>
                                <th rowspan="2">Category</th>
                                <th colspan="3" style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                <th colspan="3" style="text-align: center;">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']); ?><br>(Previous Financial Year)</th>
                            </tr>
                            <tr>
                                <th>Total(A)</th>
                                <th>No. of employees/workers covered (B)</th>
                                <th>%(B/A)</th>
                                <th>Total(C)</th>
                                <th>No. of employees/workers covered (D)</th>
                                <th>%(D/C)</th>
                            </tr>
                            <tr>
                                <th colspan="7" style="text-align: center;">Employees</th>
                            </tr>
                            <?php
                                // Limit to the first three rows
                                $limited_t_humanRightsTrainingDetails = array_slice($t_humanRightsTrainingDetails, 0, 3);
                                foreach ($limited_t_humanRightsTrainingDetails as $index => $rowData) {
                                    echo '<tr>';
                                        $index++; // Increment index for the next rowx
                                        if ($index == 1) {
                                            echo '<th>Permanent</th>';
                                        } elseif ($index == 2) {
                                            echo '<th>Other than Permanent</th>';
                                        } else {
                                            echo '<th>Total employees</th>';
                                        }
                                        // Fetch data starting from 3rd column onwards
                                        foreach ($rowData as $columnData) {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                    echo '</tr>';
                                }
                            ?>
                            <tr>
                               <th colspan="7" style="text-align: center;">Workers</th>
                            </tr>
                            <?php
                                // Limit to the rows from index 3 to 8
                                $limited_t_humanRightsTrainingDetails = array_slice($t_humanRightsTrainingDetails, 3, 6);
                                $index = 3; // Start index from 4
                                foreach ($limited_t_humanRightsTrainingDetails as $rowData) {
                                    echo '<tr>';
                                        $index++; // Increment index for the next row
                                        // Second column based on index
                                        if ($index == 4) {
                                            echo '<th>Permanent</th>';
                                        } elseif ($index == 5) {
                                           echo '<th>Other than permanent</th>';
                                        } else {
                                           echo '<th>Total employees</th>';
                                        }
                                        // Fetch data starting from 3rd column onwards
                                        foreach ($rowData as $columnData) {
                                           echo '<td>' . $columnData . '</td>';
                                        }
                                    echo '</tr>';                                    
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['5_1_humanRightsTrainingDetails_comments']) ? $row_c['5_1_humanRightsTrainingDetails_comments'] : ''; ?></textarea>
                    <!--Training provided on human right issues end-->

                    <label>2. Details of minimum wages paid to workers & employees (For both current & previous year):</label>
                        <table>
                            <tr>
                                <th rowspan="3">Category</th>
                                <th colspan="5" style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                <th colspan="5" style="text-align: center;">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']); ?><br>(Previous Financial Year)</th>
                            </tr>
                            <tr>
                                <th rowspan="2">Total(A)</th>
                                <th colspan="2">Equal to minimum wage</th>
                                <th colspan="2">More than minimum wage</th>
                                <th rowspan="2">Total(D)</th>
                                <th colspan="2">Equal to minimum wage</th>
                                <th colspan="2">More than minimum wage</th>
                            </tr>
                            <tr>
                                <th>No.(B)</th>
                                <th>%(B/A)</th>
                                <th>No.(C)</th>
                                <th>%(C/A)</th>
                                <th>No.(E)</th>
                                <th>%(E/D)</th>
                                <th>No.(F)</th>
                                <th>%(F/D)</th>
                            </tr>
                            <tr>
                                <th colspan="11" style="text-align: center;">Permanent Employees</th>
                            </tr>
                            <?php
                            // Limit to the first three rows
                            $limited_t_wageDetails = array_slice($t_wageDetails, 0, 3);
                            foreach ($limited_t_wageDetails as $index => $rowData) {
                                echo '<tr>';
                                if ($index == 0) {
                                    echo '<th>Male</th>';
                                } elseif ($index == 1) {
                                    echo '<th>Female</th>';
                                } else {
                                    echo '<th>Total</th>';
                                }
                                // Fetch data starting from 3rd column onwards
                                foreach ($rowData as $columnData) {
                                    echo '<td>' . $columnData . '</td>';
                                }
                                echo '</tr>';
                            }
                            ?>
                            <tr>
                                <th colspan="11" style="text-align: center;">Other than Permanent Employees</th>
                            </tr>
                            <?php
                            // Limit to the rows from index 3 to 5
                            $limited_t_wageDetails = array_slice($t_wageDetails, 3, 3);
                            foreach ($limited_t_wageDetails as $index => $rowData) {
                                echo '<tr>';
                                if ($index == 0) {
                                    echo '<th>Male</th>';
                                } elseif ($index == 1) {
                                    echo '<th>Female</th>';
                                } else {
                                    echo '<th>Total</th>';
                                }
                                // Fetch data starting from 3rd column onwards
                                foreach ($rowData as $columnData) {
                                    echo '<td>' . $columnData . '</td>';
                                }
                                echo '</tr>';
                            }
                            ?>
                            <tr>
                                <th colspan="11" style="text-align: center;">Permanent Workers</th>
                            </tr>
                            <?php
                            // Limit to the rows from index 6 to 8
                            $limited_t_wageDetails = array_slice($t_wageDetails, 6, 3);
                            foreach ($limited_t_wageDetails as $index => $rowData) {
                                echo '<tr>';
                                if ($index == 0) {
                                    echo '<th>Male</th>';
                                } elseif ($index == 1) {
                                    echo '<th>Female</th>';
                                } else {
                                    echo '<th>Total</th>';
                                }
                                // Fetch data starting from 3rd column onwards
                                foreach ($rowData as $columnData) {
                                    echo '<td>' . $columnData . '</td>';
                                }
                                echo '</tr>';
                            }
                            ?>
                            <tr>
                                <th colspan="11" style="text-align: center;">Other than Permanent Workers</th>
                            </tr>
                            <?php
                            // Limit to the rows from index 9 to 11
                            $limited_t_wageDetails = array_slice($t_wageDetails, 9, 3);
                            foreach ($limited_t_wageDetails as $index => $rowData) {
                                echo '<tr>';
                                if ($index == 0) {
                                    echo '<th>Male</th>';
                                } elseif ($index == 1) {
                                    echo '<th>Female</th>';
                                } else {
                                    echo '<th>Total</th>';
                                }
                                // Fetch data starting from 3rd column onwards
                                foreach ($rowData as $columnData) {
                                    echo '<td>' . $columnData . '</td>';
                                }
                                echo '</tr>';
                            }
                            ?>
                        </table>
                    <textarea style="margin-left: 10px;"><?php echo isset($row_c['5_2_wageDetails_comments']) ? $row_c['5_2_wageDetails_comments'] : ''; ?></textarea>
                    <!-- Details of human wages end -->

                    <label>3. Details of remuneration/salary/wages:</label>
                        <table>
                            <tr>
                                <th rowspan="2"></th>
                                <th colspan="2" style="text-align: center;">Male</th>
                                <th colspan="2" style="text-align: center;">Female</th>
                            </tr>
                            <tr>
                                <th>Number</th>
                                <th>Median remuneration/salary/wages of respective category</th>
                                <th>Number</th>
                                <th>Median remuneration/salary/wages of respective category</th>
                            </tr>
                            <?php
                                // Limit rows
                                $limited_t_remunerationDetails = array_slice($t_remunerationDetails, 0, 4);
                                foreach ($limited_t_remunerationDetails as $index => $rowData) {
                                    echo '<tr>';
                                        // Add S. NO. column starting from 1
                                        $index++;
                                        // column based on index
                                        if ($index == 1) {
                                            echo '<th>Board of Directors (BoD)</th>';
                                        } elseif ($index == 2) {
                                            echo '<th>Number of<br>Complaints received<br>in relation to<br>issues of Conflect<br>to Intrest of<br>the KMPs</th>';
                                        } elseif ($index == 3) {
                                            echo '<th>Employees other than BoD and KMP</th>';
                                        } else {
                                            echo '<th>Workers</th>';
                                        }
                                        // Fetch data
                                        foreach ($rowData as $columnData) {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['5_3_remunerationDetails_comments']) ? $row_c['5_3_remunerationDetails_comments'] : ''; ?></textarea>
                    <!--Details of renumeratiion/salary/wages end-->

                    <label>4. Does the organization have an Individual/Committee responsible for addressing human rights impacts or issues caused or contributed to by the business?</label>
                        <?php
                            // Check the value of 'conflict_of_interest'
                            $humanRightsResponsible = $row_c['5_4_humanRightsResponsible'];

                            //based on yes and no
                            if ($humanRightsResponsible == 'No') {
                                echo "No";
                            }  elseif('Yes') {
                                echo '<label>Specify the relevant details:</label>';
                                echo $row_c['5_5_humanRightsResponsibleDetails'];
                            }
                        ?>  
                    <!--Do you have a focal point responsible for addressing human rights impacts end-->

                    <label>5. Details of the internal mechanisms in place to redress grievances related to human rights issues:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['5_6_grievanceMechanism']) ? $row_c['5_6_grievanceMechanism'] : ''; ?></textarea>
                    <!--Internal mechanisms in place to redress grievances end-->

                    <label>6. Details of complaints made by employees & workers on sexual harassment, discrimination at workplace, Child Labour, Forced Labour/Involuntary Labour, Wages or other human rights related issues:</label>
                        <table>
                            <tr>
                                <th rowspan="2"></th>
                                <th colspan="3" style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                <th colspan="3" style="text-align: center;">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']); ?><br>(Previous Financial Year)</th>
                            </tr>
                            <tr>
                                <th>Filed during the year</th>
                                <th>Pending resolution at the end of year</th>
                                <th>Remarks</th>
                                <th>Filed during the year</th>
                                <th>Pending resolution at the end of year</th>
                                <th>Remarks</th>
                            </tr>
                            <?php
                                // Limit rows
                                $limited_t_complaintsDetails = array_slice($t_complaintsDetails, 0, 6);
                                foreach ($limited_t_complaintsDetails as $index => $rowData) {
                                    echo '<tr>';
                                    // Add S. NO. column starting from 1
                                    $index = $index+1;
                                    // column based on index
                                    if ($index == 1) {
                                        echo '<th>Sexual Harassment</th>';
                                    } elseif($index == 2) {
                                        echo '<th>Discrimination at workplace</th>';
                                    } elseif($index == 3) {
                                        echo '<th>Child Labour</th>';
                                    } elseif($index == 4) {
                                        echo'<th>Forced Labour/Involuntary Labour</th>';
                                    } elseif($index == 5) {
                                        echo'<th>Wages</th>';
                                    } else {
                                        echo'<th>Other human rights related issues</th>';
                                    }
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['5_7_complaintsDetails_comments']) ? $row_c['5_7_complaintsDetails_comments'] : ''; ?></textarea>
                    <!--Number of complaints made by employees and workers end-->

                    <label>7. Mechanisms to prevent adverse consequences to the complainant in discrimination & harassment cases:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['5_8_discriminationProtectionMechanisms']) ? $row_c['5_8_discriminationProtectionMechanisms'] : ''; ?></textarea>
                    <!--Mechanisms to prevent adverse consequences to the complainant in discrimination and harassment cases end-->

                    <label>8. Do human rights requirements form part of your business agreements & contracts?</label>
                        <?php
                            // Check the value of 'conflict_of_interest'
                            $humanRightsResponsible = $row_c['5_9_humanRightsInBusiness'];

                            //based on yes and no
                            if ($humanRightsResponsible == 'No') {
                                echo "No";
                            }  elseif('Yes') {
                                echo '<label>Specify the relevant details:</label>';
                                echo $row_c['5_10_humanRightsInBusinessDetails'];
                            }
                        ?>  
                    <!--Do human rights requirements form part of your business agreements and contracts end-->

                    <label>9. Assessments for the year:</label>
                        <table>
                            <tr>
                                <th></th>
                                <th>% of your plants and offices that were assessed (by entity or statutory authorities orthird parties)</th>
                            </tr>
                            <?php
                                // Limit rows
                                $limited_t_assessedPlantPercentage = array_slice($t_assessedPlantPercentage, 0, 6);
                                foreach ($limited_t_assessedPlantPercentage as $index => $rowData) {
                                    echo '<tr>';
                                        // Add S. NO. column starting from 1
                                        $index = $index+1;
                                        // column based on index
                                        if ($index == 1) {
                                            echo '<th>Child Labour</th>';
                                        } elseif($index == 2) {
                                            echo '<th>Forced/Involuntary Labour</th>';
                                        } elseif($index == 3) {
                                            echo '<th>Sexual Harassment</th>';
                                        } elseif($index == 4) {
                                            echo '<th>Discrimination at Workplace</th>';
                                        } elseif($index == 5) {
                                            echo '<th>Wages</th>';
                                        } else {
                                            echo '<th>Others-please specify</th>';
                                        }
                                        // Fetch data
                                        foreach ($rowData as $columnData) {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                    echo '</tr>';
                                }
                            ?>
                            <?php
                                $columnCount = 0;
                                foreach ($t_assessedPlantPercentageOthers as $index => $rowData) {
                                    echo '<tr>';
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        // Check if it's an even column (0-based index)
                                        if ($columnCount % 2 == 0) {
                                            echo '<th>' . $columnData . '</th>';
                                        } else {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                        $columnCount++;
                                        // Check if it's the 2nd column, then start a new line
                                        if ($columnCount % 2 == 0) {
                                            echo '</tr><tr>';
                                        }
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['5_11_assessedPlantPercentage_comments']) ? $row_c['5_11_assessedPlantPercentage_comments'] : ''; ?></textarea>
                    <!--Assessments for the year end-->

                    <label>10. Provide details of any corrective actions taken or underway to address significant risks/concerns arising from the assessments at Question 9 above:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['5_12_correctiveActionsForAssessments']) ? $row_c['5_12_correctiveActionsForAssessments'] : ''; ?></textarea>
                    <!--Corrective actions taken to address significant risks/concerns arising from the assessments at Question 9 end-->

                    <!------------------------------------------------------------------------------------------------------------------------->
                    <!--                                     LEADERSHIP INDICATORS -START                                                    -->
                    <!------------------------------------------------------------------------------------------------------------------------->
                    <h6 style="text-align: center; border-bottom: 2px solid #2d6a4f; padding-bottom: 15px;">Leadership Indicators</h6>

                    <label>1. Details of a business process being modified/introduced as a result of addressing human rights grievances/complaints:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['5_13_businessProcessModifications']) ? $row_c['5_13_businessProcessModifications'] : ''; ?></textarea>
                    <!--Details of a business process being modified as a result of addressing human rights grievances/complaints end-->

                    <label>2. Details of the scope & coverage of any Human rights due-diligence conducted:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['5_14_humanRightsDueDiligence']) ? $row_c['5_14_humanRightsDueDiligence'] : ''; ?></textarea>
                    <!--Details of scope and coverage of any Human rights due-diligence conducted end-->
                    
                    <label>3. Is the premise/office of the entity accessible to differently abled visitors, as per the requirements of the Rights of Persons with Disabilities Act, 2016?</label>    
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['5_15_premiseAccessibility']) ? $row_c['5_15_premiseAccessibility'] : ''; ?></textarea>
                    <!--Is the premise/office of the entity accessible to differently abled visitors end-->

                    <label>4. Percentage of value chain partners that were assessed (by entity or statutory authorities or third parties) for sexual harassment, discrimination at workplace, Child Labour, Forced Labour/Involuntary Labour, Wages or other human rights related issues, along with the corrective action taken to address significant risks & concerns arising from assessments:</label>
                        <table>
                            <tr>
                                <th></th>
                                <th>% of value chain partners (by value of business done with such partners) that were assessed</th>  
                            </tr>
                            <?php
                                // Limit rows
                                $limited_t_valueChainAssessment = array_slice($t_valueChainAssessment, 0, 5);
                                foreach ($limited_t_valueChainAssessment as $index => $rowData) {
                                    echo '<tr>';
                                        // Add S. NO. column starting from 1
                                        $index = $index+1;
                                        // column based on index
                                        if ($index == 1) {
                                            echo '<th>Sexual Harassment</th>';
                                        } elseif($index == 2) {
                                            echo '<th>Discrimination at Workplace</th>';
                                        } elseif($index == 3) {
                                            echo '<th>Child Labour</th>';
                                        } elseif($index == 4) {
                                            echo '<th>Forced Labour/Involuntary Labour	</th>';
                                        } elseif($index == 5) {
                                            echo '<th>Wages</th>';
                                        }
                                        // Fetch data
                                        foreach ($rowData as $columnData) {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                    echo '</tr>';
                                }
                            ?>
                            <?php
                                $columnCount = 0;
                                foreach ($t_valueChainAssessmentOthers as $index => $rowData) {
                                    echo '<tr>';
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        // Check if it's an even column (0-based index)
                                        if ($columnCount % 2 == 0) {
                                            echo '<th>' . $columnData . '</th>';
                                        } else {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                        $columnCount++;
                                        // Check if it's the 2nd column, then start a new line
                                        if ($columnCount % 2 == 0) {
                                            echo '</tr><tr>';
                                        }
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['5_15_premiseAccessibility']) ? $row_c['5_15_premiseAccessibility'] : ''; ?></textarea>
                    <!--Assessment of value chain partners end-->

                    <label>5. Provide details of any corrective actions taken or underway to address significant risks/concerns arising from the assessments at Question 4 above:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['5_17_correctiveActionsFromAssessments']) ? $row_c['5_17_correctiveActionsFromAssessments'] : ''; ?></textarea>
                    <!--Corrective actions taken or underway to address significant risks/concerns arising from the assessments at Question 4 end-->
            
                    <!------------------------------------------------------------------------------------------------------------------------->
                    <!--                                                      Principle 6                                                    -->
                    <!------------------------------------------------------------------------------------------------------------------------->
                    <h3>PRINCIPLE 6: BUSINESSES SHOULD RESPECT AND MAKE EFFORTS TO PROTECT AND RESTORE THE ENVIRONMENT</h3>
                    <h5 style="text-align: center; border-bottom: 2px solid #2d6a4f; padding-bottom: 15px;">Essential Indicators</h5>

                    <label>1.1 Details of total energy consumption (in Joules or multiples) & energy intensity as per BRSR format:</label>
                        <table>
                            <tr>
                                <th>Parameter</th>
                                <th style="text-align: center;"><?php echo $row_a['reporting_fin_year'];?><br>(Current Financial Year)<br><br><?php echo $row_c['6_1_energyConsumptionDetailsCFY']; ?></th>
                                <th style="text-align: center;">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']);  ?><br>(Previous Financial Year)<br><br><?php echo $row_c['6_1_energyConsumptionDetailsPFY']; ?></th>
                            </tr>
                            <?php
                                // Limit rows
                                $limited_t_energyConsumptionDetails = array_slice($t_energyConsumptionDetails, 0, 6);
                                foreach ($limited_t_energyConsumptionDetails as $index => $rowData) {
                                    echo '<tr>';
                                        // Add S. NO. column starting from 1
                                        $index = $index+1;
                                        // column based on index
                                        if ($index == 1) {
                                            echo '<th>Total electricity consumption (A)</th>';
                                        } elseif($index == 2) {
                                            echo '<th>Total fuel consumption (B)</th>';
                                        } elseif($index == 3) {
                                            echo '<th>Energy consumption through other sources (C)</th>';
                                        } elseif($index == 4) {
                                            echo '<th>Total energy consumption (A+B+C)</th>';
                                        } elseif($index == 5) {
                                            echo '<th>Energy intensity per rupee of turnover (Total energy consumption/turnover in rupees)</th>';
                                        } else {
                                            echo '<th>Energy intensity (optional) - the relevant metric may be selected by the entity</th>';
                                        }
                                        // Fetch data
                                        foreach ($rowData as $columnData) {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['6_1_energyConsumptionDetails_comments']) ? $row_c['6_1_energyConsumptionDetails_comments'] : ''; ?></textarea>
                    <!--Total energy consumption and energy intensity end-->

                    <label>1.2 Indicate if any independent assessment/evaluation/assurance of energy consumption has been carried out by an external agency? If yes, provide the name of the external agency:</label>
                        <?php
                            // Check the value of 'conflict_of_interest'
                            $energyExternalAgency = $row_c['6_2_energyExternalAgency'];

                            //based on yes and no
                            if ($energyExternalAgency == 'No') {
                                echo "No";
                            } elseif($energyExternalAgency == 'Yes') {
                                echo '<label>Specify the name of the external agency:</label>';
                                echo $row_c['6_3_energyExternalAgencyName'];
                            }
                        ?>
                    <!--Independent assessment question 1 end-->

                    <label>2. Does the entity have any sites/facilities identified as designated consumers (DCs) under the Performance, Achieve, & Trade (PAT) Scheme of the Government of India?  If yes, disclose whether targets set under the PAT scheme have been achieved. In case targets have not been achieved, provide the remedial action taken if any:</label>
                        <?php
                            // Check the value of 'conflict_of_interest'
                            $designatedConsumers = $row_c['6_4_designatedConsumers'];

                            //based on yes and no
                            if ($designatedConsumers == 'No') {
                                echo "No";
                            } elseif($designatedConsumers == 'Yes') {
                                echo '<label>Specify the details of PAT scheme targets:</label>';
                                echo $row_c['6_5_designatedConsumersDetails'];
                            }
                        ?>
                    <!--Does the entity have any sites/facilities identified as DC under PAT scheme end-->

                    <label>3.1. Provide details of water withdrawal from different sources, total volume of water withdrawal & consumed, & Water intensity per rupee of turnover (Water consumed/turnover) as per BRSR format:</label>
                        <table>
                            <tr>
                                <th>Parameter</th>
                                <th style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                <th style="text-align: center;">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']); ?><br>(Previous Financial Year)</th>
                            </tr>
                            <tr>
                                <th colspan="3">Water withdrawal by source (in kilolitres)</th>
                            </tr>
                            <?php
                                // Limit rows
                                $limited_t_waterWithdrawalDetails = array_slice($t_waterWithdrawalDetails, 0, 9);
                                foreach ($limited_t_waterWithdrawalDetails as $index => $rowData) {
                                    echo '<tr>';
                                        // Add S. NO. column starting from 1
                                        $index = $index+1;
                                        // column based on index
                                        if ($index == 1) {
                                            echo '<th>(i) Surface water</th>';
                                        } elseif($index == 2) {
                                            echo '<th>(i) Surface water</th>';
                                        } elseif($index == 3) {
                                            echo '<th>(iii) Third party water</th>';
                                        } elseif($index == 4) {
                                            echo '<th>(iv) Seawater/desalinated water</th>';
                                        } elseif($index == 5) {
                                            echo '<th>(v) Others</th>';
                                        } elseif($index == 6) {
                                            echo '<th>Total volume of water withdrawal (in kilolitres) (i + ii + iii + iv + v)</th>';
                                        } elseif($index == 7) {
                                            echo '<th>Total volume of water consumption (in kilolitres)	</th>';
                                        } elseif($index == 8) {
                                            echo '<th>Water intensity per rupee of turnover (Water consumed/turnover)</th>';
                                        } else {
                                            echo '<th>Water intensity - optional</th>';
                                        }
                                        // Fetch data
                                        foreach ($rowData as $columnData) {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['6_6_waterWithdrawalDetails_comments']) ? $row_c['6_6_waterWithdrawalDetails_comments'] : ''; ?></textarea>
                    <!--Disclosures related to water end--> 

                    <label>3.2. Indicate if any independent assessment/evaluation/assurance of water withdrawal has been carried out by an external agency? If yes, provide the name of the external agency:</label>
                        <?php
                            // Check the value of 'conflict_of_interest'
                            $waterExternalAgency = $row_c['6_7_waterExternalAgency'];

                            //based on yes and no
                            if ($waterExternalAgency == 'No') {
                                echo "No";
                            } elseif($waterExternalAgency == 'Yes') {
                                echo '<label>Specify the name of the external agency:</label>';
                                echo $row_c['6_8_waterExternalAgencyName'];
                            }
                        ?>
                    <!--Independent assessment question 3 end-->

                    <label>4. Has the entity implemented a mechanism for Zero Liquid Discharge? If yes, provide details of its coverage & implementation:</label>
                        <?php
                            // Check the value of 'conflict_of_interest'
                            $liquidDischarge = $row_c['6_9_liquidDischarge'];

                            //based on yes and no
                            if ($liquidDischarge == 'No') {
                                echo "No";
                            } elseif($liquidDischarge == 'Yes') {
                                echo '<label>Specify the details of its coverage & implementation:</label>';
                                echo $row_c['6_10_liquidDischargeDetails'];
                            }
                        ?>
                    <!--Has the entity implemented a mechanism for Zero Liquid Discharge end-->

                    <label>5.1. Please provide details of air emissions (other than GHG emissions) by the entity, in BRSR format. Also, indicate if any independent assessment/evaluation/assurance has been carried out by an external agency?</label>
                        <table>
                            <tr>
                                <th>Parameter</th>
                                <th>Please specify unit</th>
                                <th style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                <th style="text-align: center;">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']); ?><br>(Previous Financial Year)</th>
                            </tr>
                            <?php
                                // Limit to the first rows
                                $limited_t_airEmissionDetails = array_slice($t_airEmissionDetails, 0, 7);
                                foreach ($limited_t_airEmissionDetails as $index => $rowData) {
                                    echo '<tr>';
                                        $index++; // Increment index for the next rowx
                                        if ($index == 1) {
                                            echo '<th>NOx</th>';
                                        } elseif ($index == 2) {
                                            echo '<th>SOx</th>';
                                        } elseif ($index == 3) {
                                            echo '<th>Particulate Matter (PM)</th>';
                                        } elseif ($index == 4) {
                                            echo '<th>Persistent organic Pollutants (POP)</th>';
                                        } elseif ($index == 5) {
                                            echo '<th>Volatile Organic Compounds (VOC)</th>';
                                        } elseif ($index == 6) {
                                            echo '<th>Hazardous Air Pollutants (HAP)</th>';
                                        } else {
                                            echo '<th>Others - please specify</th>';
                                        }
                                        // Fetch data starting from 3rd column onwards
                                        foreach ($rowData as $columnData) {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['6_11_airEmissionDetails_comments']) ? $row_c['6_11_airEmissionDetails_comments'] : ''; ?></textarea>
                    <!--Details related to water discharged end-->

                    <label>5.2. Indicate if any independent assessment/evaluation/assurance of air emissions has been carried out by an external agency? If yes, provide the name of the external agency:</label>
                        <?php
                            // Check the value of 'conflict_of_interest'
                            $airExternalAgency = $row_c['6_12_airExternalAgency'];

                            //based on yes and no
                            if ($airExternalAgency == 'No') {
                                echo "No";
                            } elseif($airExternalAgency == 'Yes') {
                                echo '<label>Specify the name of the external agency:</label>';
                                echo $row_c['6_13_airExternalAgencyName'];
                            }
                        ?>
                    <!--Independent assessment question 5 end-->

                    <label>6.1. Please provide details of air emissions (other than GHG emissions) by the entity, in BRSR format. Also, indicate if any independent assessment/evaluation/assurance has been carried out by an external agency?</label>
                        <table>
                            <tr>
                                <th>Parameter</th>
                                <th>Unit</th>
                                <th style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                <th style="text-align: center;">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']); ?><br>(Previous Financial Year)</th>
                            </tr>
                            <?php
                                // Limit to the first rows
                                $limited_t_greenhouseGasEmissionDetails = array_slice($t_greenhouseGasEmissionDetails, 0, 6);
                                foreach ($limited_t_greenhouseGasEmissionDetails as $index => $rowData) {
                                    echo '<tr>';
                                        $index++; // Increment index for the next rowx
                                        if ($index == 1) {
                                            echo '<th>Total Scope 1 emissions (Break-up of the GHG into CO2, CH4, N2O, HFCs, PFCs, SF6, NF3, if available)</th>';
                                        } elseif ($index == 2) {
                                            echo '<th>Total Scope 2 emissions (Break-up of the GHG into CO2, CH4, N2O, HFCs, PFCs, SF6, NF3, if available)</th>';
                                        } elseif ($index == 3) {
                                            echo '<th>Total Scope 1 and Scope 2 emissions per rupee of turnover</th>';
                                        } elseif ($index == 4) {
                                            echo '<th>Total Scope 1 and Scope 2 emission intensity - optional</th>';
                                        } elseif ($index == 5) {
                                            echo '<th>Hazardous Air Pollutants (HAP)</th>';
                                        } else {
                                            echo '<th>Others - please specify</th>';
                                        }
                                        // Fetch data starting from 3rd column onwards
                                        foreach ($rowData as $columnData) {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['6_14_greenhouseGasEmissionDetails_comments']) ? $row_c['6_14_greenhouseGasEmissionDetails_comments'] : ''; ?></textarea>
                    <!--Details of greenhouse gas emissions end-->

                    <label>6.2. Indicate if any independent assessment/evaluation/assurance of greenhouse gas emissions has been carried out by an external agency? If yes, provide the name of the external agency:</label>
                        <?php
                            // Check the value of 'conflict_of_interest'
                            $ghgExternalAgency = $row_c['6_15_ghgExternalAgency'];

                            //based on yes and no
                            if ($ghgExternalAgency == 'No') {
                                echo "No";
                            } elseif($ghgExternalAgency == 'Yes') {
                                echo '<label>Specify the name of the external agency:</label>';
                                echo $row_c['6_16_ghgExternalAgencyName'];
                            }
                        ?>
                    <!--Independent assessment question 6 end-->

                    <label>7. Does the entity have any project related to reducing Green House Gas emission? If yes, provide details about the project:</label>
                        <?php
                            // Check the value of 'conflict_of_interest'
                            $ghgReductionProject = $row_c['6_17_ghgReductionProject'];

                            //based on yes and no
                            if ($ghgReductionProject == 'No') {
                                echo "No";
                            } elseif($ghgReductionProject == 'Yes') {
                                echo '<label>Specify the name of the external agency:</label>';
                                echo $row_c['6_18_ghgReductionProjectDetails'];
                            }
                        ?>
                    <!--Does the entity have any project related to reducing Green House Gas emission end-->

                    <label>8.1. Provide details of waste generated, waste recycled & waste dumped with breakup into categories like hazardous, plastic, e-waste, bio-medical waste etc. as per BRSR format:</label>
                        <table>
                            <tr>
                                <th>Parameter</th>
                                <th style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                <th style="text-align: center;">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']); ?><br>(Previous Financial Year)</th>
                            </tr>
                            <tr>
                                <th colspan="3">Total Waste generated (in metric tonnes)</th>
                            </tr>
                            <?php
                                // Limit to the first rows
                                $limited_t_wasteDetails = array_slice($t_wasteDetails, 0, 9);
                                foreach ($limited_t_wasteDetails as $index => $rowData) {
                                    echo '<tr>';
                                        $index++; // Increment index for the next rowx
                                        if ($index == 1) {
                                            echo '<th>Plastic waste (A)</th>';
                                        } elseif ($index == 2) {
                                            echo '<th>E-waste (B)</th>';
                                        } elseif ($index == 3) {
                                            echo '<th>Bio-medical waste (C)</th>';
                                        } elseif ($index == 4) {
                                            echo '<th>Construction and demolition waste (D)</th>';
                                        } elseif ($index == 5) {
                                            echo '<th>Battery waste (E)</th>';
                                        } elseif ($index == 6) {
                                            echo '<th>Radioactive waste (F)</th>';
                                        } elseif ($index == 7) {
                                            echo '<th>Other hazardous waste - please specify if any (G)</th>';
                                        } elseif ($index == 8) {
                                            echo '<th>Other Non-hazardous waste - please specify if any (H)</th>';
                                        } else {
                                            echo '<th>Total (A + B + C + D + E + F + G + H)	</th>';
                                        }
                                        // Fetch data starting from 3rd column onwards
                                        foreach ($rowData as $columnData) {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                    echo '</tr>';
                                }
                            ?>
                            <tr>
                                <th colspan="3">For each category of waste generated, total waste recovered through recycling, re-using or other recovery operations (in metric tonnes)</th>
                            </tr>
                            <tr>
                                <th colspan="3">Category of waste</th>
                            </tr>
                            <tr>
                                <th colspan="3">For each category of waste generated, total waste recovered through recycling, re-using or other recovery operations (in metric tonnes)</th>
                            </tr>
                            <tr>
                                <th colspan="3">Category of waste</th>
                            </tr>
                            <?php
                                // Limit to the rows from index 9 to 12
                                $limited_t_wasteDetails = array_slice($t_wasteDetails, 9, 4); // Correcting the slice limit to 4
                                $index = 9; // Start index from 9
                                foreach ($limited_t_wasteDetails as $rowData) {
                                    echo '<tr>';
                                    $index++; // Increment index for the next row
                                    if ($index == 10) {
                                        echo '<th>(i) Recycled</th>';
                                    } elseif ($index == 11) {
                                        echo '<th>(ii) Re-used</th>';
                                    } elseif ($index == 12) {
                                        echo '<th>(iii) Other recovery operations</th>';
                                    } else {
                                        echo '<th>Total</th>'; // Only one "Total" row will be printed
                                    }
                                    // Fetch data starting from the 9th column onwards
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['6_19_wasteDetails_comments']) ? $row_c['6_19_wasteDetails_comments'] : ''; ?></textarea>
                    <!--Details of waste end-->

                    <label>8.2. Indicate if any independent assessment/evaluation/assurance of greenhouse waste management has been carried out by an external agency? If yes, provide the name of the external agency:</label>
                        <?php
                            // Check the value of 'conflict_of_interest'
                            $wasteExternalAgency = $row_c['6_20_wasteExternalAgency'];

                            //based on yes and no
                            if ($wasteExternalAgency == 'No') {
                                echo "No";
                            } elseif($wasteExternalAgency == 'Yes') {
                                echo '<label>Specify the name of the external agency:</label>';
                                echo $row_c['6_21_wasteExternalAgencyName'];
                            }
                        ?>
                    <!--Independent assessment question 8 end-->

                    <label>9. Briefly describe the waste management practices adopted in your establishments. Describe the strategy adopted by your entity to reduce usage of hazardous & toxic chemicals in your products & processes & the practices adopted to manage such wastes:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['6_22_wasteManagementPractices']) ? $row_c['6_22_wasteManagementPractices'] : ''; ?></textarea>   
                    <!--Details of waste management practices adopted end-->

                    <label>10. If the entity have operations/offices in/around ecologically sensitive areas (such as national parks, wildlife sanctuaries, biosphere reserves, wetlands, biodiversity hotspots, forests, coastal regulation zones etc.) where environmental approvals/clearances are required. If yes, please specify details like: Location of operations/offices; Type of operations; the conditions of environmental approval/clearance are required, please specify details in the following format:</label>
                        <table>
                            <tr>
                                <th>S. No.</th>
                                <th>Location of operations/offices</th>
                                <th>Types of operations</th>
                                <th>Whether the conditions of environmental approval/clearance are being complied with? (Y/N) If no, the reasons thereof and corrective action taken, if any</th>
                            </tr>
                            <?php
                                $columnCount = 0;
                                foreach ($t_ecologicalAreaOperations as $index => $rowData) {
                                    echo '<tr>';
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                        $columnCount++;
                                        // Check if it's the 3rd column, then start a new line
                                        if ($columnCount % 4 == 0) {
                                            echo '</tr><tr>';
                                        }
                                       
                                    }
                                    echo '</tr>';
                                }
                             ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['6_23_ecologicalAreaOperations_comments']) ? $row_c['6_23_ecologicalAreaOperations_comments'] : ''; ?></textarea>
                    <!--If the entity has operations/offices where environmental approvals/clearances are required end-->

                    <label>11. Details of environmental impact assessments of projects undertaken by the entity based on applicable laws, in the current financial year:</label>
                        <table>
                            <tr>
                                <th>S. No. </th>
                                <th>Name and brief details of the project</th>
                                <th>EIA Notification No</th>
                                <th>Date</th>
                                <th>Whether conducted by independent external agency (Yes/No) </th>
                                <th>Results communicated in public domain (Yes/No) </th>
                                <th>Relevant Web Link </th>
                            </tr>
                            <?php
                                $columnCount = 0;
                                foreach ($t_eiaExternalAgency as $index => $rowData) {
                                    echo '<tr>';
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                        $columnCount++;
                                        // Check if it's the 6th column, then start a new line
                                        if ($columnCount % 7 == 0) {
                                            echo '</tr><tr>';
                                        }
                                       
                                    }
                                    echo '</tr>';
                                }
                             ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['6_26_eiaExternalAgency_comments']) ? $row_c['6_23_ecologicalAreaOperations_comments'] : ''; ?></textarea>
                    <!--Details of environmental impact assessments of projects undertaken end-->

                    <label>12. Is the entity compliant with the applicable environmental law/regulations/guidelines in India; such as the Water (Prevention & Control of Pollution) Act, Air (Prevention & Control of Pollution) Act, Environment Protection Act & rules thereunder. If yes, provide relevant details:</label>
                        <table>
                            <tr>
                                <th>S. No. </th>
                                <th>Specify the law/regulation/guidelines which was not complied with</th>
                                <th>Provide details of the noncompliance</th>
                                <th>Any fines/penalties/action taken by regulatory agencies such as pollution control boards or by courts</th>
                                <th>Corrective action taken, if any</th>
                            </tr>
                            <?php
                                $columnCount = 0;
                                foreach ($t_environmentalComplianceStatus as $index => $rowData) {
                                    echo '<tr>';
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                        $columnCount++;
                                        // Check if it's the 4th column, then start a new line
                                        if ($columnCount % 5 == 0) {
                                            echo '</tr><tr>';
                                        }
                                       
                                    }
                                    echo '</tr>';
                                }
                             ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['6_30_environmentalComplianceStatus_comments']) ? $row_c['6_30_environmentalComplianceStatus_comments'] : ''; ?></textarea>
                    <!--Is the entity compliant with the applicable environmental law in India; such as the Water Act, Air Act end-->

                    <!------------------------------------------------------------------------------------------------------------------------->
                    <!--                                     LEADERSHIP INDICATORS -START                                                    -->
                    <!------------------------------------------------------------------------------------------------------------------------->
                    <h6 style="text-align: center; border-bottom: 2px solid #2d6a4f; padding-bottom: 15px;">Leadership Indicators</h6>

                    <label>1.1. Provide break-up of the total energy consumed (in Joules or multiples) from renewable and non-renewable sources, in the following format:</label>
                        <table>
                            <tr>
                                <th>Parameter</th>
                                <th style="text-align: center;"><?php echo $row_a['reporting_fin_year']; ?><br>(Current Financial Year)<br><br><?php echo $row_c['6_31_totalenergyconsumedCFY']; ?></th>
                                <th style="text-align: center;">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']);  ?><br>(Previous Financial Year)<br><br><?php echo $row_c['6_31_totalenergyconsumedPFY']; ?></th>
                            </tr>
                            <tr>
                                <th colspan="3" align="left">From renewable sources </th>
                            </tr>
                            <?php
                                // Limit to the first three rows
                                $limited_t_totalenergyconsumed = array_slice($t_totalenergyconsumed, 0, 4);
                                foreach ($limited_t_totalenergyconsumed as $index => $rowData) {
                                    echo '<tr>';
                                        $index++; // Increment index for the next rowx
                                        if ($index == 1) {
                                            echo '<th>Total electricity consumption (A)</th>';
                                        } elseif ($index == 2) {
                                            echo '<th>Total fuel consumption (B)</th>';
                                        } elseif ($index==3) {
                                            echo '<th>Energy consumption through other sources (C)</th>';
                                        } else {
                                            echo '<th>Total energy consumed from renewable sources (A + B + C)</th>';
                                        }
                                        // Fetch data starting from 3rd column onwards
                                        foreach ($rowData as $columnData) {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                    echo '</tr>';
                                }
                            ?>
                            <tr>
                                <th colspan="3" align="left">From non-renewable sources </th>
                            </tr>
                            <?php
                                // Limit to the rows from index 4 to 8
                                $limited_t_totalenergyconsumed = array_slice($t_totalenergyconsumed, 4, 8);
                                $index = 4; // Start index from 5
                                foreach ($limited_t_totalenergyconsumed as $rowData) {
                                    echo '<tr>';
                                         $index++; // Increment index for the next rowx
                                        if ($index == 5) {
                                            echo '<th>Total electricity consumption (D)</th>';
                                        } elseif ($index == 6) {
                                            echo '<th>Total fuel consumption (E)</th>';
                                        } elseif ($index == 7) {
                                            echo '<th>Energy consumption through other sources (F)</th>';
                                        } else {
                                            echo '<th>Total energy consumed from non - renewable sources (D + E + F)</th>';
                                        }
                                        // Fetch data starting from 3rd column onwards
                                        foreach ($rowData as $columnData) {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                    echo '</tr>';                                    
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['6_31_totalenergyconsumed_comments']) ? $row_c['6_31_totalenergyconsumed_comments'] : ''; ?></textarea>
                    <!--Details of AntiCompetitive Actions end-->

                    <label>1.2. Indicate if any independent assessment/evaluation/assurance has been carried out by an external agency? If yes, provide the name of the external agency:</label>
                        <?php
                            // Check the value of 'conflict_of_interest'
                            $totalenergyconsumedAgency = $row_c['6_32_totalenergyconsumedAgency'];

                            //based on yes and no
                            if ($totalenergyconsumedAgency == 'No') {
                                echo "No";
                            } elseif($totalenergyconsumedAgency == 'Yes') {
                                echo '<label>Specify the name of the external agency:</label>';
                                echo $row_c['6_33_totalenergyconsumedAgencyName'];
                            }
                        ?>
                    <!--Independent assessment question 1 leadership end-->

                    <label>2.1. Provide the following details related to water discharged: Water discharge by destination and level of treatment (in kilolitres):</label>
                        <table>
                            <tr>
                                <th>Parameter</th>
                                <th style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                <th style="text-align: center;">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']); ?><br>(Previous Financial Year)</th>
                            </tr>
                            <tr>
                                <th colspan="3" align="left">From renewable sources </th>
                            </tr>
                            <?php
                                // Limit to the first three rows
                                $limited_t_waterdischarged = array_slice($t_waterdischarged, 0, 16);
                                foreach ($limited_t_waterdischarged as $index => $rowData) {
                                    echo '<tr>';
                                        $index++; // Increment index for the next rowx
                                        if ($index == 1) {
                                            echo '<th>(i) To Surface water</th>';
                                        } elseif ($index == 2) {
                                            echo '<th>- No treatment</th>';
                                        } elseif ($index == 3) {
                                            echo '<th>- With treatment - please specify level of treatment</th>';
                                        } elseif ($index == 4) {
                                            echo '<th>(ii) To Groundwater</th>';
                                        } elseif ($index == 5) {
                                            echo '<th>- No treatment</th>';
                                        } elseif ($index == 6) {
                                            echo '<th>- With treatment - please specify level of treatment</th>';
                                        } elseif ($index == 7) {
                                            echo '<th>(iii) To Seawater</th>';
                                        } elseif ($index == 8) {
                                            echo '<th>- No treatment</th>';
                                        } elseif ($index == 9) {
                                            echo '<th>- With treatment - please specify level of treatment</th>';
                                        } elseif ($index == 10) {
                                            echo '<th>(iv) Sent to third-parties</th>';
                                        } elseif ($index == 11) {
                                            echo '<th>- No treatment</th>';
                                        } elseif ($index == 12) {
                                            echo '<th>- With treatment - please specify level of treatment</th>';
                                        } elseif ($index == 13) {
                                            echo '<th>(v) Others</th>';
                                        } elseif ($index == 14) {
                                            echo '<th>- No treatment</th>';
                                        } elseif ($index == 15) {
                                            echo '<th>- With treatment - please specify level of treatment</th>';
                                        } else {
                                            echo '<th>Total water discharged (in kilolitres)</th>';
                                        }
                                        // Fetch data starting from 3rd column onwards
                                        foreach ($rowData as $columnData) {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['6_34_waterdischarged_comments']) ? $row_c['6_34_waterdischarged_comments'] : ''; ?></textarea>
                    <!--Details related to water discharged end-->

                    <label>2.2. Indicate if any independent assessment/evaluation/assurance has been carried out by an external agency? If yes, provide the name of the external agency:</label>
                        <?php
                            // Check the value of 'conflict_of_interest'
                            $waterdischargedAgency = $row_c['6_35_waterdischargedAgency'];

                            //based on yes and no
                            if ($waterdischargedAgency == 'No') {
                                echo "No";
                            } elseif($waterdischargedAgency == 'Yes') {
                                echo '<label>Specify the name of the external agency:</label>';
                                echo $row_c['6_36_waterdischargedAgencyName'];
                            }
                        ?>
                    <!--Independent assessment question 2 leadership end-->

                    <label>3.1. For each facility/plant located in areas of water stress, provide the following information:</label>
                        <label>a. Name of the area:</label>    
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['6_37_waterstressa']) ? $row_c['6_37_waterstressa'] : ''; ?></textarea>
                    
                        <label>b. Nature of operations:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['6_37_waterstressb']) ? $row_c['6_37_waterstressb'] : ''; ?></textarea>

                        <label>c. Water withdrawal, consumption and discharge in the following format: </label>
                        <table>
                            <tr>
                                <th>Parameter</th>
                                <th style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                <th style="text-align: center;">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']); ?><br>(Previous Financial Year)</th>
                            </tr>
                            <tr>
                                <th colspan="3" align="left">Water withdrawal by source (in kilolitres)</th>
                            </tr>
                            <?php
                                // Limit to the first three rows
                                $limited_t_waterstress = array_slice($t_waterstress, 0, 9);
                                foreach ($limited_t_waterstress as $index => $rowData) {
                                    echo '<tr>';
                                        $index++; // Increment index for the next rowx
                                        if ($index == 1) {
                                            echo '<th>(i) Surface water</th>';
                                        } elseif ($index == 2) {
                                            echo '<th>(ii) Groundwater</th>';
                                        } elseif ($index == 3) {
                                            echo '<th>(iii) Third party water</th>';
                                        } elseif ($index == 4) {
                                            echo '<th>(iv) Seawater/Desalinated water</th>';
                                        } elseif ($index == 5) {
                                            echo '<th>(v) Others</th>';
                                        } elseif ($index == 6) {
                                            echo '<th>Total volume of water withdrawal (in kilolitres)</th>';
                                        } elseif ($index == 7) {
                                            echo '<th>Total volume of water consumption (in kilolitres)</th>';
                                        } elseif ($index == 8) {
                                            echo '<th>Water intensity per rupee of turnover (Water consumed/turnover)</th>';
                                        } else {
                                            echo '<th>Water intensity (optional)</th>';
                                        } 
                                        // Fetch data starting from 3rd column onwards
                                        foreach ($rowData as $columnData) {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                    echo '</tr>';
                                }
                            ?>
                            <tr>
                                <th colspan="3" align="left">Water withdrawal by source (in kilolitres)</th>
                            </tr>
                            <?php
                                // Limit to the rows from index 9 to 13
                                $limited_t_waterstress = array_slice($t_waterstress, 9, 28);
                                $index = 9; // Start index from 10
                                foreach ($limited_t_waterstress as $rowData) {
                                    echo '<tr>';
                                        $index++; // Increment index for the next rowx
                                        if ($index == 10) {
                                            echo '<th>(i) Recycled</th>';
                                        } elseif ($index == 11) {
                                            echo '<th>(ii) Re-used</th>';
                                        } elseif ($index == 12) {
                                            echo '<th>(iii) Other recovery operations</th>';
                                        } elseif ($index == 13) {
                                            echo '<th>(i) Into Surface water</th>';
                                        } elseif ($index == 14) {
                                            echo '<th>- No treatment</th>';
                                        } elseif ($index == 15) {
                                            echo '<th>- With treatment - please specify level of treatment</th>';
                                        } elseif ($index == 16) {
                                            echo '<th>(ii) Into Ground water</th>';
                                        } elseif ($index == 17) {
                                            echo '<th>- No treatment</th>';
                                        } elseif ($index == 18) {
                                            echo '<th>- With treatment - please specify level of treatment</th>';
                                        } elseif ($index == 19) {
                                            echo '<th>(iii) Into Seawater</th>';
                                        } elseif ($index == 20) {
                                            echo '<th>- No treatment</th>';
                                        } elseif ($index == 21) {
                                            echo '<th>- With treatment - please specify level of treatment</th>';
                                        } elseif ($index == 22) {
                                            echo '<th>(iv) Sent to third parties</th>';
                                        } elseif ($index == 23) {
                                            echo '<th>- No treatment</th>';
                                        } elseif ($index == 24) {
                                            echo '<th>- With treatment - please specify level of treatment</th>';
                                        } elseif ($index == 25) {
                                            echo '<th>(v) Others</th>';
                                        } elseif ($index == 26) {
                                            echo '<th>- No treatment</th>';
                                        } elseif ($index == 27) {
                                            echo '<th>- With treatment - please specify level of treatment</th>';
                                        } else {
                                            echo '<th>Total water discharged (in kilolitres)</th>';
                                        }
                                        // Fetch data starting from 9th column onwards
                                        foreach ($rowData as $columnData) {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                    echo '</tr>';                                    
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['6_37_waterstress_comments']) ? $row_c['6_37_waterstress_comments'] : ''; ?></textarea>
                    <!--Water withdrawal, consumption and discharge in areas of water stress end-->

                    <label>3.2. Indicate if any independent assessment/evaluation/assurance has been carried out by an external agency? If yes, provide the name of the external agency:</label>
                        <?php
                            // Check the value of 'conflict_of_interest'
                            $waterstressAgency = $row_c['6_38_waterstressAgency'];

                            //based on yes and no
                            if ($waterstressAgency == 'No') {
                                echo "No";
                            } elseif($waterstressAgency == 'Yes') {
                                echo '<label for="waterstressAgencyName" class="form-label">Specify the name of the external agency:</label>';
                                echo $row_c['6_39_waterstressAgencyName'];
                            }
                        ?> 
                    <!--Independent assessment question 3 leadership end-->

                    <label>4.1. Please provide details of total Scope 3 emissions & its intensity, in the following format:</label>
                        <table>
                            <tr>
                                <th>Parameter</th>
                                <th>Unit</th>
                                <th style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                <th style="text-align: center;">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']); ?><br>(Previous Financial Year)</th>
                            </tr>
                            <?php
                                // Limit to the first three rows
                                $limited_t_totalscope = array_slice($t_totalscope, 0, 3);
                                foreach ($limited_t_totalscope as $index => $rowData) {
                                    echo '<tr>';
                                        $index++; // Increment index for the next rowx
                                        if ($index == 1) {
                                            echo '<th>Total Scope 3 emissions (Break-up <br>of the GHG into CO2, CH4, <br>N2O, HFCs, PFCs,SF6, NF3, if available)</th>';
                                        } elseif ($index == 2) {
                                            echo '<th>Total Scope 3 emissions per rupee of turnover</th>';
                                        } else {
                                            echo '<th>Total Scope 3 intensity (optional)</th>';
                                        } 
                                        // Fetch data starting from 3rd column onwards
                                        foreach ($rowData as $columnData) {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['6_40_totalscope_comments']) ? $row_c['6_40_totalscope_comments'] : ''; ?></textarea>
                    <!--Details of Total scope 3 emissions and its intensity end-->

                    <label for="totalscopeAgency" name="totalscopeAgency" class="form-label">4.2. Indicate if any independent assessment/evaluation/assurance has been carried out by an external agency? If yes, provide the name of the external agency:</label>
                        <?php
                            // Check the value of 'conflict_of_interest'
                            $totalscopeAgency = $row_c['6_41_totalscopeAgency'];

                            //based on yes and no
                            if ($totalscopeAgency == 'No') {
                                echo "No";
                            } elseif($totalscopeAgency == 'Yes') {
                                echo '<label>Specify the name of the external agency:</label>';
                                echo $row_c['6_42_totalscopeAgencyName'];
                            }
                        ?> 
                    <!--Independent assessment question 4 leadership end-->

                    <label for="significantdirect" class="form-label">5. With respect to the ecologically sensitive areas reported at Question 10 of Essential Indicators above, provide details of significant direct & indirect impact of the entity on biodiversity in such areas along-with prevention and remediation activities:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['6_43_significantdirect']) ? $row_c['6_43_significantdirect'] : ''; ?></textarea>
                    <!--Significant direct & indirect impact of the entity on biodiversity end-->
                    
                    <label>6. If the entity has undertaken any specific initiatives or used innovative technology or solutions to improve resource efficiency, or reduce impact due to emissions/effluent discharge/waste generated, please provide details of the same as well as outcome of such initiatives, as per the following format:</label>
                        <table>
                            <tr>
                                <th>S.No</th>
                                <th>Initiative undertaken</th>
                                <th>Details of the initiative (Web-link, if any, may be provided along-with summary)</th>
                                <th>Outcome of the initiative</th>
                            </tr>
                            <?php
                                $columnCount = 0;
                                foreach ($t_resourceefficiency as $index => $rowData) {
                                    echo '<tr>';
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                        $columnCount++;
                                        // Check if it's the 2nd column, then start a new line
                                        if ($columnCount % 4 == 0) {
                                            echo '</tr><tr>';
                                        }
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['6_44_resourceefficiency_comments']) ? $row_c['6_44_resourceefficiency_comments'] : ''; ?></textarea>
                    <!--Details of specific initiatives or innovative technology to improve resource efficiency end-->

                    <label for="disastermanagement" class="form-label">7. Does the entity have a business continuity and disaster management plan? Give details in 100 words/web link:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['6_45_disastermanagement']) ? $row_c['6_45_disastermanagement'] : ''; ?></textarea>
                    <!--Details of business continuity and disaster management plan end-->
                        
                    <label for="valuechainentity" class="form-label">8. Disclose any significant adverse impact to the environment, arising from the value chain of the entity. What mitigation or adaptation measures have been taken by the entity in this regard:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['6_46_valuechainentity']) ? $row_c['6_46_valuechainentity'] : ''; ?></textarea>
                    <!--Mitigation or adaptation measures taken by the entity to disclose any significant adverse impact to environment arising from value chain of entity end-->

                    <label for="valuechainbusiness" class="form-label">9. Percentage of value chain partners (by value of business done with such partners) that were assessed for environmental impacts:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['6_47_valuechainbusiness']) ? $row_c['6_47_valuechainbusiness'] : ''; ?></textarea>
                    <!--Percentage of value chain partners that were assessed for environmental imapcts end-->

                    <!------------------------------------------------------------------------------------------------------------------------->
                    <!--                                                      Principle 7                                                    -->
                    <!------------------------------------------------------------------------------------------------------------------------->
                    <h5>PRINCIPLE 7:  BUSINESSES, WHEN ENGAGING IN INFLUENCING PUBLIC & REGULATORY POLICY, SHOULD DO SO IN A MANNER THAT IS RESPONSIBLE & TRANSPARENT.</h5>
                    <h6 style="text-align: center; border-bottom: 2px solid #2d6a4f; padding-bottom: 15px;">Essential Indicators</h6>
                    
                    <label>1. Details of trade and industry chambers/associations:</label>
                        <label>a. Number of affiliations with trade & industry chambers/associations (Names of top 10 trade & industry chambers):</label>
                            <textarea style="margin-left: 10px;"><?php echo isset($row_c['7_1_noTradeAffiliations']) ? $row_c['7_1_noTradeAffiliations'] : ''; ?></textarea>
                        <label>b. List the top 10 trade & industry chambers/associations (determined based on the total members of such body) the entity is a member of/affiliated to:</label>
                            <table>
                                <tr>
                                <th>S.No.</th>
                                    <th>Name of the trade and industry chambers/associations</th>
                                    <th>Reach of trade and industry chambers/associations (State/National)</th>
                                </tr>
                                <?php
                                // Limit rows
                                $limited_t_tradeAffiliations = array_slice($t_tradeAffiliations, 0, 10);
                                foreach ($limited_t_tradeAffiliations as $index => $rowData) {
                                    echo '<tr>';
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                    }
                                    echo '</tr>';
                                }
                            ?>     
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['7_2_tradeAffiliations_comments']) ? $row_c['7_2_tradeAffiliations_comments'] : ''; ?></textarea>
                    <!--Details of trade and industry chambers/associations end-->
                    
                    <label>2. Provide details of corrective action taken or underway on any issues related to antiCompetitive conduct by the entity, based on adverse orders from regulatory authorities:</label>
                        <table>
                            <tr>
                                <th>S. No.</th>
                                <th>Name of authority</th>
                                <th>Brief of the case</th>
                                <th>Corrective action taken</th>
                            </tr>
                            <?php
                                $columnCount = 0;
                                foreach ($t_antiCompetitiveActions as $index => $rowData) {
                                    echo '<tr>';
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                        $columnCount++;
                                        // Check if it's the 3rd column, then start a new line
                                        if ($columnCount % 4 == 0) {
                                            echo '</tr><tr>';
                                        }
                                       
                                    }
                                    echo '</tr>';
                                }
                             ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['7_3_antiCompetitiveActions_comments']) ? $row_c['7_3_antiCompetitiveActions_comments'] : ''; ?></textarea>
                    <!--Details of AntiCompetitive Actions end-->

                    <!------------------------------------------------------------------------------------------------------------------------->
                    <!--                                     LEADERSHIP INDICATORS -START                                                    -->
                    <!------------------------------------------------------------------------------------------------------------------------->
                    <h6 style="text-align: center; border-bottom: 2px solid #2d6a4f; padding-bottom: 15px;">Leadership Indicators</h6>

                    <label>1. Details of the Public policy positions advocated by the entity:</label>
                        <table>
                            <tr>
                                <th>S. No.</th>
                                <th>Public policy advocated</th>
                                <th>Method resorted for such advocacy</th>
                                <th>Whether information available in public domain? (Yes/No)</th>
                                <th>Frequency of Review by Board (Annually/Half yearly/Quaterly/Others - please specify)</th>
                                <th>Web link, if available</th>
                            </tr>
                            <?php
                                $columnCount = 0;
                                foreach ($t_publicPolicyAdvocacy as $index => $rowData) {
                                    echo '<tr>';
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                        $columnCount++;
                                        // Check if it's the 5th column, then start a new line
                                        if ($columnCount % 6 == 0) {
                                            echo '</tr><tr>';
                                        }
                                       
                                    }
                                    echo '</tr>';
                                }
                             ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['7_4_publicPolicyAdvocacy_comments']) ? $row_c['7_4_publicPolicyAdvocacy_comments'] : ''; ?></textarea>
                    <!-- Details of public policy positions advocated by the entity end-->

                    <!------------------------------------------------------------------------------------------------------------------------->
                    <!--                                                      Principle 8                                                    -->
                    <!------------------------------------------------------------------------------------------------------------------------->
                    <h5>PRINCIPLE 8:  BUSINESSES SHOULD PROMOTE INCLUSIVE GROWTH & EQUITABLE DEVELOPMENT.</h5>
                    <h6 style="text-align: center; border-bottom: 2px solid #2d6a4f; padding-bottom: 15px;">Essential Indicators</h6>
                    
                    <label>1. Details of Social Impact Assessments (SIA) of projects undertaken by the entity based on applicable laws, in the current financial year:</label>
                        <table>
                            <tr>
                                <th>S.No.</th>
                                <th>Name and brief details of project</th>
                                <th>SIA Notification No.</th>
                                <th>Date of notification</th>
                                <th>Whether conducted by independent external agency (Yes/No)</th>
                                <th>Results communicated in public domain(Yes/No)</th>
                                <th>Relevant Web link</th>
                            </tr>
                            <?php
                                $columnCount = 0;
                                foreach ($t_socialImpactAssessments as $index => $rowData) {
                                    echo '<tr>';
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                        $columnCount++;
                                        // Check if it's the 8th column, then start a new line
                                        if ($columnCount % 7 == 0) {
                                            echo '</tr><tr>';
                                        }
                                       
                                    }
                                    echo '</tr>';
                                }
                             ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['8_1_socialImpactAssessments_comments']) ? $row_c['8_1_socialImpactAssessments_comments'] : ''; ?></textarea>
                    <!--Details on project(s) for which ongoing Rehabilitation and Resettlement(R&R) end-->

                    <label>2. Provide information on project(s) for which ongoing Rehabilitation & Resettlement (R&R) is being undertaken by your entity, in the following format:</label>
                        <table>
                            <tr>
                                <th>S.No.</th>
                                <th>Name of Project for which R&R is ongoing</th>
                                <th>State</th>
                                <th>District</th>
                                <th>No. of Project Affected Families (PAFs)</th>
                                <th>% of PAFs covered by R&R</th>
                                <th>Amounts paid to PAFs in the FY (In INR)</th>
                            </tr>
                            <?php
                                $columnCount = 0;
                                foreach ($t_rehabilitationProjects as $index => $rowData) {
                                    echo '<tr>';
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                        $columnCount++;
                                        // Check if it's the 8th column, then start a new line
                                        if ($columnCount % 7 == 0) {
                                            echo '</tr><tr>';
                                        }
                                       
                                    }
                                    echo '</tr>';
                                }
                             ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['8_2_rehabilitationProjects_comments']) ? $row_c['8_2_rehabilitationProjects_comments'] : ''; ?></textarea>
                    <!--Details on project(s) for which ongoing Rehabilitation and Resettlement(R&R) end-->

                    <label>3. Describe the mechanisms to receive & redress grievances of the community:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['8_3_grievanceRedressMechanism']) ? $row_c['8_3_grievanceRedressMechanism'] : ''; ?></textarea>   
                    <!--Describe the mechanisms to receive and redress grievances of the community end-->

                    <label>4. Percentage of input material (inputs to total inputs by value) sourced from suppliers:</label>
                        <table>
                            <tr>
                                <th></th>
                                <th style="text-align: center;"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                <th style="text-align: center;">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']); ?><br>(Previous Financial Year)</th>
                            </tr>
                            <?php
                                // Limit rows
                                $limited_t_inputMaterialPercentage = array_slice($t_inputMaterialPercentage, 0, 2);
                                foreach ($limited_t_inputMaterialPercentage as $index => $rowData) {
                                    echo '<tr>';
                                    // Add S. NO. column starting from 1
                                    $index = $index+1;
                                    // column based on index
                                    if ($index == 1) {
                                        echo '<th>Directly sourced from MSMEs/small producers</th>';
                                    } else {
                                        echo '<th>Sourced directly from within the district and neighbouring districts</th>';
                                    }
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['8_4_inputMaterialPercentage_comments']) ? $row_c['8_4_inputMaterialPercentage_comments'] : ''; ?></textarea>
                    <!--Percentage of input material (inputs to total inputs by value) sourced from suppliers end-->
                    
                    <!------------------------------------------------------------------------------------------------------------------------->
                    <!--                                     LEADERSHIP INDICATORS -START                                                    -->
                    <!------------------------------------------------------------------------------------------------------------------------->
                    <h6 style="text-align: center; border-bottom: 2px solid #2d6a4f; padding-bottom: 15px;">Leadership Indicators</h6>

                    <label>1. Provide details of actions taken to mitigate any negative social impacts identified in Social Impact Assessments (Reference: Question 1 of Essential Indicators above):</label>
                        <table>
                            <tr>
                                <th>S.No.</th>
                                <th>Details of negative social impact identified</th>
                                <th>Corrective action taken</th>
                            </tr>
                            <?php
                                $columnCount = 0;
                                foreach ($t_socialImpactActions as $index => $rowData) {
                                    echo '<tr>';
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                        $columnCount++;
                                        // Check if it's the 4th column, then start a new line
                                        if ($columnCount % 3 == 0) {
                                            echo '</tr><tr>';
                                        }
                                       
                                    }
                                    echo '</tr>';
                                }
                             ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['8_5_socialImpactActions_comments']) ? $row_c['8_5_socialImpactActions_comments'] : ''; ?></textarea>
                    <!--Details of actions taken to mitigate any negative social impacts identified in the Social Impact Assessments end-->

                    <label>2. Provide the following information on CSR projects undertaken by your entity in designated aspirational districts as identified by government bodies:</label>
                        <table>
                            <tr>
                                <th>S.No.</th>
                                <th>State</th>
                                <th>Aspirational District</th>
                                <th>Amount spent (In INR)</th>
                                <th>Remarks</th>
                            </tr>
                            <?php
                                $columnCount = 0;
                                foreach ($t_csrAspirationalDistricts as $index => $rowData) {
                                    echo '<tr>';
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                        $columnCount++;
                                        // Check if it's the 6th column, then start a new line
                                        if ($columnCount % 5 == 0) {
                                            echo '</tr><tr>';
                                        }
                                       
                                    }
                                    echo '</tr>';
                                }
                             ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['8_6_csrAspirationalDistricts_comments']) ? $row_c['8_6_csrAspirationalDistricts_comments'] : ''; ?></textarea>
                    <!--Details on CSR projects end-->

                    <label>3. Marginalized/vulnerable groups details:</label>
                        <label>a. Do you have a preferential procurement policy where you give preference to purchase from suppliers comprising marginalized/vulnerable groups? (Yes/No):</label>
                            <?php
                                // Check the value of 'conflict_of_interest'
                                $conflictOfInterest = $row_c['8_7_procurementPolicyMarginalized'];

                                //based on yes and no
                                if ($conflictOfInterest == 'No') {
                                    echo "No";
                                } else {
                                    echo "Yes, ";
                                    echo $row_c['8_8_procurementPolicyMarginalizedDetails'];
                                }
                            ?>
                        <label>b. From which marginalized/vulnerable groups do you procure?</label>
                            <textarea style="margin-left: 10px;"><?php echo isset($row_c['8_7_B_procurementPolicyMarginalized']) ? $row_c['8_7_B_procurementPolicyMarginalized'] : ''; ?></textarea>
                        <label>c. What percentage of total procurement (by value) does it constitute?</label>
                            <textarea style="margin-left: 10px;"><?php echo isset($row_c['8_7_C_procurementPolicyMarginalized']) ? $row_c['8_7_C_procurementPolicyMarginalized'] : ''; ?></textarea>
                    <!--Marginalized/vulnerable groups end-->

                    <label>4. Details of the benefits derived & shared from the intellectual properties owned or acquired by your entity (in the current financial year), based on traditional knowledge:</label>
                        <table>
                            <tr>
                                <th>S.No.</th>
                                <th>Intellectual Property based on traditional knowledge</th>
                                <th>Owned/Acquired (Yes/No)</th>
                                <th>Benefit shared(Yes/No)</th>
                                <th>Basis of calculating benefit share</th>
                                        
                            </tr>
                            <?php
                                $columnCount = 0;
                                foreach ($t_intellectualPropertiesBenefits as $index => $rowData) {
                                    echo '<tr>';
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                        $columnCount++;
                                        // Check if it's the 6th column, then start a new line
                                        if ($columnCount % 5 == 0) {
                                            echo '</tr><tr>';
                                        }
                                       
                                    }
                                    echo '</tr>';
                                }
                             ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['8_9_intellectualPropertiesBenefits_comments']) ? $row_c['8_9_intellectualPropertiesBenefits_comments'] : ''; ?></textarea>
                    <!--Benefits derived and shared from the intellectual properties end-->

                    <label>5. Details of corrective actions taken or underway, based on any adverse order in intellectual property related disputes wherein usage of traditional knowledge is involved:</label>
                        <table>
                            <tr>
                                <th>S.No.</th>
                                <th>Name of authority</th>
                                <th>Brief of the Case</th>
                                <th>Corrective action taken</th>
                            </tr>
                            <?php
                                $columnCount = 0;
                                foreach ($t_correctiveActionsIntellectualProperty as $index => $rowData) {
                                    echo '<tr>';
                                    // Fetch data
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
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['8_10_correctiveActionsIntellectualProperty_comments']) ? $row_c['8_10_correctiveActionsIntellectualProperty_comments'] : ''; ?></textarea>
                    <!--Details of corrective actions taken or underway, based on any adverse order in intellectual property related disputes end-->

                    <label>6. Details of beneficiaries of CSR Projects:</label>
                        <table>
                            <tr>
                                <th>S.No.</th>
                                <th>CSR Project</th>
                                <th>No. of persons benefitted from CSR Projects</th>
                                <th>% of beneficiaries from vulnerable and marginalized groups</th>
                            </tr>
                            <?php
                                $columnCount = 0;
                                foreach ($t_csrProjectBeneficiaries as $index => $rowData) {
                                    echo '<tr>';
                                    // Fetch data
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
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['8_11_csrProjectBeneficiaries_comments']) ? $row_c['8_11_csrProjectBeneficiaries_comments'] : ''; ?></textarea>
                    <!--Details of beneficiaries of CSR Projects end-->

                    <!------------------------------------------------------------------------------------------------------------------------->
                    <!--                                                      Principle 9                                                    -->
                    <!------------------------------------------------------------------------------------------------------------------------->
                    <h5>PRINCIPLE 9:  BUSINESSES SHOULD ENGAGE WITH & PROVIDE VALUE TO THEIR CONSUMERS IN A RESPONSIBLE MANNER.</h5>
                    <h6 style="text-align: center; border-bottom: 2px solid #2d6a4f; padding-bottom: 15px;">Essential Indicators</h6>
                    
                    <label>1. Describe the mechanisms to receive & respond to consumer complaints & feedback:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['9_1_consumerFeedbackMechanism']) ? $row_c['9_1_consumerFeedbackMechanism'] : ''; ?></textarea>   
                    <!--Describe the mechanisms to receive & respond to consumer complaints & feedback end-->

                    <label>2. Turnover of products and/or services as a percentage of turnover from all products/service that carry information about:</label>
                        <table>
                            <tr>
                                <th colspan="1" rowspan="1"></th>
                                <th colspan="1" rowspan="1">As a percentage to total turnover</th>
                            </tr>
                            <?php
                                // Limit rows
                                $limited_t_productTrunover = array_slice($t_productTrunover, 0, 3);
                                foreach ($limited_t_productTrunover as $index => $rowData) {
                                    echo '<tr>';
                                    // Add S. NO. column starting from 1
                                    $index = $index+1;
                                    // column based on index
                                    if ($index == 1) {
                                        echo '<th>Environmental and social parameters relevant to the product</th>';
                                    } elseif($index == 2) {
                                        echo '<th>Safe and responsible usage</th>';
                                    } else {
                                        echo '<th>Recycling and/or safe disposal</th>';
                                    }
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['9_2_productTrunover_comments']) ? $row_c['9_2_productTrunover_comments'] : ''; ?></textarea>
                    <!--Turnover of products and/services as a percentage of turnover from all products end-->

                    <label>3. Number of consumer complaints with respect to the following:</label>
                        <table>
                            <tr>
                                <th colspan="1" rowspan="2"></th>
                                <th style="text-align: center;" colspan="2"><?php echo $row_a['reporting_fin_year']?><br>(Current Financial Year)</th>
                                <th colspan="1"> Remarks</th>
                                <th style="text-align: center;" colspan="2">FY<?php echo calculatePreviousFY($row_a['reporting_fin_year']); ?><br>(Previous Financial Year)</th>
                                <th colspan="1"> Remarks</th>
                            </tr>
                            <tr>
                                <th>Received during the year</th>
                                <th>Pending resolution at end of year</th>
                                <th></th>
                                <th>Received during the year</th>
                                <th>Pending resolution at end of year</th>
                                <th></th>
                            </tr>
                            <?php
                                // Limit to the first three rows
                                $limited_t_consumerComplaints = array_slice($t_consumerComplaints, 0, 7);
                                foreach ($limited_t_consumerComplaints as $index => $rowData) {
                                    echo '<tr>';
                                        $index++; // Increment index for the next row
                                        // Second column based on index
                                        if ($index == 1) {
                                            echo '<th>Data privacy</th>';
                                        } elseif ($index == 2) {
                                            echo '<th>Advertising</th>';
                                        } elseif ($index == 3) {
                                            echo '<th>Cyber-security</th>';
                                        } elseif ($index == 4) {
                                            echo '<th>Delivery of essential services</th>';
                                        } elseif ($index == 5) {
                                            echo '<th>Restrictive Trade Practices</th>';
                                        } elseif ($index == 6) {
                                            echo '<th>Unfair Trade Practices</th>';
                                        } else {
                                            echo '<th>Other</th>';
                                        }
                                        // Fetch data starting from 3rd column onwards
                                        foreach ($rowData as $columnData) {
                                            echo '<td>' . $columnData . '</td>';
                                        }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['9_3_consumerComplaints_comments']) ? $row_c['9_3_consumerComplaints_comments'] : ''; ?></textarea>
                    <!---Number of consumer complaints END-->

                    <label>4. Details of instances of product recalls on account of safety issues:</label>
                        <table>
                            <tr>
                                <th colspan="1" rowspan="1"></th>
                                <th colspan="1" rowspan="1">Number</th>
                                <th colspan="1" rowspan="1">Reasons for recall</th>
                            </tr>
                            <?php
                                // Limit rows
                                $limited_t_productRecallInstances = array_slice($t_productRecallInstances, 0, 2);
                                foreach ($limited_t_productRecallInstances as $index => $rowData) {
                                    echo '<tr>';
                                    // Add S. NO. column starting from 1
                                    $index = $index+1;
                                    // column based on index
                                    if ($index == 1) {
                                        echo '<th>Voluntary recalls	</th>';
                                    } else {
                                        echo '<th>Forced recalls</th>';
                                    }
                                    // Fetch data
                                    foreach ($rowData as $columnData) {
                                        echo '<td>' . $columnData . '</td>';
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </table>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['9_4_productRecallInstances_comments']) ? $row_c['9_4_productRecallInstances_comments'] : ''; ?></textarea>
                    <!--Turnover of products and/services as a percentage of turnover from all products end-->

                    <label>5. Does the entity have a framework/policy on cyber security & risks related to data privacy? If yes, provide details and a web-link of the policy if available:</label>
                        <?php
                            // Check the value of 'cyberSecurityPolicy'
                            $conflictOfInterest = $row_c['9_5_cyberSecurityPolicy'];

                            //based on yes and no
                            if ($conflictOfInterest == 'No') {
                                echo "No";
                            } else {
                                echo "Yes, ";
                                echo $row_c['9_5_1_cyberSecurityPolicyDetails'];
                            }
                        ?>
                    <!--Does the entity have a framework/policy on cyber security and risks related to data privacy end-->

                    <label>6. Provide details of any corrective actions taken or underway on issues relating to advertising, & delivery of essential services; cyber security & data privacy of customers; re-occurrence of instances of product recalls; penalty/action taken by regulatory authorities on safety of products/services:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['9_6_correctiveActions']) ? $row_c['9_6_correctiveActions'] : ''; ?></textarea>   
                    <!--Details of any corrective actions taken on issues relating to advertising, and delivery of essential services end-->
                    
                    <!------------------------------------------------------------------------------------------------------------------------->
                    <!--                                     LEADERSHIP INDICATORS -START                                                    -->
                    <!------------------------------------------------------------------------------------------------------------------------->
                    <h6 style="text-align: center; border-bottom: 2px solid #2d6a4f; padding-bottom: 15px;">Leadership Indicators</h6>

                    <label>1. Channels/platforms where information on products & services of the entity can be accessed (provide web link, if available):</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['9_7_infoChannels']) ? $row_c['9_7_infoChannels'] : ''; ?></textarea>   
                    <!--Channels/platforms where information on products and services of the entity can be accessed end-->

                    <label>2. Steps taken to inform & educate consumers about safe & responsible usage of products and/or services:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['9_8_consumerEducation']) ? $row_c['9_8_consumerEducation'] : ''; ?></textarea>   
                    <!--Steps taken to inform and educate consumers about safe and responsible usage of products and/or services end-->

                    <label>3. Mechanisms in place to inform consumers of any risk of disruption/discontinuation of essential services:</label>
                        <textarea style="margin-left: 10px;"><?php echo isset($row_c['9_9_serviceDisruptionInfo']) ? $row_c['9_9_serviceDisruptionInfo'] : ''; ?></textarea>   
                    <!--Mechanisms in place to inform consumers of any risk of disruption/discontinuation of essential services end-->

                    <label>4.1 Does the entity display product information on the product over & above what is mandated as per local laws? If yes, provide details in brief:</label>
                        <?php
                            // Check the value of 'conflictOfInterest'
                            $conflictOfInterest = $row_c['9_10_productInfoDisplay'];

                            //based on yes and no
                            if ($conflictOfInterest == 'No') {
                                echo "No";
                            } elseif ($conflictOfInterest == 'Not Applicable') {
                                echo "Not Applicable";
                            }
                            else {
                                echo "Yes, ";
                                echo $row_c['9_10_1_productInfoDisplayDetails'];
                            }
                        ?>
                    <!--Does the entity display product information on the product over and above what is mandated as per local laws end-->

                    <label>4.2 Did your entity carry out any survey with regard to consumer satisfaction relating to the major products/services of the entity, significant locations of operation of the entity or the entity as a whole? If no, the reasons thereof & corrective actions taken, if any:</label>
                        <?php
                            // Check the value of 'conflictOfInterest'
                            $conflictOfInterest = $row_c['9_11_surveyInfo'];

                            //based on yes and no
                            if ($conflictOfInterest == 'Yes') {
                                echo "Yes";
                            } else {
                                echo "No, ";
                                echo $row_c['9_11_1_surveyInfoDetails'];
                            }
                        ?>
                    <!--Did your entity carry out any survey with regard to consumer satisfaction end-->

                    <label>5. Provide the information relating to data breaches:</label>
                        <label>a. Number of instances of data breaches along with impact </label>
                            <textarea style="margin-left: 10px;"><?php echo isset($row_c['9_12_dataBreachesInfo']) ? $row_c['9_12_dataBreachesInfo'] : ''; ?></textarea>   
                        <label>b. Percentage of data breaches involving personally identifiable information of customers </label>
                            <textarea style="margin-left: 10px;"><?php echo isset($row_c['9_13_dataBreachesInfoPercentage']) ? $row_c['9_13_dataBreachesInfoPercentage'] : ''; ?></textarea>   
                    <!--Steps taken to inform and educate consumers about safe and responsible usage of products and/or services end-->

                `);
                /* ************************************************************************************************************************************ */
                /*                                                                                                                                      */
                /*                                                     pdfmake definition                                                               */
                /*                                                                                                                                      */
                /* ************************************************************************************************************************************ */
                // Construct the filename dynamically
                const filename = `C_Section_<?php echo isset($row_a['name']) ? $row_a['name'] : ''; ?>_BRSR_<?php echo isset($row_a['reporting_fin_year']) ? $row_a['reporting_fin_year'] : ''; ?>.pdf`;

                const pdfDefinition = {
                    content: [sec_C],
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
