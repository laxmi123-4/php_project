<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


// require_once 'admission_controller.php'; // Include controller for handling form submission

// Initialize error and success messages to avoid undefined variable warnings
$error = $error ?? '';
$success = $success ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Admission - Apply</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100">
    <?php include "header.php" ?>

    <div class="bg-white p-8 rounded-lg shadow-md w-96 justify-self-center mt-8">
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-4">Apply for Hostel Admission</h2>

        <!-- Display error or success message if set -->
        <?php if (!empty($error)): ?>
            <p class="text-red-500 text-sm text-center"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <p class="text-green-500 text-sm text-center"><?php echo htmlspecialchars($success); ?></p>
        <?php endif; ?>

        <form action="admission_controller.php" method="post" class="space-y-4">
            <input type="text" name="name" placeholder="Full Name" required 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            <input type="number" name="age" placeholder="Age" 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            <input type="text" name="course" placeholder="Course of Study" required 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            <input type="text" name="contact" placeholder="Contact Number" required 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            <button type="submit" name="apply" 
                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                Submit Application
            </button>
        </form>
        <p class="text-center text-sm mt-4">
            <a href="index.php" class="text-blue-500 hover:underline">Back to Home</a>
        </p>
    </div>
</body>
</html>

