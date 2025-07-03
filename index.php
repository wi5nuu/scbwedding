<?php
require 'config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SCB Wedding - Luxury wedding planning with elegant Bugis traditions and Indonesian cultural attires. Create your dream wedding with us.">
    <meta name="keywords" content="wedding planner, Bugis wedding, luxury wedding, Jakarta wedding, Indonesian traditional attire, SCB Wedding">
    <meta name="author" content="SCB Wedding">
    <title>SCB Wedding - Luxury Wedding Planning</title>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    
    <!-- Preload Resources -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" as="style">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" as="style">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" as="style">
    <link rel="preload" href="https://unpkg.com/swiper/swiper-bundle.min.css" as="style">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/ScrollTrigger.min.js"></script>
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <link href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-white text-gray-900 transition-colors duration-500">
    <!-- Header -->
    <header class="header-gradient shadow-lg fixed w-full top-0 z-40 transition-all duration-400" id="header">
        <nav class="container mx-auto px-6 lg:px-12 py-5 flex justify-between items-center">
            <div class="text-3xl lg:text-4xl font-playfair font-extrabold text-gold-accent logo" data-aos="fade-down">SCB Wedding</div>
            <div class="hidden md:flex space-x-6 lg:space-x-8 items-center">
                <a href="#home" class="nav-link text-lg font-playfair text-gray-800 hover:text-gold-accent transition-colors duration-300">Home</a>
                <a href="#about" class="nav-link text-lg font-playfair text-gray-800 hover:text-gold-accent transition-colors duration-300">About</a>
                <a href="#packages" class="nav-link text-lg font-playfair text-gray-800 hover:text-gold-accent transition-colors duration-300">Packages</a>
                <a href="#attires" class="nav-link text-lg font-playfair text-gray-800 hover:text-gold-accent transition-colors duration-300">Attires</a>
                <a href="#gallery" class="nav-link text-lg font-playfair text-gray-800 hover:text-gold-accent transition-colors duration-300">Gallery</a>
                <a href="#testimonials" class="nav-link text-lg font-playfair text-gray-800 hover:text-gold-accent transition-colors duration-300">Testimonials</a>
                <a href="#schedule" class="nav-link text-lg font-playfair text-gray-800 hover:text-gold-accent transition-colors duration-300">Schedule</a>
                <a href="#contact" class="nav-link text-lg font-playfair text-gray-800 hover:text-gold-accent transition-colors duration-300">Contact</a>
                <a href="admin/login.php" class="nav-link text-lg font-playfair text-gray-800 hover:text-gold-accent transition-colors duration-300">Admin</a>
                <!-- Music Toggle -->
                <button id="musicToggle" class="flex items-center justify-center w-8 h-8 rounded-full bg-gold-accent text-white focus:outline-none hover:bg-yellow-600 transition-all duration-300" aria-label="Toggle Music">
                    <svg id="playIcon" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.2A1 1 0 0010 9.768v4.464a1 1 0 001.555.832l3.197-2.2a1 1 0 000-1.664z" />
                    </svg>
                    <svg id="pauseIcon" class="h-4 w-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 4h4v16H6zm8 0h4v16h-4z" />
                    </svg>
                </button>
            </div>
            <button class="md:hidden focus:outline-none" id="menu-toggle" aria-label="Toggle Menu">
                <svg class="w-10 h-10 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </nav>
        <div class="fixed inset-y-0 right-0 w-full sm:w-80 bg-white shadow-2xl mobile-menu hidden z-50" id="mobile-menu">
            <div class="flex justify-end p-6">
                <button id="close-menu" class="focus:outline-none" aria-label="Close Menu">
                    <svg class="w-10 h-10 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="flex flex-col items-center space-y-8 py-10">
                <a href="#home" class="text-xl font-playfair text-gray-800 hover:text-gold-accent transition-colors duration-300">Home</a>
                <a href="#about" class="text-xl font-playfair text-gray-800 hover:text-gold-accent transition-colors duration-300">About</a>
                <a href="#packages" class="text-xl font-playfair text-gray-800 hover:text-gold-accent transition-colors duration-300">Packages</a>
                <a href="#attires" class="text-xl font-playfair text-gray-800 hover:text-gold-accent transition-colors duration-300">Attires</a>
                <a href="#gallery" class="text-xl font-playfair text-gray-800 hover:text-gold-accent transition-colors duration-300">Gallery</a>
                <a href="#testimonials" class="text-xl font-playfair text-gray-800 hover:text-gold-accent transition-colors duration-300">Testimonials</a>
                <a href="#schedule" class="text-xl font-playfair text-gray-800 hover:text-gold-accent transition-colors duration-300">Schedule</a>
                <a href="#contact" class="text-xl font-playfair text-gray-800 hover:text-gold-accent transition-colors duration-300">Contact</a>
                <a href="admin/login.php" class="text-xl font-playfair text-gray-800 hover:text-gold-accent transition-colors duration-300">Admin</a>
            </div>
        </div>
        <audio id="bgMusic" loop>
            <source src="assets/js/videoplayback.m4a" type="audio/mpeg">
        </audio>
    </header>
    <!-- Sticky Book Now Button (Mobile Only) -->
    <a href="#contact" class="md:hidden fixed bottom-6 right-6 bg-gold-accent text-white px-8 py-4 rounded-full shadow-2xl hover:bg-yellow-600 btn-primary z-50 text-lg font-semibold transition-all duration-300" aria-label="Book Now">Book Now</a>
