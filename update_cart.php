<?php
session_start();
if(!isset($_SESSION['user_id'])) exit;
$user_id = $_SESSION['user_id'];
$cart_id = $_POST['cart_id'] ?? 0;
$quantity = $_POST['quantity'] ?? 1;

$host = "localhost"; $user = "root"; $pass = ""; $db = "flower_shop";
$conn = new mysqli($host,$user,$pass,$db);

$stmt = $conn->prepare("UPDATE cart SET quantity=?, added_at=NOW() WHERE cart_id=? AND user_id=?");
$stmt->bind_param("iii",$quantity,$cart_id,$user_id);
$stmt->execute();
echo json_encode(['status'=>'success']);
$stmt->close();
$conn->close();
?>
