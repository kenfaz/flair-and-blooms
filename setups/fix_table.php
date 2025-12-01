<?php
// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$db   = "flower_shop"; // change if your DB name is different

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add 'quantity' column if it doesn't exist
$sql = "ALTER TABLE orders ADD COLUMN IF NOT EXISTS quantity INT NOT NULL AFTER product_id";
if ($conn->query($sql) === TRUE) {
    echo "Column 'quantity' ensured.<br>";
} else {
    echo "Error adding 'quantity': " . $conn->error . "<br>";
}

// Add 'price' column if it doesn't exist
$sql = "ALTER TABLE orders ADD COLUMN IF NOT EXISTS price DECIMAL(10,2) NOT NULL AFTER quantity";
if ($conn->query($sql) === TRUE) {
    echo "Column 'price' ensured.<br>";
} else {
    echo "Error adding 'price': " . $conn->error . "<br>";
}

// Close connection
$conn->close();
?>
