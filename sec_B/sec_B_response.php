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
            if (isCINUnique_sec_B($cin, $pdo)) {
                $dew = implode('| ', $_POST["dew"]);
                $stmtdir = $_POST["stmtdir"];
                $dthi = $_POST["dthi"];
                $enspec = $_POST["enspec"];

                $dew_comments = $_POST["p_dew_comments"];
                
                $gre = implode('| ', $_POST["gre"]);
                $gre_comments = $_POST["p_gre_comments"];

                $question11 = implode('| ', $_POST["question11"]);
                $question11_comments = $_POST["p_question11_comments"];
                
                $question12 = implode('| ', $_POST["question12"]);
                $question12_comments = $_POST["p_question12_comments"];

                $stmt = $pdo->prepare("
                    INSERT INTO section_b_form (
                        cin, dew, stmtdir, dthi, enspec,
                        dew_comments, gre, gre_comments, question11, question11_comments,
                        question12, question12_comments
                    ) VALUES (
                        ?, ?, ?, ?, ?,
                        ?, ?, ?, ?, ?,
                        ?, ?
                    )
                ");

                $stmt->execute([
                    $cin, $dew, $stmtdir, $dthi, $enspec,
                    $dew_comments, $gre, $gre_comments, $question11, $question11_comments,
                    $question12, $question12_comments
                ]);

                $response['status'] = 'success';
                $response['message'] = 'Section B: Form submitted successfully';
            } else {
                $response['status'] = 'failure1';
                $response['message'] = 'Section B: CIN already exists';
            }
        } else {
            $response['status'] = 'failure2';
            $response['message'] = 'Fill section A form.';
        }
    }

    // Send a JSON response to the frontend
    header('Content-Type: application/json');
    echo json_encode($response);
    } catch (PDOException $e) {
        $_SESSION['error'] = "Database error: " . $e->getMessage();
        $response['status'] = 'error';
        $response['message'] = 'Database error: ' . $e->getMessage();
    }
?>