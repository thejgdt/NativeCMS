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
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-semibold mb-4">Login</h2>

        <!-- Form Login -->
        <form method="post">
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Username</label>
                <input type="text" id="username" name="username" class="w-full py-2 px-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full py-2 px-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <input type="submit" value="Login" class="w-full bg-indigo-500 text-white font-semibold px-4 py-2 rounded hover:bg-indigo-600">
            </div>
        </form>
        <p class="text-gray-700 text-sm">Don't have an account? <a href="register.php" class="text-indigo-500 hover:underline">Create here</a></p>

        <?php
        if (isset($error)) echo "<p class='text-red-500'>$error</p>";
        ?>
    </div>
</body>

</html>