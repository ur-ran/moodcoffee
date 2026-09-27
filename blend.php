<?php 
session_start();
include 'db.php';

// Proses jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blend_name = $_POST['blend_name'];
    $menu_ids = $_POST['menu_ids'] ?? [];
    $average_price = $_POST['average_price'];
    $temperature = $_POST['temperature'] ?? 'Hot';  // Ambil pilihan suhu

    if (count($menu_ids) < 1 || count($menu_ids) > 3) {
        echo "<script>alert('Pilih 1 hingga 3 menu kopi!'); window.history.back();</script>";
        exit;
    }

    // Buat ID unik untuk blend berdasarkan nama dan ID menu
    sort($menu_ids);
    $blend_id = "blend_" . md5($blend_name . implode(",", $menu_ids));

    // Gabungkan nama kopi
    $blend_description = [];
    foreach ($menu_ids as $id) {
        $query = $conn->query("SELECT name FROM products WHERE id = '$id'");
        if ($row = $query->fetch_assoc()) {
            $blend_description[] = $row['name'];
        }
    }
    $blend_name = "Blend: " . $blend_name . " (" . implode(", ", $blend_description) . ") - $temperature";

    // Tambahkan blend ke session cart
    $_SESSION['cart'][$blend_id] = [
        'name' => $blend_name,
        'price' => $average_price,
        'quantity' => 1
    ];

    header("Location: cart.php");
    exit;
}

// Ambil data produk dari database
$result = $conn->query("SELECT * FROM products WHERE id BETWEEN 26 AND 40 ORDER BY id");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="img/icon.png">
    <title>Blend Kopi - Mood Coffee</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        <style>
    body {
        background: url('img/bg1.jpg') no-repeat center center fixed;
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
    .blend-box {
        background: rgba(90, 62, 43, 0.9);
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        margin-top: 30px;
    }
    .menu-card {
    background-color: #b48b64;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 15px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    color: #000; /* Ubah warna teks jadi hitam */
    font-weight: bold;
    text-shadow: none; /* Hilangkan bayangan teks */
}

.navbar-secondary {
            background-color: #e0c3a5;
            padding: 10px;
            text-align: center;
            position: sticky;
            top: 115px;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .navbar-secondary a {
            color: #5a3e2b;
            font-weight: bold;
            text-decoration: none;
            padding: 10px 15px;
            margin: 0 10px;
            display: inline-block;
        }
        .navbar-secondary a:hover {
            background-color: #d1ac85;
            border-radius: 5px;
        }

    .menu-card img {
        width: 50px;
        height: 50px;
        border-radius: 5px;
        margin-right: 10px;
    }
    .btn-primary {
        background-color: #d4a373;
        border: none;
    }
    .btn-primary:hover {
        background-color: #8b5a2b;
    }
    /* Tambah ukuran dan kontras untuk pilihan Hot atau Cold */
    .temperature-options label {
        font-size: 18px;
        margin-right: 20px;
        cursor: pointer;
        color: #fff;
    }
    .temperature-options input[type="radio"] {
        transform: scale(1.5);
        margin-right: 8px;
        cursor: pointer;
    }
    /* Perbaiki warna harga */
    #averagePrice {
        color: #ffd700;
        font-weight: bold;
    }

        body {
            background: url('img/bg1.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }
        .blend-box {
            background: rgba(90, 62, 43, 0.85);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            margin-top: 30px;
        }
        .menu-card {
            background-color: #faf3e0;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        .menu-card img {
            width: 50px;
            height: 50px;
            border-radius: 5px;
            margin-right: 10px;
        }
        .btn-primary {
            background-color: #d4a373;
            border: none;
        }
        .btn-primary:hover {
            background-color: #8b5a2b;
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

    <div class="container">
        <div class="blend-box">
            <h3>Buat Blend Kopi Anda</h3>
            <form id="blendForm" method="POST">
                <label>Nama Blend:</label>
                <input type="text" id="blendName" name="blend_name" class="form-control mb-3" placeholder="Nama unik untuk blend" required>

                <h4>Pilih Maksimal 3 Kopi:</h4>
                <div class="row">
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="col-md-6 mb-3">
                            <div class="menu-card p-2">
                                <input type="checkbox" class="blend-option" name="menu_ids[]" value="<?= $row['id'] ?>" data-price="<?= $row['price'] ?>">
                                <img src="images/<?= $row['image'] ?>" alt="<?= $row['name'] ?>">
                                <span><?= $row['name'] ?> (Rp <?= number_format($row['price']) ?>)</span>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

                <!-- Pilihan Hot atau Cold -->
                <h5 class="mt-3">Pilih Suhu:</h5>
<div class="mb-3 temperature-options">
    <label><input type="radio" name="temperature" value="Hot" checked> Hot 🔥</label>
    <label><input type="radio" name="temperature" value="Cold"> Cold ❄️</label>
</div>


                <p><strong>Harga : Rp <span id="averagePrice">0</span></strong></p>
                <input type="hidden" name="average_price" id="hiddenPrice">
                <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
            </form>
        </div>
    </div>

    <footer>
        &copy; 2025 Mood Coffee. Semua Hak Dilindungi.
    </footer>

    <script>
        $(document).ready(function () {
            let selectedPrices = [];

            $(".blend-option").change(function () {
                selectedPrices = $(".blend-option:checked").map(function () {
                    return parseFloat($(this).data("price"));
                }).get();

                if (selectedPrices.length > 3) {
                    $(this).prop("checked", false);
                    alert("Maksimal 3 menu kopi dapat dipilih!");
                }

                let avgPrice = selectedPrices.length ? (selectedPrices.reduce((a, b) => a + b) / selectedPrices.length).toFixed(0) : 0;
                $("#averagePrice").text(avgPrice);
                $("#hiddenPrice").val(avgPrice);
            });
        });
    </script>
</body>
</html>
