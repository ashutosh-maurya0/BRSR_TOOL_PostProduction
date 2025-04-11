<?php
session_start();

include_once '../connection.php'; // Correct the include statement

// Function to check if the provided CIN is unique for section_a_form (replace with your database logic)
function isCINUnique_sec_A($cin, $pdo) {
    $query = $pdo->prepare("SELECT COUNT(*) FROM section_a_form WHERE cin = :cin");
    $query->bindParam(':cin', $cin, PDO::PARAM_STR);
    $query->execute();

    $count = $query->fetchColumn();

    return $count === 0;
}

// Function to check if the provided CIN is unique for section_b_form (replace with your database logic)
function isCINUnique_sec_B($cin, $pdo) {
    $query = $pdo->prepare("SELECT COUNT(*) FROM section_b_form WHERE cin = :cin");
    $query->bindParam(':cin', $cin, PDO::PARAM_STR);
    $query->execute();

    $count = $query->fetchColumn();

    return $count === 0;
}

function isCINUnique_sec_C($cin, $pdo) {
    $query = $pdo->prepare("SELECT COUNT(*) FROM section_c_form WHERE cin = :cin");
    $query->bindParam(':cin', $cin, PDO::PARAM_STR);
    $query->execute();

    $count = $query->fetchColumn();

    return $count === 0;
}

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    // Check if CIN is set in the session
    if (isset($_SESSION['cin'])) {
        $cin = $_SESSION['cin'];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $response = [];
        $response['status'] = 'failure'; // Default status

        if (!isCINUnique_sec_A($cin, $pdo)) {
            if (!isCINUnique_sec_B($cin, $pdo)) {
                if (isCINUnique_sec_C($cin, $pdo)) {
                    // Principle 1
                        //ESSENTIAL INDICATORS
                        $coverage = implode('| ', $_POST["coverage"]);
                        $coverage_comments = $_POST["p_coverage_comments"];
                        $details = implode('| ', $_POST["details"]);
                        $details_comments = $_POST["p_details_comments"];
                        $appeal = implode('| ', $_POST["appeal"]);
                        $appeal_comments = $_POST["p_appeal_comments"];

                        $antiCorruptionPolicy = $_POST["antiCorruptionPolicy"];
                        $disciplinaryAction = implode('| ', $_POST["disciplinaryAction"]);
                        $disciplinaryAction_comments = $_POST["p_disciplinaryAction_comments"];
                        $conflictComplaints = implode('| ', $_POST["conflictComplaints"]);
                        $conflictComplaints_comments = $_POST["p_conflictComplaints_comments"];

                        $correctiveAction = $_POST["correctiveAction"];

                        //LEADERSHIP INDICATORS
                        $awarenessProgrammes = implode('| ', $_POST["awarenessProgrammes"]);
                        $awarenessProgrammes_comments = $_POST["p_awarenessProgrammes_comments"];
                        $conflictOfInterest = $_POST["conflictOfInterest"];
                        $conflictDetails = $_POST["conflictDetails"];

                    // Principle 2
                        //ESSENTIAL INDICATORS
                        $rdPercentage = implode('| ', $_POST["rdPercentage"]);
                        $rdPercentage_comments = $_POST["p_rdPercentage_comments"];
                        $sustainableSourcing2 = $_POST["sustainableSourcing2"];
                        $sustainableSourcingPercentage = implode('| ', $_POST["sustainableSourcingPercentage"]);
                        $sustainableSourcingPercentage_comments = $_POST["p_sustainableSourcingPercentage_comments"];
                        //removed
                        $reclaimProcesses2 = $_POST["reclaimProcesses2"];

                        $eprApplicable = $_POST["eprApplicable"];
                        $eprCollectionPlan = $_POST["eprCollectionPlan"];
                        //LEADERSHIP INDICATORS
                        $lcaConducted2 = implode('| ', $_POST["lcaConducted2"]);
                        $lcaConducted2_comments = $_POST["p_lcaConducted2_comments"];
                        $concernsMitigation2 = implode('| ', $_POST["concernsMitigation2"]);
                        $concernsMitigation2_comments = $_POST["p_concernsMitigation2_comments"];
                        $recycledPercentage2 = implode('| ', $_POST["recycledPercentage2"]);
                        $recycledPercentage2_comments = $_POST["p_recycledPercentage2_comments"];

                        $reclaimedProducts2 = implode('| ', $_POST["reclaimedProducts2"]);
                        $reclaimedProducts2_comments = $_POST["p_reclaimedProducts2_comments"];
                        $reclaimedPercentages2 = implode('| ', $_POST["reclaimedPercentages2"]);
                        $reclaimedPercentages2_comments = $_POST["p_reclaimedPercentages2_comments"];

                    // Principle 3
                        //ESSENTIAL INDICATORS
                        $employeeWellbeingDetails = implode('| ', $_POST["employeeWellbeingDetails"]);
                        $employeeWellbeingDetails_comments = $_POST["p_employeeWellbeingDetails_comments"];
                        $workerWellbeingDetails = implode('| ', $_POST["workerWellbeingDetails"]);
                        $workerWellbeingDetails_comments = $_POST["p_workerWellbeingDetails_comments"];
                        $retirementBenefitsDetails = implode('| ', $_POST["retirementBenefitsDetails"]);
                        $retirementBenefitsDetails_comments = $_POST["p_retirementBenefitsDetails_comments"];

                        $accessibilitySteps = $_POST["accessibilitySteps"];
                        $equalOpportunityLink = $_POST["equalOpportunityLink"];
                        $returnRetentionRates = implode('| ', $_POST["returnRetentionRates"]);
                        $returnRetentionRates_comments = $_POST["p_returnRetentionRates_comments"];

                        $grievanceMechanismDetails = implode('| ', $_POST["grievanceMechanismDetails"]);
                        $grievanceMechanismDetails_comments = $_POST["p_grievanceMechanismDetails_comments"];
                        $unionMembershipPercentage = implode('| ', $_POST["unionMembershipPercentage"]);
                        $unionMembershipPercentage_comments = $_POST["p_unionMembershipPercentage_comments"];
                        $trainingDetails = implode('| ', $_POST["trainingDetails"]);
                        $trainingDetails_comments = $_POST["p_trainingDetails_comments"];

                        $performanceReviewDetails = implode('| ', $_POST["performanceReviewDetails"]);
                        $performanceReviewDetails_comments = $_POST["p_performanceReviewDetails_comments"];
                        $healthSafetyManagementSystemChoice = $_POST["healthSafetyManagementSystemChoice"];
                        $healthSafetyManagementSystemDetails = $_POST["healthSafetyManagementSystemDetails"];

                        $workplaceSafetyMeasures2 = $_POST["workplaceSafetyMeasures2"];
                        $healthSafetyManagementSystem3 = $_POST["healthSafetyManagementSystem3"];
                        $healthSafetyManagementSystem4 = $_POST["healthSafetyManagementSystem4"];

                        $workplaceSafetyMeasures = implode('| ', $_POST["workplaceSafetyMeasures"]);
                        $workplaceSafetyMeasures_comments = $_POST["p_workplaceSafetyMeasures_comments"];
                        $workplaceSafetyMeasures12 = $_POST["workplaceSafetyMeasures12"];
                        $complaintsemployees = implode('| ', $_POST["complaintsemployees"]);
                        $complaintsemployees_comments = $_POST["p_complaintsemployees_comments"];

                        $assesmentyr = implode('| ', $_POST["assesmentyr"]);
                        $assesmentyr_comments = $_POST["p_assesmentyr_comments"];
                        $workplaceSafetyMeasures15 = $_POST["workplaceSafetyMeasures15"];

                        //LEADERSHIP INDICATORS
                        $lifeInsuranceCompensationa = $_POST["lifeInsuranceCompensationa"];
                        $lifeInsuranceCompensationb = $_POST["lifeInsuranceCompensationb"];
                        $statutoryDuesMeasures = $_POST["statutoryDuesMeasures"];
                        $workRelatedInjuryRehabilitation = implode('| ', $_POST["workRelatedInjuryRehabilitation"]);
                        $workRelatedInjuryRehabilitation_comments = $_POST["p_workRelatedInjuryRehabilitation_comments"];

                        $transitionAssistanceProgram = $_POST["transitionAssistanceProgram"];
                        $transitionAssistanceProgramDetails = $_POST["transitionAssistanceProgramDetails"];
                        $rdPercentageassesment = implode('| ', $_POST["rdPercentageassesment"]);
                        $rdPercentageassesment_comments = $_POST["p_rdPercentageassesment_comments"];
                        $correctiveactions = $_POST["correctiveactions"];

                    // Principle 4
                        //ESSENTIAL INDICATORS
                        $stakeholderIdentificationDetails = $_POST["stakeholderIdentificationDetails"];
                        $stakeholderEngagementDetails = implode('| ', $_POST["stakeholderEngagementDetails"]);
                        $stakeholderEngagementDetails_comments = $_POST["p_stakeholderEngagementDetails_comments"];

                        //LEADERSHIP INDICATORS
                        $boardConsultationDetails = $_POST["boardConsultationDetails"];
                        $stakeholderConsultationPolicy = $_POST["stakeholderConsultationPolicy"];
                        $vulnerableEngagementDetails = $_POST["vulnerableEngagementDetails"];

                    // Principle 5
                        //ESSENTIAL INDICATORS
                        $humanRightsTrainingDetails = implode('| ', $_POST['humanRightsTrainingDetails']);
                        $humanRightsTrainingDetails_comments = $_POST['p_humanRightsTrainingDetails_comments'];
                        $wageDetails = implode('| ', $_POST['wageDetails']);
                        $wageDetails_comments = $_POST['p_wageDetails_comments'];
                        $remunerationDetails = implode('| ', $_POST['remunerationDetails']);
                        $remunerationDetails_comments = $_POST['p_remunerationDetails_comments'];

                        $humanRightsResponsible = $_POST['humanRightsResponsible'];
                        $humanRightsResponsibleDetails = $_POST['humanRightsResponsibleDetails'];
                        $grievanceMechanism = $_POST['grievanceMechanism'];
                        $complaintsDetails = implode('| ', $_POST['complaintsDetails']);
                        $complaintsDetails_comments = $_POST['p_complaintsDetails_comments'];

                        $discriminationProtectionMechanisms = $_POST['discriminationProtectionMechanisms'];
                        $humanRightsInBusiness = $_POST['humanRightsInBusiness'];
                        $humanRightsInBusinessDetails = $_POST['humanRightsInBusinessDetails'];
                        $assessedPlantPercentage = implode('| ', $_POST['assessedPlantPercentage']);
                        $assessedPlantPercentageOthers = implode('| ', $_POST['assessedPlantPercentageOthers']);
                        $assessedPlantPercentage_comments = $_POST['p_assessedPlantPercentage_comments'];

                        $correctiveActionsForAssessments = $_POST['correctiveActionsForAssessments'];

                        //LEADERSHIP INDICATORS
                        $businessProcessModifications = $_POST['businessProcessModifications'];
                        $humanRightsDueDiligence = $_POST['humanRightsDueDiligence'];
                        $premiseAccessibility = $_POST['premiseAccessibility'];

                        $valueChainAssessment = implode('| ', $_POST['valueChainAssessment']);
                        $valueChainAssessmentOthers = implode('| ', $_POST['valueChainAssessmentOthers']);
                        $valueChainAssessment_comments = $_POST['p_valueChainAssessment_comments'];
                        $correctiveActionsFromAssessments = $_POST['correctiveActionsFromAssessments'];

                    // Principle 6
                        //ESSENTIAL INDICATORS
                        $energyConsumptionDetailsCFY = $_POST['energyConsumptionDetailsCFY'];
                        $energyConsumptionDetailsPFY = $_POST['energyConsumptionDetailsPFY'];
                        $energyConsumptionDetails = implode('| ', $_POST['energyConsumptionDetails']);
                        $energyConsumptionDetails_comments = $_POST['p_energyConsumptionDetails_comments'];
                        $energyExternalAgency = $_POST['energyExternalAgency'];
                        $energyExternalAgencyName = $_POST['energyExternalAgencyName'];

                        $designatedConsumers = $_POST['designatedConsumers'];
                        $designatedConsumersDetails = $_POST['designatedConsumersDetails'];
                        $waterWithdrawalDetails = implode('| ', $_POST['waterWithdrawalDetails']);
                        $waterWithdrawalDetails_comments = $_POST['p_waterWithdrawalDetails_comments'];

                        $waterExternalAgency = $_POST['waterExternalAgency'];
                        $waterExternalAgencyName = $_POST['waterExternalAgencyName'];
                        $liquidDischarge = $_POST['liquidDischarge'];

                        $liquidDischargeDetails = $_POST['liquidDischargeDetails'];
                        $airEmissionDetails = implode('| ', $_POST['airEmissionDetails']);
                        $airEmissionDetails_comments = $_POST['p_airEmissionDetails_comments'];
                        $airExternalAgency = $_POST['airExternalAgency'];

                        $airExternalAgencyName = $_POST['airExternalAgencyName'];
                        $greenhouseGasEmissionDetails = implode('| ', $_POST['greenhouseGasEmissionDetails']);
                        $greenhouseGasEmissionDetails_comments = $_POST['p_greenhouseGasEmissionDetails_comments'];
                        $ghgExternalAgency = $_POST['ghgExternalAgency'];

                        $ghgExternalAgencyName = $_POST['ghgExternalAgencyName'];
                        $ghgReductionProject = $_POST['ghgReductionProject'];
                        $ghgReductionProjectDetails = $_POST['ghgReductionProjectDetails'];

                        $wasteDetails = implode('| ', $_POST['wasteDetails']);
                        $wasteDetails_comments = $_POST['p_wasteDetails_comments'];
                        $wasteExternalAgency = $_POST['wasteExternalAgency'];
                        $wasteExternalAgencyName = $_POST['wasteExternalAgencyName'];

                        $wasteManagementPractices = $_POST['wasteManagementPractices'];
                        $ecologicalAreaOperations = implode('| ', $_POST['ecologicalAreaOperations']);
                        $ecologicalAreaOperations_comments = $_POST['p_ecologicalAreaOperations_comments'];
                        //removed

                        $eiaExternalAgency = implode('| ', $_POST['eiaExternalAgency']);
                        $eiaExternalAgency_comments = $_POST['p_eiaExternalAgency_comments'];
                        $environmentalComplianceStatus = implode('| ', $_POST['environmentalComplianceStatus']);
                        $environmentalComplianceStatus_comments = $_POST['p_environmentalComplianceStatus_comments'];

                        //LEADERSHIP INDICATORS
                        $totalenergyconsumedCFY = $_POST['totalenergyconsumedCFY'];
                        $totalenergyconsumedPFY = $_POST['totalenergyconsumedPFY'];
                        $totalenergyconsumed = implode('| ', $_POST['totalenergyconsumed']);
                        $totalenergyconsumed_comments = $_POST['p_totalenergyconsumed_comments'];
                        $totalenergyconsumedAgency = $_POST['totalenergyconsumedAgency'];
                        $totalenergyconsumedAgencyName = $_POST['totalenergyconsumedAgencyName'];

                        $waterdischarged = implode('| ', $_POST['waterdischarged']);
                        $waterdischarged_comments = $_POST['p_waterdischarged_comments'];
                        $waterdischargedAgency = $_POST['waterdischargedAgency'];
                        $waterdischargedAgencyName = $_POST['waterdischargedAgencyName'];

                        $waterstressa = $_POST['waterstressa'];
                        $waterstressb = $_POST['waterstressb'];
                        $waterstress = implode('| ', $_POST['waterstress']);
                        $waterstress_comments = $_POST['p_waterstress_comments'];
                        $waterstressAgency = $_POST['waterstressAgency'];
                        $waterstressAgencyName = $_POST['waterstressAgencyName'];

                        $totalscope = implode('| ', $_POST['totalscope']);
                        $totalscope_comments = $_POST['p_totalscope_comments'];
                        $totalscopeAgency = $_POST['totalscopeAgency'];
                        $totalscopeAgencyName = $_POST['totalscopeAgencyName'];

                        $significantdirect = $_POST['significantdirect'];
                        $resourceefficiency = implode('| ', $_POST['resourceefficiency']);
                        $resourceefficiency_comments = $_POST['p_resourceefficiency_comments'];
                        $disastermanagement = $_POST['disastermanagement'];

                        $valuechainentity = $_POST['valuechainentity'];
                        $valuechainbusiness = $_POST['valuechainbusiness'];

                    // Principle 7
                        //ESSENTIAL INDICATORS
                        $noTradeAffiliations = $_POST['noTradeAffiliations'];
                        $tradeAffiliations = implode('| ', $_POST['tradeAffiliations']);
                        $tradeAffiliations_comments = $_POST['p_tradeAffiliations_comments'];
                        $antiCompetitiveActions = implode('| ', $_POST['antiCompetitiveActions']);
                        $antiCompetitiveActions_comments = $_POST['p_antiCompetitiveActions_comments'];
                        //LEADERSHIP INDICATORS
                        $publicPolicyAdvocacy = implode('| ', $_POST['publicPolicyAdvocacy']);
                        $publicPolicyAdvocacy_comments = $_POST['p_publicPolicyAdvocacy_comments'];

                    // Principle 8
                       //ESSENTIAL INDICATORS
                       $socialImpactAssessments = implode('| ', $_POST['socialImpactAssessments']);
                       $socialImpactAssessments_comments = $_POST['p_socialImpactAssessments_comments'];
                       $rehabilitationProjects = implode('| ', $_POST['rehabilitationProject']);
                       $rehabilitationProjects_comments = $_POST['p_rehabilitationProject_comments'];
                       $grievanceRedressMechanism = $_POST['grievanceRedressMechanism'];
                       $inputMaterialPercentage = implode('| ', $_POST['inputMaterialPercentage']);
                       $inputMaterialPercentage_comments = $_POST['p_inputMaterialPercentage_comments'];
                       //LEADERSHIP INDICATORS
                       $socialImpactActions = implode('| ', $_POST['socialImpactActions']);
                       $socialImpactActions_comments = $_POST['p_socialImpactActions_comments'];
                       $csrAspirationalDistricts = implode('| ', $_POST['csrAspirationalDistricts']);
                       $csrAspirationalDistricts_comments = $_POST['p_csrAspirationalDistricts_comments'];
                       $procurementPolicyMarginalized = $_POST['procurementPolicyMarginalizedChoice'];
                       $procurementPolicyMarginalizedDetails = $_POST['procurementPolicyMarginalizedDetails'];
                       $procurementPolicyMarginalized_b = $_POST['procurementPolicyMarginalized_b'];
                       $procurementPolicyMarginalized_c = $_POST['procurementPolicyMarginalized_c'];
                       $intellectualPropertiesBenefits = implode('| ', $_POST['intellectualPropertiesBenefits']);
                       $intellectualPropertiesBenefits_comments = $_POST['p_intellectualPropertiesBenefits_comments'];
                       $correctiveActionsIntellectualProperty = implode('| ', $_POST['correctiveActionsIntellectualProperty']);
                       $correctiveActionsIntellectualProperty_comments = $_POST['p_correctiveActionsIntellectualProperty_comments'];
                       $csrProjectBeneficiaries = implode('| ', $_POST['csrProjectBeneficiaries']);
                       $csrProjectBeneficiaries_comments = $_POST['p_csrProjectBeneficiaries_comments'];

                     // Principle 9
                       //ESSENTIAL INDICATORS
                       $consumerFeedbackMechanism = $_POST['consumerFeedbackMechanism'];
                       $productTurnover = implode('| ', $_POST['productTurnover']);
                       $productTurnover_comments = $_POST['p_productTurnover_comments'];
                       $consumerComplaints = implode('| ', $_POST['consumerComplaints']);
                       $consumerComplaints_comments = $_POST['p_consumerComplaints_comments'];
                       $productRecallInstances = implode('| ', $_POST['productRecallInstances']);
                       $productRecallInstances_comments = $_POST['p_productRecallInstances_comments'];
                       $cyberSecurityPolicy = $_POST['cyberSecurityPolicy'];
                       $cyberSecurityPolicyDetails = $_POST['cyberSecurityPolicyDetails'];
                       $correctiveActions = $_POST['correctiveActions'];
                       //LEADERSHIP INDICATORS
                       $infoChannels = $_POST['infoChannels'];
                       $consumerEducation = $_POST['consumerEducation'];
                       $serviceDisruptionInfo = $_POST['serviceDisruptionInfo'];
                       $productInfoDisplay = $_POST['productInfoDisplay'];
                       $productInfoDisplayDetails = $_POST['productInfoDisplayDetails'];
                       $surveyInfo = $_POST['surveyInfo'];
                       $surveyInfoDetails = $_POST['surveyInfoDetails'];
                       $dataBreachesInfo = $_POST['dataBreachesInfo'];
                       $dataBreachesInfoPercentage = $_POST['dataBreachesInfoPercentage'];

                    $data = [
                        'cin' => $cin,
                        // Principle 1
                            //ESSENTIAL INDICATORS
                            '1_1_coverage' => $coverage,
                            '1_1_coverage_comments' => $coverage_comments,
                            '1_2_details' => $details,
                            '1_2_details_comments' => $details_comments,
                            '1_3_appeal' => $appeal,
                            '1_3_appeal_comments' => $appeal_comments,

                            '1_4_antiCorruptionPolicy' => $antiCorruptionPolicy,
                            '1_5_disciplinaryAction' => $disciplinaryAction,
                            '1_5_disciplinaryAction_comments' => $disciplinaryAction_comments,
                            '1_6_conflictComplaints' => $conflictComplaints,
                            '1_6_conflictComplaints_comments' => $conflictComplaints_comments,

                            '1_7_correctiveAction' => $correctiveAction,
                            //LEADERSHIP INDICATORS
                            '1_8_awarenessProgrammes' => $awarenessProgrammes,
                            '1_8_awarenessProgrammes_comments' => $awarenessProgrammes_comments,
                            '1_9_conflictOfInterest' => $conflictOfInterest,
                            '1_10_conflictDetails' => $conflictDetails,

                        // Principle 2
                            //ESSENTIAL INDICATORS
                            '2_1_rdPercentage' => $rdPercentage,
                            '2_1_rdPercentage_comments' => $rdPercentage_comments,
                            '2_2_sustainableSourcing2' => $sustainableSourcing2,
                            '2_3_sustainableSourcingPercentage' => $sustainableSourcingPercentage,
                            '2_3_sustainableSourcingPercentage_comments' => $sustainableSourcingPercentage_comments,
                            //removed
                            '2_4_reclaimProcesses2' => $reclaimProcesses2,
                            '2_5_eprApplicable' => $eprApplicable,
                            '2_6_eprCollectionPlan' => $eprCollectionPlan,
                            //LEADERSHIP INDICATORS
                            '2_7_lcaConducted2' => $lcaConducted2,
                            '2_7_lcaConducted2_comments' => $lcaConducted2_comments,
                            '2_8_concernsMitigation2' => $concernsMitigation2,
                            '2_8_concernsMitigation2_comments' => $concernsMitigation2_comments,
                            '2_9_recycledPercentage2' => $recycledPercentage2,
                            '2_9_recycledPercentage2_comments' => $recycledPercentage2_comments,

                            '2_10_reclaimedProducts2' => $reclaimedProducts2,
                            '2_10_reclaimedProducts2_comments' => $reclaimedProducts2_comments,
                            '2_11_reclaimedPercentages2' => $reclaimedPercentages2,
                            '2_11_reclaimedPercentages2_comments' => $reclaimedPercentages2_comments,

                        // Principle 3
                            //ESSENTIAL INDICATORS
                            '3_1_employeeWellbeingDetails' => $employeeWellbeingDetails,
                            '3_1_employeeWellbeingDetails_comments' => $employeeWellbeingDetails_comments,
                            '3_2_workerWellbeingDetails' => $workerWellbeingDetails,
                            '3_2_workerWellbeingDetails_comments' => $workerWellbeingDetails_comments,
                            '3_3_retirementBenefitsDetails' => $retirementBenefitsDetails,
                            '3_3_retirementBenefitsDetails_comments' => $retirementBenefitsDetails_comments,

                            '3_5_accessibilitySteps' => $accessibilitySteps,
                            '3_6_equalOpportunityLink' => $equalOpportunityLink,
                            '3_7_returnRetentionRates' => $returnRetentionRates,
                            '3_7_returnRetentionRates_comments' => $returnRetentionRates_comments,

                            '3_8_grievanceMechanismDetails' => $grievanceMechanismDetails,
                            '3_8_grievanceMechanismDetails_comments' => $grievanceMechanismDetails_comments,
                            '3_9_unionMembershipPercentage' => $unionMembershipPercentage,
                            '3_9_unionMembershipPercentage_comments' => $unionMembershipPercentage_comments,
                            '3_10_trainingDetails' => $trainingDetails,
                            '3_10_trainingDetails_comments' => $trainingDetails_comments,

                            '3_11_performanceReviewDetails' => $performanceReviewDetails,
                            '3_11_performanceReviewDetails_comments' => $performanceReviewDetails_comments,
                            '3_12_healthSafetyManagementSystemChoice' => $healthSafetyManagementSystemChoice,
                            '3_13_healthSafetyManagementSystemDetails' => $healthSafetyManagementSystemDetails,

                            '3_14_workplaceSafetyMeasures2' => $workplaceSafetyMeasures2,     //change name
                            '3_15_workplaceSafetyMeasures' => $workplaceSafetyMeasures,       //change name
                            '3_15_workplaceSafetyMeasures_comments' => $workplaceSafetyMeasures_comments,
                            '3_16_healthSafetyManagementSystem3' => $healthSafetyManagementSystem3,

                            '3_17_healthSafetyManagementSystem4' => $healthSafetyManagementSystem4,
                            '3_18_workplaceSafetyMeasures12' => $workplaceSafetyMeasures12, //change name
                            '3_19_workplaceSafetyMeasures15' => $workplaceSafetyMeasures15, //change name

                            '3_20_complaintsemployees' => $complaintsemployees,
                            '3_20_complaintsemployees_comments' => $complaintsemployees_comments,
                            '3_21_assesmentyr' => $assesmentyr,
                            '3_21_assesmentyr_comments' => $assesmentyr_comments,

                            //LEADERSHIP INDICATORS
                            '3_22_lifeInsuranceCompensationa' => $lifeInsuranceCompensationa,
                            '3_24_lifeInsuranceCompensationb' => $lifeInsuranceCompensationb,
                            '3_26_statutoryDuesMeasures' => $statutoryDuesMeasures,
                            '3_27_workRelatedInjuryRehabilitation' => $workRelatedInjuryRehabilitation,
                            '3_27_workRelatedInjuryRehabilitation_comments' => $workRelatedInjuryRehabilitation_comments,

                            '3_28_transitionAssistanceProgram' => $transitionAssistanceProgram,
                            '3_29_transitionAssistanceProgramDetails' => $transitionAssistanceProgramDetails,
                            '3_30_rdPercentageassesment' => $rdPercentageassesment,
                            '3_30_rdPercentageassesment_comments' => $rdPercentageassesment_comments,
                            '3_31_correctiveactions' => $correctiveactions,

                        // Principle 4
                            //ESSENTIAL INDICATORS
                            '4_1_stakeholderIdentificationDetails' => $stakeholderIdentificationDetails,
                            '4_2_stakeholderEngagementDetails' => $stakeholderEngagementDetails,
                            '4_2_stakeholderEngagementDetails_comments' => $stakeholderEngagementDetails_comments,
                            //LEADERSHIP INDICATORS
                            '4_3_boardConsultationDetails' => $boardConsultationDetails,
                            '4_4_stakeholderConsultationPolicy' => $stakeholderConsultationPolicy,
                            '4_5_vulnerableEngagementDetails' => $vulnerableEngagementDetails,

                        // Principle 5
                            //ESSENTIAL INDICATORS
                            '5_1_humanRightsTrainingDetails' => $humanRightsTrainingDetails,
                            '5_1_humanRightsTrainingDetails_comments' => $humanRightsTrainingDetails_comments,
                            '5_2_wageDetails' => $wageDetails,
                            '5_2_wageDetails_comments' => $wageDetails_comments,
                            '5_3_remunerationDetails' => $remunerationDetails,
                            '5_3_remunerationDetails_comments' => $remunerationDetails_comments,

                            '5_4_humanRightsResponsible' => $humanRightsResponsible,
                            '5_5_humanRightsResponsibleDetails' => $humanRightsResponsibleDetails,
                            '5_6_grievanceMechanism' => $grievanceMechanism,
                            '5_7_complaintsDetails' => $complaintsDetails,
                            '5_7_complaintsDetails_comments' => $complaintsDetails_comments,

                            '5_8_discriminationProtectionMechanisms' => $discriminationProtectionMechanisms,
                            '5_9_humanRightsInBusiness' => $humanRightsInBusiness,
                            '5_10_humanRightsInBusinessDetails' => $humanRightsInBusinessDetails,
                            '5_11_assessedPlantPercentage' => $assessedPlantPercentage,
                            '5_11_assessedPlantPercentageOthers' => $assessedPlantPercentageOthers,
                            '5_11_assessedPlantPercentage_comments' => $assessedPlantPercentage_comments,

                            '5_12_correctiveActionsForAssessments' => $correctiveActionsForAssessments,

                            //LEADERSHIP INDICATORS
                            '5_13_businessProcessModifications' => $businessProcessModifications,
                            '5_14_humanRightsDueDiligence' => $humanRightsDueDiligence,
                            '5_15_premiseAccessibility' => $premiseAccessibility,

                            '5_16_valueChainAssessment' => $valueChainAssessment,
                            '5_16_valueChainAssessmentOthers' => $valueChainAssessmentOthers,
                            '5_16_valueChainAssessment_comments' => $valueChainAssessment_comments,
                            '5_17_correctiveActionsFromAssessments' => $correctiveActionsFromAssessments,

                         // Principle 6
                             //ESSENTIAL INDICATORS
                             '6_1_energyConsumptionDetailsCFY' => $energyConsumptionDetailsCFY,
                             '6_1_energyConsumptionDetailsPFY' => $energyConsumptionDetailsPFY,
                             '6_1_energyConsumptionDetails' => $energyConsumptionDetails,
                             '6_1_energyConsumptionDetails_comments' => $energyConsumptionDetails_comments,
                             '6_2_energyExternalAgency' => $energyExternalAgency,
                             '6_3_energyExternalAgencyName' => $energyExternalAgencyName,

                             '6_4_designatedConsumers' => $designatedConsumers,
                             '6_5_designatedConsumersDetails' => $designatedConsumersDetails,
                             '6_6_waterWithdrawalDetails' => $waterWithdrawalDetails,
                             '6_6_waterWithdrawalDetails_comments' => $waterWithdrawalDetails_comments,

                             '6_7_waterExternalAgency' => $waterExternalAgency,
                             '6_8_waterExternalAgencyName' => $waterExternalAgencyName,
                             '6_9_liquidDischarge' => $liquidDischarge,

                             '6_10_liquidDischargeDetails' => $liquidDischargeDetails,
                             '6_11_airEmissionDetails' => $airEmissionDetails,
                             '6_11_airEmissionDetails_comments' => $airEmissionDetails_comments,
                             '6_12_airExternalAgency' => $airExternalAgency,

                             '6_13_airExternalAgencyName' => $airExternalAgencyName,
                             '6_14_greenhouseGasEmissionDetails' => $greenhouseGasEmissionDetails,
                             '6_14_greenhouseGasEmissionDetails_comments' => $greenhouseGasEmissionDetails_comments,
                             '6_15_ghgExternalAgency' => $ghgExternalAgency,

                             '6_16_ghgExternalAgencyName' => $ghgExternalAgencyName,
                             '6_17_ghgReductionProject' => $ghgReductionProject,
                             '6_18_ghgReductionProjectDetails' => $ghgReductionProjectDetails,

                             '6_19_wasteDetails' => $wasteDetails,
                             '6_19_wasteDetails_comments' => $wasteDetails_comments,
                             '6_20_wasteExternalAgency' => $wasteExternalAgency,
                             '6_21_wasteExternalAgencyName' => $wasteExternalAgencyName,

                             '6_22_wasteManagementPractices' => $wasteManagementPractices,
                             '6_23_ecologicalAreaOperations' => $ecologicalAreaOperations,
                             '6_23_ecologicalAreaOperations_comments' => $ecologicalAreaOperations_comments,
                             //removed

                             '6_26_eiaExternalAgency' => $eiaExternalAgency,
                             '6_26_eiaExternalAgency_comments' => $eiaExternalAgency_comments,
                             '6_30_environmentalComplianceStatus' => $environmentalComplianceStatus,
                             '6_30_environmentalComplianceStatus_comments' => $environmentalComplianceStatus_comments,

                             //LEADERSHIP INDICATORS
                             '6_31_totalenergyconsumedCFY' => $totalenergyconsumedCFY,
                             '6_31_totalenergyconsumedPFY' => $totalenergyconsumedPFY,
                             '6_31_totalenergyconsumed' => $totalenergyconsumed,
                             '6_31_totalenergyconsumed_comments' => $totalenergyconsumed_comments,
                             '6_32_totalenergyconsumedAgency' => $totalenergyconsumedAgency,
                             '6_33_totalenergyconsumedAgencyName' => $totalenergyconsumedAgencyName,

                             '6_34_waterdischarged' =>  $waterdischarged,
                             '6_34_waterdischarged_comments' =>  $waterdischarged_comments,
                             '6_35_waterdischargedAgency' => $waterdischargedAgency,
                             '6_36_waterdischargedAgencyName' => $waterdischargedAgencyName,

                             '6_37_waterstressa' => $waterstressa, //new
                             '6_37_waterstressb' => $waterstressb, //new
                             '6_37_waterstress' => $waterstress,
                             '6_37_waterstress_comments' => $waterstress_comments,
                             '6_38_waterstressAgency' => $waterstressAgency,  //name changed
                             '6_39_waterstressAgencyName' => $waterstressAgencyName, //name changed

                             '6_40_totalscope' => $totalscope,
                             '6_40_totalscope_comments' => $totalscope_comments,
                             '6_41_totalscopeAgency' => $totalscopeAgency,  //added
                             '6_42_totalscopeAgencyName' => $totalscopeAgencyName,

                             '6_43_significantdirect' => $significantdirect,
                             '6_44_resourceefficiency' => $resourceefficiency,
                             '6_44_resourceefficiency_comments' => $resourceefficiency_comments,
                             '6_45_disastermanagement' => $disastermanagement,

                             '6_46_valuechainentity' => $valuechainentity,
                             '6_47_valuechainbusiness' => $valuechainbusiness,  //name change

                         // Principle 7
                            //ESSENTIAL INDICATORS
                            '7_1_noTradeAffiliations' => $noTradeAffiliations,
                            '7_2_tradeAffiliations' => $tradeAffiliations,
                            '7_2_tradeAffiliations_comments' => $tradeAffiliations_comments,

                            '7_3_antiCompetitiveActions' => $antiCompetitiveActions,
                            '7_3_antiCompetitiveActions_comments' => $antiCompetitiveActions_comments,
                             //LEADERSHIP INDICATORS
                            '7_4_publicPolicyAdvocacy' => $publicPolicyAdvocacy,
                            '7_4_publicPolicyAdvocacy_comments' => $publicPolicyAdvocacy_comments,

                         // Principle 8
                            //ESSENTIAL INDICATORS
                            '8_1_socialImpactAssessments' => $socialImpactAssessments,
                            '8_1_socialImpactAssessments_comments' => $socialImpactAssessments_comments,
                            '8_2_rehabilitationProjects' => $rehabilitationProjects,
                            '8_2_rehabilitationProjects_comments' => $rehabilitationProjects_comments,
                            '8_3_grievanceRedressMechanism' => $grievanceRedressMechanism,
                            '8_4_inputMaterialPercentage' => $inputMaterialPercentage,
                            '8_4_inputMaterialPercentage_comments' => $inputMaterialPercentage_comments,
                            //LEADERSHIP INDICATORS
                            '8_5_socialImpactActions' => $socialImpactActions,
                            '8_5_socialImpactActions_comments' => $socialImpactActions_comments,
                            '8_6_csrAspirationalDistricts' => $csrAspirationalDistricts,
                            '8_6_csrAspirationalDistricts_comments' => $csrAspirationalDistricts_comments,
                                //3 sub question - a(8_7), b(8_7_B), c(8_7_C)
                            '8_7_procurementPolicyMarginalized' => $procurementPolicyMarginalized,
                            '8_8_procurementPolicyMarginalizedDetails' => $procurementPolicyMarginalizedDetails,
                            '8_7_B_procurementPolicyMarginalized' => $procurementPolicyMarginalized_b,
                            '8_7_C_procurementPolicyMarginalized' => $procurementPolicyMarginalized_c,
                            '8_9_intellectualPropertiesBenefits' => $intellectualPropertiesBenefits,
                            '8_9_intellectualPropertiesBenefits_comments' => $intellectualPropertiesBenefits_comments,
                            '8_10_correctiveActionsIntellectualProperty' => $correctiveActionsIntellectualProperty,
                            '8_10_correctiveActionsIntellectualProperty_comments' => $correctiveActionsIntellectualProperty_comments,
                            '8_11_csrProjectBeneficiaries' => $csrProjectBeneficiaries,
                            '8_11_csrProjectBeneficiaries_comments' => $csrProjectBeneficiaries_comments,

                            // Principle 9
                           //ESSENTIAL INDICATORS
                           '9_1_consumerFeedbackMechanism' => $consumerFeedbackMechanism,
                           '9_2_productTrunover' => $productTurnover,
                           '9_2_productTrunover_comments' => $productTurnover_comments,
                           '9_3_consumerComplaints' => $consumerComplaints,
                           '9_3_consumerComplaints_comments' => $consumerComplaints_comments,
                           '9_4_productRecallInstances' => $productRecallInstances,
                           '9_4_productRecallInstances_comments' => $productRecallInstances_comments,
                           '9_5_cyberSecurityPolicy' => $cyberSecurityPolicy,
                           '9_5_1_cyberSecurityPolicyDetails' => $cyberSecurityPolicyDetails,
                           '9_6_correctiveActions' => $correctiveActions,
                           //LEADERSHIP INDICATORS
                           '9_7_infoChannels' => $infoChannels,
                           '9_8_consumerEducation' => $consumerEducation,
                           '9_9_serviceDisruptionInfo' => $serviceDisruptionInfo,
                           '9_10_productInfoDisplay' => $productInfoDisplay,
                           '9_10_1_productInfoDisplayDetails' => $productInfoDisplayDetails,
                           '9_11_surveyInfo' => $surveyInfo,
                           '9_11_1_surveyInfoDetails' => $surveyInfoDetails,
                           '9_12_dataBreachesInfo' => $dataBreachesInfo,
                           '9_13_dataBreachesInfoPercentage' => $dataBreachesInfoPercentage
                        ];

                    $columns = implode(', ', array_keys($data));
                    $placeholders = implode(', ', array_fill(0, count($data), '?'));

                    $sql = "INSERT INTO section_c_form ($columns) VALUES ($placeholders)";

                    $stmt = $pdo->prepare($sql);

                    $stmt->execute(array_values($data));

                    $response['status'] = 'success';
                    $response['message'] = 'Section C: Form submitted successfully';
                } else {
                    $response['status'] = 'failure1';
                    $response['message'] = 'Section C: CIN already exists';
                }
            } else {
                $response['status'] = 'failure2';
                $response['message'] = 'Fill section B form.';
            }
        } else {
            $response['status'] = 'failure3';
            $response['message'] = 'Fill section A form.';
        }
    }
} catch (PDOException $e) {
    $_SESSION['error'] = "Database error: " . $e->getMessage();
    $response['status'] = 'error';
    $response['message'] = 'Database error: ' . $e->getMessage();
}
header('Content-Type: application/json');
echo json_encode($response);
?>
