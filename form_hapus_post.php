<?php
// Sambungkan ke database
include('koneksi.php');

// Periksa apakah ada parameter id post yang dikirim melalui URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk hapus post berdasarkan id
    $sql = "DELETE FROM posts WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Post berhasil dihapus.');</script>";
        // Redirect user ke halaman show_post.php setelah post berhasil dihapus
        header("Location: show_post.php");
        exit();
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }

    // Tutup koneksi database
    $conn->close();
} else {
    echo "<script>alert('ID post tidak valid.');</script>";
    exit();
}
