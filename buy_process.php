<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
require("connect.php");

if(isset($_POST['get_session_ship'])){
    if(
        !empty($_SESSION['shipping_info']['name_or_company']) &&
        !empty($_SESSION['shipping_info']['telephone']) &&
        !empty($_SESSION['shipping_info']['id_card_or_passport']) &&
        !empty($_SESSION['total_price']) &&
        $_SESSION['total_price'] != 0
    ){
        echo 'success';
    } else {
        echo 'fail';
    }
}
?>
