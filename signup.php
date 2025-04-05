<?php
session_start();
$error = isset($_SESSION['error']) ? $_SESSION['error'] : null;
unset($_SESSION['error']); // Clear session messages after displaying
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Admission - Signup</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-4">User Signup</h2>
        <?php if ($error): ?>
            <p class="text-red-500 text-sm text-center mb-4"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form action="auth_controller.php" method="post" class="space-y-4">
            <input type="text" name="name" placeholder="Full Name" required 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            <input type="email" name="email" placeholder="Email Address" required 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            <input type="password" name="password" placeholder="Password" required 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            <input type="text" name="contact" placeholder="Contact Number" required 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            <button type="submit" name="signup" 
                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                Signup
            </button>
        </form>
        <p class="text-center text-sm mt-4">Already have an account? 
            <a href="login.php" class="text-blue-500 hover:underline">Login here</a>
        </p>
    </div>
</body>
</html>
