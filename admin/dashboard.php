<?php
session_start();
require '../config.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

try {
    $bookings_count = $conn->query("SELECT COUNT(*) FROM bookings")->fetch_row()[0];
    $packages_count = $conn->query("SELECT COUNT(*) FROM packages")->fetch_row()[0];
    $testimonials_count = $conn->query("SELECT COUNT(*) FROM testimonials WHERE is_approved = 1")->fetch_row()[0];
} catch (Exception $e) {
    error_log("Dashboard error: " . $e->getMessage(), 3, "../logs/errors.log");
    $error = "Error loading dashboard data.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SCB Wedding</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body class="font-lato bg-gray-100">
    <header class="bg-white shadow">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-3xl font-bold font-playfair text-gold-accent">SCB Wedding Admin</div>
            <div class="space-x-6">
                <a href="dashboard.php" class="hover:text-gold-accent">Dashboard</a>
                <a href="manage_bookings.php" class="hover:text-gold-accent">Bookings</a>
                <a href="manage_packages.php" class="hover:text-gold-accent">Packages</a>
                <a href="manage_testimonials.php" class="hover:text-gold-accent">Testimonials</a>
                <a href="logout.php" class="hover:text-gold-accent">Logout</a>
            </div>
        </nav>
    </header>

    <main class="container mx-auto px-6 py-12">
        <h1 class="text-4xl font-playfair font-bold gold-accent mb-8">Dashboard</h1>
        <?php if (isset($error)) echo "<p class='text-red-500 mb-4'>$error</p>"; ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-xl font-bold gold-accent mb-2">Total Bookings</h3>
                <p class="text-3xl"><?php echo $bookings_count; ?></p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-xl font-bold gold-accent mb-2">Total Packages</h3>
                <p class="text-3xl"><?php echo $packages_count; ?></p>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-xl font-bold gold-accent mb-2">Approved Testimonials</h3>
                <p class="text-3xl"><?php echo $testimonials_count; ?></p>
            </div>
        </div>
    </main>
</body>
</html>