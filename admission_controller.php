<?php
session_start();
require_once 'database.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['apply'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];
    $contact = $_POST['contact'];
    $user_id = $_SESSION['user_id'];
    // Basic validation
    if (empty($name) || empty($course) || empty($contact)) {
        $error = "Name, Course, and Contact are required.";
    } else {
        // Insert admission application
        $stmt = $pdo->prepare("INSERT INTO Admissions (user_id, name, age, course, contact) VALUES (:user_id, :name, :age, :course, :contact)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':course', $course);
        $stmt->bindParam(':contact', $contact);

        if ($stmt->execute()) {
            header("Location: status.php");            
        } else {
            print("Failed to submit application. Please try again.");
        }
    }
}
?>