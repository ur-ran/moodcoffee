<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = intval($_POST['user_id']);
    $product_id = intval($_POST['product_id']);
    $is_delivered = intval($_POST['is_delivered']);

    $stmt = $conn->prepare("UPDATE orders SET is_delivered = ? WHERE user_id = ? AND product_id = ?");
    $stmt->bind_param("iii", $is_delivered, $user_id, $product_id);

    if ($stmt->execute()) {
        echo "Success";
    } else {
        echo "Error";
    }

    $stmt->close();
    $conn->close();
}
?>
