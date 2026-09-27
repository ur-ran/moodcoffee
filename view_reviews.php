<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="img/icon.png">
    <title>Lihat Review</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body { background: url('img/bg1.jpg') no-repeat center center fixed; background-size: cover; }
        .rating-stars { color: #ffc107; }
        .review-card { max-width: 600px; margin: auto; }
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
    </style>
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
    <br><br><br><br>
<div class="container text-center mt-4">
<h2 style="
    font-size: 32px; 
    font-weight: bold; 
    color: #fff; 
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); 
    background-color: rgba(0, 0, 0, 0.5); 
    padding: 10px; 
    border-radius: 8px;">
    Review Pengguna
</h2>

    <div class="mt-3">
        <?php
        $conn = new mysqli("localhost", "root", "", "coffee_shop");
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $result = $conn->query("SELECT name, rating, comment FROM review ORDER BY id DESC");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card review-card mb-3'>
                        <div class='card-body'>
                            <h5 class='card-title'>" . htmlspecialchars($row['name']) . "</h5>
                            <p class='rating-stars'>" . str_repeat("<i class='fas fa-star'></i>", $row['rating']) . "</p>
                            <p class='card-text'>\"" . htmlspecialchars($row['comment']) . "\"</p>
                        </div>
                      </div>";
            }
        } else {
            echo "<p>Belum ada review.</p>";
        }
        $conn->close();
        ?>
    </div>
</div>
</body>
</html>
