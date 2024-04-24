<?php
// Tambahkan koneksi database
include('koneksi.php');

// Proses pendaftaran
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai yang dikirim dari form pendaftaran
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Periksa apakah username sudah terdaftar
    $check_username_sql = "SELECT * FROM users WHERE username='$username'";
    $check_username_result = $conn->query($check_username_sql);

    if ($check_username_result->num_rows > 0) {
        // Username sudah terdaftar
        echo "Username sudah terdaftar. Silakan gunakan username lain.";
    } else {
        // Hash password sebelum disimpan ke database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Tambahkan pengguna baru ke database
        $register_sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

        if ($conn->query($register_sql) === TRUE) {
            // Pendaftaran berhasil, arahkan ke index.php
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $register_sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-semibold mb-4">Register</h2>

        <!-- Form Pendaftaran -->
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
                <input type="submit" value="Register" class="w-full bg-indigo-500 text-white font-semibold px-4 py-2 rounded hover:bg-indigo-600">
            </div>
        </form>
        <p class="text-gray-700 text-sm">Already have an account? <a href="login.php" class="text-indigo-500 hover:underline">Login here</a></p>
    </div>
</body>

</html>