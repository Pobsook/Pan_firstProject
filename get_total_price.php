<?php

session_start();
date_default_timezone_set('Asia/Bangkok');
require("connect.php");

if (isset($_POST['selected_products'])) {
    $selected_products = $_POST['selected_products'];

    // แปลง Array ให้เป็น String เพื่อใช้ใน SQL (ป้องกัน SQL Injection)
    $product_ids_str = implode(",", array_map('intval', $selected_products));

    $query = "SELECT SUM(price) AS total_price FROM product WHERE id_product IN ($product_ids_str)";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);

    echo $row['total_price'] ?? 0;  // ถ้าไม่มีราคาให้คืนค่า 0
}