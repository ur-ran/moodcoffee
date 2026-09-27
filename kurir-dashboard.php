<?php
session_start();
include 'db.php';

// Ambil data pesanan yang hanya berstatus is_checked = 1
$query = "SELECT orders.id, orders.user_id, users.name AS user_name, orders.product_id, 
       products.name AS product_name, SUM(orders.quantity) AS total_quantity, 
       products.price, (SUM(orders.quantity) * products.price) AS total_price,
       orders.is_delivered
        FROM orders
        JOIN users ON orders.user_id = users.id
        JOIN products ON orders.product_id = products.id
        WHERE orders.is_checked = 1
        GROUP BY orders.user_id, orders.product_id
        ORDER BY orders.user_id ASC";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="img/icon.png">
    <title>Dashboard Kurir - Mood Coffee</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: Arial, sans-serif; 
            background: url('img/bg3.jpg') no-repeat center center/cover;
            color: white;
            text-align: center; 
        }
        .header, .footer {
            background: #4a2c2a;
            color: white;
            width: 100%;
            text-align: center;
            padding: 15px 0;
            font-size: 24px;
            font-weight: bold;
            position: fixed;
            left: 0;
            z-index: 1000;
        }
        .header { top: 0; }
        .footer { bottom: 0; font-size: 14px; font-weight: normal; }
        .container {
            margin: 100px auto 80px auto;
            width: 85%;
            padding: 20px;
            background: rgba(201, 155, 106, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            text-align: center;
        }
        h2 { margin-bottom: 20px; color: #4a2c2a; }
        table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(165, 114, 77, 0.8);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
            color: white;
        }
        th { background: #6f4e37; }
        tr:nth-child(even) { background: rgba(120, 85, 60, 0.8); }
        .checked {
            background-color: #b78e63 !important;
            color: #fff !important;
            font-weight: bold;
        }
        .delivered {
            background-color: #4a2c2a !important; /* Coklat tua */
            color: #fff !important;
            font-weight: bold;
        }
        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background: #6f4e37;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            transition: 0.3s;
        }
        .button:hover { background: #402617; }
        .logout-button { background: #d9534f; }
    </style>
</head>
<body>

<div class="header">Dashboard Kurir - Mood Coffee</div>

<div class="container">
    <h2>Daftar Pesanan Siap Antar</h2>
    <table>
        <tr>
            <th>User ID</th>
            <th>Nama</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total Harga</th>
            <th>Sudah Diantar</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>
            <tr class="<?= $row['is_delivered'] ? 'delivered' : 'checked' ?>">
                <td><?= $row['user_id'] ?></td>
                <td><?= htmlspecialchars($row['user_name']) ?></td>
                <td><?= htmlspecialchars($row['product_name']) ?></td>
                <td><?= $row['total_quantity'] ?></td>
                <td>Rp <?= number_format($row['price'], 0, ',', '.') ?></td>
                <td>Rp <?= number_format($row['total_price'], 0, ',', '.') ?></td>
                <td>
                    <input type="checkbox" class="deliver-order" 
                        data-user="<?= $row['user_id'] ?>" 
                        data-product="<?= $row['product_id'] ?>" 
                        <?= $row['is_delivered'] ? 'checked' : '' ?>>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <a href="logout.php" class="button logout-button">Logout</a>
</div>

<div class="footer">© 2025 Mood Coffee. Semua Hak Dilindungi.</div>

<script>
$(document).ready(function() {
    $(".deliver-order").change(function() {
        let userId = $(this).data("user");
        let productId = $(this).data("product");
        let isDelivered = $(this).prop("checked") ? 1 : 0;
        let row = $(this).closest("tr");

        $.post("update_delivery.php", { user_id: userId, product_id: productId, is_delivered: isDelivered }, function(response) {
            if (isDelivered) {
                row.addClass("delivered").removeClass("checked");
            } else {
                row.removeClass("delivered").addClass("checked");
            }
        });
    });
});
</script>

</body>
</html>
