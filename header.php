<?php

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HelmKu - <?php echo $title ?? 'Beranda'; ?></title>
    <link rel="tampilan.css" href="tampilan.css">
</head>

<body>
    <header>
        <div class="logo-center img">
            <img src="helem10.jpeg" alt="Logo HelmKu">
            <h1>HelemKu</h1>
        </div>
        <nav class="navbar">
            <div class="navbar-container">
                <div class="navbar-brand">
                    <a href="index.php">
                    </a>
                </div>

                <div class="navbar-toggle" id="mobile-menu">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>

                <ul class="navbar-menu">
                    <li class="navbar-item">
                        <a href="index.php" class="navbar-link">
                            <span class="nav-icon">🏠</span>
                            <span class="nav-text">Beranda</span>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="produk.php" class="navbar-link">
                            <span class="nav-icon">🛍️</span>
                            <span class="nav-text">Produk</span>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="Tentang Kami.php" class="navbar-link">
                            <span class="nav-icon">ℹ️</span>
                            <span class="nav-text">Tentang Kami</span>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="Kontak.php" class="navbar-link">
                            <span class="nav-icon">📞</span>
                            <span class="nav-text">Kontak</span>
                        </a>
                    </li>
                    <?php if (isset($_SESSION['user'])): ?>
                        <li class="navbar-item">
                            <a href="logout.php" class="navbar-link logout-btn">
                                <span class="nav-icon">🚪</span>
                                <span class="nav-text">Logout</span>
                            </a>
                        </li>
                        <li class="navbar-item user-greeting">
                            <span class="user-icon">👋</span>
                            <span>Halo, <?php echo $_SESSION['user']['nama']; ?></span>
                        </li>
                    <?php else: ?>
                        <li class="navbar-item">
                            <a href="login.php" class="navbar-link login-btn">
                                <span class="nav-icon">🔑</span>
                                <span class="nav-text">Login</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
</body>