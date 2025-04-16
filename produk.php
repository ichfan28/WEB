<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HelmKu - Produk</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* Additional Styles for Products Page */
        .products-header {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('assets/images/helm-banner-2.jpg') no-repeat center center/cover;
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            margin-bottom: 3rem;
        }

        .products-header h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .products-header p {
            font-size: 1.2rem;
            max-width: 700px;
        }

        .products-container {
            padding: 0 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .products-filter {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .filter-group {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .filter-group label {
            font-weight: bold;
        }

        .filter-group select,
        .filter-group input {
            padding: 0.5rem 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .search-box {
            position: relative;
            flex-grow: 1;
            max-width: 400px;
        }

        .search-box input {
            width: 100%;
            padding: 0.5rem 1rem 0.5rem 2.5rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .search-box::before {
            content: "🔍";
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .product-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .product-image {
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .product-card:hover .product-image img {
            transform: scale(1.05);
        }

        .product-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #f8c537;
            color: #1a1a1a;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-category {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .product-title {
            font-size: 1.2rem;
            margin-bottom: 0.8rem;
            color: #333;
        }

        .product-price {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .current-price {
            font-size: 1.3rem;
            font-weight: bold;
            color: #f8c537;
        }

        .original-price {
            font-size: 1rem;
            text-decoration: line-through;
            color: #999;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .stars {
            color: #f8c537;
        }

        .review-count {
            font-size: 0.8rem;
            color: #666;
        }

        .product-actions {
            display: flex;
            gap: 0.8rem;
        }

        .add-to-cart {
            flex: 1;
            background: #f8c537;
            color: #1a1a1a;
            border: none;
            padding: 0.7rem;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .add-to-cart:hover {
            background: #e0b431;
        }

        .wishlist-btn {
            width: 40px;
            height: 40px;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .wishlist-btn:hover {
            border-color: #f8c537;
            color: #f8c537;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 3rem;
        }

        .pagination a,
        .pagination span {
            display: inline-block;
            padding: 0.5rem 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            color: #333;
            text-decoration: none;
        }

        .pagination a:hover {
            background: #f8c537;
            border-color: #f8c537;
            color: white;
        }

        .pagination .current {
            background: #f8c537;
            border-color: #f8c537;
            color: white;
        }

        @media (max-width: 768px) {
            .products-filter {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-group {
                flex-direction: column;
                align-items: stretch;
                gap: 0.5rem;
            }

            .search-box {
                max-width: 100%;
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

    <!-- Products Header -->
    <section class="products-header">
        <h1>Koleksi Helm Kami</h1>
        <p>Temukan helm berkualitas tinggi dengan berbagai pilihan model dan fitur keamanan terbaik</p>
    </section>

    <!-- Products Container -->
    <div class="products-container">
        <!-- Products Filter -->
        <div class="products-filter">
            <div class="filter-group">
                <label for="sort-by">Urutkan:</label>
                <select id="sort-by">
                    <option value="popular">Paling Populer</option>
                    <option value="newest">Terbaru</option>
                    <option value="price-low">Harga: Rendah ke Tinggi</option>
                    <option value="price-high">Harga: Tinggi ke Rendah</option>
                    <option value="rating">Rating Tertinggi</option>
                </select>
            </div>

            <div class="filter-group">
                <label for="category">Kategori:</label>
                <select id="category">
                    <option value="all">Semua Kategori</option>
                    <option value="fullface">Full Face</option>
                    <option value="modular">Modular</option>
                    <option value="openface">Open Face</option>
                    <option value="offroad">Off Road</option>
                </select>
            </div>

            <div class="filter-group">
                <label for="price-range">Harga:</label>
                <select id="price-range">
                    <option value="all">Semua Harga</option>
                    <option value="0-500">Rp 0 - 500.000</option>
                    <option value="500-1000">Rp 500.000 - 1.000.000</option>
                    <option value="1000-2000">Rp 1.000.000 - 2.000.000</option>
                    <option value="2000">> Rp 2.000.000</option>
                </select>
            </div>

            <div class="search-box">
                <input type="text" placeholder="Cari helm...">
            </div>
        </div>

        <!-- Product Grid -->
        <div class="product-grid">
            <!-- Product 1 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="helem1.jpeg" alt="Helm Full Face RX-7">
                    <span class="product-badge">BEST SELLER</span>
                </div>
                <div class="product-info">
                    <div class="product-category">Full Face</div>
                    <h3 class="product-title">Helm Full Face RX-7 Carbon</h3>
                    <div class="product-price">
                        <span class="current-price">Rp 1.250.000</span>
                        <span class="original-price">Rp 1.500.000</span>
                    </div>
                    <div class="product-rating">
                        <div class="stars">★★★★★</div>
                        <span class="review-count">(128 ulasan)</span>
                    </div>
                    <div class="product-actions">
                        <button class="add-to-cart">+ Keranjang</button>
                        <button class="wishlist-btn">♥</button>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="helembogo.jpeg" alt="Helm Bogo">
                    <span class="product-badge">NEW</span>
                </div>
                <div class="product-info">
                    <div class="product-category">Bogo</div>
                    <h3 class="product-title">Helm Bogo GACOR</h3>
                    <div class="product-price">
                        <span class="current-price">Rp 950.000</span>
                    </div>
                    <div class="product-rating">
                        <div class="stars">★★★★☆</div>
                        <span class="review-count">(64 ulasan)</span>
                    </div>
                    <div class="product-actions">
                        <button class="add-to-cart">+ Keranjang</button>
                        <button class="wishlist-btn">♥</button>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="helem3.jpeg" alt="Helm Open Face O-5">
                </div>
                <div class="product-info">
                    <div class="product-category">Open Face</div>
                    <h3 class="product-title">Helm Open Face O-5 Vintage</h3>
                    <div class="product-price">
                        <span class="current-price">Rp 650.000</span>
                    </div>
                    <div class="product-rating">
                        <div class="stars">★★★★☆</div>
                        <span class="review-count">(42 ulasan)</span>
                    </div>
                    <div class="product-actions">
                        <button class="add-to-cart">+ Keranjang</button>
                        <button class="wishlist-btn">♥</button>
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="helem2.jpeg" alt="Helm Off Road XT-200">
                    <span class="product-badge">DISKON 15%</span>
                </div>
                <div class="product-info">
                    <div class="product-category">Off Road</div>
                    <h3 class="product-title">Helm Off Road XT-200</h3>
                    <div class="product-price">
                        <span class="current-price">Rp 1.100.000</span>
                        <span class="original-price">Rp 1.300.000</span>
                    </div>
                    <div class="product-rating">
                        <div class="stars">★★★★★</div>
                        <span class="review-count">(87 ulasan)</span>
                    </div>
                    <div class="product-actions">
                        <button class="add-to-cart">+ Keranjang</button>
                        <button class="wishlist-btn">♥</button>
                    </div>
                </div>
            </div>

            <!-- Product 5 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="helem5.jpeg" alt="Helm Full Face Racer X">
                </div>
                <div class="product-info">
                    <div class="product-category">Full Face</div>
                    <h3 class="product-title">Helm Full Face Racer X</h3>
                    <div class="product-price">
                        <span class="current-price">Rp 1.750.000</span>
                    </div>
                    <div class="product-rating">
                        <div class="stars">★★★★★</div>
                        <span class="review-count">(56 ulasan)</span>
                    </div>
                    <div class="product-actions">
                        <button class="add-to-cart">+ Keranjang</button>
                        <button class="wishlist-btn">♥</button>
                    </div>
                </div>
            </div>

            <!-- Product 6 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="helem9.jpeg" alt="Helm Retro Classic">
                    <span class="product-badge">LIMITED</span>
                </div>
                <div class="product-info">
                    <div class="product-category">Open Face</div>
                    <h3 class="product-title">Helm Retro Classic 50's</h3>
                    <div class="product-price">
                        <span class="current-price">Rp 850.000</span>
                    </div>
                    <div class="product-rating">
                        <div class="stars">★★★★☆</div>
                        <span class="review-count">(39 ulasan)</span>
                    </div>
                    <div class="product-actions">
                        <button class="add-to-cart">+ Keranjang</button>
                        <button class="wishlist-btn">♥</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="#">1</a>
            <span class="current">2</span>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">&raquo;</a>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script>
        // Simple filter functionality
        document.addEventListener('DOMContentLoaded', function () {
            const categoryFilter = document.getElementById('category');
            const priceFilter = document.getElementById('price-range');
            const sortFilter = document.getElementById('sort-by');
            const searchInput = document.querySelector('.search-box input');
            const productCards = document.querySelectorAll('.product-card');

            function filterProducts() {
                const categoryValue = categoryFilter.value;
                const priceValue = priceFilter.value;
                const searchValue = searchInput.value.toLowerCase();

                productCards.forEach(card => {
                    const category = card.querySelector('.product-category').textContent.toLowerCase();
                    const priceText = card.querySelector('.current-price').textContent;
                    const price = parseInt(priceText.replace(/\D/g, ''));
                    const title = card.querySelector('.product-title').textContent.toLowerCase();

                    // Category filter
                    const categoryMatch = categoryValue === 'all' ||
                        (categoryValue === 'fullface' && category.includes('full face')) ||
                        (categoryValue === 'modular' && category.includes('modular')) ||
                        (categoryValue === 'openface' && category.includes('open face')) ||
                        (categoryValue === 'offroad' && category.includes('off road'));

                    // Price filter
                    let priceMatch = true;
                    if (priceValue !== 'all') {
                        const [min, max] = priceValue.split('-').map(Number);
                        if (max) {
                            priceMatch = price >= min * 1000 && price <= max * 1000;
                        } else {
                            priceMatch = price > min * 1000;
                        }
                    }

                    // Search filter
                    const searchMatch = title.includes(searchValue) ||
                        category.includes(searchValue);

                    if (categoryMatch && priceMatch && searchMatch) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }

            // Sorting functionality
            function sortProducts() {
                const sortValue = sortFilter.value;
                const container = document.querySelector('.product-grid');
                const cards = Array.from(productCards);

                cards.sort((a, b) => {
                    if (sortValue === 'popular') {
                        // Sort by review count (simplified)
                        const aReviews = parseInt(a.querySelector('.review-count').textContent.match(/\d+/)[0]);
                        const bReviews = parseInt(b.querySelector('.review-count').textContent.match(/\d+/)[0]);
                        return bReviews - aReviews;
                    } else if (sortValue === 'newest') {
                        // Sort by badge (simplified)
                        const aIsNew = a.querySelector('.product-badge')?.textContent === 'NEW';
                        const bIsNew = b.querySelector('.product-badge')?.textContent === 'NEW';
                        return (bIsNew ? 1 : 0) - (aIsNew ? 1 : 0);
                    } else if (sortValue === 'price-low') {
                        const aPrice = parseInt(a.querySelector('.current-price').textContent.replace(/\D/g, ''));
                        const bPrice = parseInt(b.querySelector('.current-price').textContent.replace(/\D/g, ''));
                        return aPrice - bPrice;
                    } else if (sortValue === 'price-high') {
                        const aPrice = parseInt(a.querySelector('.current-price').textContent.replace(/\D/g, ''));
                        const bPrice = parseInt(b.querySelector('.current-price').textContent.replace(/\D/g, ''));
                        return bPrice - aPrice;
                    } else if (sortValue === 'rating') {
                        const aRating = a.querySelector('.stars').textContent.length;
                        const bRating = b.querySelector('.stars').textContent.length;
                        return bRating - aRating;
                    }
                    return 0;
                });

                // Re-append sorted cards
                cards.forEach(card => container.appendChild(card));
            }

            // Add event listeners
            categoryFilter.addEventListener('change', filterProducts);
            priceFilter.addEventListener('change', filterProducts);
            sortFilter.addEventListener('change', sortProducts);
            searchInput.addEventListener('input', filterProducts);

            // Add to cart button functionality
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function () {
                    const productTitle = this.closest('.product-card').querySelector('.product-title').textContent;
                    alert(`Produk "${productTitle}" telah ditambahkan ke keranjang!`);
                });
            });

            // Wishlist button functionality
            document.querySelectorAll('.wishlist-btn').forEach(button => {
                button.addEventListener('click', function () {
                    this.textContent = this.textContent === '♥' ? '♡' : '♥';
                    const productTitle = this.closest('.product-card').querySelector('.product-title').textContent;
                    const action = this.textContent === '♥' ? 'ditambahkan ke' : 'dihapus dari';
                    alert(`Produk "${productTitle}" ${action} wishlist!`);
                });
            });
        });
    </script>
</body>

</html>