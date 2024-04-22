<?php
// Sambungkan ke database
include('koneksi.php');

// Periksa apakah ada parameter id post yang dikirim melalui URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mendapatkan data post berdasarkan id
    $sql = "SELECT * FROM posts WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
    } else {
        echo "Post tidak ditemukan.";
        exit();
    }
} else {
    echo "ID post tidak valid.";
    exit();
}

// Proses update post jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['title'];
    $konten = $_POST['content'];

    // Query untuk update post
    $sql = "UPDATE posts SET judul='$judul', konten='$konten' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Post berhasil diupdate.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi database
    $conn->close();
}
