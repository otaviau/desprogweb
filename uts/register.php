<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $nama = $_POST['nama_lengkap'];
    $password_plain = $_POST['password'];
    $password_hash = password_hash($password_plain, PASSWORD_DEFAULT);

    // Simpan ke database
    $query = "INSERT INTO users (username, password, nama_lengkap) VALUES ('$username', '$password_hash', '$nama')";
    $result = pg_query($conn, $query);

    if ($result) {
        // Ambil data user yang baru saja dibuat
        $query_user = "SELECT * FROM users WHERE username = '$username'";
        $result_user = pg_query($conn, $query_user);
        $user = pg_fetch_assoc($result_user);

        // Set session agar langsung login
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['nama'] = $user['nama_lengkap'];

        header("Location: admin_beranda.php");
        exit;
    } else {
        echo "Gagal registrasi!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register - Mie Ayam Lezat</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    body {
      background: linear-gradient(to bottom, rgb(255, 179, 0), rgb(174, 113, 0));
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Poppins', sans-serif;
    }

    .login-box {
      background: #fff3e0;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    .login-box h2 {
      color: #d32f2f;
      margin-bottom: 20px;
      font-weight: 700;
      font-size: 28px;
    }

    .login-box label {
      display: block;
      text-align: left;
      font-weight: 600;
      color: #d32f2f;
      margin-bottom: 8px;
      margin-top: 15px;
      font-size: 14px;
    }

    .login-box input[type="text"],
    .login-box input[type="password"] {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #9c9494ff;
      border-radius: 8px;
      font-size: 16px;
      font-family: 'Poppins', sans-serif;
      outline: none;
      transition: border-color 0.3s ease;
    }

    .login-box input[type="text"]:focus,
    .login-box input[type="password"]:focus {
      border-color: #a52727;
    }

    .login-box button {
      margin-top: 25px;
      width: 100%;
      background-color: #d32f2f;
      border: none;
      padding: 14px 0;
      border-radius: 8px;
      color: white;
      font-weight: 700;
      font-size: 18px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .login-box button:hover {
      background-color: #a52727;
    }

    .login-box .register-link {
      margin-top: 20px;
      font-size: 14px;
      color: #333;
    }

    .login-box .register-link a {
      color: #d32f2f;
      font-weight: 600;
      text-decoration: none;
    }

    .login-box .register-link a:hover {
      text-decoration: underline;
    }

  </style>
</head>
<body>
  <div class="login-box">
    <h2>Register Mie Ayam Lezat</h2>
    <form method="POST">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" required />

      <label for="username">Name</label>
      <input type="text" id="nama_lengkap" name="nama_lengkap" required />

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required />
            
      <button type="submit">Masuk</button>
    </form>
    <p class="register-link">
      Sudah punya akun? <a href="login.php">Masuk di sini</a>
    </p>
  </div>
</body>
</html>
