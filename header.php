<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Saya</title>
    <!-- Tambahkan Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <header class="bg-indigo-600 py-4">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <h1 class="text-white text-2xl font-bold">JJ CMS</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="index.php" class="text-white hover:text-gray-200">Beranda</a></li>
                    <li><a href="logout.php" class="text-white hover:text-gray-200">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>