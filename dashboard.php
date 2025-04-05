<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("login.php");
    exit();
}
include 'header.php';
?>

<div class="container">
    <h2>User Dashboard</h2>
    <p>Welcome, <?php echo $_SESSION['user_name']; ?>!</p>
    <ul>
        <li><a href="apply.php">Apply for Hostel Admission</a></li>
        <li><a href="status.php">View Application Status</a></li>
        <li><a href="edit.php">Edit Profile</a></li>
    </ul>
</div>

<?php include 'footer.php'; ?>