<!-- Hero Section -->
<section id="home" class="relative h-screen bg-cover bg-center overflow-hidden" style="background-image: url('https://alexandra.bridestory.com/image/upload/blogs/adat-bugis-oleh-phiutografia-studio-LT-L-KC0g.jpg')">
    <div class="absolute inset-0 hero-overlay"></div>
    <div class="container mx-auto px-6 lg:px-12 h-full flex items-center">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 items-center w-full">
            <div class="relative h-80 lg:h-[500px]" data-aos="fade-right" data-aos-delay="200">
                <div class="swiper-container hero-swiper h-full w-full">
                    <div class="swiper-wrapper">
                        <!-- Slide 1 -->
                        <div class="swiper-slide">
                            <div class="h-full w-full bg-cover bg-center rounded-2xl shadow-2xl"
                                style="background-image: url('https://lookaside.fbsbx.com/lookaside/crawler/media/?media_id=5108821612479621')"></div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="swiper-slide">
                            <div class="h-full w-full bg-cover bg-center rounded-2xl shadow-2xl"
                                style="background-image: url('https://i.pinimg.com/originals/30/ee/a8/30eea8f0ea36a3ffef328bfc148d051a.jpg')"></div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="swiper-slide">
                            <div class="h-full w-full bg-cover bg-center rounded-2xl shadow-2xl"
                                style="background-image: url('https://static.cdntap.com/tap-assets-prod/wp-content/uploads/sites/24/2022/07/Sumber-Instagram-%40dhanzzproject-4.jpg')"></div>
                        </div>
                        <!-- Slide 4 -->
                        <div class="swiper-slide">
                            <div class="h-full w-full bg-cover bg-center rounded-2xl shadow-2xl"
                                style="background-image: url('https://image.idntimes.com/post/20180926/3e0a5fb0414f01a9a98f99e940a6bdf4.jpg')"></div>
                        </div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <div class="text-center lg:text-left text-white relative z-10" data-aos="fade-left" data-aos-delay="400">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-playfair font-extrabold mb-6 leading-tight tracking-tight">
                    Your Dream Day <span class="gradient-text">Unfolds Here</span>
                </h1>
                <p class="text-lg sm:text-xl lg:text-2xl mb-8 leading-relaxed font-poppins font-light">
                    Celebrate your love with our bespoke wedding planning, blending Indonesia's rich traditions with timeless elegance.
                </p>
                <div class="flex justify-center lg:justify-start space-x-4">
                    <a href="#contact" class="inline-block bg-gold-accent text-white px-8 py-4 rounded-full text-lg font-semibold btn-primary shadow-xl hover-scale">Book Now</a>
                    <a href="#packages" class="inline-block bg-transparent border-2 border-gold-accent text-gold-accent px-8 py-4 rounded-full text-lg font-semibold hover:bg-gold-accent hover:text-white transition-all duration-300 hover-scale">Explore Packages</a>
                </div>
            </div>
        </div>
    </div>
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-10 animate-pulse" data-aos="fade-in" data-aos-delay="800">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gold-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
        </svg>
    </div>
</section>
<!-- About Section -->
<section id="about" class="py-16 lg:py-20 section-bg">
    <div class="container mx-auto px-6 lg:px-12">
        <h2 class="text-4xl lg:text-5xl font-playfair font-extrabold gold-accent text-center mb-12" data-aos="fade-up">About SCB Wedding</h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div data-aos="fade-right" data-aos-delay="200">
                <p class="text-gray-600 mb-6 font-poppins text-lg">SCB Wedding is dedicated to creating unforgettable weddings that blend luxury with the rich cultural heritage of Indonesia, particularly the elegant Bugis traditions. Our team of expert planners ensures every detail is meticulously crafted to make your day truly special.</p>
                <p class="text-gray-600 mb-6 font-poppins text-lg">With over a decade of experience, we have built a reputation for excellence, trust, and personalized service. Let us turn your vision into reality.</p>
                <a href="#contact" class="inline-block bg-gold-accent text-white px-6 py-3 rounded-full text-lg font-semibold btn-primary hover-scale">Get Started</a>
            </div>
            <div class="swiper-container about-swiper" data-aos="fade-left" data-aos-delay="400">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="https://weddingmarket.com/storage/images/artikelidea/3b3eb71de91d755c1fd7a519cf70c4156c8071d0.webp" alt="Dekorasi Pernikahan Bugis 1" class="w-full h-80 object-cover rounded-2xl shadow-xl lazy hover-scale" loading="lazy">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://i.ytimg.com/vi/cMqrTjm7gAQ/maxresdefault.jpg" alt="Dekorasi Pernikahan Bugis 2" class="w-full h-80 object-cover rounded-2xl shadow-xl lazy hover-scale" loading="lazy">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://lookaside.fbsbx.com/lookaside/crawler/media/?media_id=1516882251801530" alt="Dekorasi Pernikahan Bugis 3" class="w-full h-80 object-cover rounded-2xl shadow-xl lazy hover-scale" loading="lazy">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://lookaside.instagram.com/seo/google_widget/crawler/?media_id=3474406605679709118" alt="Dekorasi Pernikahan Bugis 4" class="w-full h-80 object-cover rounded-2xl shadow-xl lazy hover-scale" loading="lazy">
                    </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
