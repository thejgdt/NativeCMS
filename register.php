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
