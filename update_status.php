<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    $is_checked = $_POST['is_checked'];

    // Update status is_checked di database
    $query = "UPDATE orders SET is_checked = ? WHERE user_id = ? AND product_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iii", $is_checked, $user_id, $product_id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $conn->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
