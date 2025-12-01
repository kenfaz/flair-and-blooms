<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Flair & Blooms | Shop</title>

  <link rel="stylesheet" href="css/shop.css" />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300;400&display=swap"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="icon" href="src/icons/logo.png" />
</head>

<body>
  <div class="nav-container">
    <nav class="nav-bar">
      <div class="logo-container">
        <a href="#hero-section">Flair & Blooms</a>
      </div>

      <div class="links-container" id="links-container">
        <div class="nav-left-div">
          <a href="index.php#flowers-section">Flowers</a>
          <a href="index.php#customer-review-section">Reviews</a>
          <a href="index.php#about-section">About</a>
          <a href="index.php#contact-us-section">Contact Us</a>
          <a href="shop.php">Shopping</a>
        </div>
        <div class="nav-right-div">
          <a href="cart.php"><i class="fa-solid fa-basket-shopping"></i></a>
          <a href="profile.php"><i class="fa-solid fa-user"></i></a>
          <a href="login.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
      </div>
    </nav>
  </div>

  <!-- Header -->
  <header>
    <img class="header-img" src="src/icons/logo.png" />
    <h1>Flair & Blooms</h1>
    <p>Your trusted flower shop, delivering beauty every day.</p>
  </header>

  <!-- Product Catalog -->
  <section class="catalog">
    <h2>Our Flower Collection</h2>

    <div class="product-grid">
      <!-- Product 1 -->
      <div class="product-card">
        <img src="src/images/rose.jpg" alt="Roses" />
        <h3>Red Roses Bouquet</h3>
        <small class="description">Classic symbol of love and admiration.</small>
        <p>₱499</p>
        <button class="cart-btn" data-product-id="1">Add to Cart</button>
      </div>

      <!-- Product 2 -->
      <div class="product-card">
        <img src="src/images/purple_tulips.jpg" alt="Tulips" />
        <h3>Purple Tulips</h3>
        <small class="description">Elegant blooms representing royalty.</small>
        <p>₱399</p>
        <button class="cart-btn" data-product-id="2">Add to Cart</button>
      </div>

      <!-- Product 3 -->
      <div class="product-card">
        <img src="src/images/sunflower.jpg" alt="Sunflowers" />
        <h3>Sunflower Stem</h3>
        <small class="description">Bright and cheerful, perfect for any day.</small>
        <p>₱150</p>
        <button class="cart-btn" data-product-id="3">Add to Cart</button>
      </div>

      <!-- Product 4 -->
      <div class="product-card">
        <img src="src/images/rose.jpg" alt="Lavender" />
        <h3>Lavender Bundle</h3>
        <small class="description">Calming fragrance with soothing beauty.</small>
        <p>₱299</p>
        <button class="cart-btn" data-product-id="4">Add to Cart</button>
      </div>

      <!-- Product 5 -->
      <div class="product-card">
        <img src="src/images/purple_tulips.jpg" alt="White Roses" />
        <h3>White Roses</h3>
        <small class="description">Symbol of purity, grace, and new beginnings.</small>
        <p>₱450</p>
        <button class="cart-btn" data-product-id="5">Add to Cart</button>
      </div>

      <!-- Product 6 -->
      <div class="product-card">
        <img src="src/images/rose.jpg" alt="Peonies" />
        <h3>Pink Peonies</h3>
        <small class="description">Soft, delicate petals with romantic charm.</small>
        <p>₱520</p>
        <button class="cart-btn" data-product-id="6">Add to Cart</button>
      </div>

      <!-- Product 7 -->
      <div class="product-card">
        <img src="src/images/rose.jpg" alt="Red Roses" />
        <h3>Red Roses Bouquet</h3>
        <small class="description">Classic symbol of love and admiration.</small>
        <p>₱499</p>
        <button class="cart-btn" data-product-id="7">Add to Cart</button>
      </div>

      <!-- Product 8 -->
      <div class="product-card">
        <img src="src/images/purple_tulips.jpg" alt="Tulips" />
        <h3>Purple Tulips</h3>
        <small class="description">Elegant blooms representing royalty.</small>
        <p>₱399</p>
        <button class="cart-btn" data-product-id="8">Add to Cart</button>
      </div>

      <!-- Product 9 -->
      <div class="product-card">
        <img src="src/images/sunflower.jpg" alt="Sunflowers" />
        <h3>Sunflower Stem</h3>
        <small class="description">Bright and cheerful, perfect for any day.</small>
        <p>₱150</p>
        <button class="cart-btn" data-product-id="9">Add to Cart</button>
      </div>

      <!-- Product 10 -->
      <div class="product-card">
        <img src="src/images/rose.jpg" alt="Lavender" />
        <h3>Lavender Bundle</h3>
        <small class="description">Calming fragrance with soothing beauty.</small>
        <p>₱299</p>
        <button class="cart-btn" data-product-id="10">Add to Cart</button>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>© 2025 Flair & Blooms. All rights reserved.</p>
  </footer>

  <script src="scripts/shop.js"></script>
</body>

</html>