<?php
session_start();
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $contact = trim($_POST['contact']);

    // Basic validation
    if (empty($name) || empty($email) || empty($password)) {
        $_SESSION['error'] = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format.";
    } else {
        // Check if email already exists
        $stmt = $pdo->prepare("SELECT id FROM Users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $_SESSION['error'] = "Email already exists.";
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user data
            $stmt = $pdo->prepare("INSERT INTO Users (name, email, password, contact) VALUES (:name, :email, :password, :contact)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':contact', $contact);

            if ($stmt->execute()) {
                $_SESSION['success'] = "Registration successful. You can now login.";
                header("Location: login.php"); // Redirect to signup page to show success message
                exit();
            } else {
                $_SESSION['error'] = "Registration failed. Please try again.";
            }
        }
    }

    header("Location: signup.php"); // Redirect back with error message
    exit();
}
