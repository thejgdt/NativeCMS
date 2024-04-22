<?php
session_start();

// Jika pengguna sudah login, redirect ke halaman utama
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Tambahkan koneksi database
include('koneksi.php');

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai yang dikirim dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Periksa apakah username dan password cocok
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login berhasil
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        // Login gagal
        $error = "Username atau password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div>
        <h2>Login</h2>

        <!-- Form Login -->
        <form method="post">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <input type="submit" value="Login">
            </div>
        </form>

        <?php
        if (isset($error)) echo "<p>$error</p>";
        ?>
    </div>
</body>

</html>