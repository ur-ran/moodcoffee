<?php
// Konfigurasi koneksi database
$servername = "localhost";
$username = "root"; // Sesuaikan jika ada username lain
$password = ""; // Sesuaikan jika ada password
$database = "coffee_shop"; // Nama database sesuai file SQL

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data pelanggan dari tabel users
$sql = "SELECT id, name AS nama, email FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="img/icon.png">
    <title>Data Pelanggan - Mood Coffee</title>
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
            width: 80%;
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
        table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(165, 114, 77, 0.8); /* Warna coklat muda transparan */
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
            color: white; /* Teks putih agar kontras */
        }
        th {
            background: #6f4e37;
        }
        tr:nth-child(even) {
            background: rgba(120, 85, 60, 0.8); /* Warna lebih gelap untuk baris genap */
        }
        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background: #6f4e37;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            transition: 0.3s;
        }
        .button:hover {
            background: #402617;
        }
    </style>
</head>
<body>
    <div class="header">Data Pelanggan - Mood Coffee</div>
    <div class="container">
        <h2>Daftar Pelanggan</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["nama"] . "</td>
                            <td>" . $row["email"] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Tidak ada data pelanggan.</td></tr>";
            }
            ?>
        </table>
        <a href="admin-dashboard.php" class="button">Kembali ke Dashboard</a>
    </div>
    <div class="footer">© 2025 Mood Coffee. Semua Hak Dilindungi.</div>
</body>
</html>

<?php
// Tutup koneksi
$conn->close();
?>
