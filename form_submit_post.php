<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Post</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<?php
include('header.php')
?>

<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Tambah Post Baru</h1>
        <form action="proses_submit_post.php" method="post" class="max-w-lg">
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Judul</label>
                <input type="text" id="title" name="title" class="w-full py-2 px-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <label for="content" class="block text-gray-700">Konten</label>
                <textarea id="content" name="content" rows="4" cols="50" class="w-full py-2 px-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
            </div>
            <div class="mb-4">
                <label for="author" class="block text-gray-700">Pengarang</label>
                <input type="text" id="author" name="author" class="w-full py-2 px-2 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
                <input type="submit" value="Tambah Post" class="w-full bg-indigo-500 text-white font-semibold px-4 py-2 rounded hover:bg-indigo-600">
            </div>
        </form>
    </div>
</body>

</html>