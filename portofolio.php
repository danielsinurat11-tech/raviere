<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio - Ravière</title>
    <link rel="stylesheet" href="css & img/css/style.css">
</head>
<body>  
    <!-- header-->
    <header>
    <div class="container">
        <h1><a href="home.php">Lumina</a></h1>
        <ul>
            <li><a href="home.php">HOME</a></li>
            <li><a href="aboutUs.php">ABOUT US</a></li>
            <li class="active"><a href="portofolio.php">PORTOFOLIO</a></li>
            <li><a href="survey.php">SURVEY</a></li>
            <li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="logout.php">LOGOUT</a>
                <?php else: ?>
                    <a href="Login.php">LOGIN / REGISTER</a>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</header>

<!-- Portfolio Hero Section -->
<section class="portfolio-hero">
    <div class="container">
        <h2 class="portfolio-title">PORTFOLIO</h2>
    </div>
</section>

<!-- 1. Featured Items -->
<section class="portfolio-section">
    <div class="container">
        <h3 class="section-title">Featured Items</h3>
        <p class="section-subtitle">Our most popular and carefully selected pieces</p>
        <div class="featured-grid">
            <div class="featured-card">
                <img src="css & img/img/fashion1.jpg" alt="Lumina Classic Copper">
                <div class="featured-content">
                    <h4>Lumina Classic Copper</h4>
                    <p>Rp. 255.000,00</p>
                    <a href="Login.php" class="btn">BUY</a>
                </div>
            </div>
            <div class="featured-card">
                <img src="css & img/img/fashion2.jpg" alt="Oxford Shirt">
                <div class="featured-content">
                    <h4>Oxford Shirt</h4>
                    <p>Rp. 99.000,00</p>
                    <a href="Login.php" class="btn">BUY</a>
                </div>
            </div>
            <div class="featured-card">
                <img src="css & img/img/fashion3.jpg" alt="Lumina's Lime">
                <div class="featured-content">
                    <h4>Lumina's Lime</h4>
                    <p>Rp. 179.000,00</p>
                    <a href="Login.php" class="btn">BUY</a>
                </div>
            </div>
            <div class="featured-card">
                <img src="css & img/img/fashion4.jpg" alt="Lumina Basic Blazer">
                <div class="featured-content">
                    <h4>Lumina Basic Blazer</h4>
                    <p>Rp. 119.000,00</p>
                    <a href="Login.php" class="btn">BUY</a>
                </div>
            </div>
            <div class="featured-card">
                <img src="css & img/img/fashion5.jpg" alt="Lumiel">
                <div class="featured-content">
                    <h4>Lumiel</h4>
                    <p>Rp. 299.000,00</p>
                    <a href="Login.php" class="btn">BUY</a>
                </div>
            </div>
            <div class="featured-card">
                <img src="css & img/img/fashion6.jpg" alt="Lumiel Cardi">
                <div class="featured-content">
                    <h4>Lumiel Cardi</h4>
                    <p>Rp. 125.000,00</p>
                    <a href="Login.php" class="btn">BUY</a>
                </div>
            </div>
            <div class="featured-card">
                <img src="css & img/img/fashion7.jpg" alt="Lumina Essential Trousers">
                <div class="featured-content">
                    <h4>Lumina Essential Trousers</h4>
                    <p>Rp. 145.000,00</p>
                    <a href="Login.php" class="btn">BUY</a>
                </div>
            </div>
            <div class="featured-card">
                <img src="css & img/img/fashion8.jpg" alt="Lumina Simple Slacks">
                <div class="featured-content">
                    <h4>Lumina Simple Slacks</h4>
                    <p>Rp. 129.000,00</p>
                    <a href="Login.php" class="btn">BUY</a>
                </div>
            </div>
            <div class="featured-card">
                <img src="css & img/img/fashion9.jpg" alt="Lumina Minimalist Trousers">
                <div class="featured-content">
                    <h4>Lumina Minimalist Trousers</h4>
                    <p>Rp. 119.000,00</p>
                    <a href="Login.php" class="btn">BUY</a>
                </div>
            </div>
            <div class="featured-card">
                <img src="css & img/img/best1.jpg" alt="Lumina Classic Copper">
                <div class="featured-content">
                    <h4>Lumina Classic Copper</h4>
                    <p>Rp. 379.000,00</p>
                    <a href="Login.php" class="btn">BUY</a>
                </div>
            </div>
            <div class="featured-card">
                <img src="css & img/img/best2.jpg" alt="Lumina Ocean Set">
                <div class="featured-content">
                    <h4>Lumina Ocean Set</h4>
                    <p>Rp. 355.000,00</p>
                    <a href="Login.php" class="btn">BUY</a>
                </div>
            </div>
            <div class="featured-card">
                <img src="css & img/img/best3.jpg" alt="Larissa">
                <div class="featured-content">
                    <h4>Larissa</h4>
                    <p>Rp. 299.000,00</p>
                    <a href="Login.php" class="btn">BUY</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. Lookbook -->
