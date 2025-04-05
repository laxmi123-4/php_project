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