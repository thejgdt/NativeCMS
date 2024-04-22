<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Post</title>
    <!-- Tambahkan Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

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
                echo "<h2 class='text-xl font-bold mb-2'>" . $row["title"] . "</h2>";
                echo "<p class='text-gray-700'>" . $row["content"] . "</p>";
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