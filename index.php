<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Admission System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    <?php session_start(); ?>
    <header class="bg-blue-600 text-white py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <h1 class="text-sm sm:text-2xl font-bold">Hostel Admission System</h1>
            <nav>
                <ul class="flex text-sm sm:text-lg space-x-4">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a href="index.php" class="font-bold hover:underline">Home</a></li>
                        <li><a href="apply.php" class="font-bold hover:underline">Apply</a></li>
                        <li><a href="status.php" class="font-bold hover:underline">Status</a></li>
                        <li><a href="logout.php" class="font-bold hover:underline">Logout</a></li>
                    <?php elseif (isset($_SESSION['admin_id'])): ?>
                        <li><a href="index.php" class="font-bold hover:underline">Home</a></li>
                        <li><a href="applications.php" class="font-bold hover:underline">Applications</a></li>
                        <li><a href="users.php" class="font-bold hover:underline">Users</a></li>
                        <li><a href="logout.php" class="font-bold hover:bg-white rounded-sm hover:text-red-600 ">Logout</a></li>
                    <?php else: ?>
                        <li><a href="login.php" class="font-bold hover:underline">Login</a></li>
                        <li><a href="alogin.php" class="font-bold hover:underline">Admin</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>


    <div class="container mx-auto p-6 max-w-3xl bg-white shadow-lg rounded-lg mt-10 text-center">
        <h1 class="text-2xl font-bold text-blue-700">Welcome to the Government Polytechnic, Sakoli Hostel Admission System</h1>
    </div>

    <div class="container mx-auto p-6 max-w-3xl bg-white shadow-lg rounded-lg mt-6 text-center">
        <?php if (isset($_SESSION['user_id'])): ?>
            <p class="text-2xl font-extrabold">Welcome, <?php echo $_SESSION['user_name']; ?>!</p>
            <div class="mt-8 space-y-4">
                <a href="apply.php" class="block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Apply for Hostel Admission</a>
                <a href="status.php" class="block px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">View Application Status</a>

                <a href="logout.php" class="block px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Logout</a>
            </div>
        <?php elseif (isset($_SESSION['admin_id'])): ?>
                <p class="text-2xl font-extrabold">Welcome, <?php echo $_SESSION['admin_name']; ?>!</p>
            <div class="mt-8 space-y-4">
                <a href="applications.php" class="block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Applications</a>
                <a href="users.php" class="block px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">Users</a>
                <a href="asignup.php" class="block px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">New Admin Create</a>
                <a href="logout.php" class="block px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Logout</a> 
            </div>
        <?php else: ?>
            <p class="text-lg font-bold">Please login to access the system.</p>
            <div class="mt-6 space-y-3">
                <a href="login.php" class="block px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">User Login</a>
                <a href="signup.php" class="block px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">User Signup</a>
                <a href="alogin.php" class="block px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">Admin Login</a>
                
            </div>
        <?php endif; ?>
    </div>

    <footer class="bg-gray-300 text-center py-8 mt-40 ">
        <p>&copy; <?php echo date("Y"); ?> Hostel Admission System</p>
    </footer>
</body>
</html>
