<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blend_name = trim($_POST['blend_name']);
    $menu_ids = $_POST['menu_ids'];
    $avg_price = floatval($_POST['average_price']);

    if (empty($blend_name) || count($menu_ids) < 1 || count($menu_ids) > 3) {
        die("Nama blend harus diisi dan harus memilih 1-3 kopi.");
    }

    // Format unik untuk blend kopi: blend|nama|id1-id2-id3
    sort($menu_ids);
    $blend_id = "blend|" . str_replace(" ", "_", $blend_name) . "|" . implode("-", $menu_ids);

    // Simpan ke session cart
    $_SESSION['cart'][$blend_id] = [
        'name' => $blend_name,
        'price' => $avg_price,
        'quantity' => 1
    ];

    header("Location: cart.php");
    exit();
}
?>
