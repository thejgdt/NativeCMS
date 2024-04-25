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
        echo "<script>alert('Post tidak ditemukan.');</script>";
        exit();
    }
} else {
    echo "<script>alert('ID post tidak valid.');</script>";
    exit();
}

// Proses update post jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];

    // Query untuk update post
    $sql = "UPDATE posts SET title='$title', content='$content', author='$author' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Post berhasil diupdate.');</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
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

<?php
include('header.php');
?>

<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Edit Post</h1>
        <form method="post" class="max-w-lg">
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Judul</label>
                <input type="text" id="title" name="title" class="w-full py-2 px-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="<?php echo $post['title']; ?>">
            </div>
            <div class="mb-4">
                <label for="content" class="block text-gray-700">Konten</label>
                <textarea id="content" name="content" rows="4" cols="50" class="w-full py-2 px-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"><?php echo $post['content']; ?></textarea>
            </div>
            <div class="mb-4">
                <label for="author" class="block text-gray-700">Pengarang</label>
                <input type="text" id="author" name="author" class="w-full py-2 px-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="<?php echo $post['author']; ?>">
            </div>
            <div class="mb-4">
                <input type="submit" value="Update Post" class="w-full bg-indigo-500 text-white font-semibold px-4 py-2 rounded hover:bg-indigo-600">
            </div>
        </form>
    </div>
</body>

</html>