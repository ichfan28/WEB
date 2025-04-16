<?php
include 'includes/auth_check.php';
if ($_SESSION['user']['role'] !== 'staff') {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HelmKu - Staff</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <main>
        <h1>Halaman Staff</h1>
        <p>Selamat datang, <?php echo $_SESSION['user']['nama']; ?>!</p>

        <section class="staff-section">
            <h2>Input Penjualan</h2>
            <form class="staff-form">
                <div class="form-group">
                    <label for="nama_pelanggan">Nama Pelanggan:</label>
                    <input type="text" id="nama_pelanggan" name="nama_pelanggan" required>
                </div>

                <div class="form-group">
                    <label for="produk_terjual">Produk Terjual:</label>
                    <select id="produk_terjual" name="produk_terjual" required>
                        <option value="">Pilih Produk</option>
                        <option value="rx7">Helm Full Face RX-7</option>
                        <option value="m12">Helm Modular M-12</option>
                        <option value="o5">Helm Open Face O-5</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah:</label>
                    <input type="number" id="jumlah" name="jumlah" min="1" required>
                </div>

                <div class="form-group">
                    <label for="metode_pembayaran">Metode Pembayaran:</label>
                    <select id="metode_pembayaran" name="metode_pembayaran" required>
                        <option value="tunai">Tunai</option>
                        <option value="kredit">Kredit</option>
                        <option value="transfer">Transfer Bank</option>
                    </select>
                </div>

                <button type="submit" class="btn">Simpan Transaksi</button>
            </form>
        </section>

        <section class="staff-section">
            <h2>Stok Produk</h2>
            <table class="stock-table">
                <tr>
                    <th>Produk</th>
                    <th>Stok Tersedia</th>
                </tr>
                <tr>
                    <td>Helm Full Face RX-7</td>
                    <td>45</td>
                </tr>
                <tr>
                    <td>Helm Modular M-12</td>
                    <td>32</td>
                </tr>
                <tr>
                    <td>Helm Open Face O-5</td>
                    <td>28</td>
                </tr>
            </table>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>

</html>