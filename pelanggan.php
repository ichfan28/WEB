<?php
include 'includes/auth_check.php';
if ($_SESSION['user']['role'] !== 'pelanggan') {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HelmKu - Pelanggan</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <main>
        <h1>Halaman Pelanggan</h1>
        <p>Selamat datang, <?php echo $_SESSION['user']['nama']; ?>!</p>

        <section class="customer-section">
            <h2>Pesan Helm Custom</h2>
            <form class="customer-form">
                <div class="form-group">
                    <label for="model_helm">Model Helm:</label>
                    <select id="model_helm" name="model_helm" required>
                        <option value="">Pilih Model</option>
                        <option value="fullface">Full Face</option>
                        <option value="modular">Modular</option>
                        <option value="openface">Open Face</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="warna">Warna:</label>
                    <input type="text" id="warna" name="warna" required>
                </div>

                <div class="form-group">
                    <label for="ukuran">Ukuran:</label>
                    <div class="radio-group">
                        <label><input type="radio" name="ukuran" value="S" required> S</label>
                        <label><input type="radio" name="ukuran" value="M"> M</label>
                        <label><input type="radio" name="ukuran" value="L"> L</label>
                        <label><input type="radio" name="ukuran" value="XL"> XL</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="desain">Desain Kustom:</label>
                    <textarea id="desain" name="desain" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label for="aksesoris">Aksesoris Tambahan:</label>
                    <div class="checkbox-group">
                        <label><input type="checkbox" name="aksesoris[]" value="visor"> Visor Tambahan</label>
                        <label><input type="checkbox" name="aksesoris[]" value="kantung"> Kantung Helm</label>
                        <label><input type="checkbox" name="aksesoris[]" value="stiker"> Paket Stiker</label>
                    </div>
                </div>

                <button type="submit" class="btn">Pesan Sekarang</button>
            </form>
        </section>

        <section class="customer-section">
            <h2>Riwayat Pesanan</h2>
            <div class="order-history">
                <p>Anda belum memiliki pesanan.</p>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>

</html>