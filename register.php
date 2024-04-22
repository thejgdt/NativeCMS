<?php
// Tambahkan koneksi database
include('koneksi.php');

// Proses pendaftaran
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai yang dikirim dari form pendaftaran
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Tambahkan pengguna baru ke database
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) == TRUE) {
        echo "Pendaftaran berhasil";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <div>
        <h2>Register</h2>

        <!-- Form Pendaftaran -->
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
                <input type="submit" value="Register">
            </div>
        </form>
    </div>
</body>

</html>