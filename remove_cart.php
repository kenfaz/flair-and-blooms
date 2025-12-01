<?php
session_start();
if(!isset($_SESSION['user_id'])) exit;
$user_id = $_SESSION['user_id'];
$cart_id = $_POST['cart_id'] ?? 0;

$host = "localhost"; $user = "root"; $pass = ""; $db = "flower_shop";
$conn = new mysqli($host,$user,$pass,$db);

$stmt = $conn->prepare("DELETE FROM cart WHERE cart_id=? AND user_id=?");
$stmt->bind_param("ii",$cart_id,$user_id);
$stmt->execute();
echo json_encode(['status'=>'success']);
$stmt->close();
$conn->close();
?>
