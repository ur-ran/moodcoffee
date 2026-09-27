<?php
session_start();
include 'db.php';

if (isset($_POST['id']) && isset($_POST['temp'])) {
    $productId = $_POST['id'];
    $temp = $_POST['temp'];

    if ($conn->connect_error) {
        echo "error: Connection failed - " . $conn->connect_error;
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    if (!$stmt) {
        echo "error: Prepare failed - " . $conn->error;
        exit;
    }

    $stmt->bind_param("i", $productId);
    if (!$stmt->execute()) {
        echo "error: Execute failed - " . $stmt->error;
        exit;
    }

    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($product) {
        $_SESSION['cart'][$productId] = [
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => isset($_SESSION['cart'][$productId]) ? $_SESSION['cart'][$productId]['quantity'] + 1 : 1,
            'temp' => $temp
        ];
        echo "success";
    } else {
        echo "error: Product not found";
    }
} else {
    echo "error: Missing parameters";
}
if (isset($_POST['id']) && isset($_POST['temp'])) {
    $productId = $_POST['id'];
    $temp = $_POST['temp'];

    if ($conn->connect_error) {
        echo "error: Connection failed - " . $conn->connect_error;
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    if (!$stmt) {
        echo "error: Prepare failed - " . $conn->error;
        exit;
    }

    $stmt->bind_param("i", $productId);
    if (!$stmt->execute()) {
        echo "error: Execute failed - " . $stmt->error;
        exit;
    }

    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($product) {
        $_SESSION['cart'][$productId] = [
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => isset($_SESSION['cart'][$productId]) ? $_SESSION['cart'][$productId]['quantity'] + 1 : 1,
            'temp' => $temp
        ];
        echo "success";
    } else {
        echo "error: Product not found";
    }
} else {
    echo "error: Missing parameters";
}
