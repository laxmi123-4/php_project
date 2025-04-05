<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'database.php';

// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: alogin.php");
    exit();
}

// Fetch user's admission status
$user_id = $_SESSION['admin_id'];
$stmt = $pdo->prepare("SELECT * FROM Admissions");
// $stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$applications = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>