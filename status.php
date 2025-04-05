<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once 'admission_controllerV.php'; // Include controller to fetch application status
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Status</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200  min-h-screen">

    <?php include "header.php" ?>

    <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-4xl justify-self-center mt-8">
             <h1 class="text-2xl font-bold text-center text-blue-700 pb-8 text-blue-600">Application Status</h1>

        <?php if (empty($applications)): ?>
            <p class="text-gray-600 text-center">No applications found.</p>
        <?php else: ?>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-blue-500 text-white">
                            <th class="p-3 border">Application Date</th>
                            <th class="p-3 border">Course</th>
                            <th class="p-3 border">Status</th>
                            <!-- <th class="p-3 border">Hostel Details</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($applications as $application): ?>
                            <tr class="border hover:bg-gray-100">
                                <td class="p-3 border text-center"><?php echo htmlspecialchars($application['application_date']); ?></td>
                                <td class="p-3 border text-center"><?php echo htmlspecialchars($application['course']); ?></td>
                                <td class="p-3 border text-center font-semibold <?php echo $application['status'] === 'Approved' ? 'text-green-600' : 'text-red-500'; ?>">
                                    <?php echo htmlspecialchars($application['status']); ?>
                                </td>
                                <!-- <td class="p-3 border text-center"><?php echo htmlspecialchars($application['hostel_details']); ?></td> -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

        <div class="text-center mt-6">
            <a href="index.php" class="text-blue-500 hover:underline text-lg">Back to Home</a>
        </div>
    </div>

</body>
</html>
