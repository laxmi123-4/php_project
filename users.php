<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'database.php';
// Check if user is logged in
// if (!isset($_SESSION['admin_id'])) {
//     header("Location: alogin.php");
//     exit();
// }
// Fetch user's admission status
$user_id = $_SESSION['admin_id'];
$stmt = $pdo->prepare("SELECT * FROM Users");
// $stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100  min-h-screen ">
        <?php include "header.php" ?>

    <div class="bg-white shadow-lg rounded-lg p-4 w-full max-w-5xl justify-self-center mt-8">
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-4">View All Users</h2>

        <?php if (isset($users) && !empty($users)): ?>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-blue-500 text-white">
                            <th class="p-3 border">ID</th>
                            <th class="p-3 border">Name</th>
                            <th class="p-3 border">Email</th>
                            <th class="p-3 border">Contact</th>
                            <th class="p-3 border">Application Status</th>
                            <!-- <th class="p-3 border">Hostel Details</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr class="border hover:bg-gray-100 text-center">
                                <td class="p-3 border"><?php echo htmlspecialchars($user['id']); ?></td>
                                <td class="p-3 border"><?php echo htmlspecialchars($user['name']); ?></td>
                                <td class="p-3 border"><?php echo htmlspecialchars($user['email']); ?></td>
                                <td class="p-3 border"><?php echo htmlspecialchars($user['contact']); ?></td>
                                <td class="p-3 border font-semibold 
                                    <?php 
                                        echo isset($user['admission_status']) && $user['admission_status'] === 'Approved' ? 'text-green-600' : 
                                        (isset($user['admission_status']) && $user['admission_status'] === 'Pending' ? 'text-yellow-500' : 'text-gray-600'); 
                                    ?>">
                                    <?php echo isset($user['admission_status']) ? htmlspecialchars($user['admission_status']) : 'No Application'; ?>
                                </td>
                                <!-- <td class="p-3 border"><?php echo isset($user['hostel_details']) ? htmlspecialchars($user['hostel_details']) : '-'; ?></td> -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-gray-600 text-center mt-4">No users found.</p>
        <?php endif; ?>

        <div class="text-center mt-6">
            <a href="index.php" class="text-blue-500 hover:underline text-lg">Back to Home</a>
        </div>
    </div>

</body>
</html>
