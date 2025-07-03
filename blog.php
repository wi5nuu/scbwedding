<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - SCB Wedding</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="font-lato bg-white">
    <!-- Header -->
    <header class="bg-white shadow fixed w-full top-0 z-40">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-3xl font-bold font-playfair text-gold-accent">SCB Wedding</div>
            <div class="space-x-6 hidden md:flex">
                <a href="index.php#home" class="hover:text-gold-accent">Home</a>
                <a href="index.php#packages" class="hover:text-gold-accent">Packages</a>
                <a href="index.php#attires" class="hover:text-gold-accent">Attires</a>
                <a href="index.php#gallery" class="hover:text-gold-accent">Gallery</a>
                <a href="index.php#testimonials" class="hover:text-gold-accent">Testimonials</a>
                <a href="index.php#blog" class="hover:text-gold-accent">Blog</a>
                <a href="index.php#contact" class="hover:text-gold-accent">Contact</a>
                <a href="admin/login.php" class="hover:text-gold-accent">Admin</a>
            </div>
            <button class="md:hidden" id="menu-toggle">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </nav>
        <div class="hidden md:hidden bg-white shadow" id="mobile-menu">
            <div class="flex flex-col items-center space-y-4 py-4">
                <a href="index.php#home" class="hover:text-gold-accent">Home</a>
                <a href="index.php#packages" class="hover:text-gold-accent">Packages</a>
                <a href="index.php#attires" class="hover:text-gold-accent">Attires</a>
                <a href="index.php#gallery" class="hover:text-gold-accent">Gallery</a>
                <a href="index.php#testimonials" class="hover:text-gold-accent">Testimonials</a>
                <a href="index.php#blog" class="hover:text-gold-accent">Blog</a>
                <a href="index.php#contact" class="hover:text-gold-accent">Contact</a>
                <a href="admin/login.php" class="hover:text-gold-accent">Admin</a>
            </div>
        </div>
    </header>

    <!-- Blog Content -->
    <section class="py-20 mt-16">
        <div class="container mx-auto px-6">
            <?php
            if (isset($_GET['slug'])) {
                // Tampilkan detail posting
                try {
                    $slug = filter_input(INPUT_GET, 'slug', FILTER_SANITIZE_STRING);
                    $stmt = $conn->prepare("SELECT * FROM blog_posts WHERE slug = ? AND published_at IS NOT NULL");
                    $stmt->bind_param("s", $slug);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($row = $result->fetch_assoc()) {
                        echo '
                        <h1 class="text-4xl font-playfair font-bold gold-accent mb-8" data-aos="fade-up">' . htmlspecialchars($row['title']) . '</h1>
                        <img src="' . htmlspecialchars($row['featured_image']) . '" alt="' . htmlspecialchars($row['title']) . '" class="w-full h-96 object-cover rounded mb-8" data-aos="fade-up">
                        <div class="prose max-w-none text-gray-700" data-aos="fade-up">' . $row['content'] . '</div>';
                    } else {
                        echo '<p class="text-red-500">Blog post not found.</p>';
                    }
                    $stmt->close();
                } catch (Exception $e) {
                    echo "<p class='text-red-500'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
                    error_log("Blog error: " . $e->getMessage(), 3, "logs/errors.log");
                }
            } else {
                // Tampilkan daftar blog
                echo '<h1 class="text-4xl font-playfair font-bold gold-accent text-center mb-12" data-aos="fade-up">Our Blog</h1>';
                echo '<div class="grid grid-cols-1 md:grid-cols-3 gap-8">';
                try {
                    $stmt = $conn->prepare("SELECT * FROM blog_posts WHERE published_at IS NOT NULL ORDER BY published_at DESC");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) {
                        echo '
                        <div class="bg-white rounded-lg shadow-lg p-6 transform transition duration-300 hover:scale-105" data-aos="zoom-in">
                            <img src="' . htmlspecialchars($row['featured_image']) . '" alt="' . htmlspecialchars($row['title']) . '" class="w-full h-48 object-cover rounded mb-4">
                            <h3 class="text-2xl font-playfair font-bold gold-accent mb-4">' . htmlspecialchars($row['title']) . '</h3>
                            <p class="text-gray-600 mb-4">' . htmlspecialchars($row['excerpt']) . '</p>
                            <a href="blog.php?slug=' . htmlspecialchars($row['slug']) . '" class="inline-block text-gold-accent hover:underline">Read More</a>
                        </div>';
                    }
                    $stmt->close();
                } catch (Exception $e) {
                    echo "<p class='text-red-500'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
                    error_log("Blog list error: " . $e->getMessage(), 3, "logs/errors.log");
                }
                echo '</div>';
            }
            ?>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div data-aos="fade-up">
                    <h3 class="text-2xl font-playfair font-bold gold-accent mb-4">SCB Wedding</h3>
                    <p class="text-gray-400">Jalan Duren No. 31, Semper Barat, Jakarta Utara, Indonesia 14130</p>
                    <p class="text-gray-400 mt-2">Email: parfmwis@gmail.com</p>
                    <p class="text-gray-400">Phone: +62 123 456 7890</p>
                </div>
                <div data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-2xl font-playfair font-bold gold-accent mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="index.php#packages" class="hover:text-gold-accent">Packages</a></li>
                        <li><a href="index.php#attires" class="hover:text-gold-accent">Attires</a></li>
                        <li><a href="index.php#gallery" class="hover:text-gold-accent">Gallery</a></li>
                        <li><a href="index.php#contact" class="hover:text-gold-accent">Contact</a></li>
                    </ul>
                </div>
                <div data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-2xl font-playfair font-bold gold-accent mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="hover:text-gold-accent"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.04c-5.5 0-10 4.5-10 10 0 4.41 3.58 8.04 8 8.93v-6.34h-2.4v-2.59h2.4v-1.98c0-2.37 1.44-3.67 3.55-3.67 1.01 0 1.88.07 2.13.1v2.47h-1.46c-1.14 0-1.36.54-1.36 1.33v1.74h2.72l-.35 2.59h-2.37v6.34c4.42-.89 8-4.52 8-8.93 0-5.5-4.5-10-10-10z"/></svg></a>
                    </div>
                </div>
            </div>
            <div class="mt-8 text-center text-gray-400" data-aos="fade-up" data-aos-delay="300">
                © 2025 SCB Wedding. All rights reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>

<?php
$conn->close();
?>