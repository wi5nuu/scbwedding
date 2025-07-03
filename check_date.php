<?php
require 'config.php';

header('Content-Type: application/json');

try {
    $event_date = filter_input(INPUT_POST, 'event_date', FILTER_SANITIZE_STRING);
    $stmt = $conn->prepare("SELECT COUNT(*) FROM bookings WHERE event_date = ? AND status != 'cancelled'");
    $stmt->bind_param("s", $event_date);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    echo json_encode(['booked' => $count > 0]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>