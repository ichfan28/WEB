<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HelmKu - Tentang Kami</title>
    <link rel="stylesheet" href="tampilan.css">
    <style>
        /* Additional Styles for About Page */
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

        .about-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('assets/images/about-banner.jpg') no-repeat center center/cover;
            height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            margin-bottom: 3rem;
        }

        .about-hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .about-hero p {
            font-size: 1.3rem;
            max-width: 700px;
        }

        .about-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .about-section {
            display: flex;
            align-items: center;
            gap: 3rem;
            margin-bottom: 4rem;
        }

        .about-section.reverse {
            flex-direction: row-reverse;
        }

        .about-image {
            flex: 1;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .about-image img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.5s;
        }

        .about-image:hover img {
            transform: scale(1.05);
        }

        .about-content {
            flex: 1;
        }

        .about-content h2 {
            font-size: 2.2rem;
            margin-bottom: 1.5rem;
            color: #1a1a1a;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .about-content h2::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 4px;
            background: #f8c537;
        }

        .about-content p {
            margin-bottom: 1.5rem;
            line-height: 1.8;
            color: #555;
        }

        .mission-vision {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 4rem 0;
        }

        .mission-card,
        .vision-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: transform 0.3s;
        }

        .mission-card:hover,
        .vision-card:hover {
            transform: translateY(-10px);
        }

        .mission-card h3,
        .vision-card h3 {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            color: #1a1a1a;
        }

        .mission-card .icon,
        .vision-card .icon {
            font-size: 3rem;
            color: #f8c537;
            margin-bottom: 1.5rem;
            display: inline-block;
        }

        .team-section {
            margin: 5rem 0;
            text-align: center;
        }

        .team-section h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #1a1a1a;
        }

        .team-section p.subtitle {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 3rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .team-member {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .team-member:hover {
            transform: translateY(-10px);
        }

        .team-member-image {
            height: 300px;
            overflow: hidden;
        }

        .team-member-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .team-member:hover .team-member-image img {
            transform: scale(1.1);
        }

        .team-member-info {
            padding: 1.5rem;
        }

        .team-member-info h3 {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            color: #1a1a1a;
        }

        .team-member-info p.position {
            color: #f8c537;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .team-member-info p.bio {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            background: #f5f5f5;
            border-radius: 50%;
            color: #333;
            transition: all 0.3s;
        }

        .social-links a:hover {
            background: #f8c537;
            color: white;
        }

        .values-section {
            margin: 5rem 0;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .value-card {
            text-align: center;
            padding: 2rem 1.5rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
        }

        .value-card:hover {
            transform: translateY(-10px);
        }

        .value-icon {
            font-size: 2.5rem;
            color: #f8c537;
            margin-bottom: 1.5rem;
        }

        .value-card h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: #1a1a1a;
        }

        .value-card p {
            color: #666;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {

            .about-section,
            .about-section.reverse {
                flex-direction: column;
            }

            .about-image,
            .about-content {
                width: 100%;
            }

            .about-hero h1 {
                font-size: 2.5rem;
            }

            .about-hero p {
                font-size: 1.1rem;
            }
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>

    <!-- Hero Section -->
    <section class="about-hero">
        <h1>Tentang HelmKu</h1>
        <p>Perjalanan kami dalam menyediakan perlindungan terbaik untuk pengendara sejak 2010</p>
    </section>

    <!-- About Container -->
    <div class="about-container">
        <!-- Our Story Section -->
        <section class="about-section">
            <div class="about-image">
                <img src="pabrik helem.jpeg" alt="Sejarah HelmKu">
            </div>
            <div class="about-content">
                <h2>Cerita Kami</h2>
                <p>HelmKu didirikan pada tahun 2010 dengan misi tunggal: menyediakan helm berkualitas tinggi dengan
                    harga terjangkau untuk semua pengendara di Indonesia. Berawal dari sebuah bengkel kecil di Jakarta,
                    kami telah berkembang menjadi salah satu merek helm terpercaya di negara ini.</p>
                <p>Dengan semangat inovasi dan komitmen terhadap keselamatan, setiap helm yang kami produksi melalui
                    proses pengujian ketat untuk memastikan perlindungan maksimal bagi pengguna.</p>
                <p>Kini, dengan lebih dari 50 karyawan dan 3 pabrik produksi, HelmKu terus berkomitmen untuk
                    menghadirkan produk-produk terbaik dengan teknologi terkini.</p>
            </div>
        </section>

        <!-- Why Choose Us Section -->
        <section class="about-section reverse">
            <div class="about-image">
                <img src="pabrik helem2.jpeg" alt="Mengapa Memilih HelmKu">
            </div>
            <div class="about-content">
                <h2>Mengapa Memilih HelmKu?</h2>
                <p>Kami bukan sekadar menjual helm, tetapi memberikan solusi perlindungan terbaik untuk aktivitas
                    berkendara Anda sehari-hari.</p>
                <p><strong>Material Berkualitas:</strong> Menggunakan bahan-bahan terbaik yang tahan lama dan nyaman
                    digunakan.</p>
                <p><strong>Desain Ergonomis:</strong> Dirancang khusus untuk kenyamanan pengendara Asia dengan sirkulasi
                    udara optimal.</p>
                <p><strong>Standar Keamanan:</strong> Semua produk kami memenuhi standar SNI dan memiliki sertifikasi
                    internasional.</p>
                <p><strong>Layanan Purna Jual:</strong> Garansi produk dan layanan perawatan helm di seluruh jaringan
                    dealer kami.</p>
            </div>
        </section>

        <!-- Mission & Vision -->
        <div class="mission-vision">
            <div class="mission-card">
                <div class="icon">🎯</div>
                <h3>Misi Kami</h3>
                <p>Memberikan perlindungan terbaik bagi pengendara melalui produk helm berkualitas tinggi dengan
                    teknologi terkini, didukung oleh layanan purna jual yang memuaskan.</p>
            </div>

            <div class="vision-card">
                <div class="icon">👁️</div>
                <h3>Visi Kami</h3>
                <p>Menjadi merek helm pilihan utama di Asia Tenggara dengan inovasi terus-menerus dalam desain dan
                    teknologi keselamatan berkendara.</p>
            </div>
        </div>

        <!-- Our Values -->
        <section class="values-section">
            <h2 style="text-align: center; margin-bottom: 1.5rem;">Nilai-Nilai Kami</h2>
            <p style="text-align: center; max-width: 700px; margin: 0 auto 3rem; color: #666;">
                Fondasi yang membangun budaya dan etos kerja HelmKu
            </p>

            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">🛡️</div>
                    <h3>Keselamatan</h3>
                    <p>Keselamatan pengguna adalah prioritas utama dalam setiap produk yang kami buat.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">💡</div>
                    <h3>Inovasi</h3>
                    <p>Terus berinovasi untuk menghadirkan teknologi terbaru dalam perlindungan helm.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">🤝</div>
                    <h3>Integritas</h3>
                    <p>Kejujuran dan transparansi dalam setiap aspek bisnis kami.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">❤️</div>
                    <h3>Kepedulian</h3>
                    <p>Peduli terhadap keselamatan pengendara dan lingkungan sekitar.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon">🏆</div>
                    <h3>Kualitas</h3>
                    <p>Tidak pernah berkompromi dengan kualitas produk dan layanan kami.</p>
                </div>
            </div>
        </section>

        <!-- Our Team -->
        <section class="team-section">
            <h2>Tim Kami</h2>
            <p class="subtitle">Orang-orang di balik kesuksesan HelmKu yang berdedikasi untuk memberikan yang terbaik
            </p>

            <div class="team-grid">
                <div class="team-member">
                    <div class="team-member-image">
                        <img src="CEO.jpeg" alt="Budi Santoso">
                    </div>
                    <div class="team-member-info">
                        <h3>Jeff Bezos</h3>
                        <p class="position">CEO & Founder</p>
                        <p class="bio">Pendiri HelmKu dengan pengalaman lebih dari 15 tahun di industri perlengkapan
                            keselamatan berkendara.</p>
                        <div class="social-links">
                            <a href="#">📱</a>
                            <a href="#">💼</a>
                            <a href="#">📧</a>
                        </div>
                    </div>
                </div>

                <div class="team-member">
                    <div class="team-member-image">
                        <img src="kepala desain.jpeg" alt="Ani Fitriani">
                    </div>
                    <div class="team-member-info">
                        <h3>Elon Musk</h3>
                        <p class="position">Kepala Desain</p>
                        <p class="bio">Bertanggung jawab atas semua desain produk HelmKu dengan pendekatan ergonomis dan
                            stylish.</p>
                        <div class="social-links">
                            <a href="#">📱</a>
                            <a href="#">💼</a>
                            <a href="#">📧</a>
                        </div>
                    </div>
                </div>

                <div class="team-member">
                    <div class="team-member-image">
                        <img src="manajer.jpeg" alt="David Wijaya">
                    </div>
                    <div class="team-member-info">
                        <h3>Mark Zugerberk</h3>
                        <p class="position">Manajer Produksi</p>
                        <p class="bio">Memastikan setiap helm yang diproduksi memenuhi standar kualitas tertinggi.</p>
                        <div class="social-links">
                            <a href="#">📱</a>
                            <a href="#">💼</a>
                            <a href="#">📧</a>
                        </div>
                    </div>
                </div>

                <div class="team-member">
                    <div class="team-member-image">
                        <img src="pemasaran.jpeg" alt="Citra Dewi">
                    </div>
                    <div class="team-member-info">
                        <h3>Bill Gates</h3>
                        <p class="position">Manajer Pemasaran</p>
                        <p class="bio">Membawa HelmKu dikenal luas melalui strategi pemasaran yang kreatif.</p>
                        <div class="social-links">
                            <a href="#">📱</a>
                            <a href="#">💼</a>
                            <a href="#">📧</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include 'footer.php'; ?>

    <script>
        // Simple animation for about page
        document.addEventListener('DOMContentLoaded', function () {
            const aboutSections = document.querySelectorAll('.about-section, .mission-card, .vision-card, .value-card, .team-member');

            const animateOnScroll = function () {
                aboutSections.forEach(section => {
                    const sectionPosition = section.getBoundingClientRect().top;
                    const screenPosition = window.innerHeight / 1.3;

                    if (sectionPosition < screenPosition) {
                        section.style.opacity = '1';
                        section.style.transform = 'translateY(0)';
                    }
                });
            };

            // Set initial state
            aboutSections.forEach(section => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(20px)';
                section.style.transition = 'all 0.6s ease';
            });

            window.addEventListener('scroll', animateOnScroll);
            animateOnScroll(); // Trigger on load
        });
    </script>
</body>

</html>