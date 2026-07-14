<?php
// Mendapatkan nama file halaman saat ini untuk menandai menu navigasi aktif
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? $page_title : "Website Informatika"; ?></title>
    <!-- Memanggil CSS Modern -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="main-header">
    <div class="container navbar">
        <div class="nav-brand">
            <span>🎓 Web Informatika</span>
        </div>
        <nav>
            <ul class="nav-menu">
                <li>
                    <a href="index.php" class="nav-link <?= ($current_page == 'index.php') ? 'active' : ''; ?>">Home</a>
                </li>
                <li>
                    <a href="profile.php" class="nav-link <?= ($current_page == 'profile.php') ? 'active' : ''; ?>">Profile</a>
                </li>
                <li>
                    <a href="contact.php" class="nav-link <?= ($current_page == 'contact.php') ? 'active' : ''; ?>">Contact</a>
                </li>
                <li>
                    <a href="mahasiswa.php" class="nav-link <?= in_array($current_page, ['mahasiswa.php', 'inputdata.php', 'editdata.php']) ? 'active' : ''; ?>">Data Mahasiswa</a>
                </li>
            </ul>
        </nav>
    </div>
</header>

<main class="container main-content">
