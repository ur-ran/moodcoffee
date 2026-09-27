<?php
include 'db.php';

// Kategori dan daftar menu sesuai kelompok
$categories = [
    "🔥 Mood Booster Series (Espresso Based – Untuk Energi dan Semangat)" => [
        1 => "Semangat Pagi",
        2 => "Fokus Maksimal",
        3 => "Optimis Hari Ini",
        4 => "Pecinta Kopi",
        5 => "Misi Sukses"
    ],
    "☁️ Chill & Relax Series (Latte & Cappuccino – Untuk Mood Santai)" => [
        6 => "Santai Sore",
        7 => "Sweet Escape",
        8 => "Nyaman Banget",
        9 => "Mood Bahagia",
        10 => "Pelukan Hangat"
    ],
    "🌿 Authentic Brew Series (Manual Brew – Untuk Penikmat Kopi Sejati)" => [
        11 => "Slow Brew",
        12 => "Tenang Sejenak",
        13 => "Hangat Nostalgia",
        14 => "Petualang Rasa",
        15 => "Klasik Berkelas"
    ],
    "🍹 Fresh & Sweet Series (Signature Coffee – Untuk Mood Manis & Unik)" => [
        16 => "Coconut Bliss",
        17 => "Chocolate Mood",
        18 => "Matcha Fusion",
        19 => "Golden Honey",
        20 => "Almond Treat"
    ],
    "🍵 Non-Coffee Mood (Untuk Mood Nyaman Tanpa Kafein)" => [
        21 => "Matcha Harmony",
        22 => "Cocoa Comfort",
        23 => "Berry Smooth",
        24 => "Chai Delight",
        25 => "Lemon Zen"
    ]
];
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
        }
        .menu-category {
            font-size: 22px;
            font-weight: bold;
            margin-top: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #b88b4a;
            color: #fff;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7);
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
<header>Mood Coffee</header>

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

<div class="navbar-secondary">
    <a href="menu.php">Semua Menu</a>
    <a href="mood.php">Coffee Mood</a>
    <a href="basecoffee.php">Base Coffee</a>
    <a href="blend.php">Coffee Blend</a>
</div>

<br><br><br>

<div class="container text-center mt-4 menu-header">
    <h2>Menu Kopi Kami</h2>
    <p>Berbagai pilihan kopi dengan kualitas terbaik.</p>
</div>

<div class="container">
    <?php foreach ($categories as $category_name => $product_ids) : ?>
        <div class="menu-category"><?= $category_name ?></div>
        <div class="row justify-content-center">
            <?php
            foreach ($product_ids as $id => $product_name) {
                $result = $conn->query("SELECT * FROM products WHERE id = $id");
                if ($result && $result->num_rows > 0) {
                    if ($row = $result->fetch_assoc()) {
                        $price = $row['price'];
                        $image = 'images/' . $row['image'];

                        echo "<div class='col-md-4 col-sm-6 mb-4 menu-item'>
                        <div class='card shadow-sm'>
                            <img src='$image' class='card-img-top' alt='$product_name'>
                            <div class='card-body text-center'>
                                <h5 class='card-title'>$product_name</h5>
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
                }
            }
            ?>
        </div>
    <?php endforeach; ?>
</div>

<footer>&copy; 2025 Mood Coffee. Semua Hak Dilindungi.</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let selectedTemp = {};

        // Ketika tombol Hot atau Cold ditekan
        $(".temp-btn").click(function() {
            const productId = $(this).data("id");
            const temp = $(this).data("temp");

            // Simpan pilihan suhu untuk produk tertentu
            selectedTemp[productId] = temp;

            // Atur tombol yang aktif
            $(this).siblings().removeClass("active");
            $(this).addClass("active");

            // Aktifkan tombol Tambah ke Keranjang
            $(".add-to-cart[data-id='" + productId + "']").prop("disabled", false);
        });

        // Ketika tombol Tambah ke Keranjang ditekan
    
</script>
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