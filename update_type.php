<?php
include 'db.php';

if (isset($_POST['id']) && isset($_POST['type'])) {
    $id = $_POST['id'];
    $type = $_POST['type'];

    $stmt = $conn->prepare("UPDATE products SET type = ? WHERE id = ?");
    $stmt->bind_param("si", $type, $id);
    $stmt->execute();
    $stmt->close();
}
