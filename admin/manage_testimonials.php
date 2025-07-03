<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "scb_wedding");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle CRUD operations
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'create' || $_POST['action'] == 'update') {
            $testimonial_id = isset($_POST['testimonial_id']) ? (int)$_POST['testimonial_id'] : null;
            $client_name = filter_input(INPUT_POST, 'client_name', FILTER_SANITIZE_STRING);
            $wedding_date = filter_input(INPUT_POST, 'wedding_date', FILTER_SANITIZE_STRING);
            $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
            $rating = filter_input(INPUT_POST, 'rating', FILTER_SANITIZE_NUMBER_INT);
            $image_path = filter_input(INPUT_POST, 'image_path', FILTER_SANITIZE_STRING);
            $is_approved = isset($_POST['is_approved']) ? 1 : 0;

            if ($_POST['action'] == 'create') {
                $stmt = $conn->prepare("INSERT INTO testimonials (client_name, wedding_date, content, rating, image_path, is_approved) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssisi", $client_name, $wedding_date, $content, $rating, $image_path, $is_approved);
            } else {
                $stmt = $conn->prepare("UPDATE testimonials SET client_name = ?, wedding_date = ?, content = ?, rating = ?, image_path = ?, is_approved = ? WHERE testimonial_id = ?");
                $stmt->bind_param("sssisi", $client_name, $wedding_date, $content, $rating, $image_path, $is_approved, $testimonial_id);
            }

            if ($stmt->execute()) {
                $message = $_POST['action'] == 'create' ? "Testimonial created successfully!" : "Testimonial updated successfully!";
            } else {
                $error = "Error: " . $stmt->error;
            }
            $stmt->close();
        } elseif ($_POST['action'] == 'delete') {
            $testimonial_id = (int)$_POST['testimonial_id'];
            $stmt = $conn->prepare("DELETE FROM testimonials WHERE testimonial_id = ?");
            $stmt->bind_param("i", $testimonial_id);
            if ($stmt->execute()) {
                $message = "Testimonial deleted successfully!";
            } else {
                $error = "Error: " . $stmt->error;
            }
            $stmt->close();
        }
    }
}

// Fetch all testimonials
$result = $conn->query("SELECT * FROM testimonials");
$testimonials = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Testimonials - SCB Wedding</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Playfair Display', serif;
            background-color: #f3f4f6;
        }
        .gold-accent {
            color: #d4af37;
        }
    </style>
</head>
<body>
    <header class="bg-white shadow">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold gold-accent">SCB Wedding Admin</div>
            <div>
                <a href="dashboard.php" class="text-gold-accent hover:underline mr-4">Dashboard</a>
                <a href="logout.php" class="text-gold-accent hover:underline">Logout</a>
            </div>
        </nav>
    </header>
    <div class="container mx-auto px-6 py-16">
        <h2 class="text-4xl font-bold gold-accent mb-12">Manage Testimonials</h2>
        <?php if (isset($message)) { echo "<p class='text-green-500 mb-4'>$message</p>"; } ?>
        <?php if (isset($error)) { echo "<p class='text-red-500 mb-4'>$error</p>"; } ?>
        
        <!-- Create Testimonial Form -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h3 class="text-2xl font-bold gold-accent mb-4">Add New Testimonial</h3>
            <form action="manage_testimonials.php" method="POST" class="space-y-4">
                <input type="hidden" name="action" value="create">
                <div>
                    <label for="client_name" class="block text-gray-600">Client Name</label>
                    <input type="text" id="client_name" name="client_name" class="w-full border rounded px-4 py-2" required>
                </div>
                <div>
                    <label for="wedding_date" class="block text-gray-600">Wedding Date</label>
                    <input type="date" id="wedding_date" name="wedding_date" class="w-full border rounded px-4 py-2" required>
                </div>
                <div>
                    <label for="content" class="block text-gray-600">Content</label>
                    <textarea id="content" name="content" class="w-full border rounded px-4 py-2" rows="4" required></textarea>
                </div>
                <div>
                    <label for="rating" class="block text-gray-600">Rating (1-5)</label>
                    <input type="number" id="rating" name="rating" min="1" max="5" class="w-full border rounded px-4 py-2" required>
                </div>
                <div>
                    <label for="image_path" class="block text-gray-600">Image Path</label>
                    <input type="text" id="image_path" name="image_path" class="w-full border rounded px-4 py-2">
                </div>
                <div>
                    <label for="is_approved" class="block text-gray-600">Approved</label>
                    <input type="checkbox" id="is_approved" name="is_approved" class="h-5 w-5">
                </div>
                <button type="submit" class="bg-gold-accent text-white px-6 py-3 rounded hover:bg-yellow-600">Add Testimonial</button>
            </form>
        </div>

        <!-- Testimonials Table -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-2xl font-bold gold-accent mb-4">All Testimonials</h3>
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2">ID</th>
                        <th class="border p-2">Client Name</th>
                        <th class="border p-2">Wedding Date</th>
                        <th class="border p-2">Rating</th>
                        <th class="border p-2">Approved</th>
                        <th class="border p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($testimonials as $testimonial) { ?>
                        <tr>
                            <td class="border p-2"><?php echo $testimonial['testimonial_id']; ?></td>
                            <td class="border p-2"><?php echo htmlspecialchars($testimonial['client_name']); ?></td>
                            <td class="border p-2"><?php echo $testimonial['wedding_date']; ?></td>
                            <td class="border p-2"><?php echo $testimonial['rating']; ?></td>
                            <td class="border p-2"><?php echo $testimonial['is_approved'] ? 'Yes' : 'No'; ?></td>
                            <td class="border p-2">
                                <form action="manage_testimonials.php" method="POST" class="inline">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="testimonial_id" value="<?php echo $testimonial['testimonial_id']; ?>">
                                    <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>