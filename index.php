<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HelmKu - Beranda</title>
    <link rel="stylesheet" href="tampilan.css">
    <style>
        /* Additional Styles for Index Page */
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



        .hero {
            position: relative;
            height: 70vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            padding: 0 2rem;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('helem4.jpeg') no-repeat center center/cover;
        }

        .hero-content {
            max-width: 800px;
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero p {
            font-size: 1.8rem;
            margin-bottom: 2.5rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        .btn-primary {
            background-color: #f8c537;
            color: #1a1a1a;
        }

        .btn-secondary {
            background-color: transparent;
            color: white;
            border: 2px solid white;
        }

        .features {
            display: flex;
            justify-content: space-around;
            padding: 4rem 2rem;
            background-color: #fff;
        }

        .feature-card {
            text-align: center;
            max-width: 300px;
            padding: 2rem;
            border-radius: 10px;
            transition: transform 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .feature-icon {
            font-size: 3rem;
            color: #f8c537;
            margin-bottom: 1.5rem;
        }

        .feature-card h3 {
            margin-bottom: 1rem;
            color: #333;
        }

        .feature-card p {
            color: #666;
        }

        .promo-banner {
            background-color: #1a1a1a;
            color: white;
            padding: 3rem;
            text-align: center;
        }

        .promo-banner h2 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }

        .promo-banner p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto 2rem;
        }

        .testimonials {
            padding: 4rem 2rem;
            background-color: #f9f9f9;
            text-align: center;
        }

        .testimonials h2 {
            margin-bottom: 3rem;
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .testimonial-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .testimonial-text {
            font-style: italic;
            margin-bottom: 1.5rem;
            color: #555;
        }

        .testimonial-author {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Helm Berkualitas untuk Perlindungan Terbaik</h1>
            <p>Temukan koleksi helm terbaik dengan standar keamanan tinggi</p>
            <div class="cta-buttons">
                <a href="produk.php" class="btn btn-primary">Lihat Produk</a>
                <?php if (!isset($_SESSION['user'])): ?>
                    <a href="login.php" class="btn btn-secondary">Login Member</a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="feature-card">
            <div class="feature-icon">🛡️</div>
            <h3>Standar Keamanan Tinggi</h3>
            <p>Semua helm kami memenuhi standar keamanan internasional dengan material terbaik</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🚀</div>
            <h3>Desain Ergonomis</h3>
            <p>Dirancang untuk kenyamanan maksimal dengan aerodinamika yang optimal</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🎨</div>
            <h3>Customizable</h3>
            <p>Pilihan warna dan desain yang beragam sesuai kebutuhan Anda</p>
        </div>
    </section>

    <!-- Promo Banner -->
    <section class="promo-banner">
        <h2>PROMO SPESIAL HARI INI!</h2>
        <p>Dapatkan diskon 20% untuk semua produk helm full face dengan pembayaran tunai. Promo berlaku hingga 30
            November 2023.</p>
        <a href="products.php" class="btn btn-primary">BELI SEKARANG</a>
    </section>

    <!-- Featured Products -->
    <section class="featured-products">
        <h2>PRODUK UNGGULAN KAMI</h2>
        <p class="section-subtitle">Pilihan terbaik dari koleksi helm kami</p>

        <div class="products">
            <div class="product">
                <img src="assets/images/helm1.jpg" alt="Helm Full Face RX-7">
                <div class="product-info">
                    <h3>Helm Full Face RX-7</h3>
                    <div class="product-meta">
                        <span class="price">Rp 1.250.000</span>
                        <span class="rating">★★★★★</span>
                    </div>
                    <a href="#" class="btn btn-outline">Detail Produk</a>
                </div>
            </div>

            <div class="product">
                <img src="assets/images/helm2.jpg" alt="Helm Modular M-12">
                <div class="product-info">
                    <h3>Helm Modular M-12</h3>
                    <div class="product-meta">
                        <span class="price">Rp 950.000</span>
                        <span class="rating">★★★★☆</span>
                    </div>
                    <a href="#" class="btn btn-outline">Detail Produk</a>
                </div>
            </div>

            <div class="product">
                <img src="assets/images/helm3.jpg" alt="Helm Open Face O-5">
                <div class="product-info">
                    <h3>Helm Open Face O-5</h3>
                    <div class="product-meta">
                        <span class="price">Rp 650.000</span>
                        <span class="rating">★★★★☆</span>
                    </div>
                    <a href="#" class="btn btn-outline">Detail Produk</a>
                </div>
            </div>
        </div>

        <div class="view-all">
            <a href="produk.php" class="btn btn-primary">LIHAT SEMUA PRODUK</a>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials">
        <h2>APA KATA MEREKA</h2>
        <p class="section-subtitle">Testimoni dari pelanggan setia kami</p>

        <div class="testimonial-grid">
            <div class="testimonial-card">
                <p class="testimonial-text">"Helm dari HelmKu sangat nyaman dipakai dan memiliki fitur keamanan yang
                    lengkap. Saya merasa lebih aman berkendara dengan helm ini."</p>
                <p class="testimonial-author">- Budi Santoso, Pengendara Harian</p>
            </div>

            <div class="testimonial-card">
                <p class="testimonial-text">"Desainnya keren dan materialnya premium. Worth it untuk harganya.
                    Pelayanannya juga cepat dan ramah."</p>
                <p class="testimonial-author">- Ani Fitriani, Rider Community</p>
            </div>

            <div class="testimonial-card">
                <p class="testimonial-text">"Sudah 3 kali beli helm di sini untuk koleksi. Kualitas selalu konsisten dan
                    pilihan modelnya selalu update."</p>
                <p class="testimonial-author">- David Wijaya, Pecinta Helm</p>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter">
        <div class="newsletter-container">
            <h2>BERLANGGANAN NEWSLETTER KAMI</h2>
            <p>Dapatkan info promo dan produk terbaru langsung ke email Anda</p>

            <form class="newsletter-form">
                <input type="email" placeholder="Alamat email Anda" required>
                <button type="submit" class="btn btn-primary">BERLANGGANAN</button>
            </form>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script>
        // Simple animation on scroll
        document.addEventListener('DOMContentLoaded', function () {
            const featureCards = document.querySelectorAll('.feature-card');

            const animateOnScroll = function () {
                featureCards.forEach(card => {
                    const cardPosition = card.getBoundingClientRect().top;
                    const screenPosition = window.innerHeight / 1.3;

                    if (cardPosition < screenPosition) {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }
                });
            };

            // Set initial state
            featureCards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.6s ease';
            });

            window.addEventListener('scroll', animateOnScroll);
            animateOnScroll(); // Trigger on load
        });
    </script>
</body>

</html>