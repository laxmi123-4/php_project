<?php
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];

    // Basic validation (you should add more robust validation)
    if (empty($name) || empty($email) || empty($password)) {
        print("All fields are required.");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        print("Invalid email format.");
    } else {
        // Check if email already exists
        $stmt = $pdo->prepare("SELECT id FROM Admins WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            print("Email already exists.");
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user data
            $stmt = $pdo->prepare("INSERT INTO Admins (name, password, email, contact) VALUES (:name, :password, :email, :contact)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':contact', $contact);

            if ($stmt->execute()) {
                header("Location: alogin.php");
                // Optionally send email verification here
            } else {
             echo("Registration failed. Please try again.");
            }
        }
    }
}
?>