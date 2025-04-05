<?php
session_start();
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Basic validation
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Email and password are required.";
    } else {
        // Check if user exists
        $stmt = $pdo->prepare("SELECT id, name, email, password FROM Users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Login successful
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header("Location: index.php"); // Redirect to user dashboard
            exit();
        } else {
            $_SESSION['error'] = "Invalid email or password.";
        }
    }

    // Redirect back to login page with error message
    header("Location: login.php");
    exit();
}
