<?php
// db.php - Database connection
$host = "localhost";
$user = "root";
$pass = "";
$db   = "flower_shop"; // change this to your DB name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Array of products to insert
$products = [
    [
        'product_name' => 'Red Roses Bouquet',
        'description' => 'Classic symbol of love and admiration.',
        'price' => 499,
        'stock' => 10,
        'image' => 'src/images/rose.jpg'
    ],
    [
        'product_name' => 'Purple Tulips',
        'description' => 'Elegant blooms representing royalty.',
        'price' => 399,
        'stock' => 15,
        'image' => 'src/images/purple_tulips.jpg'
    ],
    [
        'product_name' => 'Sunflower Stem',
        'description' => 'Bright and cheerful, perfect for any day.',
        'price' => 150,
        'stock' => 20,
        'image' => 'src/images/sunflower.jpg'
    ],
    [
        'product_name' => 'Lavender Bundle',
        'description' => 'Calming fragrance with soothing beauty.',
        'price' => 299,
        'stock' => 12,
        'image' => 'src/images/rose.jpg'
    ],
    [
        'product_name' => 'White Roses',
        'description' => 'Symbol of purity, grace, and new beginnings.',
        'price' => 450,
        'stock' => 8,
        'image' => 'src/images/purple_tulips.jpg'
    ],
    [
        'product_name' => 'Pink Peonies',
        'description' => 'Soft, delicate petals with romantic charm.',
        'price' => 520,
        'stock' => 5,
        'image' => 'src/images/rose.jpg'
    ],
];

// Insert products into database
foreach ($products as $product) {
    $stmt = $conn->prepare("INSERT INTO products (product_name, description, price, stock, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssii", $product['product_name'], $product['description'], $product['price'], $product['stock']);
    
    if ($stmt->execute()) {
        echo "Inserted: " . $product['product_name'] . "<br>";
    } else {
        echo "Error inserting " . $product['product_name'] . ": " . $stmt->error . "<br>";
    }
    $stmt->close();
}

$conn->close();
?>
