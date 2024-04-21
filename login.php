<?php
session_start();

// Jika pengguna sudah login, redirect ke halaman utama
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}