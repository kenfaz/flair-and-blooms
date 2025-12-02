<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "Please log in to view your order.";
    exit;
}

if (!isset($_GET['order_id'])) {
    echo "No order specified.";
    exit;
}

$user_id = $_SESSION['user_id'];
$order_id = $_GET['order_id'];

$host = "localhost";
$user = "root";
$pass = "";
$db   = "flower_shop";
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch order details
$stmt = $conn->prepare("SELECT * FROM orders WHERE order_id = ? AND user_id = ?");
$stmt->bind_param("ii", $order_id, $user_id);
$stmt->execute();
$order_result = $stmt->get_result();
$order = $order_result->fetch_assoc();

if (!$order) {
    echo "Order not found.";
    exit;
}
$stmt->close();

// Fetch order items
$stmt = $conn->prepare("
    SELECT oi.quantity, oi.price_each, p.product_name
    FROM order_items oi
    JOIN products p ON oi.product_id = p.product_id
    WHERE oi.order_id = ?
");
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();

$order_items = [];
$total = 0;

while ($row = $result->fetch_assoc()) {
    $order_items[] = $row;
    $total += $row['quantity'] * $row['price_each'];
}
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Success | Flair & Blooms</title>
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="src/icons/logo.png">
</head>

<body>

    <!-- <div id="confetti-container"></div>
    <div class="success-check"><i class="fa-solid fa-circle-check"></i></div> -->

    <h1 class="title">Thank You for Your Order!</h1>

    <div class="checkout-container">

        <div class="order-summary">
            <h2>Order #<?php echo $order_id; ?></h2>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($order['fullname']); ?></p>
            <p><strong>Address:</strong> <?php echo htmlspecialchars($order['address']); ?></p>
            <p><strong>Payment Method:</strong> <?php echo htmlspecialchars($order['payment_method']); ?></p>
            <p><strong>Order Date:</strong> <?php echo $order['order_date']; ?></p>

            <h3>Items:</h3>
            <?php foreach ($order_items as $item): ?>
                <div class="summary-item">
                    <span><?php echo $item['product_name']; ?> (x<?php echo $item['quantity']; ?>)</span>
                    <span>₱<?php echo number_format($item['price_each'] * $item['quantity'], 2); ?></span>
                </div>
            <?php endforeach; ?>

            <h3 class="total">Total Paid: ₱<?php echo number_format($total, 2); ?></h3>
            <div class="continue-container">
                <a href="shop.php" class="continue-btn">Continue Shopping</a>
            </div>
        </div>

    </div>

    <script href="scripts/order_success.js"></script>
</body>

</html>