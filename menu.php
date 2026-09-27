<?php
include 'db.php';
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="img/icon.png">
    <title>Mood Coffee - Menu</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <style>
        body {
            background: url('img/bg1.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }

        /* Navbar Utama */
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

        /* Navbar Secondary */
        .navbar-secondary {
    background-color: #d1ac85; /* Warna lebih kontras */
    padding: 12px;
    text-align: center;
    position: sticky;
    top: 115px; /* Sesuai dengan tinggi navbar utama */
    z-index: 1000; /* Supaya selalu di atas konten */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    opacity: 1; /* Pastikan tidak transparan */
}

.navbar-secondary a {
    color: #5a3e2b;
    font-weight: bold;
    text-decoration: none;
    padding: 10px 15px;
    margin: 0 10px;
    display: inline-block;
    background: rgba(255, 255, 255, 0.2); /* Warna sedikit berbeda agar terlihat */
    border-radius: 5px;
}

.navbar-secondary a:hover {
    background-color: #c9986b;
    color: #fff;
}


        /* Footer */
        footer {
            background: #5c3d2e;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<!-- Navbar Utama -->
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


<!-- Navbar Secondary -->
<div class="navbar-secondary">
    <a href="menu.php">Semua Menu</a>
    <a href="mood.php">Coffee Mood</a>
    <a href="basecoffee.php">Base Coffee</a>
    <a href="blend.php">Coffee Blend</a>
</div>
<br>
<br><br><br><br>
<div class="container text-center mt-4 menu-header">
    <h2>Menu Kopi Kami</h2>
    <p>Berbagai pilihan kopi dengan kualitas terbaik.</p>
</div>

<div class="container">
    <div class="row justify-content-center" id="menu-items">
        <?php
        $result = $conn->query("SELECT * FROM products ORDER BY id");

        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $name = $row['name'];
            $price = $row['price'];
            $image = 'images/' . $row['image'];

            echo "<div class='col-md-4 col-sm-6 mb-4 menu-item'>
                    <div class='card shadow-sm'>
                        <img src='$image' class='card-img-top' alt='$name'>
                        <div class='card-body text-center'>
                            <h5 class='card-title'>$name</h5>
                            <p class='card-text'>Rp " . number_format($price) . "</p>
                            <div class='toggle-btn-group'>
                                <button type='button' class='toggle-btn' data-id='$id' data-value='hot'>🔥 Hot</button>
                                <button type='button' class='toggle-btn' data-id='$id' data-value='cold'>❄ Cold</button>
                            </div>
                            <button class='btn btn-primary add-to-cart' data-id='$id' disabled>Tambah ke Keranjang</button>
                        </div>
                    </div>
                  </div>";
        }
        ?>
    </div>
</div>

<footer>
    <p>&copy; 2025 Mood Coffee. Semua Hak Dilindungi.</p>
</footer>

<script>
    $(document).ready(function() {
        let selectedTemp = {};

        $(".toggle-btn").click(function() {
            const productId = $(this).data("id");
            const temp = $(this).data("value");

            selectedTemp[productId] = temp;

            $(this).siblings().removeClass("active");
            $(this).addClass("active");

            $(".add-to-cart[data-id='" + productId + "']").prop("disabled", false);
        });

        $(".add-to-cart").click(function() {
            const productId = $(this).data("id");
            const temperature = selectedTemp[productId];

            $.ajax({
                url: "add_to_cart.php",
                type: "POST",
                data: { id: productId, temp: temperature },
                success: function(response) {
                    alert("✅ Berhasil ditambahkan ke keranjang!");
                }
            });
        });
    });
</script>

</body>
</html>