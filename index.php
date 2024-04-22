<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JJ CMS</title>
    <!-- Tailwind CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-100">
    <?php
    session_start();

    // Periksa apakah pengguna sudah login
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }

    // Tambahkan header
    include('header.php');
    ?>

    <div class="flex">
        <?php
        // Tambahkan sidebar
        include('sidebar.php');
        ?>

        <div class="flex-1">
            <?php
            // Konten halaman
            include('konten.php');
            ?>
        </div>
    </div>

    <?php
    include('footer.php');
    ?>
</body>

</html>