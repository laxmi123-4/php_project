<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: alogin.php");
    exit();
}

require_once 'database.php'; // Ensure database connection is established

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['approve_application']) || isset($_POST['reject_application'])) {
        $application_id = intval($_POST['application_id']);
        $new_status = isset($_POST['approve_application']) ? 'Approved' : 'Rejected';
        
        try {
            $stmt = $pdo->prepare("UPDATE admissions SET status = :status WHERE id = :id");
            $stmt->bindParam(':status', $new_status, PDO::PARAM_STR);
            $stmt->bindParam(':id', $application_id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                header("Location: applications.php");
                exit();
            } else {
                echo "Error updating application.";
            }
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }

        // Free the statement
        $stmt = null;
    }
}
?>
