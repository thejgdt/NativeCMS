<?php
// Sambungkan ke database
include('koneksi.php');

// Tangkap data dari form
$title = $_POST['title'];
$content = $_POST['content'];

// Query untuk memasukkan data ke dalam database
$sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
if ($conn->query($sql) === TRUE) {
    // Jika berhasil ditambahkan, arahkan kembali ke halaman utama
    header("Location: show_post.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi database
$conn->close();
