<?php
include 'includes/auth_check.php';
if ($_SESSION['user']['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HelmKu - Admin</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <main>
        <h1>Halaman Admin</h1>
        <p>Selamat datang, <?php echo $_SESSION['user']['nama']; ?>!</p>

        <section class="admin-section">
            <h2>Kelola Produk</h2>
            <form class="admin-form">
                <div class="form-group">
                    <label for="nama_produk">Nama Produk:</label>
                    <input type="text" id="nama_produk" name="nama_produk" required>
                </div>

                <div class="form-group">
                    <label for="jenis_produk">Jenis Produk:</label>
                    <select id="jenis_produk" name="jenis_produk" required>
                        <option value="fullface">Full Face</option>
                        <option value="modular">Modular</option>
                        <option value="openface">Open Face</option>
                        <option value="offroad">Off Road</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="harga_produk">Harga:</label>
                    <input type="number" id="harga_produk" name="harga_produk" required>
                </div>

                <div class="form-group">
                    <label>Status Produk:</label>
                    <div class="radio-group">
                        <label><input type="radio" name="status" value="tersedia" checked> Tersedia</label>
                        <label><input type="radio" name="status" value="habis"> Habis</label>
                        <label><input type="radio" name="status" value="preorder"> Pre-order</label>
                    </div>
                </div>

                <button type="submit" class="btn">Simpan Produk</button>
            </form>
        </section>

        <section class="admin-section">
            <h2>Laporan Penjualan</h2>
            <div class="report">
                <p>Total Penjualan Bulan Ini: 125 helm</p>
                <p>Pendapatan: Rp 98.750.000</p>
                <p>Produk Terlaris: Helm Full Face RX-7</p>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>

</html>