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
    ['product_name' => 'Red Roses Bouquet', 'description' => 'Classic symbol of love and admiration.', 'price' => 499, 'stock' => 10],
    ['product_name' => 'Purple Tulips', 'description' => 'Elegant blooms representing royalty.', 'price' => 399, 'stock' => 15],
    ['product_name' => 'Sunflower Stem', 'description' => 'Bright and cheerful, perfect for any day.', 'price' => 150, 'stock' => 20],
    ['product_name' => 'Lavender Bundle', 'description' => 'Calming fragrance with soothing beauty.', 'price' => 299, 'stock' => 12],
    ['product_name' => 'White Roses', 'description' => 'Symbol of purity, grace, and new beginnings.', 'price' => 450, 'stock' => 8],
    ['product_name' => 'Pink Peonies', 'description' => 'Soft, delicate petals with romantic charm.', 'price' => 520, 'stock' => 5],
    ['product_name' => 'White Lilies', 'description' => 'Elegant and fragrant, a classic beauty.', 'price' => 480, 'stock' => 10],
    ['product_name' => 'Orchid Bouquet', 'description' => 'Exotic blooms with delicate charm.', 'price' => 650, 'stock' => 7],
    ['product_name' => 'Cheerful Daisies', 'description' => 'Bright and happy flowers for any occasion.', 'price' => 200, 'stock' => 15],
    ['product_name' => 'Golden Marigolds', 'description' => 'Vibrant and sunny, symbolizing positivity.', 'price' => 180, 'stock' => 20],
    ['product_name' => 'Gerbera Daisies', 'description' => 'Bright and colorful, bringing joy and cheer.', 'price' => 220, 'stock' => 12],
    ['product_name' => 'Hydrangea Bouquet', 'description' => 'Lush clusters symbolizing gratitude and beauty.', 'price' => 550, 'stock' => 9],
    ['product_name' => 'Carnations', 'description' => 'Fragrant and long-lasting, perfect for gifting.', 'price' => 300, 'stock' => 15],
    ['product_name' => 'Blue Irises', 'description' => 'Elegant flowers symbolizing hope and wisdom.', 'price' => 400, 'stock' => 8],
    ['product_name' => 'Peach Roses', 'description' => 'Soft and charming, perfect for romantic gestures.', 'price' => 480, 'stock' => 10],
    ['product_name' => 'Lotus Flowers', 'description' => 'Symbol of purity and serenity, unique and calming.', 'price' => 600, 'stock' => 5],
    ['product_name' => 'Freesias', 'description' => 'Fragrant and delicate, perfect for special moments.', 'price' => 350, 'stock' => 12],
    ['product_name' => 'Anemones', 'description' => 'Vibrant petals symbolizing anticipation and excitement.', 'price' => 380, 'stock' => 7],
    ['product_name' => 'Chrysanthemums', 'description' => 'Elegant and versatile blooms for any occasion.', 'price' => 420, 'stock' => 10],
    ['product_name' => 'Bluebells', 'description' => 'Delicate blue blooms symbolizing humility and gratitude.', 'price' => 250, 'stock' => 15],
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
