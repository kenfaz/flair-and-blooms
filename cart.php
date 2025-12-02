<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "Please log in to view your cart.";
    exit;
}

$user_id = $_SESSION['user_id'];

$host = "localhost";
$user = "root";
$pass = "";
$db   = "flower_shop"; // change this
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch cart items
$sql = "
SELECT c.cart_id, c.product_id, c.quantity, p.product_name, p.price, p.description, p.stock
FROM cart c
JOIN products p ON c.product_id = p.product_id
WHERE c.user_id = ?
";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$cart_items = [];
while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Your Cart | Flair & Blooms</title>
    <link rel="stylesheet" href="css/cart.css">
    <link rel="icon" href="src/icons/logo.png">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:wght@300;400&display=swap"
        rel="stylesheet" />
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

    <h1>Your Shopping Cart</h1>

    <div class="cart-container">
        <?php if (count($cart_items) === 0): ?>
            <p style="text-align:center;">Your cart is empty.</p>
        <?php else: ?>
            <?php
            $total = 0;
            foreach ($cart_items as $item):
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
            ?>
                <div class="cart-item" data-cart-id="<?php echo $item['cart_id']; ?>">
                    <div class="product-info">
                        <h3><?php echo htmlspecialchars($item['product_name']); ?></h3>
                        <p><?php echo htmlspecialchars($item['description']); ?></p>
                    </div>
                    <div class="price">₱<?php echo number_format($item['price'], 2); ?></div>
                    <div class="quantity">
                        <button class="decrease">-</button>
                        <span class="qty"><?php echo $item['quantity']; ?></span>
                        <button class="increase">+</button>
                    </div>
                    <div class="subtotal">₱<span class="sub-total"><?php echo number_format($subtotal, 2); ?></span></div>
                    <button class="remove-btn">Remove</button>
                </div>
            <?php endforeach; ?>

            <div class="total"><strong>Total: ₱<span id="total"><?php echo number_format($total, 2); ?></span></strong></div>

            <div class="checkout-container">
                <button id="checkout-btn">Proceed to Checkout</button>
            </div>

        <?php endif; ?>

        <a href="shop.html" class="continue">Continue Shopping</a>
    </div>

    <script src="scripts/cart.js">

    </script>
</body>

</html>