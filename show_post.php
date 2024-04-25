<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Post</title>
    <!-- Tambahkan Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<?php
include('header.php');
?>

<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Daftar Post</h1>
        <?php
        // Sambungkan ke database
        include('koneksi.php');

        // Query untuk mendapatkan semua post
        $sql = "SELECT * FROM posts";
        $result = $conn->query($sql);

        // Tampilkan post dalam bentuk daftar
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='bg-white p-6 mb-4 rounded shadow-md'>";
                echo "<div class='flex justify-between'>";
                echo "<h2 class='text-xl font-bold mb-2'>" . $row["title"] . "</h2>";
                echo "<h2 class='text-sm flex flex-col'>";
                echo "Pengarang <br>";
                echo "<span class='text-xl font-bold'>" . $row["author"] . "</span>";
                echo "</h2>";
                echo "</div>";
                echo "<p class='text-gray-700'>" . $row["content"] . "</p>";
                // Tambahkan tombol edit dan hapus dengan tautan ke form_edit_post.php dan form_hapus_post.php
                echo "<div class='mt-4 flex'>";
                echo "<a href='form_edit_post.php?id=" . $row['id'] . "' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2 rounded'>Edit</a>";
                echo "<a href='form_hapus_post.php?id=" . $row['id'] . "' class='bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded'>Delete</a>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p class='text-gray-700'>Belum ada post.</p>";
        }

        // Tutup koneksi database
        $conn->close();
        ?>
    </div>
</body>

</html>