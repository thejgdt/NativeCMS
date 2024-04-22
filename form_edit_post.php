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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="content max-w-4xl mx-auto mt-8 px-4">
        <h1 class="text-2xl font-bold mb-4">Edit Post</h1>
        <form action="" method="post">
            <label for="judul">Judul</label><br>
            <input type="text" id="judul" name="judul" value="<?php echo $post['judul']; ?>"><br>
            <label for="konten">Konten</label><br>
            <textarea id="konten" name="konten" rows="4" cols="50"><?php echo $post['konten']; ?></textarea><br><br>
            <input type="submit" value="Update Post">
        </form>
    </div>
</body>

</html>