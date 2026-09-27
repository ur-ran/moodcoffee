<?php
session_start();
include 'db.php';

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    echo "User tidak terautentikasi!";
    exit;
}

$user_id = intval($_SESSION['user_id']);

// Pastikan ada pesanan di keranjang sebelum diproses
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<h2 class='text-center'>Keranjang Anda kosong!</h2>";
    echo "<div class='text-center'><a href='menu.php' class='btn btn-primary'>Kembali ke Menu</a></div>";
    exit;
}

// Proses setiap item dalam keranjang
foreach ($_SESSION['cart'] as $key => $item) {
    if (is_array($item)) {
        // Jika item adalah blend kopi
        $blend_name = $item['name'];
        $quantity = intval($item['quantity']);

        // Simpan blend kopi ke orders
        $temperature = isset($_POST['temperature']) ? $_POST['temperature'] : 'Hot';  // Ambil suhu dari form
$stmt = $conn->prepare("INSERT INTO orders (user_id, product_id, quantity, status, temperature) VALUES (?, NULL, ?, 'Paid', ?)");
$stmt->bind_param("iis", $user_id, $quantity, $temperature);

        $stmt->execute();
    } else {
        // Jika item adalah kopi biasa
        $product_id = intval($item);
        $quantity = 1;

        // Periksa apakah produk ada di database
        $stmt = $conn->prepare("SELECT id FROM products WHERE id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Masukkan ke tabel orders dengan status 'Paid'
            $stmt = $conn->prepare("INSERT INTO orders (user_id, product_id, quantity, status) VALUES (?, ?, ?, 'Paid')");
            $stmt->bind_param("iii", $user_id, $product_id, $quantity);
            $stmt->execute();
        }
    }
}

// Kosongkan keranjang setelah pesanan berhasil disimpan
$_SESSION['cart'] = [];
unset($_SESSION['order_completed']);


?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="img/icon.png">
    <title>Pembayaran Berhasil</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
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
        .success-container {
            background: rgba(90, 62, 43, 0.85); /* Coklat tua transparan */
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            color: white;
            max-width: 500px;
            margin: 50px auto;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body class="min-vh-100 d-flex flex-column">
    
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
    <br><br><br><br>
    <header>
        Mood Coffee
    </header>

    <div class="container text-center mt-4">
        <div class="success-container">
            <h2>Pembayaran Berhasil!</h2>
            <p>Pesanan Anda sedang diproses. Anda dapat melacak status pesanan di halaman <a href="tracking.php" class="text-light">Lacak Pesanan</a>.</p>
            <a href="index.php" class="btn btn-light mt-3">Kembali ke Home</a>
        </div>
    </div>

    <footer class="mt-4">
        &copy; 2025 Mood Coffee. Semua Hak Dilindungi.
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
