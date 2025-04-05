<?php

$host = 'localhost'; // Replace with your database host
$dbname = 'hostel'; // Replace with your database name
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// You can also use MySQLi if you prefer
// $conn = new mysqli($host, $username, $password, $dbname);
// if ($conn->connect_error) {
//     die("Database connection failed: " . $conn->connect_error);
// }

?>