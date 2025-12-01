<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "Please log in to continue.";
    exit;
}

$user_id = $_SESSION['user_id'];

$host = "localhost";
$user = "root";
$pass = "";
$db   = "flower_shop";  // your DB
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch cart items
$sql = "
SELECT c.cart_id, c.product_id, c.quantity, p.product_name, p.price
FROM cart c
JOIN products p ON c.product_id = p.product_id
WHERE c.user_id = ?
";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$cart_items = [];
$total = 0;

while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
    $total += $row['price'] * $row['quantity'];
}

if (count($cart_items) === 0) {
    echo "<p>Your cart is empty. Redirecting...</p>";
    header("refresh:2; url=cart.php");
    exit;
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Checkout | Flair & Blooms</title>
<link rel="stylesheet" href="css/checkout.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<h1 class="title">Checkout</h1>

<div class="checkout-container">

    <div class="order-summary">
        <h2>Order Summary</h2>
        <?php foreach ($cart_items as $item): ?>
            <div class="summary-item">
                <span><?php echo $item['product_name']; ?> (x<?php echo $item['quantity']; ?>)</span>
                <span>₱<?php echo number_format($item['price'] * $item['quantity'], 2); ?></span>
            </div>
        <?php endforeach; ?>
        <h3 class="total">Total: ₱<?php echo number_format($total, 2); ?></h3>
    </div>

    <div class="checkout-form">
        <h2>Delivery Information</h2>

        <form action="place_order.php" method="POST">
            <label>Full Name</label>
            <input type="text" name="fullname" required>

            <label>Delivery Address</label>
            <textarea name="address" required></textarea>

            <label>Payment Method</label>
            <select name="payment" required>
                <option value="COD">Cash on Delivery</option>
                <option value="GCash">GCash</option>
                <option value="Card">Credit/Debit Card</option>
            </select>

            <input type="hidden" name="total" value="<?php echo $total; ?>">

            <button type="submit" class="place-order-btn">Place Order</button>
        </form>
    </div>

</div>

</body>
</html>
