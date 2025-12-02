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
        <a href="index.php">Flair & Blooms</a>
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
          <a href="transaction_history.php"><i class="fa-solid fa-book"></i></a>
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
        <img src="src/images/lavander.jpg" alt="Lavender" />
        <h3>Lavender Bundle</h3>
        <small class="description">Calming fragrance with soothing beauty.</small>
        <p>₱299</p>
        <button class="cart-btn" data-product-id="4">Add to Cart</button>
      </div>

      <!-- Product 5 -->
      <div class="product-card">
        <img src="src/images/white_rose.jpg" alt="White Roses" />
        <h3>White Roses</h3>
        <small class="description">Symbol of purity, grace, and new beginnings.</small>
        <p>₱450</p>
        <button class="cart-btn" data-product-id="5">Add to Cart</button>
      </div>

      <!-- Product 6 -->
      <div class="product-card">
        <img src="src/images/peonies.jpg" alt="Peonies" />
        <h3>Pink Peonies</h3>
        <small class="description">Soft, delicate petals with romantic charm.</small>
        <p>₱520</p>
        <button class="cart-btn" data-product-id="6">Add to Cart</button>
      </div>

      <!-- Product 7 -->
      <div class="product-card">
        <img src="src/images/white_lilies.jpg" alt="White Lilies" />
        <h3>White Lilies</h3>
        <small class="description">Elegant and fragrant, a classic beauty.</small>
        <p>₱480</p>
        <button class="cart-btn" data-product-id="7">Add to Cart</button>
      </div>

      <!-- Product 8 -->
      <div class="product-card">
        <img src="src/images/orchids.jpg" alt="Orchids" />
        <h3>Orchid Bouquet</h3>
        <small class="description">Exotic blooms with delicate charm.</small>
        <p>₱650</p>
        <button class="cart-btn" data-product-id="8">Add to Cart</button>
      </div>

      <!-- Product 9 -->
      <div class="product-card">
        <img src="src/images/daises.jpg" alt="Daisies" />
        <h3>Cheerful Daisies</h3>
        <small class="description">Bright and happy flowers for any occasion.</small>
        <p>₱200</p>
        <button class="cart-btn" data-product-id="9">Add to Cart</button>
      </div>

      <!-- Product 10 -->
      <div class="product-card">
        <img src="src/images/golden_mariglods.jpg" alt="Marigolds" />
        <h3>Golden Marigolds</h3>
        <small class="description">Vibrant and sunny, symbolizing positivity.</small>
        <p>₱180</p>
        <button class="cart-btn" data-product-id="10">Add to Cart</button>
      </div>

      <!-- Product 11 -->
      <div class="product-card">
        <img src="src/images/gerbera.jpg" alt="Gerbera Daisies" />
        <h3>Gerbera Daisies</h3>
        <small class="description">Bright and colorful, bringing joy and cheer.</small>
        <p>₱220</p>
        <button class="cart-btn" data-product-id="11">Add to Cart</button>
      </div>

      <!-- Product 12 -->
      <div class="product-card">
        <img src="src/images/hydrangea.jpg" alt="Hydrangea Bouquet" />
        <h3>Hydrangea Bouquet</h3>
        <small class="description">Lush clusters symbolizing gratitude and beauty.</small>
        <p>₱550</p>
        <button class="cart-btn" data-product-id="12">Add to Cart</button>
      </div>

      <!-- Product 13 -->
      <div class="product-card">
        <img src="src/images/carnations.jpg" alt="Carnations" />
        <h3>Carnations</h3>
        <small class="description">Fragrant and long-lasting, perfect for gifting.</small>
        <p>₱300</p>
        <button class="cart-btn" data-product-id="13">Add to Cart</button>
      </div>

      <!-- Product 14 -->
      <div class="product-card">
        <img src="src/images/blue_irises.jpg" alt="Irises" />
        <h3>Blue Irises</h3>
        <small class="description">Elegant flowers symbolizing hope and wisdom.</small>
        <p>₱400</p>
        <button class="cart-btn" data-product-id="14">Add to Cart</button>
      </div>

      <!-- Product 15 -->
      <div class="product-card">
        <img src="src/images/peach_roses.jpg" alt="Peach Roses" />
        <h3>Peach Roses</h3>
        <small class="description">Soft and charming, perfect for romantic gestures.</small>
        <p>₱480</p>
        <button class="cart-btn" data-product-id="15">Add to Cart</button>
      </div>

      <!-- Product 16 -->
      <div class="product-card">
        <img src="src/images/lotus_flowers.jpg" alt="Lotus Flowers" />
        <h3>Lotus Flowers</h3>
        <small class="description">Symbol of purity and serenity, unique and calming.</small>
        <p>₱600</p>
        <button class="cart-btn" data-product-id="16">Add to Cart</button>
      </div>

      <!-- Product 17 -->
      <div class="product-card">
        <img src="src/images/freesias.jpg" alt="Freesias" />
        <h3>Freesias</h3>
        <small class="description">Fragrant and delicate, perfect for special moments.</small>
        <p>₱350</p>
        <button class="cart-btn" data-product-id="17">Add to Cart</button>
      </div>

      <!-- Product 18 -->
      <div class="product-card">
        <img src="src/images/anemones.jpg" alt="Anemones" />
        <h3>Anemones</h3>
        <small class="description">Vibrant petals symbolizing anticipation and excitement.</small>
        <p>₱380</p>
        <button class="cart-btn" data-product-id="18">Add to Cart</button>
      </div>

      <!-- Product 19 -->
      <div class="product-card">
        <img src="src/images/chrysanthemums.jpg" alt="Chrysanthemums" />
        <h3>Chrysanthemums</h3>
        <small class="description">Elegant and versatile blooms for any occasion.</small>
        <p>₱420</p>
        <button class="cart-btn" data-product-id="19">Add to Cart</button>
      </div>

      <!-- Product 20 -->
      <div class="product-card">
        <img src="src/images/bluebells.jpg" alt="Bluebells" />
        <h3>Bluebells</h3>
        <small class="description">Delicate blue blooms symbolizing humility and gratitude.</small>
        <p>₱250</p>
        <button class="cart-btn" data-product-id="20">Add to Cart</button>
      </div>


  </section>

  <!-- Footer -->
  <footer>
    <p>© 2025 Flair & Blooms. All rights reserved.</p>
  </footer>

  <div id="cart-popup" class="cart-popup">
    <div class="cart-popup-content">
      <i class="fa-solid fa-check"></i>
      <div class="cart-popup-text">
        <strong id="cart-popup-title">Added to Cart!</strong>
        <p id="cart-popup-message"></p>
      </div>
    </div>
  </div>


  <script src="scripts/shop.js"></script>
</body>

</html>