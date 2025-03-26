<?php

session_start();
date_default_timezone_set('Asia/Bangkok');
require('connect.php');

if(isset($_POST['shipping_info'])){
    if(
        !empty($_POST['name_or_company']) && 
        !empty($_POST['id_card_or_passport']) && 
        !empty($_POST['location_delivery']) && 
        !empty($_POST['telephone'])
    ){
        $name_or_company = htmlspecialchars($_POST['name_or_company']);
        $id_card_or_passport = htmlspecialchars($_POST['id_card_or_passport']);
        $location_delivery = htmlspecialchars($_POST['location_delivery']);
        $telephone = htmlspecialchars($_POST['telephone']);

        $_SESSION['shipping_info'] = [
            'name_or_company' => $name_or_company,
            'telephone' => $telephone,
            'id_card_or_passport' => $id_card_or_passport,
            'location_delivery' => $location_delivery
        ];

        $_SESSION['result'] = 'ข้อมูลถูกเพิ่มสำเร็จ';
        header('location: cart.php');
        exit();
    }else{
        $_SESSION['result'] = 'กรุณากรอกข้อมูลให้ครบถ้วน';
        header('location: cart.php');
        exit();
    }
}

if(isset($_POST['tax_info'])){
    if(!empty($_POST['name_or_company_tax']) && !empty($_POST['id_card_or_passport_tax']) && !empty($_POST['address_tax_Invoice'])){
        $name_or_company_tax = htmlspecialchars($_POST['name_or_company_tax']);
        $id_card_or_passport_tax = htmlspecialchars($_POST['id_card_or_passport_tax']);
        $address_tax_Invoice = htmlspecialchars($_POST['address_tax_Invoice']);

        $_SESSION['tax_info'] = [
            'name_or_company_tax' => $name_or_company_tax,
            'idCard_or_idCompany' => $id_card_or_passport_tax,
            'address_tax' => $address_tax_Invoice,
        ];

        $_SESSION['result'] = 'ข้อมูลถูกเพิ่มสำเร็จ';
        header('location: cart.php');
        exit();
    }else{
        $_SESSION['result'] = 'เกิดความผิดพลาดในการเพิ่มข้อมูล';
        header('location: cart.php');
        exit();
    }
}else{
    $_SESSION['result'] = 'กรุณากรอกข้อมูลให้ครบถ้วน';
    header('location: cart.php');
    exit();
}
