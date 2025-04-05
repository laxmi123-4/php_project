<?php
session_start();
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Email and password are required.";
    } else {
        $stmt = $pdo->prepare("SELECT id, name, email, password FROM Admins WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_name'] = $admin['name'];
            header("Location: index.php"); // Redirect to admin dashboard
            exit();
        } else {
            $_SESSION['error'] = "Invalid email or password.";
        }
    }

    header("Location: alogin.php"); // Redirect back to login with error
    exit();
}
