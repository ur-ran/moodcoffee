<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="img/icon.png">
    <title>Login - Mood Coffee</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: url('img/bg3.jpg') no-repeat center center/cover;
        }
        .header, .footer {
            background: #4a2c2a;
            color: white;
            width: 100%;
            text-align: center;
            padding: 10px 0;
            font-size: 20px;
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
        .login-box {
            background: #c99b6a;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            width: 320px;
            text-align: center;
            margin-top: 50px;
        }
        .login-box h2 {
            margin-bottom: 15px;
            color: #4a2c2a;
        }
        input {
            padding: 10px;
            margin: 10px 0;
            width: 100%;
            border: 1px solid #8b5e3b;
            border-radius: 5px;
            background: white;
            font-size: 16px;
        }
        button {
            padding: 10px;
            width: 100%;
            background: #5c3823;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
        }
        button:hover {
            background: #402617;
        }
        .error {
            color: red;
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">Mood Coffee</div>
    <div class="login-box">
        <h2>Login</h2>
        <input type="password" id="password" placeholder="Masukkan Password">
        <button onclick="checkPassword()">Login</button>
        <p id="error-message" class="error"></p>
    </div>
    <div class="footer">© 2025 Mood Coffee. Semua Hak Dilindungi.</div>

    <script>
        function checkPassword() {
            const correctPassword = "mood123"; // Password tetap
            const inputPassword = document.getElementById("password").value;
            
            if (inputPassword === correctPassword) {
                window.location.href = "admin-dashboard.php"; // Halaman tujuan setelah login
            } else {
                document.getElementById("error-message").textContent = "Password salah!";
            }
        }
    </script>
</body>
</html>
