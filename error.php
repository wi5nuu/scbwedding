<?php
$message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : 'An unexpected error occurred.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error - SCB Wedding</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg text-center">
        <h1 class="text-2xl font-bold text-red-600 mb-4">Error</h1>
        <p class="text-gray-700 mb-4"><?php echo $message; ?></p>
        <a href="index.php" class="inline-block bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">Back to Home</a>
    </div>
</body>
</html>