<?php
session_start();
include 'db.php';

// Update jumlah item dalam keranjang
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $action = $_POST['action'];

    if (isset($_SESSION['cart'][$id])) {
        if ($action == "plus") {
            $_SESSION['cart'][$id]['quantity']++;
        } elseif ($action == "minus" && $_SESSION['cart'][$id]['quantity'] > 1) {
            $_SESSION['cart'][$id]['quantity']--;
        }
    }
    echo json_encode(['success' => true]);
    exit;
}

// Hapus item dari keranjang
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    unset($_SESSION['cart'][$id]);
    header("Location: cart.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="img/icon.png">
    <title>Keranjang - Mood Coffee</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background: url('img/bg5.jpeg') no-repeat center center fixed;
            background-size: cover;
            color: white;
        }

 /* Navbar */
 .navbar {
            background: rgba(85, 55, 25, 0.95);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #f5e1c0 !important;
        }

        .navbar-nav .nav-link {
            color: #f5e1c0 !important;
            font-weight: 500;
            transition: 0.3s;
            display: flex;
            align-items: center;
        }

        .navbar-nav .nav-link i {
            margin-right: 8px;
            font-size: 1.2rem;
        }

        .navbar-nav .nav-link:hover {
            color: #ffb84d !important;
        }

        .btn-logout {
            background: #a65c32;
            color: white;
            border-radius: 8px;
            padding: 8px 15px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-logout:hover {
            background: #c2784d;
        }

        /* Hero Section */
        .hero {
            position: relative;
            text-align: center;
            padding: 80px 20px;
            background: rgba(85, 55, 25, 0.8);
            border-radius: 15px;
            max-width: 85%;
            margin: auto;
            margin-top: 70px;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.4);
        }

        .hero h1 {
            font-size: 3.2rem;
            font-weight: bold;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.5);
        }

        .hero p {
            font-size: 1.3rem;
            margin-top: 10px;
        }

        /* Card Container */
        .card-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 20px;
        }

        .card {
            display: flex;
            align-items: center;
            width: 48%;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 40%;
            height: auto;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 20px;
        }

        .card:nth-child(odd) {
            flex-direction: row-reverse;
        }

        .card-body {
            width: 60%;
        }

        /* Footer */
        footer {
            background: #5c3d2e;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 40px;
        }

        .cart-container {
            background: rgba(90, 62, 43, 0.85);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            margin-top: 30px;
        }

        .table-dark {
    background-color: #8d6e63; /* Coklat buat latar belakang judul tabel (lebih hangat) */
    color: #fff; /* Biar teks tetap putih dan kontras */
}

.table {
    background-color: #5d4037; /* Coklat tua buat latar belakang tabel utama */
}

.table th {
    background-color: #795548; /* Coklat buat latar belakang judul kolom tabel */
}

.table td {
    background-color: rgba(93, 64, 55, 0.7); /* Coklat transparan buat sel tabel */
}

        .table th, .table td {
            color: #d7ccc8;
    vertical-align: middle; /* Biar teks di tengah */
    text-align: center; /* Rapi di tengah */
}


.btn-update {
    border: none;
    background-color: #b48b64;
    color: white;
    padding: 3px 8px;
    margin: 0 5px;
    border-radius: 5px;
    transition: 0.3s;
}

.btn-update:hover {
    background-color: #8b5a2b;
}

.btn-checkout {
    background-color: #b48b64;
    color: white;
    padding: 8px 16px;
    border-radius: 5px;
    text-decoration: none;
    transition: 0.3s;
}

.btn-checkout:hover {
    background-color: #8b5a2b;
}

.btn-danger {
    padding: 5px 10px;
    border-radius: 5px;
    transition: 0.3s;
}

.btn-danger:hover {
    background-color: #c0392b;
}

.cart-container {
    background: rgba(90, 62, 43, 0.95);
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    margin-top: 30px;
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;
}

