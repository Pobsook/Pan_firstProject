<?php 
    session_start();
    date_default_timezone_set('Asia/Bangkok');
    require("connect.php");

    if(!isset($_SESSION['id_account'])){
        $_SESSION['result'] = 'กรุณาล็อกอินก่อนครับ';
        header('location: Home_page.php');
        exit();
    }

    $callback_cart = $connect -> prepare("SELECT * FROM product WHERE id_account = ? AND status_product = 1");
    $callback_cart -> bind_param('i', $_SESSION['id_account']);
    $callback_cart -> execute();
    $callback_cart_result = $callback_cart -> get_result();

    $callback_total_price = $connect -> prepare("SELECT sum(price) AS total_price FROM product WHERE id_account = ? AND status_product = 1 ");
    $callback_total_price -> bind_param('i', $_SESSION['id_account']);
    $callback_total_price -> execute();
    $callback_total_price_result = $callback_total_price -> get_result();
    $total_price_row = $callback_total_price_result->fetch_assoc();
    $total_price = $total_price_row['total_price'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="cssAll/cart.css">
    <link rel="stylesheet" href="cssAll/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <?php require("alert.php"); ?>
    <?php require("navbar.php"); ?>
    <?php require("contact.php"); ?>
    
    <div class="container_cart" style="background-color: aliceblue; padding: 20px; border-radius: 8px; max-width: 900px; margin: 1rem auto;">
    <h1 style="text-align: center; color: #333;">CART</h1>

    <?php if ($callback_cart_result->num_rows == 0) { ?>
        <h3 style="text-align: center; color: #777;">ไม่มีสินค้าใน Cart</h3>
    <?php } else { ?>
        <table class="cart_table">
            <tr>
                <th>Model</th>
                <th>Description</th>
                <th>Upholstery color</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
          <?php while ($rows = $callback_cart_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $rows['model']; ?></td>
                <td><?php echo $rows['description']; ?></td>
                <td><?php echo $rows['upholstery']; ?></td>
                <td><?php echo $rows['quantity']; ?></td>
                <td><?php echo number_format(round($rows['price'])); ?> ฿</td>                        
                <td><button class="remove_rows" data-id="<?php echo $rows['id_product']; ?>">Remove</button></td>
            </tr>
          <?php } ?>
        </table>
        <div class="buy_item">
            <div class="total_price_container">
                <h3 class="total_price">Total Price <?php echo number_format(round($total_price)); ?> ฿</h3>
            </div>
            <button class="buy_button">Buy Now</button>
        </div>

    <?php } ?>
</div>

<style>
    .buy_item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }

    .total_price_container {
        background-color: #f4f4f4;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .total_price {
        font-size: 32px;
        font-weight: bold;
        color: #333;
        margin: 0;
    }

    .buy_button {
        background-color: #007BFF;
        color: white;
        border: none;
        padding: 12px 25px;
        margin-right: 2rem;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .buy_button:hover {
        background-color: #0056b3;
    }

    .buy_button:active {
        background-color: #004085;
    }

    .container_cart {
        background-color: aliceblue;
        padding: 20px;
        border-radius: 8px;
        max-width: 900px;
        margin: 0 auto;
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    h3 {
        text-align: center;
        color: #777;
    }
    .cart_table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    .cart_table th, .cart_table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    .cart_table th {
        background-color: #f4f4f4;
        color: #333;
    }
    .cart_table tr:hover {
        background-color: #f1f1f1;
    }

    .remove_rows {
        background-color: #ff4d4d;
        color: white;
        border: none;
        padding: 8px 15px;
        font-size: 14px;
        cursor: pointer;
        border-radius: 4px;
    }

    .remove_rows:hover {
        background-color: #e60000;
    }

</style>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="JavasciptAll/Contact_list.js"></script>
    <script src="JavasciptAll/Modal_Collection.js"></script>
    <script src="JavasciptAll/Index.js"></script>
    <script src="JavasciptAll/cart_js.js"></script>

</body>
</html>
