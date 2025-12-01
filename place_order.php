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
$db   = "flower_shop";
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$fullname = $_POST['fullname'];
$address  = $_POST['address'];
$payment  = $_POST['payment'];
$total    = $_POST['total'];

// 1️⃣ Insert into orders table
$stmt = $conn->prepare("INSERT INTO orders (user_id, fullname, address, payment_method, total_amount, order_date) VALUES (?, ?, ?, ?, ?, NOW())");
$stmt->bind_param("isssd", $user_id, $fullname, $address, $payment, $total);
$stmt->execute();

// Get the newly created order_id
$order_id = $conn->insert_id;
$stmt->close();

// 2️⃣ Fetch cart items for this user
$sql = "SELECT c.product_id, c.quantity, p.price 
        FROM cart c 
        JOIN products p ON c.product_id = p.product_id 
        WHERE c.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// 3️⃣ Insert each item into order_items
$stmt_insert = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price_each) VALUES (?, ?, ?, ?)");
while ($row = $result->fetch_assoc()) {
    $stmt_insert->bind_param("iiid", $order_id, $row['product_id'], $row['quantity'], $row['price']);
    $stmt_insert->execute();
}
$stmt_insert->close();

// 4️⃣ Clear the user's cart
$stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->close();

$conn->close();

// Redirect to a success page
header("Location: order_success.php?order_id=" . $order_id);
exit;
?>
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
$db   = "flower_shop"; // your DB
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Get form data
$fullname = $_POST['fullname'];
$address  = $_POST['address'];
$payment  = $_POST['payment'];
$total    = $_POST['total'];

// Insert order into orders table
$order_sql = "
INSERT INTO orders (user_id, fullname, address, payment_method, total_amount, created_at)
VALUES (?, ?, ?, ?, ?, NOW())
";
$stmt = $conn->prepare($order_sql);
$stmt->bind_param("isssd", $user_id, $fullname, $address, $payment, $total);
$stmt->execute();

$order_id = $stmt->insert_id;
$stmt->close();

// Get the user's cart items
$cart_sql = "
SELECT c.product_id, c.quantity, p.price
FROM cart c
JOIN products p ON c.product_id = p.product_id
WHERE c.user_id = ?
";
$stmt = $conn->prepare($cart_sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$cart_result = $stmt->get_result();

// Insert each cart item as an order item
$item_sql = "
INSERT INTO order_items (order_id, product_id, quantity, price)
VALUES (?, ?, ?, ?)
";
$item_stmt = $conn->prepare($item_sql);

while ($item = $cart_result->fetch_assoc()) {
    $item_stmt->bind_param("iiid", $order_id, $item['product_id'], $item['quantity'], $item['price']);
    $item_stmt->execute();
}

$item_stmt->close();
$stmt->close();

// Clear cart
$clear_sql = "DELETE FROM cart WHERE user_id = ?";
$clear_stmt = $conn->prepare($clear_sql);
$clear_stmt->bind_param("i", $user_id);
$clear_stmt->execute();
$clear_stmt->close();

$conn->close();

// Redirect to success page
header("Location: order_success.php?order_id=" . $order_id);
exit();
?>