</section>
    <!-- Packages Section -->
    <section id="packages" class="py-16 lg:py-20 section-bg">
        <div class="container mx-auto px-6 lg:px-12">
            <h2 class="text-4xl lg:text-5xl font-playfair font-extrabold gold-accent text-center mb-12" data-aos="fade-up">Our Exclusive Packages</h2>
            <div class="swiper-container packages-swiper">
                <div class="swiper-wrapper">
                    <?php
                    try {
                        $stmt = $conn->prepare("SELECT * FROM packages WHERE is_featured = ?");
                        $is_featured = 1;
                        $stmt->bind_param("i", $is_featured);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while ($row = $result->fetch_assoc()) {
                            echo '
                            <div class="swiper-slide">
                                <div class="bg-white rounded-2xl shadow-xl p-6 card w-80 mx-2 hover-scale luxury-border">
                                    <h3 class="text-xl lg:text-2xl font-playfair font-extrabold gold-accent mb-3">' . htmlspecialchars($row['package_name']) . '</h3>
                                    <p class="text-gray-600 mb-4 font-poppins text-sm">' . htmlspecialchars($row['package_description']) . '</p>
                                    <p class="text-lg font-bold text-gray-800 mb-3">Rp ' . number_format($row['price'], 2) . '</p>
                                    <p class="text-gray-500 mb-4 text-sm">Duration: ' . $row['duration_hours'] . ' hours</p>
                                    <a href="#contact" class="inline-block bg-gold-accent text-white px-5 py-2 rounded-full text-sm font-semibold btn-primary hover-scale">Book Now</a>
                                </div>
                            </div>';
                        }
                        $stmt->close();
                    } catch (Exception $e) {
                        echo "<p class='text-red-500 text-center font-poppins'>Error fetching packages: " . htmlspecialchars($e->getMessage()) . "</p>";
                        error_log("Packages error: " . $e->getMessage(), 3, "logs/errors.log");
                    }
                    ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>
    <!-- Attires Section -->
    <section id="attires" class="py-16 lg:py-20">
        <div class="container mx-auto px-6 lg:px-12">
            <h2 class="text-4xl lg:text-5xl font-playfair font-extrabold gold-accent text-center mb-12" data-aos="fade-up">Our Signature Attires</h2>
            <div class="flex justify-center mb-8" data-aos="fade-up" data-aos-delay="200">
                <div class="relative w-full max-w-md">
                    <input type="text" id="attireSearch" placeholder="Search by culture (e.g., Javanese, Bugis)" class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-gold-accent font-poppins">
                    <svg class="absolute right-3 top-3 h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
            <div class="swiper-container attires-swiper">
                <div class="swiper-wrapper">
                    <?php
                    $indonesian_attires = [
                        ['name' => 'Baju Bodo', 'ethnicity' => 'Bugis', 'description' => 'Traditional Bugis attire with vibrant colors.', 'price_per_day' => 1500000, 'image_path' => 'https://www.undangankami.com/wp-content/uploads/2022/08/bugis2.jpeg'],
                        ['name' => 'Kebaya', 'ethnicity' => 'Javanese', 'description' => 'Elegant Javanese kebaya with intricate embroidery.', 'price_per_day' => 1200000, 'image_path' => 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80'],
                        ['name' => 'Ulos', 'ethnicity' => 'Batak', 'description' => 'Traditional Batak woven fabric.', 'price_per_day' => 1000000, 'image_path' => 'https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80'],
                        ['name' => 'Baju Kurung', 'ethnicity' => 'Malay', 'description' => 'Graceful Malay attire with modern elegance.', 'price_per_day' => 1300000, 'image_path' => 'https://images.unsplash.com/photo-1571167366136-b57e03679b1b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80'],
                        ['name' => 'Songket', 'ethnicity' => 'Minangkabau', 'description' => 'Luxurious woven fabric with gold threads.', 'price_per_day' => 1400000, 'image_path' => 'https://images.unsplash.com/photo-1564142375170-6e3e7e3c7636?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80'],
                    ];
                    foreach ($indonesian_attires as $attire) {
                        echo '
                        <div class="swiper-slide attire-card" data-ethnicity="' . htmlspecialchars($attire['ethnicity']) . '">
                            <div class="bg-white rounded-2xl shadow-xl p-6 card w-80 mx-2 hover-scale luxury-border">
                                <a href="' . htmlspecialchars($attire['image_path']) . '" data-lightbox="attires" data-title="' . htmlspecialchars($attire['name']) . '">
                                    <img src="' . htmlspecialchars($attire['image_path']) . '" alt="' . htmlspecialchars($attire['name']) . '" class="w-full h-48 object-cover rounded-lg mb-4 lazy hover-scale" loading="lazy">
                                </a>
                                <h3 class="text-xl font-playfair font-extrabold gold-accent mb-3">' . htmlspecialchars($attire['name']) . '</h3>
                                <p class="text-gray-600 mb-3 text-sm">Ethnicity: ' . htmlspecialchars($attire['ethnicity']) . '</p>
                                <p class="text-gray-600 mb-4 text-sm font-poppins">' . htmlspecialchars($attire['description']) . '</p>
                                <p class="text-lg font-bold text-gray-800 mb-4">Rp ' . number_format($attire['price_per_day'], 2) . '/day</p>
                            </div>
                        </div>';
                    }
                    ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>
    <!-- Gallery Section -->
    <section id="gallery" class="py-16 lg:py-20 bg-fixed bg-cover bg-center relative" style="background-image: url('https://images.unsplash.com/photo-1519225421980-715cb0215aed?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80')">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <div class="container mx-auto px-6 lg:px-12 relative">
            <h2 class="text-4xl lg:text-5xl font-playfair font-extrabold gold-accent text-center mb-12 text-white" data-aos="fade-up">Our Stunning Gallery</h2>
            <div class="swiper-container gallery-swiper">
                <div class="swiper-wrapper">
                    <?php
                    $gallery_images = [
                        ['image_path' => 'https://www.undangankami.com/wp-content/uploads/2022/08/bugis2.jpeg', 'caption' => 'Bugis Wedding Ceremony'],
                        ['image_path' => 'https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80', 'caption' => 'Javanese Bride Elegance'],
                        ['image_path' => 'https://images.unsplash.com/photo-1571167366136-b57e03679b1b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80', 'caption' => 'Traditional Wedding Decor'],
                        ['image_path' => 'https://images.unsplash.com/photo-1564142375170-6e3e7e3c7636?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80', 'caption' => 'Romantic Reception Moment'],
                        ['image_path' => 'https://images.unsplash.com/photo-1519741497674-4113f16de913?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80', 'caption' => 'Elegant Bridal Portrait'],
                    ];
                    foreach ($gallery_images as $image) {
                        echo '
                        <div class="swiper-slide">
                            <div class="relative card w-80 mx-auto hover-scale">
                                <a href="' . htmlspecialchars($image['image_path']) . '" data-lightbox="gallery" data-title="' . htmlspecialchars($image['caption']) . '">
                                    <img src="' . htmlspecialchars($image['image_path']) . '" alt="' . htmlspecialchars($image['caption']) . '" class="w-full h-48 object-cover rounded-lg lazy">
                                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300">
                                        <p class="text-white text-center font-poppins text-sm">' . htmlspecialchars($image['caption']) . '</p>
                                    </div>
                                </a>
                            </div>
                        </div>';
                    }
                    ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- Testimonials Section -->
    <section id="testimonials" class="py-16 lg:py-20 bg-fixed bg-cover bg-center relative" style="background-image: url('https://images.unsplash.com/photo-1519225421980-715cb0215aed?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80')">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <div class="container mx-auto px-6 lg:px-12 relative">
            <h2 class="text-4xl lg:text-5xl font-playfair font-extrabold gold-accent text-center mb-12 text-white" data-aos="fade-up">What Our Clients Say</h2>
            <div class="swiper-container testimonials-swiper">
                <div class="swiper-wrapper">
                    <?php
                    try {
                        $stmt = $conn->prepare("SELECT * FROM testimonials WHERE is_approved = ?");
                        $is_approved = 1;
                        $stmt->bind_param("i", $is_approved);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while ($row = $result->fetch_assoc()) {
                            echo '
                            <div class="swiper-slide">
                                <div class="bg-white rounded-2xl shadow-xl p-6 text-center card w-80 mx-auto hover-scale luxury-border">
                                    <p class="text-gray-600 italic mb-4 font-poppins text-sm">" ' . htmlspecialchars($row['content']) . ' "</p>
                                    <h4 class="text-lg font-playfair font-extrabold gold-accent mb-2">' . htmlspecialchars($row['client_name']) . '</h4>
                                    <p class="text-gray-500 mb-3 text-sm">' . date('F j, Y', strtotime($row['wedding_date'])) . '</p>
                                    <p class="text-gold-accent text-lg">' . str_repeat('★', $row['rating']) . str_repeat('☆', 5 - $row['rating']) . '</p>
                                </div>
                            </div>';
                        }
                        $stmt->close();
                    } catch (Exception $e) {
                        echo "<p class='text-red-500 text-center font-poppins'>Error fetching testimonials: " . htmlspecialchars($e->getMessage()) . "</p>";
                        error_log("Testimonials error: " . $e->getMessage(), 3, "logs/errors.log");
                    }
                    ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
<!-- Schedule Section -->
<section id="schedule" class="py-16 lg:py-20 section-bg">
    <div class="container mx-auto px-6 lg:px-12">
        <h2 class="text-4xl lg:text-5xl font-playfair font-extrabold gold-accent text-center mb-12" data-aos="fade-up">Booking Schedule</h2>

        <!-- Month & Year Filter -->
        <div class="flex justify-center mb-10 space-x-4">
            <select id="monthFilter" class="px-5 py-2 bg-white border-2 border-gold-accent rounded-lg focus:ring-2 focus:ring-gold-accent font-poppins text-sm text-gray-700 shadow-md">
                <?php
                $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                foreach ($months as $index => $month) {
                    $selected = (date('n') == ($index + 1)) ? 'selected' : '';
                    echo '<option value="' . ($index + 1) . '" ' . $selected . '>' . $month . '</option>';
                }
                ?>
            </select>

            <select id="yearFilter" class="px-5 py-2 bg-white border-2 border-gold-accent rounded-lg focus:ring-2 focus:ring-gold-accent font-poppins text-sm text-gray-700 shadow-md">
                <?php
                $currentYear = date('Y');
                for ($year = $currentYear; $year <= $currentYear + 2; $year++) {
                    $selected = ($year == $currentYear) ? 'selected' : '';
                    echo '<option value="' . $year . '" ' . $selected . '>' . $year . '</option>';
                }
                ?>
            </select>
        </div>

        <!-- Calendar Grid -->
        <div id="calendar" class="grid grid-cols-7 gap-3 text-center font-poppins text-sm sm:text-base min-h-[250px]" data-aos="fade-up" data-aos-delay="300">
            <p class="col-span-7 text-center text-gray-400 italic">Loading schedule...</p>
        </div>

        <!-- Legend -->
        <div class="mt-8 text-center text-sm font-poppins text-gray-600 flex items-center justify-center gap-6 flex-wrap">
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-cream rounded-sm border border-gray-300"></div>
                <span>Available</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-red-500 rounded-sm border border-gray-300"></div>
                <span>Booked</span>
            </div>
        </div>
    </div>
</section>
<style>
    .bg-cream {
        background-color: #fdf4e3; /* Soft cream for available */
    }

    #calendar .day {
        padding: 12px;
        border-radius: 0.5rem;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    #calendar .available {
        background-color: #fdf4e3;
    }

    #calendar .available:hover {
        background-color: #e2b842;
        color: white;
    }

    #calendar .booked {
        background-color: #ef4444;
        color: white;
        position: relative;
    }

    #calendar .booked:hover::after {
        content: attr(data-tooltip);
        position: absolute;
        bottom: 110%;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(0, 0, 0, 0.85);
        color: white;
        padding: 6px 10px;
        border-radius: 5px;
        font-size: 12px;
        white-space: nowrap;
        z-index: 50;
    }
