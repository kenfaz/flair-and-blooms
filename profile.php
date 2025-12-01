<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "Please log in to view your profile.";
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

// Fetch user info
$stmt = $conn->prepare("SELECT full_name, email FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// Update profile if form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // optional: if filled, update password

    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE users SET full_name = ?, email = ?, password = ? WHERE user_id = ?");
        $stmt->bind_param("sssi", $full_name, $email, $hashed_password, $user_id);
    } else {
        $stmt = $conn->prepare("UPDATE users SET full_name = ?, email = ? WHERE user_id = ?");
        $stmt->bind_param("ssi", $full_name, $email, $user_id);
    }
    
    if ($stmt->execute()) {
        $message = "Profile updated successfully!";
    } else {
        $message = "Error updating profile: " . $stmt->error;
    }
    $stmt->close();
    
    // Refresh user info
    $stmt = $conn->prepare("SELECT full_name, email FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>My Profile | Flair & Blooms</title>
<link rel="stylesheet" href="css/profile.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
        <a href="#hero-section">Flair & Blooms</a>
      </div>

      <div class="links-container" id="links-container">
        <div class="nav-left-div">
          <a href="#flowers-section">Flowers</a>
          <a href="#customer-review-section">Reviews</a>
          <a href="#about-section">About</a>
          <a href="#contact-us-section">Contact Us</a>
          <a href="shop.php">Shopping</a>
        </div>
        <div class="nav-right-div">
          <a href="cart.php"><i class="fa-solid fa-basket-shopping"></i></a>
          <a href="profile.php"><i class="fa-solid fa-user"></i></a>
          <a href="login.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
      </div>
    </nav>
  </div>
<div class="profile-container">
    <h1>My Profile</h1>
    
    <?php if (!empty($message)): ?>
        <p class="message"><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="full_name">Full Name</label>
        <input type="text" name="full_name" id="full_name" value="<?php echo htmlspecialchars($user['full_name']); ?>" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

        <label for="password">New Password (leave blank to keep current)</label>
        <input type="password" name="password" id="password">

        <button type="submit">Update Profile</button>
    </form>
</div>

</body>
</html>
