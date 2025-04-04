<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
require("connect.php");

if (isset($_POST['selected_products']) && !empty($_POST['selected_products'])) {
    $selected_products = $_POST['selected_products'];

    // แปลง Array ให้เป็น String (ป้องกัน SQL Injection)
    $product_ids_str = implode(",", array_map('intval', $selected_products));

    $query = "SELECT SUM(price) AS total_price FROM product WHERE id_product IN ($product_ids_str)";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['total_price'] = $row['total_price'] ?? 0; // ถ้าไม่มีสินค้าให้เป็น 0

    echo $_SESSION['total_price'];
} else {
    $_SESSION['total_price'] = 0;
    echo 0;
}
?>