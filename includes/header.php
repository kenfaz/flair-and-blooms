<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/connect.php';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Flair & Blooms</title>
  <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
<header>
  <!-- Simple nav: keep your existing markup but replace links with .php later -->
  <nav>
    <a href="index.php">Home</a> |
    <a href="shop.php">Shop</a> |
    <?php if(isset($_SESSION['user'])): ?>
      Hello, <?php echo htmlspecialchars($_SESSION['user']['username']); ?> |
      <a href="cart.php">Cart</a> |
      <a href="auth/logout.php">Logout</a>
    <?php else: ?>
      <a href="auth/login.php">Login</a> |
      <a href="auth/signup.php">Sign up</a>
    <?php endif; ?>
    | <a href="admin/admin_login.php">Admin</a>
  </nav>
</header>
<main class="container">
