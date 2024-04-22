<?php
// Sambungkan ke database
include('koneksi.php');

// Sambungkan dengan template header
include('header.php');

// Periksa apakah ada parameter id post yang dikirim melalui URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk hapus post berdasarkan id
    $sql = "DELETE FROM posts WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Post berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi database
    $conn->close();
} else {
    echo "ID post tidak valid.";
    exit();
}
