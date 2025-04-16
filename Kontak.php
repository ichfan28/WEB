<?php
session_start();

// Simulasi pengiriman form
$success_message = '';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';

    // Validasi sederhana
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $error_message = 'Harap isi semua field yang wajib diisi!';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = 'Format email tidak valid!';
    } else {
        // Simulasi pengiriman berhasil
        $success_message = 'Pesan Anda telah berhasil dikirim! Kami akan menghubungi Anda segera.';

        // Reset form
        $_POST = array();
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HelmKu - Hubungi Kami</title>
    <link rel="stylesheet" href="tampilan.css">
    <style>
        /* Additional Styles for Contact Page */
        .contact-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('assets/images/contact-banner.jpg') no-repeat center center/cover;
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            margin-bottom: 3rem;
        }

        .contact-hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .contact-hero p {
            font-size: 1.2rem;
            max-width: 700px;
        }

        .contact-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 3rem;
        }

        .contact-info {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .contact-info h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: #1a1a1a;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .contact-info h2::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 4px;
            background: #f8c537;
        }

        .contact-method {
            display: flex;
            align-items: flex-start;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .contact-icon {
            font-size: 1.8rem;
            color: #f8c537;
            min-width: 40px;
            text-align: center;
        }

        .contact-details h3 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .contact-details p,
        .contact-details a {
            color: #666;
            text-decoration: none;
            transition: color 0.3s;
        }

        .contact-details a:hover {
            color: #f8c537;
        }

        .business-hours {
            margin-top: 3rem;
        }

        .business-hours h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: #333;
        }

        .hours-table {
            width: 100%;
        }

        .hours-table tr {
            border-bottom: 1px solid #eee;
        }

        .hours-table td {
            padding: 0.7rem 0;
            color: #666;
        }

        .hours-table td:first-child {
            font-weight: bold;
            color: #333;
        }

        .contact-form-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .contact-form-container h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: #1a1a1a;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .contact-form-container h2::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 4px;
            background: #f8c537;
        }

        .contact-form-container p {
            color: #666;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #333;
        }

        .form-group label .required {
            color: #e74c3c;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #f8c537;
            outline: none;
        }

        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            background: #f8c537;
            color: #1a1a1a;
            border: none;
            padding: 1rem 2rem;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .submit-btn:hover {
            background: #e0b431;
        }

        .alert {
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1.5rem;
            font-weight: bold;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .map-container {
            margin-top: 3rem;
            grid-column: 1 / -1;
        }

        .map-container iframe {
            width: 100%;
            height: 400px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        @media (max-width: 768px) {
            .contact-hero h1 {
                font-size: 2.2rem;
            }

            .contact-hero p {
                font-size: 1rem;
            }

            .contact-container {
                grid-template-columns: 1fr;
            }
        }

        .logo-center {
            text-align: center;
            margin: 3rem 0;
            padding: 1rem;
        }

        .logo-center img {
            max-width: 400px;
            height: auto;
            transition: all 0.3s ease;
        }

        .logo-center img:hover {
            transform: scale(1.1);
            filter: brightness(1.1);
        }

        .logo-text {
            margin-top: 1rem;
            font-size: 2rem;
            color: #1a1a1a;
            letter-spacing: 2px;
        }

        .logo-tagline {
            color: #666;
            font-style: italic;
            margin-top: 0.5rem;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>

    <!-- Hero Section -->
    <section class="contact-hero">
        <h1>Hubungi Kami</h1>
        <p>Kami siap membantu menjawab semua pertanyaan Anda tentang produk dan layanan kami</p>
    </section>

    <!-- Contact Container -->
    <div class="contact-container">
        <!-- Contact Information -->
        <div class="contact-info">
            <h2>Informasi Kontak</h2>

            <div class="contact-method">
                <div class="contact-icon">📍</div>
                <div class="contact-details">
                    <h3>Alamat Kantor</h3>
                    <p>Jl. Raya Kesehatan No. 123<br>Jakarta Selatan, DKI Jakarta 12520</p>
                </div>
            </div>

            <div class="contact-method">
                <div class="contact-icon">📞</div>
                <div class="contact-details">
                    <h3>Telepon</h3>
                    <p><a href="tel:+622112345678">(021) 1234-5678</a><br>
                        <a href="tel:+6281234567890">0812-3456-7890</a> (WhatsApp)
                    </p>
                </div>
            </div>

            <div class="contact-method">
                <div class="contact-icon">✉️</div>
                <div class="contact-details">
                    <h3>Email</h3>
                    <p><a href="mailto:info@helmku.com">info@helmku.com</a><br>
                        <a href="mailto:cs@helmku.com">cs@helmku.com</a>
                    </p>
                </div>
            </div>

            <div class="business-hours">
                <h3>Jam Operasional</h3>
                <table class="hours-table">
                    <tr>
                        <td>Senin - Jumat</td>
                        <td>08:00 - 17:00 WIB</td>
                    </tr>
                    <tr>
                        <td>Sabtu</td>
                        <td>09:00 - 15:00 WIB</td>
                    </tr>
                    <tr>
                        <td>Minggu & Hari Libur</td>
                        <td>Tutup</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-form-container">
            <h2>Kirim Pesan</h2>
            <p>Silakan isi form berikut untuk menghubungi kami. Tim customer service akan merespons secepat mungkin.</p>

            <?php if ($success_message): ?>
                <div class="alert alert-success"><?php echo $success_message; ?></div>
            <?php endif; ?>

            <?php if ($error_message): ?>
                <div class="alert alert-error"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <form method="POST" action="contact.php">
                <div class="form-group">
                    <label for="name">Nama Lengkap <span class="required">*</span></label>
                    <input type="text" id="name" name="name"
                        value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Alamat Email <span class="required">*</span></label>
                    <input type="email" id="email" name="email"
                        value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                </div>

                <div class="form-group">
                    <label for="subject">Subjek <span class="required">*</span></label>
                    <select id="subject" name="subject" required>
                        <option value="">Pilih Subjek</option>
                        <option value="Pertanyaan Produk" <?php echo (isset($_POST['subject']) && $_POST['subject'] === 'Pertanyaan Produk') ? 'selected' : ''; ?>>Pertanyaan Produk</option>
                        <option value="Pemesanan" <?php echo (isset($_POST['subject']) && $_POST['subject'] === 'Pemesanan') ? 'selected' : ''; ?>>Pemesanan</option>
                        <option value="Garansi" <?php echo (isset($_POST['subject']) && $_POST['subject'] === 'Garansi') ? 'selected' : ''; ?>>Garansi</option>
                        <option value="Keluhan" <?php echo (isset($_POST['subject']) && $_POST['subject'] === 'Keluhan') ? 'selected' : ''; ?>>Keluhan</option>
                        <option value="Lainnya" <?php echo (isset($_POST['subject']) && $_POST['subject'] === 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="message">Pesan Anda <span class="required">*</span></label>
                    <textarea id="message" name="message"
                        required><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
                </div>

                <button type="submit" class="submit-btn">KIRIM PESAN</button>
            </form>
        </div>

        <!-- Map -->
        <div class="map-container">
            <h2>Lokasi Kami</h2>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613506864!3d-6.194741395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e839560a52ab!2sMonumen%20Nasional!5e0!3m2!1sid!2sid!4v1621234567890!5m2!1sid!2sid"
                allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script>
        // Simple form validation enhancement
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');

            form.addEventListener('submit', function (e) {
                let valid = true;
                const requiredFields = form.querySelectorAll('[required]');

                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        field.style.borderColor = '#e74c3c';
                        valid = false;
                    } else {
                        field.style.borderColor = '#ddd';
                    }
                });

                // Email validation
                const emailField = document.getElementById('email');
                if (emailField.value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailField.value)) {
                    emailField.style.borderColor = '#e74c3c';
                    valid = false;
                }

                if (!valid) {
                    e.preventDefault();
                    alert('Harap isi semua field yang wajib diisi dengan benar!');
                }
            });

            // Reset field styles on input
            const inputs = form.querySelectorAll('input, textarea, select');
            inputs.forEach(input => {
                input.addEventListener('input', function () {
                    this.style.borderColor = '#ddd';
                });
            });
        });
    </script>
</body>

</html>