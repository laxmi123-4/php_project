<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: alogin.php");
    exit();
}

require_once 'admission_Vcontroller.php'; // Include controller to manage applications

// Example: Fetch all applications (ensure this function is implemented in the controller)
// $applications = getAllApplications();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Applications</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen ">
    <?php include "header.php" ?>

    <div class="bg-white justify-self-center mt-8 shadow-lg rounded-lg p-4 w-full max-w-5xl ">
        <h2 class="text-2xl font-bold text-center text-blue-700 mb-4">Manage Applications</h2>

        <?php if (isset($application_update_message)): ?>
            <p class="text-center text-lg <?php echo isset($application_update_error) ? 'text-red-500' : 'text-green-500'; ?>">
                <?php echo htmlspecialchars($application_update_message); ?>
            </p>
        <?php endif; ?>

        <?php if (isset($applications) && !empty($applications)): ?>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-blue-500 text-white">
                            <th class="p-3 border">ID</th>
                            <th class="p-3 border">User Name</th>
                            <th class="p-3 border">Course</th>
                            <th class="p-3 border">Application Date</th>
                            <th class="p-3 border">Status</th>
                            <th class="p-3 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($applications as $app): ?>
                            <tr class="border hover:bg-gray-100 text-center">
                                <td class="p-3 border"><?php echo htmlspecialchars($app['id']); ?></td>
                                <td class="p-3 border"><?php echo htmlspecialchars($app['name']); ?></td>
                                <td class="p-3 border"><?php echo htmlspecialchars($app['course']); ?></td>
                                <td class="p-3 border"><?php echo htmlspecialchars($app['application_date']); ?></td>
                                <td class="p-3 border font-semibold 
                                    <?php echo $app['status'] === 'Approved' ? 'text-green-600' : ($app['status'] === 'Rejected' ? 'text-red-500' : 'text-yellow-500'); ?>">
                                    <?php echo htmlspecialchars($app['status']); ?>
                                </td>
                                <td class="p-3 border">
                                        <form method="post" action="admin_update.php" class="flex gap-2 justify-center">
                                            <input type="hidden" name="application_id" value="<?php echo htmlspecialchars($app['id']); ?>">
                                            <button type="submit" name="approve_application" class="bg-green-500 text-white px-2 py-2 rounded hover:bg-green-600 transition">Approve</button>
                                            <button type="submit" name="reject_application" class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600 transition">Reject</button>
                                        </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-gray-600 text-center mt-4">No applications found.</p>
        <?php endif; ?>

        <div class="text-center mt-6">
            <a href="index.php" class="text-blue-500 hover:underline text-lg">Back to Home</a>
        </div>
    </div>

</body>
</html>
