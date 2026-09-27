<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="img/icon.png">
    <title>Mood Coffee - Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background: url('img/bg5.jpeg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
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
        .hero {
    text-align: center;
    padding: 70px 0;
}

.hero-logo {
    width: 100px; /* Sesuaikan ukuran */
    height: 100px; /* Sama dengan width agar lingkaran */
    border-radius: 50%; /* Membuat gambar menjadi lingkaran */
    object-fit: cover; /* Memastikan gambar tetap rapi */
    margin-bottom: 15px; /* Jarak antara logo dan teks */
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
    </style>
</head>
<body class="min-vh-100 d-flex flex-column">

    <!-- Navbar -->
<!-- Navbar -->
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
        <?php if (isset($_SESSION['user_id'])): ?>
            <span class="text-white me-3 fw-bold">Halo, <?= htmlspecialchars($_SESSION['user_name'] ?? 'Pelanggan') ?></span>
            <a href="logout.php" class="btn btn-logout">Log Out</a>
        <?php else: ?>
            <a href="anjay.php" class="btn btn-logout">Login</a>
        <?php endif; ?>
    </div>
</nav>

    <!-- Hero Section -->
   <!-- Hero Section -->
<div class="container">
    <div class="hero d-flex align-items-center justify-content-center text-center flex-wrap">
        <img src="img/logo.png" alt="Mood Coffee Logo" class="hero-logo me-3">
        <div>
            <h1 class="mb-2">Mood Coffee</h1>
            <p>Menemani hari Anda dengan cita rasa kopi terbaik</p>
        </div>
    </div>
</div>



    <!-- Card Section -->
    <div class="container text-center">
        <div class="card-container">
            <div class="card">
                <img src="img/biji.webp" alt="Tentang Kami">
                <div class="card-body">
                    <h5 class="card-title">Tentang Kami</h5>
                    <p class="card-text">Kami mengambil biji kopi terbaik langsung dari petani terkemuka di berbagai daerah penghasil kopi terbaik di dunia.</p>
                </div>
            </div>

            <div class="card">
                <img src="img/aman.webp" alt="Keamanan Data">
                <div class="card-body">
                    <h5 class="card-title">Keamanan Data</h5>
                    <p class="card-text">Kami memahami betapa pentingnya keamanan data pelanggan. Semua informasi dienkripsi end-to-end untuk memastikan perlindungan maksimal.</p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Mood Coffee. Semua Hak Dilindungi.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
