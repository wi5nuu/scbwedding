<?php
session_start();
require '../config.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    try {
        if ($_POST['action'] == 'update') {
            $booking_id = filter_input(INPUT_POST, 'booking_id', FILTER_SANITIZE_NUMBER_INT);
            $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
            $stmt = $conn->prepare("UPDATE bookings SET status = ? WHERE booking_id = ?");
            $stmt->bind_param("si", $status, $booking_id);
            $stmt->execute();
            $stmt->close();
        } elseif ($_POST['action'] == 'delete') {
            $booking_id = filter_input(INPUT_POST, 'booking_id', FILTER_SANITIZE_NUMBER_INT);
            $stmt = $conn->prepare("DELETE FROM bookings WHERE booking_id = ?");
            $stmt->bind_param("i", $booking_id);
            $stmt->execute();
            $stmt->close();
        }
        header("Location: manage_bookings.php");
        exit;
    } catch (Exception $e) {
        error_log("Manage bookings error: " . $e->getMessage(), 3, "../logs/errors.log");
        $error = "Error processing request.";
    }
}

try {
    $result = $conn->query("SELECT b.*, p.package_name FROM bookings b JOIN packages p ON b.package_id = p.package_id ORDER BY created_at DESC");
} catch (Exception $e) {
    error_log("Manage bookings error: " . $e->getMessage(), 3, "../logs/errors.log");
    $error = "Error loading bookings.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings - SCB Wedding</title>
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
        <h1 class="text-4xl font-playfair font-bold gold-accent mb-8">Manage Bookings</h1>
        <?php if (isset($error)) echo "<p class='text-red-500 mb-4'>$error</p>"; ?>
        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 text-left">ID</th>
                        <th class="px-6 py-3 text-left">Client Name</th>
                        <th class="px-6 py-3 text-left">Email</th>
                        <th class="px-6 py-3 text-left">Event Date</th>
                        <th class="px-6 py-3 text-left">Package</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td class="px-6 py-4"><?php echo $row['booking_id']; ?></td>
                            <td class="px-6 py-4"><?php echo htmlspecialchars($row['client_name']); ?></td>
                            <td class="px-6 py-4"><?php echo htmlspecialchars($row['email']); ?></td>
                            <td class="px-6 py-4"><?php echo $row['event_date']; ?></td>
                            <td class="px-6 py-4"><?php echo htmlspecialchars($row['package_name']); ?></td>
                            <td class="px-6 py-4"><?php echo $row['status']; ?></td>
                            <td class="px-6 py-4">
                                <form method="POST" class="inline">
                                    <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>">
                                    <input type="hidden" name="action" value="update">
                                    <select name="status" class="border rounded px-2 py-1">
                                        <option value="pending" <?php if ($row['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                                        <option value="confirmed" <?php if ($row['status'] == 'confirmed') echo 'selected'; ?>>Confirmed</option>
                                        <option value="cancelled" <?php if ($row['status'] == 'cancelled') echo 'selected'; ?>>Cancelled</option>
                                    </select>
                                    <button type="submit" class="text-blue-500 hover:underline">Update</button>
                                </form>
                                <form method="POST" class="inline ml-2">
                                    <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>">
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