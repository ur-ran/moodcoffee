<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="img/icon.png">
    <title>Tambah Review</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
    background: url('img/bg1.jpg') no-repeat center center fixed;
    background-size: cover;
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

h2 {
    font-size: 32px;
    font-weight: bold;
    color: #fff;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    background-color: rgba(0, 0, 0, 0.5);
    padding: 10px;
    border-radius: 8px;
    display: inline-block;
    margin-bottom: 20px;
}

.rating label {
    font-size: 2rem;
    color: #ddd;
    cursor: pointer;
    margin: 0 5px;
    transition: color 0.3s;
}

.rating input:checked ~ label,
.rating label:hover,
.rating label:hover ~ label {
    color: #ffc107;
}

textarea {
    width: 100%;
    height: 150px;
    resize: none;
    background-color: rgba(255, 255, 255, 0.8);
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s;
}

textarea:focus {
    background-color: rgba(255, 255, 255, 0.9);
}

.btn-primary {
    background-color: #ffc107;
    border-color: #ffc107;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #e0a800;
}
label {
    color: #fff;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    background-color: rgba(0, 0, 0, 0.5);
    padding: 2px 6px;
    border-radius: 5px;
    display: inline-block;
    margin-bottom: 5px;
}

.rating label {
    font-size: 2rem;
    color: #ddd;
    cursor: pointer;
    margin: 0 5px;
    transition: color 0.3s;
    text-shadow: none;
    background-color: transparent;
    padding: 0;
}

.rating input:checked ~ label,
.rating label:hover,
.rating label:hover ~ label {
    color: #ffc107;
}

        body { background: url('img/bg1.jpg') no-repeat center center fixed; background-size: cover; }
        .rating { display: flex; flex-direction: row-reverse; justify-content: center; }
        .rating input { display: none; }
        .rating label { font-size: 2rem; color: #ddd; cursor: pointer; margin: 0 5px; }
        .rating input:checked ~ label, .rating label:hover, .rating label:hover ~ label { color: #ffc107; }
        textarea { width: 100%; height: 150px; resize: none; }
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
    <h2>Tambah Review</h2>
    <form method="POST" action="review.php">
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
        <div class="mb-3">
            <label class="form-label">Rating:</label>
            <div class="rating">
                <input type="radio" name="rating" id="star5" value="5"><label for="star5" class="fas fa-star"></label>
                <input type="radio" name="rating" id="star4" value="4"><label for="star4" class="fas fa-star"></label>
                <input type="radio" name="rating" id="star3" value="3"><label for="star3" class="fas fa-star"></label>
                <input type="radio" name="rating" id="star2" value="2"><label for="star2" class="fas fa-star"></label>
                <input type="radio" name="rating" id="star1" value="1"><label for="star1" class="fas fa-star"></label>
            </div>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Komentar:</label>
            <textarea name="comment" id="comment" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Review</button>
    </form>
</div>
</body>
</html>