</style>
    <!-- Contact Modal -->
    <div id="contactModal" class="fixed inset-0 bg-black bg-opacity-60 hidden flex items-center justify-center z-50">
        <div class="bg-white rounded-2xl p-4 max-w-[320px] w-[90%] modal-content" id="modalContent">
            <h3 class="text-lg font-playfair font-extrabold gold-accent mb-4">Book Your Appointment</h3>
            <form action="booking.php" method="POST" id="bookingForm">
                <div class="mb-3">
                    <label for="client_name" class="block text-gray-700 font-poppins text-xs mb-1">Name</label>
                    <input type="text" id="client_name" name="client_name" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-gold-accent text-sm" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="block text-gray-700 font-poppins text-xs mb-1">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-gold-accent text-sm" required>
                    <p class="error-message">Please enter a valid email address.</p>
                </div>
                <div class="mb-3">
                    <label for="phone" class="block text-gray-700 font-poppins text-xs mb-1">Phone</label>
                    <input type="text" id="phone" name="phone" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-gold-accent text-sm" required>
                </div>
                <div class="mb-3">
                    <label for="event_date" class="block text-gray-700 font-poppins text-xs mb-1">Event Date</label>
                    <input type="date" id="event_date" name="event_date" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-gold-accent text-sm" required>
                    <p class="error-message">This date is already booked. Please select another date.</p>
                </div>
                <div class="mb-3">
                    <label for="event_type" class="block text-gray-700 font-poppins text-xs mb-1">Event Type</label>
                    <select id="event_type" name="event_type" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-gold-accent text-sm" required>
                        <option value="Wedding">Wedding</option>
                        <option value="Engagement">Engagement</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="package_id" class="block text-gray-700 font-poppins text-xs mb-1">Package</label>
                    <select id="package_id" name="package_id" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-gold-accent text-sm" required>
                        <?php
                        $stmt = $conn->prepare("SELECT package_id, package_name FROM packages");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['package_id'] . '">' . htmlspecialchars($row['package_name']) . '</option>';
                        }
                        $stmt->close();
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="custom_request" class="block text-gray-700 font-poppins text-xs mb-1">Custom Request</label>
                    <textarea id="custom_request" name="custom_request" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-gold-accent text-sm" rows="3"></textarea>
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" class="px-4 py-1.5 border rounded-lg text-gray-700 hover:bg-gray-100 font-poppins text-xs hover-scale" onclick="closeModal()">Cancel</button>
                    <button type="submit" class="bg-gold-accent text-white px-4 py-1.5 rounded-lg font-poppins text-xs btn-primary hover-scale">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Footer -->
    <footer class="bg-gradient-to-b from-gray-900 to-black text-white py-20">
        <div class="container mx-auto px-6 lg:px-12">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12">
                <div data-aos="fade-up">
                    <h3 class="text-3xl font-playfair font-extrabold text-gold-accent mb-6">SCB Wedding</h3>
                    <p class="text-gray-300 font-poppins text-base mb-4">Crafting timeless weddings with Indonesia's rich cultural heritage.</p>
                    <p class="text-gray-400 font-poppins text-sm mb-2">Jalan Duren No. 31, Semper Barat, Jakarta Utara, Indonesia 14130</p>
                    <p class="text-gray-400 font-poppins text-sm mb-2">Email: <a href="mailto:info@scbwedding.com" class="hover:text-gold-accent">info@scbwedding.com</a></p>
                    <p class="text-gray-400 font-poppins text-sm">Phone: <a href="tel:+621234567890" class="hover:text-gold-accent">+62 123 456 7890</a></p>
                </div>
                <div data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-2xl font-playfair font-extrabold text-gold-accent mb-6">Our Services</h3>
                    <ul class="space-y-4 text-gray-300 font-poppins text-base">
                        <li><a href="#packages" class="hover:text-gold-accent">Luxury Wedding Packages</a></li>
                        <li><a href="#attires" class="hover:text-gold-accent">Traditional Attires</a></li>
                        <li><a href="#schedule" class="hover:text-gold-accent">Booking Schedule</a></li>
                        <li><a href="#contact" class="hover:text-gold-accent">Contact Us</a></li>
                    </ul>
                </div>
                <div data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-2xl font-playfair font-extrabold text-gold-accent mb-6">Quick Links</h3>
                    <ul class="space-y-4 text-gray-300 font-poppins text-base">
                        <li><a href="#about" class="hover:text-gold-accent">About Us</a></li>
                        <li><a href="#gallery" class="hover:text-gold-accent">Gallery</a></li>
                        <li><a href="#testimonials" class="hover:text-gold-accent">Testimonials</a></li>
                        <li><a href="#contact" class="hover:text-gold-accent">Contact Us</a></li>
                    </ul>
                </div>
                <div data-aos="fade-up" data-aos-delay="300">
                    <h3 class="text-2xl font-playfair font-extrabold text-gold-accent mb-6">Connect With Us</h3>
                    <div class="flex space-x-6 mb-8">
                        <a href="https://facebook.com/scbwedding" target="_blank" class="hover:text-gold-accent"><svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.04c-5.5 0-10 4.5-10 10 0 4.41 3.58 8.04 8 8.93v-6.34h-2.4v-2.59h2.4v-1.98c0-2.37 1.44-3.67 3.55-3.67 1.01 0 1.88.07 2.13.1v2.47h-1.46c-1.14 0-1.36.54-1.36 1.33v1.74h2.72l-.35 2.59h-2.37v6.34c4.42-.89 8-4.52 8-8.93 0-5.5-4.5-10-10-10z"/></svg></a>
                        <a href="https://instagram.com/scbwedding" target="_blank" class="hover:text-gold-accent"><svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.16c3.2 0 3.58.01 4.85.07 1.17.06 1.81.25 2.23.42.56.22.96.49 1.38.91.42.42.69.82.91 1.38.17.42.36 1.06.42 2.23.06 1.27.07 1.65.07 4.85s-.01 3.58-.07 4.85c-.06 1.17-.25 1.81-.42 2.23-.22.56-.49.96-.91 1.38-.42.42-.82.69-1.38.91-.42.17-1.06.36-2.23.42-1.27.06-1.65.07-4.85.07s-3.58-.01-4.85-.07c-1.17-.06-1.81-.25-2.23-.42-.56-.22-.96-.49-1.38-.91-.42-.42-.69-.82-.91-1.38-.17-.42-.36-1.06-.42-2.23-.06-1.27-.07-1.65-.07-4.85s.01-3.58.07-4.85c.06-1.17.25-1.81.42-2.23.22-.56.49-.96.91-1.38.42-.42.82-.69 1.38-.91.42-.17 1.06-.36 2.23-.42 1.27-.06 1.65-.07 4.85-.07z"/></svg></a>
                        <a href="https://x.com/scbwedding" target="_blank" class="hover:text-gold-accent"><svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M22.46 6c-.77.34-1.6.57-2.46.67 1.46-.87 2.58-2.25 3.1-3.89-.68.4-1.43.69-2.23.85-.64-.68-1.55-1.1-2.56-1.1-1.94 0-3.51 1.57-3.51 3.51 0 .27.03.54.09.8-2.92-.15-5.51-1.55-7.24-3.68-.3.52-.48 1.12-.48 1.76 0 1.22.62 2.3 1.56 2.93-.58-.02-1.12-.18-1.6-.44v.04c0 1.7 1.21 3.12 2.82 3.44-.3.08-.61.13-.94.13-.23 0-.45-.02-.67-.06.45 1.41 1.76 2.44 3.31 2.47-1.21.96-2.74 1.54-4.4 1.54-.29 0-.57-.02-.85-.06 1.58 1.01 3.46 1.6 5.48 1.6 6.57 0 10.16-5.44 10.16-10.16 0-.15 0-.31-.01-.46.7-.51 1.31-1.15 1.79-1.88z"/></svg></a>
                    </div>
                    <h3 class="text-2xl font-playfair font-extrabold text-gold-accent mb-4">Stay Updated</h3>
                    <div class="flex">
                        <input type="email" placeholder="Enter your email" class="w-full px-4 py-3 text-gray-900 bg-white rounded-l-lg focus:outline-none focus:ring-2 focus:ring-gold-accent font-poppins">
                        <button class="px-6 py-3 bg-gold-accent text-white font-semibold rounded-r-lg hover:bg-yellow-500 font-poppins hover-scale">Subscribe</button>
                    </div>
                </div>
            </div>
            <div class="mt-16 pt-10 border-t border-gray-800 text-center text-gray-400" data-aos="fade-up" data-aos-delay="400">
                <p class="text-sm font-poppins">© 2025 SCB Wedding. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Initialize AOS
        AOS.init({ duration: 1000, once: true, easing: 'ease-out-cubic' });

        // Initialize Swiper Carousels with Autoplay
        const heroSwiper = new Swiper('.hero-swiper', {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            autoplay: { delay: 3000, disableOnInteraction: false },
            navigation: { nextEl: '.hero-swiper .swiper-button-next', prevEl: '.hero-swiper .swiper-button-prev' },
        });

        const packagesSwiper = new Swiper('.packages-swiper', {
            slidesPerView: 1,
            spaceBetween: 16,
            loop: true,
            autoplay: { delay: 4000, disableOnInteraction: false },
            navigation: { nextEl: '.packages-swiper .swiper-button-next', prevEl: '.packages-swiper .swiper-button-prev' },
            breakpoints: { 640: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } }
        });

        const attiresSwiper = new Swiper('.attires-swiper', {
            slidesPerView: 1,
            spaceBetween: 16,
            loop: true,
            autoplay: { delay: 4000, disableOnInteraction: false },
            navigation: { nextEl: '.attires-swiper .swiper-button-next', prevEl: '.attires-swiper .swiper-button-prev' },
            breakpoints: { 640: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } }
        });

        const gallerySwiper = new Swiper('.gallery-swiper', {
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            speed: 800,
            slidesPerView: 1,
            spaceBetween: 20,
            pagination: {
                el: '.gallery-swiper .swiper-pagination',
                clickable: true,
                bulletClass: 'swiper-pagination-bullet',
                bulletActiveClass: 'swiper-pagination-bullet-active',
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true,
            },
        });

        const testimonialsSwiper = new Swiper('.testimonials-swiper', {
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            speed: 800,
            slidesPerView: 1,
            spaceBetween: 20,
            pagination: {
                el: '.testimonials-swiper .swiper-pagination',
                clickable: true,
                bulletClass: 'swiper-pagination-bullet',
                bulletActiveClass: 'swiper-pagination-bullet-active',
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true,
            },
        });

        const aboutSwiper = new Swiper('.about-swiper', {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            autoplay: { delay: 3000, disableOnInteraction: false },
            navigation: { nextEl: '.about-swiper .swiper-button-next', prevEl: '.about-swiper .swiper-button-prev' },
        });

        // Mobile Menu Toggle
        const menuToggle = document.getElementById('menu-toggle');
        const closeMenu = document.getElementById('close-menu');
        const mobileMenu = document.getElementById('mobile-menu');
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.remove('hidden');
            mobileMenu.classList.add('open');
            gsap.to(mobileMenu, { x: 0, duration: 0.5, ease: 'power2.out' });
        });
        closeMenu.addEventListener('click', () => {
            mobileMenu.classList.remove('open');
            gsap.to(mobileMenu, { x: '100%', duration: 0.5, ease: 'power2.in', onComplete: () => mobileMenu.classList.add('hidden') });
        });

        // Music Toggle
        const musicToggle = document.getElementById('musicToggle');
        const bgMusic = document.getElementById('bgMusic');
        const playIcon = document.getElementById('playIcon');
        const pauseIcon = document.getElementById('pauseIcon');
        musicToggle.addEventListener('click', () => {
            if (bgMusic.paused) {
                bgMusic.play();
                playIcon.classList.add('hidden');
                pauseIcon.classList.remove('hidden');
                gsap.to(musicToggle, { scale: 1.1, duration: 0.3, ease: 'bounce.out' });
            } else {
                bgMusic.pause();
                playIcon.classList.remove('hidden');
                pauseIcon.classList.add('hidden');
                gsap.to(musicToggle, { scale: 1, duration: 0.3, ease: 'bounce.out' });
            }
        });

        // Modal Functionality
        function openModal() {
            const modal = document.getElementById('contactModal');
            const modalContent = document.getElementById('modalContent');
            modal.classList.remove('hidden');
            modalContent.classList.add('open');
            gsap.to(modalContent, { scale: 1, duration: 0.4, ease: 'back.out(1.7)' });
        }

        function closeModal() {
            const modal = document.getElementById('contactModal');
            const modalContent = document.getElementById('modalContent');
            gsap.to(modalContent, { scale: 0, duration: 0.3, ease: 'back.in(1.7)', onComplete: () => {
                modal.classList.add('hidden');
                modalContent.classList.remove('open');
            } });
        }

        // Form Validation and Calendar Integration
        document.addEventListener('DOMContentLoaded', function () {
            // Show success/error messages from session
            <?php
            if (isset($_SESSION['booking_success'])) {
                echo "alert('" . addslashes($_SESSION['booking_success']) . "');";
                unset($_SESSION['booking_success']);
            }
            if (isset($_SESSION['booking_error'])) {
                echo "alert('" . addslashes($_SESSION['booking_error']) . "');";
                unset($_SESSION['booking_error']);
            }
            ?>

            // Fetch booked dates from server
            function fetchBookedDates(year, month) {
                $.ajax({
                    url: 'get_bookings.php',
                    method: 'GET',
                    data: { year: year, month: month },
                    dataType: 'json',
                    success: function (data) {
                        renderCalendar(year, month, data);
                    },
                    error: function () {
                        console.error('Failed to fetch bookings');
                        alert('Error loading calendar. Please try again.');
                    }
                });
            }

            // Render calendar
            function renderCalendar(year, month, bookings) {
                const calendar = document.getElementById('calendar');
                calendar.innerHTML = '';

                // Add day headers
                const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                days.forEach(day => {
                    const div = document.createElement('div');
                    div.className = 'day-header';
                    div.textContent = day;
                    calendar.appendChild(div);
                });

                // Get first day and number of days in month
                const firstDay = new Date(year, month - 1, 1).getDay();
                const daysInMonth = new Date(year, month, 0).getDate();
                const today = new Date();
                today.setHours(0, 0, 0, 0);

                // Add empty cells for days before the first day
                for (let i = 0; i < firstDay; i++) {
                    const div = document.createElement('div');
                    div.className = 'disabled';
                    calendar.appendChild(div);
                }

                // Add days
                for (let day = 1; day <= daysInMonth; day++) {
                    const date = new Date(year, month - 1, day);
                    const dateStr = `${year}-${String(month).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                    const div = document.createElement('div');
                    const booking = bookings.find(b => b.event_date === dateStr);

                    if (booking) {
                        div.className = 'booked';
                        div.setAttribute('data-tooltip', `${booking.client_name} - ${booking.event_type}`);
                    } else if (date < today) {
                        div.className = 'disabled';
                    } else {
                        div.className = 'available';
                        div.addEventListener('click', function () {
                            document.getElementById('event_date').value = dateStr;
                            openModal();
                        });
                    }

                    div.textContent = day;
                    calendar.appendChild(div);
                }
            }

            // Initialize calendar with current month and year
            const currentDate = new Date();
            let currentYear = currentDate.getFullYear();
            let currentMonth = currentDate.getMonth() + 1;
            fetchBookedDates(currentYear, currentMonth);

            // Handle month/year filter change
            document.getElementById('monthFilter').addEventListener('change', function () {
                currentMonth = parseInt(this.value);
                fetchBookedDates(currentYear, currentMonth);
            });

            document.getElementById('yearFilter').addEventListener('change', function () {
                currentYear = parseInt(this.value);
                fetchBookedDates(currentYear, currentMonth);
            });

            // Form validation
            document.getElementById('bookingForm').addEventListener('submit', function (e) {
                e.preventDefault();
                const email = document.getElementById('email').value;
                const phone = document.getElementById('phone').value;
                const eventDate = document.getElementById('event_date').value;

                // Validate email format
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    document.getElementById('email').parentElement.classList.add('error');
                    return;
                } else {
                    document.getElementById('email').parentElement.classList.remove('error');
                }

                // Validate phone format
                const phoneRegex = /^\+?[1-9]\d{1,14}$/;
                if (!phoneRegex.test(phone)) {
                    document.getElementById('phone').parentElement.classList.add('error');
                    return;
                } else {
                    document.getElementById('phone').parentElement.classList.remove('error');
                }

                // Check date availability
                $.ajax({
                    url: 'check_date.php',
                    method: 'POST',
                    data: { event_date: eventDate },
                    dataType: 'json',
                    success: function (response) {
                        if (response.booked) {
                            document.getElementById('event_date').parentElement.classList.add('error');
                        } else {
                            document.getElementById('event_date').parentElement.classList.remove('error');
                            document.getElementById('bookingForm').submit();
                        }
                    },
                    error: function () {
                        alert('Error checking date availability. Please try again.');
                    }
                });
            });
        });

        // Google Maps
        function initMap() {
            const location = { lat: -6.1286, lng: 106.8456 }; // Coordinates for Jalan Duren No. 31, Jakarta Utara
            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: location
            });
            new google.maps.Marker({ position: location, map: map, title: 'SCB Wedding' });
        }

        // AI Assistant Chat
        const chatMessages = document.getElementById('chatMessages');
        const chatInput = document.getElementById('chatInput');
        const sendChat = document.getElementById('sendChat');

        // AI Responses
        const aiResponses = {
            "hello": "Hello! I'm SCB Wedding Assistant. How can I help you with your wedding planning today?",
            "hi": "Hi there! How can I assist you with your dream wedding?",
            "packages": "We offer several wedding packages starting from Rp 10,000,000. Our most popular package is the 'Royal Bugis Wedding' which includes traditional Bugis attire, venue decoration, and full catering for 200 guests. Would you like more details?",
            "price": "Our wedding packages range from Rp 10,000,000 to Rp 50,000,000 depending on the size and requirements. The average couple spends about Rp 25,000,000 for a complete traditional wedding experience.",
            "availability": "Please check our booking calendar for available dates. We typically book 6-12 months in advance for weekend dates. Would you like me to check availability for a specific month?",
            "contact": "You can reach us at +62 123 456 7890 or email us at info@scbwedding.com. Our office is open Monday-Saturday from 9AM to 5PM.",
            "attire": "We offer traditional Indonesian wedding attires including Bugis, Javanese, and Balinese styles. Our most popular is the Baju Bodo from South Sulawesi with its vibrant colors. Would you like to see some examples?",
            "thanks": "You're welcome! Is there anything else I can help you with regarding your wedding plans?",
            "default": "Thank you for your question! Our wedding specialists can provide more detailed information. Would you like me to connect you with one of our planners?"
        };

        // Function to get AI response
        function getAIResponse(message) {
            const lowerMsg = message.toLowerCase();
            for (const [key, response] of Object.entries(aiResponses)) {
                if (lowerMsg.includes(key)) {
                    return response;
                }
            }
            return aiResponses['default'];
        }

        // Send message function
        function sendMessage() {
            const message = chatInput.value.trim();
            if (message) {
                // Add user message
                const userMsg = document.createElement('div');
                userMsg.className = 'chat-message user-message';
                userMsg.textContent = message;
                chatMessages.appendChild(userMsg);

                // Simulate typing indicator
                const typingIndicator = document.createElement('div');
                typingIndicator.className = 'chat-message ai-message ai-response';
                typingIndicator.textContent = '...';
                chatMessages.appendChild(typingIndicator);
                chatMessages.scrollTop = chatMessages.scrollHeight;

                // Simulate AI thinking
                setTimeout(() => {
                    typingIndicator.remove();
                    
                    // Add AI response
                    const aiResponse = getAIResponse(message);
                    const aiMsg = document.createElement('div');
                    aiMsg.className = 'chat-message ai-message ai-response';
                    aiMsg.textContent = aiResponse;
                    chatMessages.appendChild(aiMsg);
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }, 1000);

                chatInput.value = '';
            }
        }

        // Send message on button click
        sendChat.addEventListener('click', sendMessage);

        // Send message on Enter key
        chatInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });

        // Smooth Scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({ behavior: 'smooth' });
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.remove('open');
                    gsap.to(mobileMenu, { x: '100%', duration: 0.5, ease: 'power2.in', onComplete: () => mobileMenu.classList.add('hidden') });
                }
            });
        });

        // Header Scroll Effect
        window.addEventListener('scroll', () => {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('header-scrolled');
            } else {
                header.classList.remove('header-scrolled');
            }
        });

        // Attire Search
        const attireSearch = document.getElementById('attireSearch');
        attireSearch.addEventListener('input', () => {
            const searchValue = attireSearch.value.toLowerCase();
            const attireCards = document.querySelectorAll('.attire-card');
            attireCards.forEach(card => {
                const ethnicity = card.getAttribute('data-ethnicity').toLowerCase();
                card.style.display = searchValue === '' || ethnicity.includes(searchValue) ? 'block' : 'none';
            });
            attiresSwiper.update();
        });

        // Lazy loading images
        document.addEventListener("DOMContentLoaded", function() {
            const lazyImages = document.querySelectorAll("img.lazy");
            
            const imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const lazyImage = entry.target;
                        lazyImage.src = lazyImage.dataset.src || lazyImage.src;
                        lazyImage.classList.remove("lazy");
                        imageObserver.unobserve(lazyImage);
                    }
                });
            });

            lazyImages.forEach(function(lazyImage) {
                imageObserver.observe(lazyImage);
            });
        });
    </script>
</body>
</html>

<?php
$conn->close();
?>