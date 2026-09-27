<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
        exit();
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="img/icon.png">
    <title>Register - Mood Coffee</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: url('img/bg3.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .register-container {
            width: 100%;
            max-width: 500px; /* Lebar form lebih besar */
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #4e342e; 
            color: #fff;
            padding: 15px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #4e342e;
            color: white;
            font-size: 14px;
        }
        .btn-register {
            background-color: #6d4c41;
            border: none;
            padding: 10px;
            font-size: 18px;
        }
        .btn-register:hover {
            background-color: #4e342e;
        }
        .form-control {
            padding: 12px;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <div class="header">
        Mood Coffee
    </div>

    <div class="content">
        <div class="register-container">
            <h2 class="text-center mb-4">Buat Akun</h2>

            <?php if (!empty($error)) { ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php } ?>

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-register w-100 text-white">Daftar</button>
            </form>

            <p class="text-center mt-3">Sudah punya akun? <a href="login.php">Login di sini</a></p>
        </div>
    </div>

    <div class="footer">
        &copy; 2025 Mood Coffee. Semua Hak Dilindungi.
    </div>

</body>
</html>
