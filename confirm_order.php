<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: tracking.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Tandai pesanan sebagai selesai
$conn->query("UPDATE orders SET status='Completed' WHERE user_id=$user_id");

// Set session bahwa pesanan telah dikonfirmasi
$_SESSION['order_completed'] = true;

// Redirect ke halaman review
header("Location: tambah_review.php");
exit;
?>
