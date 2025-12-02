<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "Please log in to view your transactions.";
    exit;
}

$user_id = $_SESSION['user_id'];

$host = "localhost";
$user = "root";
$pass = "";
$db   = "flower_shop";
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all orders for this user
$stmt = $conn->prepare("SELECT order_id, total_amount, payment_method, order_date FROM orders WHERE user_id = ? ORDER BY order_date DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$orders = [];
while ($row = $result->fetch_assoc()) {
    $orders[] = $row;
}
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Transaction History | Flair & Blooms</title>
    <link rel="stylesheet" href="css/transaction_history.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
    <div class="transactions-container">
        <h1>Transaction History</h1>

        <?php if (count($orders) === 0): ?>
            <p>You have no past orders.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Total Amount</th>
                        <th>Payment Method</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td>#<?php echo $order['order_id']; ?></td>
                            <td><?php echo $order['order_date']; ?></td>
                            <td>₱<?php echo number_format($order['total_amount'], 2); ?></td>
                            <td><?php echo htmlspecialchars($order['payment_method']); ?></td>
                            <td><a class="view-btn" href="order_success.php?order_id=<?php echo $order['order_id']; ?>">View Details</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

</body>

</html>