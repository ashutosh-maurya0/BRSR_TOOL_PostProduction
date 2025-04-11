<?php
session_start();

include_once '../connection.php';

// Function to check if the provided CIN is unique (replace with your database logic)
function isCINUnique($cin, $pdo) {
    $query = $pdo->prepare("SELECT COUNT(*) FROM section_a_form WHERE cin = :cin");
    $query->bindParam(':cin', $cin, PDO::PARAM_STR);
    $query->execute();

    $count = $query->fetchColumn();

    return $count === 0;
}

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cin = $_POST["cin"];
        $_SESSION['cin'] = $cin; // Store the CIN in the session to forward it to the next form

        // Check if the CIN is unique using the isCINUnique function
        if (isCINUnique($cin, $pdo)) {
            $cin = $_POST['cin'];
            $name = $_POST['name'];
            $incorp_date = implode('| ', $_POST['incorp_date']);
            $office_address = $_POST['office_address'];
            $corporate_address = $_POST['corporate_address'];

            $email = implode('| ', $_POST["email"]);
            $telephone = implode('| ', $_POST['telephone']);
            $website = $_POST['website'];
            $reporting_fin_year = $_POST['reporting_fin_year'];
            $stock_name = implode('| ', $_POST['stock_name']);
            
            $puc = $_POST['puc'];
            $poc_name = $_POST['poc_name'];
            $poc_phone = $_POST['poc_phone'];
            $poc_email = $_POST['poc_email'];
            $rep_b = $_POST['rep_b'];
            $rep_b_comments = $_POST['rep_b_comments'];             //new column
            
            $doba =  implode('|', $_POST['doba']);
            $doba_comments = $_POST['p_doba_comments'];             //new column
            $dops = implode('| ', $_POST['dops']);
            $dops_comments = $_POST['p_dops_comments'];             //new column
            $nol = implode('| ', $_POST['nol']);

            $nol_comments = $_POST['p_nol_comments'];
            $drm = implode('| ', $_POST['drm']);
            $drm_comments = $_POST['p_drm_comments'];
            $drm_contribution_export = $_POST['drm_contribution_export'];
            $drm_types_customers = $_POST['drm_types_customers'];
            
            $dew = implode('| ', $_POST['dew']);
            $dew_comments = $_POST['p_dew_comments'];
            $dewda = implode('| ', $_POST['dewda']);
            $dewda_comments = $_POST['p_dewda_comments'];
            $pirw = implode('| ', $_POST['pirw']);
            
            $pirw_comments = $_POST['p_pirw_comments'];
            $torpew = implode('| ', $_POST['torpew']);
            $torpew_comments = $_POST['p_torpew_comments'];
            $holding = implode('| ', $_POST['holding']);
            $holding_comments    = $_POST['p_holding_comments'];

            $csr_act = $_POST['csr_act'];
            
            $csr_turnover = $_POST['csr_turnover'];
            $csr_networth = $_POST['csr_networth'];
            $gre = implode('| ', $_POST['gre']);
            $gre_comments = $_POST['p_gre_comments'];
            $overview = implode('| ', $_POST['overview']);
            $overview_comments = $_POST['p_overview_comments'];

            $incorporation_certificate = null;

            if (isset($_FILES['uploadedFiles']) && is_array($_FILES['uploadedFiles']['error'])) {
                $uploadDir = '../uploads/sec_A/';
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                $uploadedPaths = [];
                $totalFiles = count($_FILES['uploadedFiles']['name']);

                for ($i = 0; $i < $totalFiles; $i++) {
                    if ($_FILES['uploadedFiles']['error'][$i] === 0) {
                        $uniqueFilename = uniqid() . '_' . $_FILES['uploadedFiles']['name'][$i];
                        $uploadFilePath = $uploadDir . $uniqueFilename;

                        if (move_uploaded_file($_FILES['uploadedFiles']['tmp_name'][$i], $uploadFilePath)) {
                            $uploadedPaths[] = $uploadFilePath;
                        } else {
                            $_SESSION['error'] = "Error uploading file: " . $_FILES['uploadedFiles']['name'][$i];
                            break;
                        }
                    } else {
                        $_SESSION['error'] = "Error with file: " . $_FILES['uploadedFiles']['name'][$i];
                        break;
                    }
                }

                $incorporation_certificate = implode(";", $uploadedPaths);
            } else {
                $_SESSION['error'] = "No files were uploaded or there was an error.";
            }

            $stmt = $pdo->prepare("
                INSERT INTO section_a_form (
                    cin, name, incorp_date, office_address, corporate_address,
                    email, telephone, website, reporting_fin_year, incorporation_certificate,
                    stock_name, puc, poc_name, poc_phone, poc_email,
                    rep_b, rep_b_comments, doba, doba_comments, dops, dops_comments,
                    nol, nol_comments, drm, drm_comments, drm_contribution_export,
                    drm_types_customers, dew, dew_comments, dewda, dewda_comments,
                    pirw, pirw_comments, torpew, torpew_comments, holding,
                    holding_comments, csr_act, csr_turnover, csr_networth, gre, 
                    gre_comments, overview, overview_comments
                ) VALUES (
                    ?, ?, ?, ?, ?, 
                    ?, ?, ?, ?, ?, 
                    ?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?, 
                    ?, ?, ?, ?, ?, 
                    ?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?,
                    ?, ?, ?, ?
                )
            ");

            $stmt->execute([
                $cin, $name, $incorp_date, $office_address, $corporate_address,
                $email, $telephone, $website, $reporting_fin_year, $incorporation_certificate,
                $stock_name, $puc, $poc_name, $poc_phone, $poc_email,
                $rep_b, $rep_b_comments, $doba, $doba_comments, $dops, $dops_comments,
                $nol, $nol_comments, $drm, $drm_comments, $drm_contribution_export,
                $drm_types_customers, $dew, $dew_comments, $dewda, $dewda_comments,
                $pirw, $pirw_comments, $torpew, $torpew_comments, $holding, 
                $holding_comments, $csr_act, $csr_turnover, $csr_networth,  $gre, 
                $gre_comments, $overview, $overview_comments
            ]);

            $response['status'] = 'success';
            $response['message'] = 'Section A: Form submitted successfully';
        } else {
            $response['status'] = 'failure';
            $response['message'] = 'Section A: CIN already exists';
        }

        // Send a JSON response to the frontend
        header('Content-Type: application/json');
        echo json_encode($response);
    }
} catch (PDOException $e) {
    $_SESSION['error'] = "Database error: " . $e->getMessage();
    $response['status'] = 'error';
    $response['message'] = 'Database error: ' . $e->getMessage();
}
?>
