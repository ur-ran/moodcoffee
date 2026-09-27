<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="img/icon.png">
    <title>Login atau Register - Mood Coffee</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: url('img/bg4.jpeg') no-repeat center center fixed;
            background-size: cover;
            color: #5c4033;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .card-custom {
            background-color: rgba(139, 90, 43, 0.7); /* Warna coklat muda transparan */
            color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 700px;
            margin: auto;
        }
        .container {
            margin-top: 15%;
        }
        .btn-custom {
            background-color: #8b5a2b;
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            width: 220px;
            margin: 10px;
            transition: all 0.3s ease-in-out;
        }
        .btn-custom:hover {
            background-color: #a06a3b;
            transform: translateY(-5px);
        }
        h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
<div class="card-custom">
        <h1>Selamat Datang, Pelanggan!</h1>
        <p>Silakan masuk atau daftar untuk melanjutkan:</p>
        <a href="login.php" class="btn btn-custom">Login</a>
        <a href="register.php" class="btn btn-custom">Register</a>
    </div>
</body>
</html>