<section class="portfolio-section lookbook-section">
    <div class="container">
        <h3 class="section-title">Lookbook</h3>
        <p class="section-subtitle">Outfit inspiration styled by our team</p>
        <div class="lookbook-grid">
            <div class="lookbook-item">
                <img src="css & img/img/best4.jpg" alt="Lookbook 1">
                <div class="lookbook-overlay">
                    <p>Spring Collection</p>
                </div>
            </div>
            <div class="lookbook-item">
                <img src="css & img/img/best5.jpg" alt="Lookbook 2">
                <div class="lookbook-overlay">
                    <p>Casual Elegance</p>
                </div>
            </div>
            <div class="lookbook-item">
                <img src="css & img/img/best6.jpg" alt="Lookbook 3">
                <div class="lookbook-overlay">
                    <p>Office Chic</p>
                </div>
            </div>
            <div class="lookbook-item">
                <img src="css & img/img/best7.jpg" alt="Lookbook 4">
                <div class="lookbook-overlay">
                    <p>Weekend Style</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. Collections -->
<section class="portfolio-section">
    <div class="container">
        <h3 class="section-title">Collections</h3>
        <p class="section-subtitle">Explore our curated series and categories</p>
        <div class="collections-grid">
            <div class="collection-card">
                <img src="css & img/img/best8.jpg" alt="Essential Collection">
                <div class="collection-content">
                    <h4>Essential Collection</h4>
                    <p>Timeless pieces for everyday elegance</p>
                    <a href="#" class="collection-link">View Collection →</a>
                </div>
            </div>
            <div class="collection-card">
                <img src="css & img/img/best9.jpg" alt="Premium Collection">
                <div class="collection-content">
                    <h4>Premium Collection</h4>
                    <p>Luxury fabrics and refined designs</p>
                    <a href="#" class="collection-link">View Collection →</a>
                </div>
            </div>
            <div class="collection-card">
                <img src="css & img/img/fashion1.jpg" alt="Seasonal Collection">
                <div class="collection-content">
                    <h4>Seasonal Collection</h4>
                    <p>Trending styles for every season</p>
                    <a href="#" class="collection-link">View Collection →</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. Quality Details -->
<section class="portfolio-section quality-section">
    <div class="container">
        <h3 class="section-title">Quality Details</h3>
        <p class="section-subtitle">Close-up views of our craftsmanship, materials, and finishing</p>
        <div class="quality-grid">
            <div class="quality-item">
                <img src="css & img/img/fashion2.jpg" alt="Fabric Detail">
                <div class="quality-caption">
                    <h4>Premium Fabric</h4>
                    <p>High-quality materials for comfort and durability</p>
                </div>
            </div>
            <div class="quality-item">
                <img src="css & img/img/fashion3.jpg" alt="Stitching Detail">
                <div class="quality-caption">
                    <h4>Precision Stitching</h4>
                    <p>Meticulous attention to every detail</p>
                </div>
            </div>
            <div class="quality-item">
                <img src="css & img/img/fashion4.jpg" alt="Finishing Detail">
                <div class="quality-caption">
                    <h4>Perfect Finishing</h4>
                    <p>Flawless edges and professional craftsmanship</p>
                </div>
            </div>
            <div class="quality-item">
                <img src="css & img/img/fashion5.jpg" alt="Texture Detail">
                <div class="quality-caption">
                    <h4>Rich Texture</h4>
                    <p>Luxurious feel and elegant appearance</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. Customer Showcase -->
<section class="portfolio-section showcase-section">
    <div class="container">
        <h3 class="section-title">Customer Showcase</h3>
        <p class="section-subtitle">See how our customers style Ravière pieces</p>
        <div class="showcase-grid">
            <div class="showcase-item">
                <img src="css & img/img/fashion6.jpg" alt="Customer Style 1">
                <div class="showcase-overlay">
                    <p>@customer_name</p>
                </div>
            </div>
            <div class="showcase-item">
                <img src="css & img/img/fashion7.jpg" alt="Customer Style 2">
                <div class="showcase-overlay">
                    <p>@customer_name</p>
                </div>
            </div>
            <div class="showcase-item">
                <img src="css & img/img/fashion8.jpg" alt="Customer Style 3">
                <div class="showcase-overlay">
                    <p>@customer_name</p>
                </div>
            </div>
            <div class="showcase-item">
                <img src="css & img/img/fashion9.jpg" alt="Customer Style 4">
                <div class="showcase-overlay">
                    <p>@customer_name</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--footer-->
<footer>
    <div class="container">
        <a href="home.php" class="footer-logo">Raviere</a>
        <div class="social-media">
            <a href="https://www.instagram.com/raviere.official?igsh=emJkMWxsNjNnaGw0" target="_blank" class="social-link" title="Instagram">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                </svg>
            </a>
            <a href="https://www.tiktok.com/@raviere.official?_r=1&_t=ZS-91HVecYjoaQ" target="_blank" class="social-link" title="TikTok">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                </svg>
            </a>
            <a href="https://wa.me/6285161585651" target="_blank" class="social-link" title="WhatsApp">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
            </a>
            <a href="https://id.shp.ee/7zTfhjE" target="_blank" class="social-link" title="Shopee">
                <img src="css & img/image/shopee.png" alt="Shopee">
            </a>
            <a href="https://tk.tokopedia.com/ZSyqrXLpq/" target="_blank" class="social-link" title="Tokopedia">
                <img src="css & img/image/tokopedia.png" alt="Tokopedia">
            </a>
            <a href="https://www.facebook.com/raviere.id" target="_blank" class="social-link" title="Facebook">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                </svg>
            </a>
        </div>
        <div class="copyright">
            <small>Copyright &copy; 2020. Raviere. All Right Reserve.</small>
        </div>
    </div>
</footer>
</body>
</html>
