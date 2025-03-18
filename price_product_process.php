<?php
session_start();
require('connect.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);


if (isset($_POST['get_price'])) {
    $description_rc = $_POST['description_rc'];
    $upholstery_rc = $_POST['upholstery_rc'];
    $description_oc = $_POST['description_oc'];
    $upholstery_oc = $_POST['upholstery_oc'];
    $description_mc = $_POST['description_mc'];
    $upholstery_mc = $_POST['upholstery_mc'];

    // ตั้งค่าราคาเริ่มต้นป้องกัน JSON encode error
    $price_rc = 0;
    $price_oc = 0;
    $price_mc = 0;

    // ดึงราคาของ recliner chair
    $callback_price_rc = $connect->prepare("SELECT price FROM description WHERE description_name = ?");
    $callback_price_rc->bind_param('s', $description_rc);
    $callback_price_rc->execute();
    $callback_price_rc_result = $callback_price_rc->get_result();
    $row_price_rc = $callback_price_rc_result->fetch_assoc();

    // ดึงประเภทของ upholstery สำหรับ recliner chair
    $callback_type_rc = $connect->prepare("SELECT upholstery_color_type FROM upholstery_color WHERE upholstery_color_name = ?");
    $callback_type_rc->bind_param('s', $upholstery_rc);
    $callback_type_rc->execute();
    $callback_type_color_rc = $callback_type_rc->get_result();
    $row_type_rc = $callback_type_color_rc->fetch_assoc();

    // ดึงราคาของ office chair
    $callback_price_oc = $connect->prepare("SELECT price FROM description WHERE description_name = ?");
    $callback_price_oc->bind_param('s', $description_oc);
    $callback_price_oc->execute();
    $callback_price_result_oc = $callback_price_oc->get_result();
    $row_price_oc = $callback_price_result_oc->fetch_assoc();

    // ดึงประเภทของ upholstery สำหรับ office chair
    $callback_type_oc = $connect->prepare("SELECT upholstery_color_type FROM upholstery_color WHERE upholstery_color_name = ?");
    $callback_type_oc->bind_param('s', $upholstery_oc);
    $callback_type_oc->execute();
    $callback_type_color_oc = $callback_type_oc->get_result();
    $row_type_oc = $callback_type_color_oc->fetch_assoc();

    // ดึงราคาของ motor chair
    $callback_price_mc = $connect->prepare("SELECT price FROM description WHERE description_name = ?");
    $callback_price_mc->bind_param('s', $description_mc);
    $callback_price_mc->execute();
    $callback_price_result_mc = $callback_price_mc->get_result();
    $row_price_mc = $callback_price_result_mc->fetch_assoc();

    // ดึงประเภทของ upholstery สำหรับ motor chair
    $callback_type_mc = $connect->prepare("SELECT upholstery_color_type FROM upholstery_color WHERE upholstery_color_name = ?");
    $callback_type_mc->bind_param('s', $upholstery_mc);
    $callback_type_mc->execute();
    $callback_type_color_mc = $callback_type_mc->get_result();
    $row_type_mc = $callback_type_color_mc->fetch_assoc();

    // คำนวณราคาของ recliner chair
    if (!empty($row_price_rc) && !empty($row_type_rc)) {
        if ($row_type_rc['upholstery_color_type'] == 'centurian_leather') {
            $price_rc = ($row_price_rc['price'] * 1.2) * $_SESSION['recliner_chair']['quantity'];
        } elseif ($row_type_rc['upholstery_color_type'] == 'natural_leather') {
            $price_rc = $row_price_rc['price'] * $_SESSION['recliner_chair']['quantity'];
        }
        $_SESSION['recliner_chair']['price'] = $price_rc;
    }

    // คำนวณราคาของ office chair
    if (!empty($row_price_oc) && !empty($row_type_oc)) {
        if ($row_type_oc['upholstery_color_type'] == 'centurian_leather') {
            $price_oc = ($row_price_oc['price'] * 1.2) * $_SESSION['office_chair']['quantity'];
        } elseif ($row_type_oc['upholstery_color_type'] == 'natural_leather') {
            $price_oc = $row_price_oc['price'] * $_SESSION['office_chair']['quantity'];
        }
        $_SESSION['office_chair']['price'] = $price_oc;
    }

    // คำนวณราคาของ motor chair
    if (!empty($row_price_mc) && !empty($row_type_mc)) {
        if ($row_type_mc['upholstery_color_type'] == 'centurian_leather') {
            $price_mc = ($row_price_mc['price'] * 1.2) * $_SESSION['motor_chair']['quantity'];
        } elseif ($row_type_mc['upholstery_color_type'] == 'natural_leather') {
            $price_mc = $row_price_mc['price'] * $_SESSION['motor_chair']['quantity'];
        }
        $_SESSION['motor_chair']['price'] = $price_mc;
    }

    echo json_encode(array(
        'price_rc' => $price_rc,
        'price_oc' => $price_oc,
        'price_mc' => $price_mc,
    ));
}
?>
