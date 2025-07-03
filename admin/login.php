<?php
session_start();
require '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT admin_id, username, password_hash FROM admins WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            if (password_verify($password, $row['password_hash'])) {
                $_SESSION['admin_id'] = $row['admin_id'];
                $_SESSION['username'] = $row['username'];

                $update = $conn->prepare("UPDATE admins SET last_login = NOW() WHERE admin_id = ?");
                $update->bind_param("i", $row['admin_id']);
                $update->execute();

                header("Location: dashboard.php");
                exit;
            } else {
                $error = "Incorrect password.";
            }
        } else {
            $error = "Username not found.";
        }

        $stmt->close();
    } catch (Exception $e) {
        error_log("Login error: " . $e->getMessage(), 3, "../logs/errors.log");
        $error = "Something went wrong. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - SCB Wedding</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Lato', sans-serif;
        }
        .font-playfair {
            font-family: 'Playfair Display', serif;
        }
        .gold-accent {
            color: #c59d5f;
        }
        .gold-btn {
            background-color: #c59d5f;
        }
        .gold-btn:hover {
            background-color: #b08a49;
        }
        .login-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-2xl max-w-md w-full login-card">
        <div class="text-center mb-6">
            <h1 class="text-4xl font-playfair font-bold gold-accent mb-2">SCB Wedding</h1>
            <p class="text-gray-600 text-sm">Admin Panel Login</p>
        </div>
        <?php if (!empty($error)) : ?>
            <p class="text-red-500 text-center mb-4 font-medium"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="POST" class="space-y-5">
            <div>
                <label for="username" class="block text-gray-700 font-medium mb-1">Username</label>
                <input type="text" id="username" name="username" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold-accent focus:outline-none">
            </div>
            <div>
                <label for="password" class="block text-gray-700 font-medium mb-1">Password</label>
                <input type="password" id="password" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gold-accent focus:outline-none">
            </div>
            <button type="submit" class="w-full gold-btn text-white py-2 rounded-lg font-semibold transition duration-300">Login</button>
        </form>
    </div>
</body>
</html>
