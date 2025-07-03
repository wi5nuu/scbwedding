<?php
session_start();
require '../config.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (isset($_POST['action']) && $_POST['action'] == 'add') {
            $package_name = filter_input(INPUT_POST, 'package_name', FILTER_SANITIZE_STRING);
            $description = filter_input(INPUT_POST, 'package_description', FILTER_SANITIZE_STRING);
            $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $duration = filter_input(INPUT_POST, 'duration_hours', FILTER_SANITIZE_NUMBER_INT);
            $services = filter_input(INPUT_POST, 'included_services', FILTER_SANITIZE_STRING);
            $is_featured = isset($_POST['is_featured']) ? 1 : 0;

            $stmt = $conn->prepare("INSERT INTO packages (package_name, package_description, price, duration_hours, included_services, is_featured) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssdiis", $package_name, $description, $price, $duration, $services, $is_featured);
            $stmt->execute();
            $stmt->close();
        } elseif (isset($_POST['action']) && $_POST['action'] == 'delete') {
            $package_id = filter_input(INPUT_POST, 'package_id', FILTER_SANITIZE_NUMBER_INT);
            $stmt = $conn->prepare("DELETE FROM packages WHERE package_id = ?");
            $stmt->bind_param("i", $package_id);
            $stmt->execute();
            $stmt->close();
        }
        header("Location: manage_packages.php");
        exit;
    } catch (Exception $e) {
        error_log("Manage packages error: " . $e->getMessage(), 3, "../logs/errors.log");
        $error = "Error processing request.";
    }
}

try {
    $result = $conn->query("SELECT * FROM packages ORDER BY created_at DESC");
} catch (Exception $e) {
    error_log("Manage packages error: " . $e->getMessage(), 3, "../logs/errors.log");
    $error = "Error loading packages.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Packages - SCB Wedding</title>
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
        <h1 class="text-4xl font-playfair font-bold gold-accent mb-8">Manage Packages</h1>
        <?php if (isset($error)) echo "<p class='text-red-500 mb-4'>$error</p>"; ?>
        <!-- Add Package Form -->
        <div class="bg-white rounded-lg shadow p-6 mb-8">
            <h2 class="text-2xl font-playfair font-bold gold-accent mb-4">Add New Package</h2>
            <form method="POST">
                <input type="hidden" name="action" value="add">
                <div class="mb-4">
                    <label for="package_name" class="block text-gray-700">Package Name</label>
                    <input type="text" id="package_name" name="package_name" class="w-full px-4 py-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="package_description" class="block text-gray-700">Description</label>
                    <textarea id="package_description" name="package_description" class="w-full px-4 py-2 border rounded" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-gray-700">Price (Rp)</label>
                    <input type="number" id="price" name="price" step="0.01" class="w-full px-4 py-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="duration_hours" class="block text-gray-700">Duration (Hours)</label>
                    <input type="number" id="duration_hours" name="duration_hours" class="w-full px-4 py-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label for="included_services" class="block text-gray-700">Included Services</label>
                    <textarea id="included_services" name="included_services" class="w-full px-4 py-2 border rounded" required></textarea>
                </div>
                <div class="mb-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="is_featured" class="form-checkbox">
                        <span class="ml-2 text-gray-700">Featured</span>
                    </label>
                </div>
                <button type="submit" class="bg-gold-accent text-white px-6 py-3 rounded hover:bg-yellow-600">Add Package</button>
            </form>
        </div>
        <!-- Package List -->
        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 text-left">ID</th>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Price</th>
                        <th class="px-6 py-3 text-left">Featured</th>
                        <th class="px-6 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td class="px-6 py-4"><?php echo $row['package_id']; ?></td>
                            <td class="px-6 py-4"><?php echo htmlspecialchars($row['package_name']); ?></td>
                            <td class="px-6 py-4">Rp <?php echo number_format($row['price'], 2); ?></td>
                            <td class="px-6 py-4"><?php echo $row['is_featured'] ? 'Yes' : 'No'; ?></td>
                            <td class="px-6 py-4">
                                <form method="POST" class="inline">
                                    <input type="hidden" name="package_id" value="<?php echo $row['package_id']; ?>">
                                    <input type="hidden" name="action" value="delete">
                                    <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>