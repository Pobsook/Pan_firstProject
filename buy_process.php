<?php

session_start();
date_default_timezone_set("Asia/Bangkok");
require("connect.php");

if(isset($_POST['get_session_ship'])){
    if(isset($_SESSION['shipping_info']['name_or_company']) && isset($_SESSION['shipping_info']['telephone']) && $_SESSION['shipping_info']['id_card_or_passport']){
        echo 'success';
    }
}