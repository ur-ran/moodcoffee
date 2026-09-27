<?php
session_start();
$conn = new mysqli("localhost", "root", "", "coffee_shop");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $rating = isset($_POST['rating']) ? intval($_POST['rating']) : 0;
    $comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';

    if ($rating >= 1 && $rating <= 5 && !empty($comment)) {
        $stmt = $conn->prepare("SELECT name FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($name);
        $stmt->fetch();
        $stmt->close();

        if (!empty($name)) {
            $stmt = $conn->prepare("INSERT INTO review (user_id, name, rating, comment) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("isis", $user_id, $name, $rating, $comment);
            if ($stmt->execute()) {
                echo "<script>alert('Review berhasil dikirim!'); window.location='view_reviews.php';</script>";
            } else {
                echo "<script>alert('Gagal mengirim review!'); window.location='tambah_review.php';</script>";
            }
            $stmt->close();
        } else {
            echo "<script>alert('User tidak ditemukan!'); window.location='tambah_review.php';</script>";
        }
    } else {
        echo "<script>alert('Data tidak valid!'); window.location='tambah_review.php';</script>";
    }
}

$conn->close();
?>
