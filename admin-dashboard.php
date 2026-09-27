<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="img/icon.png">
    <title>Dashboard Admin - Mood Coffee</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background: url('img/bg3.jpg') no-repeat center center/cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: white;
        }
        .header, .footer {
            background: #4a2c2a;
            color: white;
            width: 100%;
            text-align: center;
            padding: 15px 0;
            font-size: 24px;
            font-weight: bold;
            position: absolute;
        }
        .header {
            top: 0;
        }
        .footer {
            bottom: 0;
            font-size: 14px;
            font-weight: normal;
        }
        .container {
            margin-top: 80px;
            width: 60%;
            padding: 20px;
            background: rgba(201, 155, 106, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #4a2c2a;
        }
        .button {
            display: block;
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            background: #6f4e37;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            transition: 0.3s;
        }
        .button:hover {
            background: #402617;
        }
        .logout-button {
            background: #d9534f; /* Warna merah */
        }
        .logout-button:hover {
            background: #c9302c;
        }
    </style>
</head>
<body>
    <div class="header">Dashboard Admin - Mood Coffee</div>
    <div class="container">
        <h2>Selamat Datang, Admin!</h2>
        <button class="button" onclick="window.location.href='data-pelanggan.php'">Data Pelanggan</button>
        <button class="button" onclick="window.location.href='kelola-pesanan.php'">Kelola Pesanan</button>
        
        <button class="button logout-button" onclick="window.location.href='logout.php'">Logout</button>
    </div>
    <div class="footer">© 2025 Mood Coffee. Semua Hak Dilindungi.</div>
</body>
</html>
