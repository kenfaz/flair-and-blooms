<?php
session_start();

// Example: make sure user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'User not logged in']);
    exit;
}

$user_id = $_SESSION['user_id'];

$host = "localhost";
$user = "root";
$pass = "";
$db   = "flower_shop"; // change to your DB

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);

    // Check if product already in cart for this user
    $check = $conn->prepare("SELECT cart_id, quantity FROM cart WHERE product_id = ? AND user_id = ?");
    $check->bind_param("ii", $product_id, $user_id);
    $check->execute();
    $check->store_result();
    $check->bind_result($cart_id, $quantity);

    if ($check->num_rows > 0) {
        $check->fetch();
        // Update quantity
        $new_quantity = $quantity + 1;
        $update = $conn->prepare("UPDATE cart SET quantity = ?, added_at = NOW() WHERE cart_id = ?");
        $update->bind_param("ii", $new_quantity, $cart_id);
        $update->execute();
        $update->close();
        echo json_encode(['status' => 'updated', 'quantity' => $new_quantity]);
    } else {
        // Insert new product
        $insert = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity, added_at) VALUES (?, ?, 1, NOW())");
        $insert->bind_param("ii", $user_id, $product_id);
        $insert->execute();
        $insert->close();
        echo json_encode(['status' => 'added', 'quantity' => 1]);
    }

    $check->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'No product ID provided']);
}

$conn->close();
?>
