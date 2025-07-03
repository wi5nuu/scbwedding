<?php
require 'config.php';

// Cek apakah autoload.php ada
if (!file_exists('vendor/autoload.php')) {
    die("Error: PHPMailer autoload file not found. Please run 'composer require phpmailer/phpmailer' in the project directory.");
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Pastikan request adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitasi input
    $client_name = filter_input(INPUT_POST, 'client_name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $event_date = filter_input(INPUT_POST, 'event_date', FILTER_SANITIZE_STRING);
    $event_type = filter_input(INPUT_POST, 'event_type', FILTER_SANITIZE_STRING);
    $package_id = filter_input(INPUT_POST, 'package_id', FILTER_SANITIZE_NUMBER_INT);
    $custom_request = filter_input(INPUT_POST, 'custom_request', FILTER_SANITIZE_STRING);

    // Validasi input
    if (!$client_name || !$email || !$phone || !$event_date || !$event_type || !$package_id) {
        echo "<script>alert('All required fields must be filled.'); window.location.href='index.php#contact';</script>";
        exit;
    }

    // Validasi format email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.'); window.location.href='index.php#contact';</script>";
        exit;
    }

    // Cek ketersediaan tanggal
    try {
        $stmt = $conn->prepare("SELECT COUNT(*) FROM bookings WHERE event_date = ? AND status != 'cancelled'");
        if (!$stmt) {
            throw new Exception("Unable to prepare statement: " . $conn->error);
        }
        $stmt->bind_param("s", $event_date);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        if ($count > 0) {
            echo "<script>alert('Event date is already booked. Please choose another date.'); window.location.href='index.php#contact';</script>";
            exit;
        }

        // Insert booking ke database
        $stmt = $conn->prepare("INSERT INTO bookings (client_name, email, phone, event_date, event_type, package_id, custom_request, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'pending')");
        if (!$stmt) {
            throw new Exception("Unable to prepare statement: " . $conn->error);
        }
        $stmt->bind_param("sssssis", $client_name, $email, $phone, $event_date, $event_type, $package_id, $custom_request);

        if ($stmt->execute()) {
            // Kirim notifikasi email ke admin
            $mail = new PHPMailer(true);
            try {
                // Konfigurasi SMTP untuk Gmail
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'parfmwis@gmail.com';
                $mail->Password = 'your-app-specific-password'; // Ganti dengan kata sandi aplikasi
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Pengaturan pengirim dan penerima
                $mail->setFrom('parfmwis@gmail.com', 'SCB Wedding');
                $mail->addAddress('parfmwis@gmail.com');

                // Konten email
                $mail->isHTML(true);
                $mail->Subject = 'New Booking Request';
                $mail->Body = "
                    <div style='font-family: Arial, sans-serif; padding: 20px; background-color: #f4f4f4;'>
                        <h2 style='color: #d4af37;'>New Booking Request</h2>
                        <p><strong>Name:</strong> " . htmlspecialchars($client_name) . "</p>
                        <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
                        <p><strong>Phone:</strong> " . htmlspecialchars($phone) . "</p>
                        <p><strong>Event Date:</strong> " . htmlspecialchars($event_date) . "</p>
                        <p><strong>Event Type:</strong> " . htmlspecialchars($event_type) . "</p>
                        <p><strong>Package ID:</strong> " . htmlspecialchars($package_id) . "</p>
                        <p><strong>Custom Request:</strong> " . htmlspecialchars($custom_request) . "</p>
                    </div>
                ";

                $mail->send();
            } catch (Exception $e) {
                // Catat error ke file log
                if (!file_exists('logs')) {
                    mkdir('logs', 0755, true);
                }
                error_log("Email could not be sent. Mailer Error: {$mail->ErrorInfo}", 3, "logs/errors.log");
            }

            echo "<script>alert('Booking submitted successfully! We will contact you soon.'); window.location.href='index.php';</script>";
        } else {
            throw new Exception("Error executing statement: " . $stmt->error);
        }
        $stmt->close();
    } catch (Exception $e) {
        if (!file_exists('logs')) {
            mkdir('logs', 0755, true);
        }
        error_log("Booking error: " . $e->getMessage(), 3, "logs/errors.log");
        echo "<script>alert('Error submitting booking. Please try again.'); window.location.href='index.php#contact';</script>";
    }
} else {
    echo "<script>alert('Invalid request method.'); window.location.href='index.php#contact';</script>";
}

$conn->close();
?>