.table {
    margin-bottom: 20px;
}

.table-dark {
    background-color: #6d4c41; /* Coklat buat judul tabel (lebih gelap dari latar) */
    color: #f5f5f5; /* Teks jadi krem atau abu-abu muda, biar nggak putih banget */
}






.btn-update, .btn-checkout {
    background-color: #8d6e63; /* Warna coklat buat tombol */
    color: white;
    border: none;
    padding: 3px 8px;
    margin: 0 5px;
    border-radius: 5px;
    transition: 0.3s;
}

.btn-update:hover, .btn-checkout:hover {
    background-color: #5d4037; /* Coklat lebih tua saat hover */
}

.btn-danger {
    background-color: #d32f2f; /* Warna merah buat tombol hapus */
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    transition: 0.3s;
}

.btn-danger:hover {
    background-color: #b71c1c; /* Merah lebih tua saat hover */
}


    </style>
    <script>
        function updateQuantity(id, action) {
            fetch('cart.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({ update: 1, id: id, action: action })
            }).then(response => response.json()).then(data => {
                if (data.success) location.reload();
            });
        }
    </script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
        <img src="img/logo.png" alt="Logo" class="me-2 rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
        <!-- Logo lebih besar & lingkaran -->
            Mood Coffee
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.php"><i class="bi bi-house-door"></i>Home</a></li>
                <li class="nav-item"><a class="nav-link" href="menu.php"><i class="bi bi-cup-hot"></i>Menu</a></li>
                <li class="nav-item"><a class="nav-link" href="cart.php"><i class="bi bi-cart"></i>Cart</a></li>
                <li class="nav-item"><a class="nav-link" href="tracking.php"><i class="bi bi-geo-alt"></i>Lacak Pesanan</a></li>
                <li class="nav-item"><a class="nav-link" href="view_reviews.php"><i class="bi bi-chat-dots"></i>Review</a></li>
            </ul>
        </div>
        <a href="logout.php" class="btn btn-logout">Log Out</a>
    </div>
</nav>
<br><br><br><br><br>
<header>Mood Coffee</header>
<div class="container">
    <div class="cart-container">
         <h3>Keranjang Belanja</h3> 
        <?php if (!empty($_SESSION['cart']) && is_array($_SESSION['cart'])): ?>
            <table class="table table-hover text-white">
                <thead class="table-dark">
                    <tr>
                        <th>Produk</th>
                        <th>Suhu</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $totalHarga = 0;
                    foreach ($_SESSION['cart'] as $id => $item):
                        if (!is_array($item)) continue;
                        
                        $name = $item['name'] ?? 'Produk';
                        $price = $item['price'] ?? 0;
                        $quantity = $item['quantity'] ?? 1;
                        $temp = ucfirst($item['temp'] ?? 'Hot'); // Ambil suhu (Hot atau Cold)

                        $total = $price * $quantity;
                        $totalHarga += $total;
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($name) ?></td>
                            <td><?= htmlspecialchars($temp) ?></td>
                            <td>Rp <?= number_format($price) ?></td>
                            <td>
                                <button onclick="updateQuantity('<?= htmlspecialchars($id) ?>', 'minus')" class="btn-update">−</button>
                                <?= $quantity ?>
                                <button onclick="updateQuantity('<?= htmlspecialchars($id) ?>', 'plus')" class="btn-update">+</button>
                            </td>
                            <td>Rp <?= number_format($total) ?></td>
                            <td><a href="cart.php?remove=<?= urlencode($id) ?>" class="btn btn-danger">Hapus</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h4>Total Belanja: Rp <?= number_format($totalHarga) ?></h4>
            <a href="payment.php" class="btn-checkout">Checkout</a>
        <?php else: ?>
            <p>Keranjang masih kosong!</p>
        <?php endif; ?>
    </div>
</div>

<footer>&copy; 2025 Mood Coffee. Semua Hak Dilindungi.</footer>
</body>
</html>
